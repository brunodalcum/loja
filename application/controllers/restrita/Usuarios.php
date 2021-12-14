<?php

defined('BASEPATH')  or exit('Ação não permitida!');

class Usuarios extends CI_Controller
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
		$data = array(
			'titulo' => 'Usuários Cadastrados',

			'styles' => array(
				'plugins/datatable/css/dataTables.bootstrap5.css',
				'plugins/datatable/css/buttons.bootstrap5.min.css',
				'plugins/datatable/responsive.bootstrap5.css',
				'plugins/select2/select2.min.css',
			),

			'scripts' => array(
				'plugins/datatable/js/jquery.dataTables.min.js',
				'plugins/datatable/js/dataTables.bootstrap5.js',
				'plugins/datatable/js/dataTables.buttons.min.js',
				'plugins/datatable/js/buttons.bootstrap5.min.js',
				'plugins/datatable/js/jszip.min.js',
				'plugins/datatable/pdfmake/pdfmake.min.js',
				'plugins/datatable/pdfmake/vfs_fonts.js',
				'plugins/datatable/js/buttons.html5.min.js',
				'plugins/datatable/js/buttons.print.min.js',
				'plugins/datatable/js/buttons.colVis.min.js',
				'plugins/datatable/dataTables.responsive.min.js',
				'plugins/datatable/responsive.bootstrap5.min.js',
				'js/datatables.js',
				'plugins/select2/select2.full.min.js',
			),
			'usuarios' => $this->ion_auth->users()->result(),
		);


		$this->load->view('restrita/layouts/header', $data);
		$this->load->view('restrita/usuarios/usuarios');
		$this->load->view('restrita/layouts/footer');
	}

	public function core($usuario_id = NULL)
	{
		if(!$usuario_id){

			// CADATRAR USUÁRIO
			$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[4]|max_length[100]!valid_email|callback_valida_email');
			$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[50]|callback_valida_usuario');
			$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('confirma', 'Confirma', 'trim|required|matches[password]');

			if($this->form_validation->run()){

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$adicional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'active' => $this->input->post('active'),
				);
				$group = array($this->input->post('perfil'));

				if($this->ion_auth->register($username, $password, $email, $adicional_data, $group)){

					$this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso!!');
				}
				redirect('restrita/usuarios');
			} else{

				//ERROS DE VALIDAÇÃO

				$data = array(
					'titulo' => 'Cadastrar Usuário',
					'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(),
					'grupos' => $this->ion_auth->groups()->result(),
				);

				$this->load->view('restrita/layouts/header', $data);
				$this->load->view('restrita/home/core');
				$this->load->view('restrita/layouts/footer');
			}

		} else{

			if(!$usuario = $this->ion_auth->user($usuario_id)->row()){

				$this->session->set_flashdata('erro', 'Usuário não existe!');
				redirect('restrita/usuarios');

			} else {

				//EDITAR USUÁRIO

				$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[45]');
				$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[45]');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[4]|max_length[100]!valid_email|callback_valida_email');
				$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[50]|callback_valida_usuario');
				$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[4]|max_length[200]');
				$this->form_validation->set_rules('confirma', 'Confirma', 'trim|matches[password]');

				if($this->form_validation->run()){

					$data = elements(
						array(
							'first_name',
							'last_name',
							'email',
							'username',
							'password',
							'active',
						), $this->input->post()
					);

					$password = $this->input->post('password');

					/** Não atualiza senha se ela não for passada! */
					if(!$password) {

						unset($data['password']);
					}

					/** Sanitizando o Data! */

					$data = html_escape($data);


					if($this->ion_auth->update($usuario_id, $data)){

						$perfil = (int) $this->input->post('perfil');

						if($perfil) {

							$this->ion_auth->remove_from_group(NULL, $usuario_id);
							$this->ion_auth->add_to_group($perfil, $usuario_id);
						}


						$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!!');
					} else {
						$this->session->set_flashdata('erro', $this->ion_auth->errors());
					}
					redirect('restrita/usuarios');
				} else
				{

					$data = array(
						'titulo' => 'Editar Usuário',
						'usuario' => $usuario,
						'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(),
						'grupos' => $this->ion_auth->groups()->result(),
					);

					$this->load->view('restrita/layouts/header', $data);
					$this->load->view('restrita/home/core');
					$this->load->view('restrita/layouts/footer');
				}

			}

		}
	}

	public function valida_email($email)
	{
		$usuario_id = $this->input->post('usuario_id');

		if(!$usuario_id) {

			// CADASTRABDO
			if($this->core_model->get_by_id('users', array('email' => $email))){
				$this->form_validation->set_message('valida_email', 'Esse e-mail  já existe!');
				return false;
			} else {
				return true;
			}
		} else {
			//  EDITANDO
			if($this->core_model->get_by_id('users', array('email' => $email, 'id != ' => $usuario_id))){
				$this->form_validation->set_message('valida_email', 'Esse e-mail  já existe!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function valida_usuario($username)
	{
		$usuario_id = $this->input->post('usuario_id');

		if(!$usuario_id) {

			// CADASTRABDO
			if($this->core_model->get_by_id('users', array('username' => $username))){
				$this->form_validation->set_message('valida_usuario', 'Esse usuário  já existe!');
				return false;
			} else {
				return true;
			}
		} else {
			//  EDITANDO
			if($this->core_model->get_by_id('users', array('username' => $username, 'id != ' => $usuario_id))){
				$this->form_validation->set_message('valida_usuario', 'Esse usuário  já existe!');
				return false;
			} else {
				return true;
			}
		}
	}


	public function delete($usuario_id = NULL) {



		$usuario_id = (int) $usuario_id;

		if(!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){

			$this->session->set_flashdata('erro', 'O usuário não foi encontrado');

			redirect('restrita/usuarios');

		}else {

//começa a exclusão

			if($this->ion_auth->is_admin($usuario_id)){

				$this->session->set_flashdata('erro', 'Não é permitido excluir um usuário com perfil de administrador');

				redirect('restrita/usuarios');

			}

			if($this->ion_auth->delete_user($usuario_id)){

				$this->session->set_flashdata('sucesso', 'Ususário excluido com sucesso!');

			}else{

				$this->session->set_flashdata('erro', $this->ion_auth->errors());

			}

			redirect('restrita/usuarios');

		}

	}
}
