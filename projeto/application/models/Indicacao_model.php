<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Indicacao_model extends CI_Model{

	public function do_insert($dados=NULL) {
		if($dados!=NULL):
			$this->db->insert('indicacoes',$dados);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('cadastro','Indicação cadastrada com sucesso!');
			return $id;
		endif;
	}

	public function get_all() {
		return $this->db->get('indicacoes');
	}

	
}