<?php

defined('BASEPATH')  or exit('Ação não permitida!');

class Marcas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Marcas Cadastradas',

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
			'marcas' => $this->core_model->get_all('marcas'),
		);


		$this->load->view('restrita/layouts/header', $data);
		$this->load->view('restrita/marcas/index');
		$this->load->view('restrita/layouts/footer');
	}

	public function core($marca_id = NULL)
	{

		if(!$marca_id) {

			// CADASTRANDO

			$this->form_validation->set_rules('marca_nome', 'Nome da Marca', 'trim|min_length[2]|max_length[40]|callback_valida_nome_marca');

			if($this->form_validation->run()){

				$data = elements(
					array(
						'marca_nome',
						'marca_ativa',

					), $this->input->post()
				);

				// CRIANDO O META LINK
				$data['marca_meta_link'] = url_amigavel($data['marca_nome']);

				$data = html_escape($data);

				$this->core_model->insert('marcas', $data);
				redirect('restrita/marcas');

			} else {

				// ERROS DE VALIDAÇÃO

				$data = array(
					'titulo' => 'Editar Marca',

				);


				$this->load->view('restrita/layouts/header', $data);
				$this->load->view('restrita/marcas/core');
				$this->load->view('restrita/layouts/footer');
			}



		} else {

			if(!$marca = $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {

				$this->session->set_flashdata('erro', 'A Marca não foi encontrada');
				redirect('restrita/marcas');
			} else {

				// EDITANDO A MARCA

				$this->form_validation->set_rules('marca_nome', 'Nome da Marca', 'trim|min_length[2]|max_length[40]|callback_valida_nome_marca');

				if($this->form_validation->run()){

					$data = elements(
						array(
							'marca_nome',
							'marca_ativa',

						), $this->input->post()
					);

					// CRIANDO O META LINK
					$data['marca_meta_link'] = url_amigavel($data['marca_nome']);

					$data = html_escape($data);

					$this->core_model->update('marcas', $data, array('marca_id' => $marca_id));
					redirect('restrita/marcas');

				} else {

					 // ERROS DE VALIDAÇÃO

					$data = array(
						'titulo' => 'Editar Marca',
						'marca' => $marca,
					);


					$this->load->view('restrita/layouts/header', $data);
					$this->load->view('restrita/marcas/core');
					$this->load->view('restrita/layouts/footer');
				}

			}
		}
	}

	public function valida_nome_marca($marca_nome)
	{
		$marca_id = $this->input->post('marca_id');

		if(!$marca_id) {

			// CADASTRABDO
			if($this->core_model->get_by_id('marcas', array('marca_nome' => $marca_nome))){
				$this->form_validation->set_message('valida_nome_marca', 'Esse Marca  já existe!');
				return false;
			} else {
				return true;
			}
		} else {
			//  EDITANDO
			if($this->core_model->get_by_id('marcas', array('marca_nome' => $marca_nome, 'marca_id != ' => $marca_id))){
				$this->form_validation->set_message('valida_nome_marca', 'Esse Marca  já existe!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function delete($marca_id = NULL)
	{
		$marca_id = (int) $marca_id;

		if(!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {
			$this->session->set_flashdata('erro', 'A Marca não foi encontrada');
			redirect('restrita/marcas');
		}
		if($this->core_model->get_by_id('marcas', array('marca_id' => $marca_id, 'marca_ativa' => 1))) {
			$this->session->set_flashdata('erro', 'Não foi possível excluir uma Marca ativa!');
			redirect('restrita/marcas');
		}

		$this->core_model->delete('marcas', array('marca_id' => $marca_id));
		redirect('restrita/marcas');
	}
}
