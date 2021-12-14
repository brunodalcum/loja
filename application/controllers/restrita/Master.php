<?php

defined('BASEPATH')  or exit('Ação não permitida!');


class Master extends CI_Controller
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
			'titulo' => 'Categoria pai Cadastradas',

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
			'master' => $this->core_model->get_all('categorias_pai'),
		);


		$this->load->view('restrita/layouts/header', $data);
		$this->load->view('restrita/master/index');
		$this->load->view('restrita/layouts/footer');
	}


	public function core($categoria_pai_id = NULL)
	{

		$categoria_pai_id = (int)$categoria_pai_id;

		// CADASTRANDO A CATEGORIA


		if (!$categoria_pai_id) {

			//Cadastrar

			$this->form_validation->set_rules('categoria_pai_nome', 'Nome da categoria pai', 'trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');

			if ($this->form_validation->run()) {

				if ($this->input->post('categoria_pai_ativa') == 0) {

					//Definer proibição de desativação

					if($this->core_model->get_by_id('categorias', array('categoria_pai_id' => $categoria_pai_id))){

						$this->session->set_flashdata('erro', 'Essa categoria pai não pode ser desativada, pois está vinculada a uma categoria filha!');
						redirect('restrita/master');
					}
				}


				$data = elements(
					array(
						'categoria_pai_nome',
						'categoria_pai_ativa',
					), $this->input->post()
				);

				//Definindo o metalink
				$data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);

				$data = html_escape($data);

				$this->core_model->insert('categorias_pai', $data);
				redirect('restrita/master');
			} else {

				//Erro de validação

				$data = array(
					'titulo' => 'Cadastrar categoria pai',

				);

				//echo '<pre>';
				//print_r($data['categoria_pai']);
				//exit();

				$this->load->view('restrita/layouts/header', $data);
				$this->load->view('restrita/master/core');
				$this->load->view('restrita/layouts/footer');
			}
		} else {

			if (!$master = $this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id))) {

				$this->session->set_flashdata('erro', 'Essa categoria pai não foi encontrada');
				redirect('restrita/master');
			} else {

				//Editando
				$this->form_validation->set_rules('categoria_pai_nome', 'Nome da categoria pai', 'trim|required|min_length[4]|max_length[40]|callback_valida_nome_categoria');

				if ($this->form_validation->run()) {

					if ($this->input->post('categoria_pai_ativa') == 0) {

						//Definer proibição de desativação
					}


					$data = elements(
						array(
							'categoria_pai_nome',
							'categoria_pai_ativa',
						), $this->input->post()
					);

					//Definindo o metalink
					$data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);

					$data = html_escape($data);

					$this->core_model->update('categorias_pai', $data, array('categoria_pai_id' => $categoria_pai_id));
					redirect('restrita/master');
				} else {

					//Erro de validação

					$data = array(
						'titulo' => 'Editar categoria pai',
						'master' => $master,
					);

					//echo '<pre>';
					//print_r($data['categoria_pai']);
					//exit();

					$this->load->view('restrita/layouts/header', $data);
					$this->load->view('restrita/master/core');
					$this->load->view('restrita/layouts/footer');
				}
			}
		}
	}

	public function valida_nome_categoria($categoria_nome)
	{
		$categoria_pai_id = $this->input->post('categoria_pai_id');

		if (!$categoria_pai_id) {

			// CADASTRABDO
			if ($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_nome))) {
				$this->form_validation->set_message('valida_nome_categoria', 'Essa Categoria  já existe!');
				return false;
			} else {
				return true;
			}
		} else {
			//  EDITANDO
			if ($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nom' => $categoria_nome, 'categoria_pai_id != ' => $categoria_pai_id))) {
				$this->form_validation->set_message('valida_nome_marca', 'Essa Categoria  já existe!');
				return false;
			} else {
				return true;
			}
		}
	}

	public function delete($categoria_pai_id = NULL)
	{
		$categoria_pai_id = (int)  $categoria_pai_id;

		if(!$categoria_pai_id || $this->core_model->get_by_id('categoria_pai', array('categorias_pai_id' => $categoria_pai_id))){
			$this->session->set_flashdata('erro', 'Essa categoria pai não foi encontrada');
			redirect('restrita/master');
		}
		if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id,
			'categoria_pai_ativa' => 1))){
			$this->session->set_flashdata('erro', 'Não é possível excluír uma Categoria Pai ativa!');
			redirect('restrita/master');
		}

		$this->core_model->delete('categorias_pai', array('categoria_pai_id' => $categoria_pai_id));
		redirect('restrita/master');
	}
}
