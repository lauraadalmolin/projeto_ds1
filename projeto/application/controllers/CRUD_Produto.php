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
		$this->load->model('Indicacao_model');
		$this->load->model('Categoria_model');
		$this->load->model('Produto_model');
		$this->load->helper('file');
	}

	public function create() {

		$this->form_validation->set_rules('nome','TITULO','trim|required|max_length[100]|ucwords');
        $this->form_validation->set_rules('descricao','TEXTO','trim|required|max_length[800]');
        //$this->form_validation->set_rules('id_categoria','CATEGORIA', 'required');
        //$this->form_validation->set_rules('indicacoes', 'INDICACOES', 'required');
        //$this->form_validation->set_rules('foto','IMAGEM','required');

		if($this->form_validation->run()==TRUE):
					
	        $data = elements(array('nome','descricao', 'id_categoria'), $this->input->post());

	    	$id = $this->Produto_model->do_insert($data);
	    	$arr = array();
	    	foreach ($this->input->post('indicacoes[]') as $indicacao) {
	    		$arr[] = $indicacao;
	    	}
	    	$this->Produto_model->do_n2n($arr, $id);

	    	$config['upload_path'] = './uploads/produtos/';
	    	$config['allowed_types'] = 'jpg';
	    	$config['file_name'] = $id;

	    	$this->load->library('upload', $config);
	    	$this->upload->do_upload('foto');
			//redirect('CRUD_Categoria/create');

        endif;

		$dados = array(
			'titulo' => 'Cadastro de Produto',
			'tela' => 'create_produto',
			'indicacoes' => $this->Indicacao_model->get_all()->result(),
			'categorias' => $this->Categoria_model->get_all()->result(),
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function retrieve() {
		$dados = array(
			'titulo' => 'Lista de Produtos',
			'tela' => 'retrieve_produto',
			'produtos' => $this->Produto_model->get_all()->result(),
			'indicacoes' => $this->Indicacao_model->get_all()->result(),
			'categorias' => $this->Categoria_model->get_all()->result(),
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function update() {

	}

	public function delete() {
		
	}
	

}

