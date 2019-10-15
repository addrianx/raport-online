<?php
require '../lib/config.php';
session_start();

if(isset($_POST["login"])){

$email = $_POST["email"];
$password = $_POST["password"];
$result = mysqli_query($db, "SELECT * FROM guru WHERE email = '$email'");
$cek = mysqli_num_rows($result);

// cek apakah username dan password di temukan pada database
	if($cek === 1){
		$data = mysqli_fetch_assoc($result);
		// cek jika user login sebagai admin
		 if($data['status']=="guru"){
			// buat session login dan username
			$_SESSION['email'] = $email;
			$_SESSION['status'] = "guru";
			// alihkan ke halaman dashboard guru
			header("Location: index.php");
		// cek jika user login sebagai siswa
		}else{
			$error = true;
		}
	}else{
		$error = true;
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
	integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL.'/access/logs/fonts/font-awesome-4.7.0/css/font-awesome.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL.'/access/logs/fonts/Linearicons-Free-v1.0.0/icon-font.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL.'/access/logs/vendor/animate/animate.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="access/logs/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL.'/access/logs/css/util.css';?>">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL.'/access/logs/css/main.css';?>">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Login - Data Guru
				</span>

				<?php if(isset($error)) : ?>
					<div class="alert alert-danger" role="alert">
						Sepertinya Username Atau Password yang anda input salah, silahkan ulangi lagi.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
  					<div class="wrap-input100 validate-input" data-validate = "Enter email">
  						<input class="input100" type="email" name="email" placeholder="Email">
  						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
  					</div>

  					<div class="wrap-input100 validate-input" data-validate="Enter password">
  						<input class="input100" type="password" name="password" placeholder="Password">
  						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
  					</div>

  					<div class="container-login100-form-btn m-t-32">
  						<button type="submit" name="login" class="login100-form-btn">
  							Login
  						</button>
  					</div>
        </form>
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
