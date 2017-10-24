<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function get_all() {
		return $this->db->get('usuarios');
	}

	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->order_by('id', 'ASC');
			$this->db->where('id',$id);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}

}