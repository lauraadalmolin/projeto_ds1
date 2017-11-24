<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model{

	public function do_insert($dados=NULL) {
		if($dados!=NULL):
			$this->db->insert('categorias',$dados);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('create_categoria','Categoria salva com sucesso!');
			return $id;
		endif;
	}

	public function get_all() {
		return $this->db->get('categorias');
	}

	public function get_byid($id) {
		$this->db->order_by('id', 'DESC');
		$this->db->where('id',$id);
		$this->db->limit(1);
		return $this->db->get('categorias');
	}

	public function do_delete($dados=NULL) {
		if ($dados!=NULL) {
			$this->db->where('id_categoria', $dados['id']);
			$arr = $this->db->get('produtos')->result();
			foreach ($arr as $a) {
				$this->db->where('id_produto', $a->id);
				$this->db->delete('produto_indicacao');
			}
			$this->db->where('id_categoria', $dados['id']);
			$this->db->delete('produtos');
			$this->db->delete('categorias', $dados);
		}
	}

	public function do_update($dados=NULL,$id=NULL) {
		if($dados!=NULL && $id!=NULL):
			$this->db->update('categorias', $dados, array('id' => $id));
			$this->session->set_flashdata('update','Atualização realizada com sucesso!');
		endif;
	}



	
}