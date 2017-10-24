<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Indicacao extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		//$this->load->model('Indicacao_model');
		$this->load->helper('file');
	}

	public function create() {
		$dados = array(
			'titulo' => 'Cadastro de Indicacao',
			'tela' => 'create_indicacao',
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function retrieve() {

	}

	public function update() {

	}

	public function delete() {
		
	}
	

}

