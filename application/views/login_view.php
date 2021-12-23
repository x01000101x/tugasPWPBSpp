<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login SPP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/icons/favicon.ico'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css'); ?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://c.tenor.com/qLwHysB86VYAAAAd/lofi.gif');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="<?php echo site_url('Login/auth'); ?>" method="post">
					<div class="login100-form-avatar">
						<img src="https://cliply.co/wp-content/uploads/2019/03/371903161_BLINKING_EYE_400px.gif" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Silahkan Login :^)
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">

						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="#">

						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<? base_url('vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src=" <? base_url('vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<? base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src=" <? base_url('vendor/select2/select2.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<? base_url('js/main.js'); ?>"></script>


</body>

</html>
