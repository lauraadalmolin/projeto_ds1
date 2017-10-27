<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Produto extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Noticia_model');
		$this->load->model('Usuario_model');
		$this->load->helper('file');
	}

	public function create() {
		$dados = array(
			'titulo' => 'Cadastro de Produto',
			'tela' => 'create_produto',
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function retrieve() {
		$dados = array(
			'titulo' => 'Lista de Produtos',
			'tela' => 'retrieve_produto',
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function update() {

	}

	public function delete() {
		
	}
	

}

