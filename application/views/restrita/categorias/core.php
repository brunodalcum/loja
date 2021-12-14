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

							<li class="breadcrumb-item"><a href="<?php echo base_url('restrita/categorias/index');?>">Todas as Categorias</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
						</ol>
					</div>
				</div>

						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Informações da Categoria</h3>
									</div>

									<?php

									$atributos = array(
											'name' => 'form_core'
									);

									if(isset($categoria)){
										$categoria_id = $categoria->categoria_id;
									} else {
										$categoria_id = '';
									}

									?>

									<?php echo form_open('restrita/categorias/core/'.$categoria_id, $atributos); ?>

									<div class="card-body">
										<div class="row">
											<div class="col-sm-3 col-md-3">
													<div class="mb-3">
														<label class="form-label">Nome da Categoria<span class="text-red">*</span></label>
														<input type="text" name="categoria_nome" class="form-control"
														value="<?php echo (isset($categoria) ? $categoria->categoria_nome : set_value('categoria_nome')); ?>" >
														<?php echo form_error('categoria_nome', '<div class="text-danger">', '</div>');?>
													</div>
												</div>

											<?php if(isset($categoria)): ?>

												<div class="col-sm-3 col-md-3">
													<div class="mb-3">
														<label class="form-label">Categoria Meta Link<span class="text-red">*</span></label>
														<input type="text" name="categoria_meta_link" class="form-control" readonly=""
															   value="<?php echo $categoria->categoria_meta_link; ?>" >
														<?php echo form_error('categoria_meta_link', '<div class="text-danger">', '</div>');?>
													</div>
												</div>

											<?php endif; ?>

												<div class="col-md-3">
												<div class="mb-3">
													<label class="form-label">Ativo?<span class="text-red">*</span></label>
													<select name="categoria_ativa" class="form-control form-select select2">

														<?php if(isset($categoria)): ?>
															<option value="1" <?php echo ($categoria->categoria_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
															<option value="2" <?php echo ($categoria->categoria_ativa == 2 ? 'selected' : ''); ?>>Não</option>

														<?php else: ?>
															<option value="1">Sim</option>
															<option value="2">Não</option>

														<?php endif; ?>
													</select>
												</div>

											</div>
												<div class="col-md-3">
													<div class="mb-3">
														<label class="form-label">Categoria Pai<span class="text-red">*</span></label>
														<select name="categoria_pai_id" class="form-control form-select select2">

															<?php foreach ($masters as $pai): ?>



															<?php if(isset($categoria)): ?>
																<option value="<?php echo $pai->categoria_pai_id; ?>" <?php echo ($pai->categoria_pai_id == $categoria->categoria_pai_id ? 'selected' : ''); ?>>
																	<?php echo $pai->categoria_pai_nome; ?></option>


															<?php else: ?>
																	<option value="<?php echo $pai->categoria_pai_id; ?>"><?php echo $pai->categoria_pai_nome; ?></option>


															<?php endif; ?>
															<?php endforeach; ?>
														</select>
													</div>
													<?php if(isset($categoria)): ?>

														<input type="hidden" name="categoria_id" value="<?php echo $categoria->categoria_id; ?>">

													<?php endif; ?>
												</div>
										</div>

										<br>
												<button type="submit" class="btn btn-pill btn-primary">Salvar</button>
												<a href="<?php echo base_url('restrita/categorias'); ?>" class="btn btn-pill btn-warning">Voltar</a>

									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- end app-content-->



			<!--Footer-->

			<!-- End Footer-->

