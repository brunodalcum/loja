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
						<li class="breadcrumb-item"><a href="<?php echo base_url('restrita'); ?>" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('restrita'); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
					</ol>
				</div>
			</div>
			<!--End Page header-->

			<!-- Row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-block">
							<div class="card-title"><?php echo $titulo; ?></div>
							<div class="text-lg-end mt-4 mt-lg-0">

								<a href="<?php echo base_url('restrita/master/core'); ?>" class="btn btn-primary">Cadastrar</a>
							</div>
						</div>
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
							<div class="table-responsive">
								<table class="table table-bordered text-nowrap data-table" >
									<thead>
									<tr>
										<th class="wd-15p border-bottom-0">#</th>
										<th class="wd-15p border-bottom-0">Nome da Categoria Pai</th>
										<th class="wd-20p border-bottom-0">Categoria Meta Link</th>
										<th class="wd-20p border-bottom-0">Data de Cadastro</th>
										<th class="wd-20p border-bottom-0">Ativa</th>
										<th class="wd-25p border-bottom-0">Ação</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($master as $pai): ?>
									<tr>

										<td><?php echo $pai->categoria_pai_id; ?></td>
										<td><?php echo $pai->categoria_pai_nome;?></td>
										<td><i class="fa fa-chain"></i>&nbsp;<?php echo $pai->categoria_pai_meta_link; ?></td>
										<td><?php echo formata_data_banco_com_hora($pai->categoria_pai_data_criacao); ?></td>
										<td><?php echo ($pai->categoria_pai_ativa == 1 ? '<a href="javascript:void(0)" class="btn btn-green">Sim</a>' : '<a href="javascript:void(0)" class="btn btn-red">Não</a>'); ?></td>



										<td>
											<a href="<?php echo base_url('restrita/master/core/'.$pai->categoria_pai_id); ?>" class="btn btn-azure">Editar</a>
											<a href="<?php echo base_url('restrita/master/delete/'.$pai->categoria_pai_id);?>" class="btn btn-red delete" data-confirm="Tem certeza que deseja a exclusão da Marca?">Excluir</a>
										</td>


									</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
			</div>
			<!-- /Row -->

		</div><!-- end app-content-->
	</div>

	<!--Footer-->

	<!-- End Footer-->


