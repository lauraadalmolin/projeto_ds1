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
			$this->db->order_by('id', 'DESC');
			$this->db->where('id_categoria',$id);
			return $this->db->get('produtos');
		else:
			return FALSE;
		endif;
	}

	public function get_indicacoes($id=NULL) {
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


}