<?php $this->load->view('restrita/layouts/navbar'); ?>

<div class="page">
	<div class="page-main">
		<!--aside open-->
		<?php $this->load->view('restrita/layouts/sidebar'); ?>
		<!--aside closed-->



				<!--Page header-->
				<div class="page-header">
					<div class="page-leftheader">
						<h4 class="page-title">Analytics Dashboard</h4>
					</div>

					<div class="card-body">

				</div>
					<?php if($message = $this->session->flashdata('sucesso')): ?>

						<div class="alert alert-success" role="alert"><button type="button" class="btn-close"
																			  data-bs-dismiss="alert" aria-hidden="true">×
							</button><i class="fa fa-check-circle-o me-2" aria-hidden="true">
							</i><?php echo $message; ?>
						</div>


					<?php endif; ?>
			</div>
		</div><!-- end app-content-->
	</div>

	<!--Footer-->

	<!-- End Footer-->

