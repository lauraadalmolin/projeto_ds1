<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model{

	public function do_insert($dados=NULL) {
		if($dados!=NULL):
			$this->db->insert('categorias',$dados);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('cadastrook','Categoria cadastrada com sucesso!');
			return $id;
		endif;
	}

	
}