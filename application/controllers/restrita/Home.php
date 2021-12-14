<?php

defined('BASEPATH')  or exit('Ação não permitida!');


class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
	}

	public function index()
	{
		$this->load->view('restrita/layouts/header');
		$this->load->view('restrita/home/index');
		$this->load->view('restrita/layouts/footer');

	}

}
