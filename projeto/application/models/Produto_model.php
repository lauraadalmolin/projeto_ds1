<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model{

	public function do_insert($dados=NULL) {
		if($dados!=NULL):
			$this->db->insert('produtos',$dados);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('sucesso','Produto cadastrado com sucesso!');
			return $id;
		endif;
	}

	public function get_all() {
		$this->db->order_by('nome');
		return $this->db->get('produtos');
	}

	public function do_n2n($indicacoes, $id) {
		if ($indicacoes != null) {
			foreach ($indicacoes as $indicacao) {
				$arr = array("id_indicacao" => $indicacao, "id_produto" => $id);
				$this->db->insert('produto_indicacao', $arr);
			}
		}
	}

	public function get_indicacoes($id) {
		if ($id!=NULL) {
			$this->db->where('id_produto', $id);
			$ids = $this->db->get('produto_indicacao')->result();
			$indicacoes = array();
			foreach ($ids as $id) {
				$this->db->where('id', $id->id_indicacao);
				$indicacao = $this->db->get('indicacoes')->result();
				$indicacoes[] = $indicacao[0];
			}
			return $indicacoes;
		}
	}

	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->order_by('id', 'DESC');
			$this->db->where('id',$id);
			$this->db->limit(1);
			return $this->db->get('produtos');
		else:
			return FALSE;
		endif;
	}

	public function get_p_categoria($id=NULL) {
		if ($id != NULL):
			$this->db->order_by('nome');
			$this->db->where('id_categoria',$id);
			return $this->db->get('produtos');
		else:
			return FALSE;
		endif;
	}

	public function get_indicacoes2($id=NULL) {
		if ($id != NULL) {
			$this->db->where('id_produto', $id);
			$this->db->select('id_indicacao');
			return $this->db->get('produto_indicacao');
		}
	}
	
	public function delete_n2n($id) {
		if ($id != null) {
			$this->db->where('id_produto', $id);
			$this->db->delete('produto_indicacao');
		}
	}
	public function do_delete($dados=NULL) {
		if ($dados!=NULL) {
			$this->db->where('id_produto', $dados['id']);
			$this->db->delete('produto_indicacao');
			$this->db->delete('produtos', $dados);
		}
	}

	public function do_update($dados=NULL,$id=NULL) {
		if($dados!=NULL && $id!=NULL):
			$this->db->update('produtos', $dados, array('id' => $id));
			$this->session->set_flashdata('update','Atualização realizada com sucesso!');
		endif;
	}

	public function search($busca) {
		if ($busca!=NULL) {
			$this->db->like('LOWER(nome)', strtolower($busca));
			$indicacoes = $this->db->get('indicacoes')->result();
			$ids = array();
			foreach ($indicacoes as $indicacao) {
					$ids[] = $indicacao->id;
			}
			$produtos = array();
			$ids_produtos = array();
			foreach ($ids as $id) {
				$this->db->where('id_indicacao', $id);
				$ids_p = $this->db->get('produto_indicacao')->result();
				foreach ($ids_p as $j) {
					$flag = true;
					for ($i=0; $i < count($ids_produtos); $i++) { 
						if ($ids_produtos[$i] == $j->id_produto) {
							$flag = false;
						}
					}
					if ($flag == true) {
						$ids_produtos[] = $j->id_produto;
					}			
				}
			}
			$produtos = array();
			foreach ($ids_produtos as $id) {
				$this->db->where('id', $id);
				$produto = $this->db->get('produtos')->result();
				$produtos[] = $produto[0];
			}
			return $produtos;
		}

	}


}