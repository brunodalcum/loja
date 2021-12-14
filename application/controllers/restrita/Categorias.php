<?php

defined('BASEPATH')  or exit('Ação não permitida!');
class Categorias extends CI_Controller

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
			'titulo' => 'Categoria  Cadastradas',

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
			'categorias' => $this->core_model->get_all('categorias'),
		);


		$this->load->view('restrita/layouts/header', $data);
		$this->load->view('restrita/categorias/index');
		$this->load->view('restrita/layouts/footer');
	}

	public function core($categoria_id = NULL)
	{

		$categoria_id = (int)$categoria_id;

		// CADASTRANDO A CATEGORIA


		if (!$categoria_id) {

			//Cadastrar

			$this->form_validation->set_rules('categoria_nome', 'Nome da categoria', 'trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');

			if ($this->form_validation->run()) {

				$data = elements(
					array(
						'categoria_nome',
						'categoria_ativa',
						'categoria_pai_id'
					), $this->input->post()
				);

				//Definindo o metalink
				$data['categoria_meta_link'] = url_amigavel($data['categoria_nome']);

				$data = html_escape($data);

				$this->core_model->insert('categorias', $data);
				redirect('restrita/categorias');
			} else {

				//Erro de validação

				$data = array(
					'titulo' => 'Cadastrar Categoria ',
					'masters' => $this->core_model->get_all('categorias_pai', array('categoria_pai_ativa' => 1)),

				);

				//echo '<pre>';
				//print_r($data['categoria_pai']);
				//exit();

				$this->load->view('restrita/layouts/header', $data);
				$this->load->view('restrita/categorias/core');
				$this->load->view('restrita/layouts/footer');
			}
		} else {

			if (!$categoria = $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {

				$this->session->set_flashdata('erro', 'Essa Categoria não foi encontrada');
				redirect('restrita/categorias');
			} else {

				//Editando
				$this->form_validation->set_rules('categoria_nome', 'Nome da Categoria ', 'trim|min_length[4]|max_length[40]|callback_valida_nome_categoria');

				if ($this->form_validation->run()) {

					if ($this->input->post('categoria_ativa') == 0) {

						//Definer proibição de desativação
					}


					$data = elements(
						array(
							'categoria_nome',
							'categoria_ativa',
							'categoria_pai_id',
						), $this->input->post()
					);

					//Definindo o metalink
					$data['categoria_meta_link'] = url_amigavel($data['categoria_nome']);

					$data = html_escape($data);

					$this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));
					redirect('restrita/categorias');
				} else {

					//Erro de validação

					$data = array(
						'titulo' => 'Editar Categoria',
						'categoria' => $categoria,
						'masters' => $this->core_model->get_all('categorias_pai', array('categoria_pai_ativa' => 1)),
					);

					//echo '<pre>';
					//print_r($data['categoria_pai']);
					//exit();

					$this->load->view('restrita/layouts/header', $data);
					$this->load->view('restrita/categorias/core');
					$this->load->view('restrita/layouts/footer');
				}
			}
		}
	}

	public function valida_nome_categoria($categoria_nome)
	{
		$categoria_id = $this->input->post('categoria_id');

		if(!$categoria_id) {

			// CADASTRABDO
			if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome))){
				$this->form_validation->set_message('valida_nome_categoria', 'Esse Categoria  já existe!');
				return false;
			} else {
				return true;
			}
		} else {
			//  EDITANDO
			if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id != ' => $categoria_id))){
				$this->form_validation->set_message('valida_nome_categoria', 'Esse Categoria  já existe!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function delete($categoria_id = NULL)
	{
		$categoria_id = (int) $categoria_id;

		if(!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {
			$this->session->set_flashdata('erro', 'A Categoria não foi encontrada');
			redirect('restrita/categorias');
		}
		if($this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id, 'categoria_ativa' => 1))) {
			$this->session->set_flashdata('erro', 'Não foi possível excluir uma Categoria ativa!');
			redirect('restrita/categorias');
		}

		$this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
		redirect('restrita/categorias');
	}
}
