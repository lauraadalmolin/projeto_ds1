<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Categoria extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Categoria_model');
		$this->load->helper('file');
	}

	public function create() {

		$this->form_validation->set_rules('nome','TITULO','trim|required|max_length[100]|ucwords');
        $this->form_validation->set_rules('descricao','TEXTO','trim|required|max_length[800]');
        //$this->form_validation->set_rules('foto','IMAGEM','required');

		if($this->form_validation->run()==TRUE):
					
	        $data = elements(array('nome','descricao'), $this->input->post());

	    	$id = $this->Categoria_model->do_insert($data);

	    	$config['upload_path'] = './uploads/categorias/';
	    	$config['allowed_types'] = 'jpg';
	    	$config['file_name'] = $id;

	    	$this->load->library('upload', $config);
	    	$this->upload->do_upload('foto');
			redirect('CRUD_Categoria/create');

        endif;

		$dados = array(
			'titulo' => 'Cadastro de Categoria',
			'tela' => 'create_categoria',
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function retrieve() {

		$dados = array(
			'titulo' => 'Categorias',
			'tela' => 'retrieve_categoria',
			'categorias' => $this->Categoria_model->get_all()->result(),

		);

		$this->load->view('View_Usuario',$dados);
	}

	public function update() {

	}

	public function delete() {
		
	}
	

}

