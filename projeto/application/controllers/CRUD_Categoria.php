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

		$this->form_validation->set_rules('nome','TITULO','trim|required|max_length[100]');
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
		$this->form_validation->set_rules('nome','TITULO','trim|required|max_length[100]');
        $this->form_validation->set_rules('descricao','TEXTO','trim|required|max_length[800]');
		if($this->form_validation->run()==TRUE) {
			$id = $this->input->post('id');
			$config['upload_path'] = './uploads/categorias/';
	    	$config['allowed_types'] = 'jpg';
	    	$config['file_name'] = $id;
	    	$config['overwrite'] = true;
	    
	    	$this->load->library('upload', $config);
	    	$this->upload->do_upload('foto');
			
            $dados = elements(array('nome','descricao'), $this->input->post());
        	$this->Categoria_model->do_update($dados, $id);
        	redirect("/CRUD_Categoria/retrieve");
        } else {
			$dados = array(
				'titulo' => 'CRUD &raquo; Update',
				'tela' => 'update_categoria',
				'categoria' =>
						 $this->Categoria_model->get_byid($this->input->get('id'))->result()
			);
			$this->load->view('View_Usuario',$dados);
		}
	}

	public function delete() {
		if ($this->input->get('id')>0):  
			$diretorio = "./uploads/categorias/" . $this->input->get('id') . ".jpg";
			if (file_exists($diretorio)) {
				unlink($diretorio);
			}
			$this->Categoria_model->do_delete(array('id' => $this->input->get('id')));
		endif;
		$dados = array(
			'titulo' => 'Categorias',
			'tela' => 'retrieve_categoria',
			'categorias' => $this->Categoria_model->get_all()->result()
		);
		$this->load->view('View_Usuario',$dados);
	}
	

}

