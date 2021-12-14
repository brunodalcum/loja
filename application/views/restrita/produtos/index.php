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

								<a href="<?php echo base_url('restrita/produtos/core'); ?>" class="btn btn-primary">Cadastrar</a>
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
										<th class="wd-15p border-bottom-0">Código</th>
										<th class="wd-15p border-bottom-0">Nome do Produto</th>
										<th class="wd-20p border-bottom-0">Marca</th>
										<th class="wd-20p border-bottom-0">Categoria</th>
										<th class="wd-20p border-bottom-0">Valor</th>
										<th class="wd-20p border-bottom-0">Ativa</th>
										<th class="wd-25p border-bottom-0">Ação</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($produtos as $produto): ?>
									<tr>

										<td><?php echo $produto->produto_codigo; ?></td>
										<td><?php echo $produto->produto_nome; ?></td>
										<td><?php echo $produto->marca_nome;?></td>
										<td><?php echo $produto->categoria_nome;?></td>
										<td><?php echo number_format($produto->produto_valor, 2);?></td>
										<td><?php echo ($produto->produto_ativo == 1 ? '<a href="javascript:void(0)" class="btn btn-green">Sim</a>' : '<a href="javascript:void(0)" class="btn btn-red">Não</a>'); ?></td>



										<td>
											<a href="<?php echo base_url('restrita/produtos/core/'.$produto->produto_id); ?>" class="btn btn-azure">Editar</a>
											<a href="<?php echo base_url('restrita/produtos/delete/'.$produto->produto_id);?>" class="btn btn-red delete" data-confirm="Tem certeza que deseja a exclusão da Produto?">Excluir</a>
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


