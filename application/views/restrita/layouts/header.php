<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta content="Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
	<meta content="Spruko Technologies Private Limited" name="author">
	<meta name="keywords" content="admin, admin template, dashboard, admin dashboard, bootstrap 5, responsive, clean, ui, admin panel, ui kit, responsive admin, application, bootstrap 4, flat, bootstrap5, admin dashboard template"/>

	<!-- Title -->
	<?php echo (isset($titulo) ? '<title>Loja Virtual - '.$titulo.'</title>': '<title>Loja Virtual - Neto Suplementos</title>') ?>

	<!--Favicon -->
	<link rel="icon" href="<?php echo base_url('public/assets/images/brand/favicon.ico');?>" type="image/x-icon"/>

	<!-- Bootstrap css -->
	<link href="<?php echo base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />

	<!-- Style css -->
	<link href="<?php echo base_url('public/assets/css/style.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('public/assets/css/boxed.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('public/assets/css/dark-boxed.css');?>" rel="stylesheet" />

	<!-- Dark css -->
	<link href="<?php echo base_url('public/assets/css/dark.css');?>" rel="stylesheet" />

	<!-- Skins css -->
	<link href="<?php echo base_url('public/assets/css/skins.css');?>" rel="stylesheet" />

	<!-- Animate css -->
	<link href="<?php echo base_url('public/assets/css/animated.css');?>" rel="stylesheet" />

	<!--Sidemenu css -->
	<link id="theme" href="<?php echo base_url('public/assets/css/sidemenu.css');?>" rel="stylesheet">

	<!-- P-scroll bar css-->
	<link href="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.css');?>" rel="stylesheet" />

	<!---Icons css-->
	<link href="<?php echo base_url('public/assets/plugins/web-fonts/icons.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('public/assets/plugins/web-fonts/font-awesome/font-awesome.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/plugins/web-fonts/plugin.css');?>" rel="stylesheet" />

	<!-- Morris Charts css -->
	<link href="<?php echo base_url('public/assets/plugins/morris/morris.css');?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

	<!-- Data table css -->
	<link href="<?php echo base_url('public/assets/plugins/datatable/css/dataTables.bootstrap5.min.css');?>" rel="stylesheet"/>

	<?php if(isset($styles)): ?>

	<?php foreach ($styles as $style): ?>

			<link href="<?php echo base_url('public/assets/'.$style);?>" rel="stylesheet" />

	<?php endforeach; ?>
	<?php endif; ?>

	<!--Daterangepicker css-->
	<link href="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet" />

</head>

<body class="app sidebar-mini light-mode default-sidebar">

<!---Global-loader-->
<div id="global-loader" >
	<img src="<?php echo base_url('public/assets/images/svgs/loader.svg'); ?>" alt="loader">
</div>
