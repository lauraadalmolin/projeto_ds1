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
	
}