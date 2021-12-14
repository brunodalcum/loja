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
									<h3 class="card-title">Informações do Usuário</h3>
								</div>

								<?php

								$atributos = array(
										'name' => 'form_core'
								);

								if(isset($usuario)){
									$usuario_id = $usuario->id;
								} else {
									$usuario_id = '';
								}

								?>

								<?php echo form_open('restrita/usuarios/core/'.$usuario_id, $atributos); ?>

								<div class="card-body">
									<div class="row">
										<div class="col-sm-4 col-md-4">
												<div class="mb-3">
													<label class="form-label">Nome<span class="text-red">*</span></label>
													<input type="text" name="first_name" class="form-control"
														   value="<?php echo (isset($usuario) ? $usuario->first_name : set_value('first_name')); ?>" placeholder="Nome">
														<?php echo form_error('first_name', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-4 col-md-4">
												<div class="mb-3">
													<label class="form-label">Sobrenome<span class="text-red">*</span></label>
													<input type="text" name="last_name" class="form-control"
														   value="<?php echo (isset($usuario) ? $usuario->last_name : set_value('last_name')); ?>" placeholder="Sobrenome">
													<?php echo form_error('last_name', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-sm-4 col-md-4">
												<div class="mb-3">
													<label class="form-label">E-mail <span class="text-red">*</span></label>
													<input type="email" name="email" class="form-control"
														   value="<?php echo (isset($usuario) ? $usuario->email : set_value('email')); ?>" placeholder="E-mail">
													<?php echo form_error('email', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3">
													<label class="form-label">Usuário <span class="text-red">*</span></label>
													<input type="text" name="username" class="form-control"
														   value="<?php echo (isset($usuario) ? $usuario->username : set_value('username')); ?>" placeholder="Usuário">
													<?php echo form_error('username', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3">
													<label class="form-label">Senha <span class="text-red">*</span></label>
													<input type="password" name="password" class="form-control" placeholder="Digite a Senha">
													<?php echo form_error('password', '<div class="text-danger">', '</div>');?>
												</div>
											</div>

											<div class="col-md-4">
												<div class="mb-3">
													<label class="form-label">Confirme a Senha <span class="text-red">*</span></label>
													<input type="password" name="confirma" class="form-control" placeholder="Confirme a Senha">
													<?php echo form_error('confirma', '<div class="text-danger">', '</div>');?>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3">
													<label class="form-label">Perfil de Acesso<span class="text-red">*</span></label>
													<select name="perfil" class="form-control form-select select2">

														<?php foreach ($grupos as $grupo): ?>

														<?php if(isset($usuario)): ?>


																<option value="<?php echo $grupo->id; ?>"<?php echo ($grupo->id == $perfil->id ? 'selected' : ''); ?>><?php echo $grupo->name; ?></option>

															<?php else: ?>

																<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->name; ?></option>


															<?php endif; ?>

														<?php endforeach; ?>

													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3">
													<label class="form-label">Ativo?<span class="text-red">*</span></label>
													<select name="active" class="form-control form-select select2">

														<?php if(isset($usuario)): ?>
															<option value="1" <?php echo ($usuario->active == 1 ? 'selected' : ''); ?>>Sim</option>
															<option value="2" <?php echo ($usuario->active == 2 ? 'selected' : ''); ?>>Não</option>

														<?php else: ?>
															<option value="1">Sim</option>
															<option value="2">Não</option>

														<?php endif; ?>
													</select>
												</div>
												<?php if(isset($usuario)): ?>

													<input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">

												<?php endif; ?>
											</div>
										</div>
									<br>
											<button type="submit" class="btn btn-pill btn-primary">Salvar</button>
											<a href="<?php echo base_url('restrita/usuarios'); ?>" class="btn btn-pill btn-warning">Voltar</a>

								</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end app-content-->



		<!--Footer-->

		<!-- End Footer-->

