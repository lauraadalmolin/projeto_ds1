<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Logout extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Usuario_model');
		$this->load->model('Noticia_model');
	}

	public function index() {
		$dados = array(
			'titulo' => 'Página Inicial',
			'tela' => 'home',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function tela_login() {
		$dados = array(
			'titulo' => 'Login',
			'tela' => 'login',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function login() {
		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');
		$flag = $this->verifica_login($usuario, $senha);
		if ($flag == true) {
			$id = $this->busca_id($usuario, $senha);	
			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('usuario', $usuario);
			$this->session->set_userdata('senha', $senha);
			$this->session->set_userdata('logado', true);
			$dados = array(
				'titulo' => 'Página Inicial',
				'tela' => 'home',
			);
			$this->load->view('View_Usuario',$dados);
		} else {
			$this->session->set_flashdata('loginbad','O usuário ou a senha estão errados');
			$this->session->set_userdata('logado', false);
			$this->tela_login();
		}
		
	}

	public function verifica_login($usuario, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->get_all()->result();
		foreach ($usuarios as $u) {
			if ($usuario == $u->usuario && $senha == $u->senha) {
				return true;
			}
		}
		return false;
	}
	
	public function busca_id($usuario, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->get_all()->result();
		foreach ($usuarios as $u) {
			if ($usuario == $u->usuario && $senha == $u->senha) {
				return $u->id;
			}
		}
		return -1;
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('senha');
		$this->session->unset_userdata('logado');
		$this->session->unset_userdata('admin');
		$this->index();
	}

}