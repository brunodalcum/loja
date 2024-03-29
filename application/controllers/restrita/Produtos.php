<?php

defined('BASEPATH')  or exit('Ação não permitida!');
class Produtos extends CI_Controller

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
			'titulo' => 'Produtos  Cadastradas',

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
			'produtos' => $this->produtos_model->get_all('produtos'),
		);



		$this->load->view('restrita/layouts/header', $data);
		$this->load->view('restrita/produtos/index');
		$this->load->view('restrita/layouts/footer');
	}


	public function core($produto_id = NULL)
	{
		$produto_id = (int) $produto_id;

		if(!$produto_id) {

			// CADASTRANDO
		} else {

			if(!$produto = $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))){

				$this->session->set_flashdata('erro', 'Produto não foi encontrado!');
			} else {

				//EDITANDO O PRODUTO

				$this->form_validation->set_rules('produto_nome', 'Nome do Produto', 'trim|required|min_length[4]|max_length[40]|callback_valida_nome_produto');
				$this->form_validation->set_rules('produto_categoria_id', 'Categoria do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_marca_id', 'Marca do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_valor', 'Valor de venda do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_peso', 'Peso do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_altura', 'Altura do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_largura', 'Largura do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_comprimento', 'Comprimento do Produto', 'trim|required');
				$this->form_validation->set_rules('produto_quantidade_estoque', 'Quantidade Estoque', 'trim|required');
				$this->form_validation->set_rules('produto_descricao', 'Descrição do Produto', 'trim|required|min_length[10]|max_length[5000]');

				if($this->form_validation->run()){

					$data = elements(
						array(
							'produto_nome',
							'produto_categoria_id',
							'produto_marca_id',
							'produto_valor',
							'produto_peso',
							'produto_altura',
							'produto_largura',
							'produto_comprimento',
							'produto_quantidade_estoque',
							'produto_ativo',
							'produto_destaque',
							'produto_controlar_estoque',
							'produto_descricao',
						), $this->input->post(),
					);

					// REMOVE A VIRGULA DO VALOR
					$data['produto_valor'] = str_replace(',', '', $data['produto_valor']);

					// CRIANDO O MTEALINK

					$data['produto_meta_link'] = url_amigavel($data['produto_nome']);

					$data = html_escape($data);

//					echo "<pre>";
//					print_r($data);
//					exit();
					$this->core_model->update('produtos', $data, array('produto_id' => $produto_id));
					redirect('restrita/produtos');

					// RECUPERAR DO POST AS FOTOS
					$fotos_produtos = $this->input->post('fotos_produtos');

					$total_fotos = count($fotos_produtos);
					echo "<pre>";
					print_r($total_fotos);
					for($i = 0; $i < $total_fotos; $i++){
						$data = array(
							'foto_produto_id' => $produto_id,
							'foto_caminho' => $fotos_produtos[$i],
						);


						$this->core_model->insert('produtos_fotos', $data);
					}

				} else {

					// ERROS DE VALIDAÇÃO


					$data = array(
						'titulo' => 'Editar Produto',

						'styles' => array(
							'jquery-upload-file/css/uploadfile.css',
						),

						'scripts' => array(
							'sweetalert2/sweetalert2.all.min.js',
							'jquery-upload-file/js/jquery.uploadfile.js',
							'jquery-upload-file/js/produtos.js',
							'mask/jquery.mask.min.js',
							'mask/custom.js',

						),
						'produto' => $produto,
						'fotos_produto' => $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $produto_id)),
						'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
						'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
					);

//				echo "<pre>";
//				print_r($data['produtos']);
//				exit();

					$this->load->view('restrita/layouts/header', $data);
					$this->load->view('restrita/produtos/core');
					$this->load->view('restrita/layouts/footer');


				}
			}
		}

	}

	public function upload()
	{
		$config['upload_path']          = './uploads/produtos/';
		$config['allowed_types']        = 'jpeg|jpg|png|JPG';
		$config['max_size']             = 2048;
		$config['max_width']            = 1000;
		$config['max_height']           = 1000;
		$config['encrypt_name']         = TRUE;
		$config['max_filename']         = 200;
		$config['file_ext_tolower']         = TRUE;

		$this->load->library('upload', $config);

		if (  $this->upload->do_upload('foto_produto'))
		{
			$data = array(
				'uploaded_data' => $this->upload->data(),
				'mensagem' => 'Imagem enviada com Sucesso!',
				'foto_caminho' => $this->upload->data('file_name'),
				'erro' => 0
			);

			// RESIZE IMAGEM CONFIGURAÇÃO

			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/produtos/'.$this->upload->data('file_name');
			$config['new_image'] = './uploads/produtos/small/'.$this->upload->data('file_name');
			$config['width']         = 300;
			$config['height']       = 300;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			if ( ! $this->image_lib->resize())
			{
				echo $data['erro'] = $this->image_lib->display_errors();
			}
		}
		else
		{
			$data = array(
				'mensagem' => $this->upload->display_errors(),
				'erro' => 5
			);

		}
			echo json_encode($data);

	}

	public function valida_nome_produto($produto_nome)
	{
		$produto_id = $this->input->post('produto_id');

		if(!$produto_id) {

			// CADASTRABDO
			if($this->core_model->get_by_id('produtos', array('produto_nome' => $produto_nome))){
				$this->form_validation->set_message('valida_nome_produto', 'Esse Produto  já existe!');
				return false;
			} else {
				return true;
			}
		} else {
			//  EDITANDO
			if($this->core_model->get_by_id('produtos', array('produto_nome' => $produto_nome, 'produto_id != ' => $produto_id))){
				$this->form_validation->set_message('valida_nome_produto', 'Esse Produto  já existe!');
				return false;
			} else {
				return true;
			}
		}
	}
}
