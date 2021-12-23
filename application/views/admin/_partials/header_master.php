<?php $this->load->helper('rupiah_helper.php');  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Dashboard</title>

	<!-- Fontfaces CSS-->
	<link href="<?= base_url('assets/admin/css/font-face.css'); ?>" rel=" stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css'); ?> " rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css"'); ?>" rel=" stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href=" <?= base_url('assets/admin/vendor/bootstrap-4.1/bootstrap.min.css'); ?> " rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href=" <?= base_url('assets/admin/vendor/animsition/animsition.min.css'); ?> " rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css'); ?> " rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/wow/animate.css'); ?>" rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/css-hamburgers/hamburgers.min.css'); ?> " rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/slick/slick.css" rel="stylesheet'); ?> " media="all">
	<link href=" <?= base_url('assets/admin/vendor/select2/select2.min.css'); ?>" rel="stylesheet" media="all">
	<link href=" <?= base_url('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css'); ?>" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href=" <?= base_url('assets/admin/css/theme.css'); ?> " rel="stylesheet" media="all">

</head>

<body class=" animsition">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a class="logo" href="index.html">
							<img src="assets/admin/images/icon/logo.png" alt="CoolAdmin" />
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>

						</li>

					</ul>
					</li>
					</ul>
				</div>
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>

						</li>

					</ul>
					</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="#">
					<img src="images/icon/logo.png" alt="SPP SMKN4" />
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li class="has-sub">
							<a class="js-arrow" href="<?= base_url('admin') ?>">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>

						</li>

					</ul>
					<ul class="list-unstyled navbar__list">
						<li class="active has-sub">
							<a class="js-arrow" href="<?= base_url('admin/master') ?>">
								<i class="fas fa-home"></i>Master</a>

						</li>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<form class="form-header">

							</form>
							<div class="header-button">


								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<div class="image">
											<img src="images/icon/avatar-01.jpg" alt="John Doe" />
										</div>
										<div class="content">
											<a class="js-acc-btn" href="#">john doe</a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<div class="image">
													<a href="#">
														<img src="images/icon/avatar-01.jpg" alt="John Doe" />
													</a>
												</div>
												<div class="content">
													<h5 class="name">
														<a href="#">john doe</a>
													</h5>
													<span class="email">johndoe@example.com</span>
												</div>
											</div>
											<div class="account-dropdown__body">
												<div class="account-dropdown__item">
													<a href="#">
														<i class="zmdi zmdi-account"></i>Account</a>
												</div>
												<div class="account-dropdown__item">
													<a href="#">
														<i class="zmdi zmdi-settings"></i>Setting</a>
												</div>

											</div>
											<div class="account-dropdown__footer">
												<a href="#">
													<i class="zmdi zmdi-power"></i>Logout</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER DESKTOP-->
