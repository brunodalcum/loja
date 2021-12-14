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

			<li class="breadcrumb-item"><a href="<?php echo base_url('restrita/marcas/index');?>">Todas os Produtos</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
		</ol>
	</div>
</div>

		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Informações do Produto</h3>
					</div>

					<?php

					$atributos = array(
							'name' =>'form_core'
					);

					if(isset($produto)){
						$produto_id = $produto->produto_id;
					} else {
						$produto_id = '';
					}

					?>

					<?php echo form_open('restrita/produtos/core/'.$produto_id, $atributos); ?>

					<div class="card-body">

						<?php if(isset($produto)): ?>

						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="mb-3">
									<label class="form-label">Meta link do Produto<span class="text-red">*</span></label>
									<p class="text-info"><?php echo $produto->produto_meta_link; ?></p>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="row">
							<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Código do Produto<span class="text-red">*</span></label>
										<input type="text" name="produto_codigo" class="form-control border-0"
										value="<?php echo (isset($produto) ? $produto->produto_codigo : set_value('produto_codigo')); ?>" readonly="">
										<?php echo form_error('produto_codigo', '<div class="text-danger">', '</div>');?>
									</div>
								</div>

							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Nome do Produto<span class="text-red">*</span></label>
									<input type="text" name="produto_nome" class="form-control"
										   value="<?php echo (isset($produto) ? $produto->produto_nome : set_value('produto_nome')); ?>" >
									<?php echo form_error('produto_nome', '<div class="text-danger">', '</div>');?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label">Categorias <span class="text-red">*</span></label>
									<select name="produto_categoria_id" class="form-control form-select select2">


										<option value="">Escolha...</option>
										<?php foreach ($categorias as $categoria): ?>

											<?php if(isset($produto)): ?>
												<option value="<?php echo $categoria->categoria_id; ?>" <?php echo ($categoria->categoria_id == $produto->produto_categoria_id ? 'selected' : ''); ?>>
													<?php echo $categoria->categoria_nome; ?></option>


											<?php else: ?>
												<option value="<?php echo $categoria->categoria_id; ?>" >
													<?php echo $categoria->categoria_nome; ?></option>

											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
								<div class="col-md-2">
									<div class="mb-3">
										<label class="form-label">Marcas<span class="text-red">*</span></label>
										<select name="produto_marca_id" class="form-control form-select select2">

											<option value="">Escolha...</option>
											<?php foreach ($marcas as $marca): ?>

												<?php if(isset($produto)): ?>
													<option value="<?php echo $marca->marca_id; ?>" <?php echo ($marca->marca_id == $produto->produto_marca_id ? 'selected' : ''); ?>>
														<?php echo $marca->marca_nome; ?></option>

												<?php else: ?>
													<option value="<?php echo $marca->marca_id; ?>" >
														<?php echo $marca->marca_nome; ?></option>

												<?php endif; ?>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Valor do Produto<span class="text-red">*</span></label>
										<input type="text" name="produto_valor" class="form-control money2"
											   value="<?php echo (isset($produto) ? $produto->produto_valor : set_value('produto_valor')); ?>" >
										<?php echo form_error('produto_valor', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Peso do Produto<span class="text-red">*</span></label>
										<input type="number" name="produto_peso" class="form-control money2"
											   value="<?php echo (isset($produto) ? $produto->produto_peso : set_value('produto_peso')); ?>" >
										<?php echo form_error('produto_peso', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Altura do Produto<span class="text-red">*</span></label>
										<input type="number" name="produto_altura" class="form-control money2"
											   value="<?php echo (isset($produto) ? $produto->produto_altura : set_value('produto_altura')); ?>" >
										<?php echo form_error('produto_altura', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="mb-3">
										<label class="form-label">Largura do Produto<span class="text-red">*</span></label>
										<input type="number" name="produto_largura" class="form-control money2"
											   value="<?php echo (isset($produto) ? $produto->produto_largura : set_value('produto_largura')); ?>" >
										<?php echo form_error('produto_largura', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Comprimento do Produto<span class="text-red">*</span></label>
										<input type="number" name="produto_comprimento" class="form-control money2"
											   value="<?php echo (isset($produto) ? $produto->produto_comprimento : set_value('produto_comprimento')); ?>" >
										<?php echo form_error('produto_comprimento', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Quantidade em Estoque<span class="text-red">*</span></label>
										<input type="text" name="produto_quantidade_estoque" class="form-control money2"
											   value="<?php echo (isset($produto) ? $produto->produto_quantidade_estoque : set_value('produto_quantidade_estoque')); ?>" >
										<?php echo form_error('produto_quantidade_estoque', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Ativo?<span class="text-red">*</span></label>
										<select name="produto_ativo" class="form-control form-select select2">

											<?php if(isset($produto)): ?>
												<option value="1" <?php echo ($produto->produto_ativo == 1 ? 'selected' : ''); ?>>Sim</option>
												<option value="2" <?php echo ($produto->produto_ativo == 2 ? 'selected' : ''); ?>>Não</option>

											<?php else: ?>
												<option value="1">Sim</option>
												<option value="2">Não</option>

											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Produto em Destaque<span class="text-red">*</span></label>
										<select name="produto_destaque" class="form-control form-select select2">

											<?php if(isset($produto)): ?>
												<option value="1" <?php echo ($produto->produto_destaque == 1 ? 'selected' : ''); ?>>Sim</option>
												<option value="2" <?php echo ($produto->produto_destaque == 2 ? 'selected' : ''); ?>>Não</option>

											<?php else: ?>
												<option value="1">Sim</option>
												<option value="2">Não</option>

											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="mb-3">
										<label class="form-label">Produto Controla Estoque<span class="text-red">*</span></label>
										<select name="produto_controlar_estoque" class="form-control form-select select2">

											<?php if(isset($produto)): ?>
												<option value="1" <?php echo ($produto->produto_controlar_estoque == 1 ? 'selected' : ''); ?>>Sim</option>
												<option value="2" <?php echo ($produto->produto_controlar_estoque == 2 ? 'selected' : ''); ?>>Não</option>

											<?php else: ?>
												<option value="1">Sim</option>
												<option value="2">Não</option>

											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="row row-sm">
									<div class="col-lg">
										<label class="form-label">Descrição do Produto<span class="text-red">*</span></label>
										<textarea name="produto_descricao" class="form-control mb-4" placeholder="Textarea" rows="10">
											<?php echo (isset($produto) ? $produto->produto_descricao : set_value('produto_descricao')); ?>
										</textarea>
										<?php echo form_error('produto_quantidade_estoque', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="row row-sm">
									<div class="col-lg">
										<label class="form-label">Imagem do Produto<span class="text-red">*</span></label>
										<div id="fileuploader">

										</div>
										<div id="erro_uploaded" class="text-danger">

										</div>
										<?php echo form_error('fotos_produtos', '<div class="text-danger">', '</div>');?>
									</div>
								</div>
								<div class="row">
									<div class="col-lg">

										<?php if(isset($produto)): ?>

										<div id="uploaded_image" class="text-danger">

											<?php foreach ($fotos_produto as $foto): ?>
												<ul style="list-style: none; display: inline-block">
														<li>

															<img src="<?php echo base_url('uploads/produtos/'.$foto->foto_caminho); ?>"
																 width="80" class="img-thumbnail mr-1 mb-2" alt="">
															<input type="hidden" name="fotos_produtos[]" value="<?php echo $foto->foto_caminho; ?>">
															<a href="javascript:(void)" class="btn btn-danger d-block btn-icon mx-auto mb-30 btn-remove">
																<i class="fas fa-times"></i>
															</a>
														</li>
												</ul>
											<?php endforeach; ?>

										</div>

										<?php else: ?>

										<?php endif; ?>

									</div>
								</div>
							</div>

									<?php if(isset($produto)): ?>

										<input type="hidden" name="produto_id" value="<?php echo $produto->produto_id; ?>">

									<?php endif; ?>
						</div>


								<br>
								<button type="submit" class="btn btn-pill btn-primary">Salvar</button>
								<a href="<?php echo base_url('restrita/produtos'); ?>" class="btn btn-pill btn-warning">Voltar</a>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- end app-content-->



<!--Footer-->

<!-- End Footer-->

