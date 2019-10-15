<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Siswa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
	integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/css/util.css">
	<link rel="stylesheet" type="text/css" href="access/logs/css/main.css">
<!--===============================================================================================-->
	<script>
		function clearPassword(){
			$clear = document.getElementById('password_form').value = '';
			return $clear;
		}
	</script>

</head>
<body onload="clearPassword();">

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Login - Nilai Siswa
				</span>

				<?php //if(isset($error)) : ?>
					<div class="alert alert-danger" role="alert">
						Sepertinya Username Atau Password yang anda input salah, silahkan ulangi lagi.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php //endif; ?>

				<form class="login100-form validate-form p-b-33 p-t-5" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Enter Email" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password_form" placeholder="Password" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>

				<div class="container-fluid">
					<div class="row">
						<h4 class="col-12 text-white text-center">Login Sebagai</h4>
						<div class="col-12 col-md-6">
							<a href="guru/login-guru.php">
								<button class="btn-lg btn-block btn-primary rounded-0 mt-2">Guru</button>
							</a>
						</div>
						<div class="col-12 col-md-6">
							<a href="admin/login-admin.php">
								<button class="btn-lg btn-block btn-danger rounded-0 mt-2">Admin</button>
							</a>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="access/logs/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="access/logs/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="access/logs/vendor/bootstrap/js/popper.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
	integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="access/logs/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="access/logs/vendor/daterangepicker/moment.min.js"></script>
	<script src="access/logs/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="access/logs/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="access/logs/js/main.js"></script>


</body>
</html>
