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
		$this->load->model('Indicacao_model');
		$this->load->helper('file');
	}

	public function create() {

		$this->form_validation->set_rules('nome','TITULO','trim|required|max_length[100]');

		if($this->form_validation->run()==TRUE) {
	        $data = elements(array('nome'), $this->input->post());

	    	$id = $this->Indicacao_model->do_insert($data);

	    	if ($id != null) {
	    		$this->session->set_flashdata('sucesso','Categoria cadastrada com sucesso!');
	    	} else {
	    		$this->session->set_flashdata('erro', 'Não foi possível cadastrar a categoria.');
	    	}

			redirect('CRUD_Indicacao/create');
        } else {
			$dados = array(
				'titulo' => 'Cadastro de Indicação',
				'tela' => 'create_indicacao',
			);

			$this->load->view('View_Usuario',$dados);	
        }
		
	}

	public function retrieve() {
		$dados = array(
			'titulo' => 'Indicações',
			'tela' => 'retrieve_indicacao',
			'indicacoes' => $this->Indicacao_model->get_all()->result(),

		);

		$this->load->view('View_Usuario',$dados);
	}

	public function update() {
		$this->form_validation->set_rules('nome','TITULO','trim|required|max_length[100]');
		if($this->form_validation->run()==TRUE) {
			$id = $this->input->post('id');
            $dados = elements(array('nome'), $this->input->post());
        	$this->Indicacao_model->do_update($dados, $id);
        	redirect("/CRUD_Indicacao/retrieve");
        } else {
			$dados = array(
				'titulo' => 'CRUD &raquo; Update',
				'tela' => 'update_indicacao',
				'indicacao' =>
						 $this->Indicacao_model->get_byid($this->input->get('id'))->result()
			);
			$this->load->view('View_Usuario',$dados);
		}
	}

	public function delete() {
		if ($this->input->get('id')>0):  
			$this->Indicacao_model->do_delete(array('id' => $this->input->get('id')));
		endif;
		$dados = array(
			'titulo' => 'Indicações',
			'tela' => 'retrieve_indicacao',
			'indicacoes' => $this->Indicacao_model->get_all()->result()
		);
		$this->load->view('View_Usuario',$dados);
	}
	

}

