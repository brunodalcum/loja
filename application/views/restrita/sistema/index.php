		<?php $this->load->view('restrita/layouts/navbar'); ?>

		<div class="page">
			<div class="page-main">
				<!--aside open-->
				<?php $this->load->view('restrita/layouts/sidebar'); ?>
				<!--aside closed-->


				<!--Page header-->
				<div class="page-header">
					<div class="page-leftheader">
						<h4 class="page-title"><?php echo $titulo; ?></h4>
					</div>
					<div class="page-rightheader ms-auto d-lg-flex d-none">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>

							<li class="breadcrumb-item"><a href="<?php echo base_url('restrita/usuarios/index');?>">Todos Usuários</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
						</ol>
					</div>
				</div>

						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Informações da Loja</h3>
									</div>



									<?php echo form_open('restrita/sistema/'); ?>

									<div class="card-body">
										<?php if($message = $this->session->flashdata('sucesso')): ?>

											<div class="alert alert-success" role="alert"><button type="button" class="btn-close"
																								  data-bs-dismiss="alert" aria-hidden="true">×
												</button><i class="fa fa-check-circle-o me-2" aria-hidden="true">
												</i><?php echo $message; ?>
											</div>


										<?php endif; ?>
										<?php if($message = $this->session->flashdata('erro')): ?>

											<div class="alert alert-danger" role="alert"><button type="button" class="btn-close"
																								 data-bs-dismiss="alert" aria-hidden="true">×
												</button><i class="fa fa-frown-o me-2" aria-hidden="true">
												</i><?php echo $message; ?>
											</div>


										<?php endif; ?>
										<div class="row">
											<div class="col-sm-3 col-md-3">
													<div class="mb-3">
														<label class="form-label">Razao Social<span class="text-red">*</span></label>
														<input type="text" name="sistema_razao_social" class="form-control"
															   value="<?php echo (isset($sistema) ? $sistema->sistema_razao_social : set_value('sistema_razao_social')); ?>" placeholder="Razão Social">
															<?php echo form_error('sistema_razao_social', '<div class="text-danger">', '</div>');?>
													</div>
												</div>
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">Nome Fantasia <span class="text-red">*</span></label>
													<input type="text" name="sistema_nome_fantasia" class="form-control"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_nome_fantasia : set_value('sistema_nome_fantasia')); ?>" placeholder="Nome Fantasia">
													<?php echo form_error('sistema_nome_fantasia', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">Cnpj<span class="text-red">*</span></label>
													<input type="text" name="sistema_cnpj" class="form-control cnpj"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_cnpj : set_value('sistema_cnpj')); ?>" placeholder="Cnpj">
													<?php echo form_error('sistema_cnpj', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">Inscrição estadual<span class="text-red">*</span></label>
													<input type="text" name="sistema_ie" class="form-control"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_ie : set_value('sistema_ie')); ?>" placeholder="Inscrição Estadual">
													<?php echo form_error('sistema_ie', '<div class="text-danger">', '</div>');?>
												</div>
											</div>

											</div>
										<div class="row">
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">Telefone Fixo<span class="text-red">*</span></label>
													<input type="text" name="sistema_telefone_fixo" class="form-control phone_with_ddd"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_telefone_fixo : set_value('sistema_telefone_fixo')); ?>" placeholder="sistema_telefone_fixo">
													<?php echo form_error('sistema_telefone_fixo', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">Celular <span class="text-red">*</span></label>
													<input type="text" name="sistema_telefone_movel" class="form-control phone_with_ddd"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_telefone_movel : set_value('sistema_telefone_movel')); ?>" placeholder="Celular">
													<?php echo form_error('sistema_telefone_movel', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">E-mail<span class="text-red">*</span></label>
													<input type="text" name="sistema_email" class="form-control"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_email : set_value('sistema_email')); ?>" placeholder="E-mail">
													<?php echo form_error('sistema_email', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-3 col-md-3">
												<div class="mb-3">
													<label class="form-label">Inscrição estadual<span class="text-red">*</span></label>
													<input type="text" name="sistema_site_url" class="form-control"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_site_url : set_value('sistema_site_url')); ?>" placeholder="Site Url">
													<?php echo form_error('sistema_site_url', '<div class="text-danger">', '</div>');?>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-2 col-md-2">
												<div class="mb-3">
													<label class="form-label">Cep<span class="text-red">*</span></label>
													<input type="text" name="sistema_cep" class="form-control cep"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_cep : set_value('sistema_cep')); ?>" placeholder="Cep">
													<?php echo form_error('sistema_cep', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-4 col-md-4">
												<div class="mb-3">
													<label class="form-label">Endereço <span class="text-red">*</span></label>
													<input type="text" name="sistema_endereco" class="form-control"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_endereco : set_value('sistema_endereco')); ?>" placeholder="Endereço">
													<?php echo form_error('sistema_endereco', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-2 col-md-2">
												<div class="mb-3">
													<label class="form-label">Número<span class="text-red">*</span></label>
													<input type="text" name="sistema_numero" class="form-control cnpj"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_numero : set_value('sistema_numero')); ?>" placeholder="Número">
													<?php echo form_error('sistema_numero', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-2 col-md-2">
												<div class="mb-3">
													<label class="form-label">Cidade<span class="text-red">*</span></label>
													<input type="text" name="sistema_cidade" class="form-control"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_cidade : set_value('sistema_cidade')); ?>" placeholder="Cidade">
													<?php echo form_error('sistema_cidade', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-2 col-md-2">
												<div class="mb-3">
													<label class="form-label">UF<span class="text-red">*</span></label>
													<input type="text" name="sistema_estado" class="form-control uf"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_estado : set_value('sistema_estado')); ?>" placeholder="UF">
													<?php echo form_error('sistema_estado', '<div class="text-danger">', '</div>');?>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-2 col-md-2">
												<div class="mb-3">
													<label class="form-label">Quantidade de Produtos em Destaque<span class="text-red">*</span></label>
													<input type="number" name="sistema_produtos_destaques" class="form-control uf"
														   value="<?php echo (isset($sistema) ? $sistema->sistema_produtos_destaques : set_value('sistema_produtos_destaques')); ?>" placeholder="Quantidade Prod.">
													<?php echo form_error('sistema_produtos_destaques', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
										</div>
										<br>
												<button type="submit" class="btn btn-pill btn-primary">Salvar</button>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- end app-content-->



			<!--Footer-->

			<!-- End Footer-->

