<?php if($this->router->fetch_class() != 'login'): ?>

	<footer class="footer">
		<div class="container">
			<div class="row align-items-center flex-row-reverse">
				<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
					Copyright © 2021 <a href="javascript:void(0)">Dashtic</a>. Designed by <a href="javascript:void(0)">Spruko Technologies Pvt.Ltd</a> All rights reserved.
				</div>
			</div>
		</div>
	</footer>

	</div>

	<!-- Back to top -->
	<a href="#top" id="back-to-top">
		<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
	</a>


<?php endif; ?>
<!-- Jquery js-->
<script src="<?php echo base_url('public/assets/js/vendors/jquery.min.js');?>"></script>

<!-- Bootstrap5 js-->
<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>

<!--Othercharts js-->
<script src="<?php echo base_url('public/assets/plugins/othercharts/jquery.sparkline.min.js');?>"></script>

<!-- Circle-progress js-->
<script src="<?php echo base_url('public/assets/js/vendors/circle-progress.min.js');?>"></script>

<!-- Jquery-rating js-->
<script src="<?php echo base_url('public/assets/plugins/rating/jquery.rating-stars.js');?>"></script>

<!--Sidemenu js-->
<script src="<?php echo base_url('public/assets/plugins/sidemenu/sidemenu.js');?>"></script>

<!-- P-scroll js-->
<script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.js');?>"></script>
<script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scroll1.js');?>"></script>

<!--Moment js-->
<script src="<?php echo base_url('public/assets/plugins/moment/moment.js');?>"></script>

<!-- Daterangepicker js-->
<script src="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/daterange.js');?>"></script>

<!--Chart js -->
<script src="<?php echo base_url('public/assets/plugins/chart/chart.min.js');?>"></script>
<script src="<?php echo base_url('public/assets/plugins/chart/chart.extension.js');?>"></script>

<!-- ECharts js-->
<script src="<?php echo base_url('public/assets/plugins/echarts/echarts.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/index2.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/util.js');?>"></script>

<?php if(isset($scripts)): ?>

	<?php foreach ($scripts as $script): ?>

		<script src="<?php echo base_url('public/assets/'.$script);?>"></script>

	<?php endforeach; ?>
<?php endif; ?>

<!-- Custom js-->
<script src="<?php echo base_url('public/assets/js/custom.js');?>"></script>
<script src="<?php echo base_url('https://unpkg.com/sweetalert/dist/sweetalert.min.js');?>"></script>

<script>
	$('.delete').on("click", function (event) {
		event.preventDefault();
		var choice = confirm($(this).attr('data-confirm'));

		if(choice) {
			window.location.href = $(this).attr('href')
		}
	});
</script>

</body>
</html>
