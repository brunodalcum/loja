<?php

defined('BASEPATH')  or exit('Ação não permitida!');


class Login extends CI_Controller
{
	public function index()
	{

		$data = array(
			'titulo' => 'Login'
		);


		$this->load->view('restrita/layouts/header', $data);
		$this->load->view('restrita/login/index');
		$this->load->view('restrita/layouts/footer');

	}

	public function auth()
	{
		$identity = $this->input->post('email');
		$password = $this->input->post('password');



		if($this->ion_auth->login($identity, $password)){

			$this->session->set_flashdata('sucesso', 'Seja muito bem vindo(a)');
			redirect('restrita');
		} else {
			$this->session->set_flashdata('erro', 'Por favor! Verifique suas credenciais!');
			redirect('restrita/login');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('restrita/login');
	}
}
