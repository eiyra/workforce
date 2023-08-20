<?php
include 'inc/header.php';
?>

<!-- <!DOCTYPE HTML>
<html>
<head>
<title>Workforce Management System</title>
<link rel="shortcut icon" href="img/logo/workforce.png" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<script>
	$(function () {
		$("#dialog-message").dialog({
			modal: true,
			buttons: {
				Ok: function () {
					$(this).dialog("close");
				}
			}
		});
	});
</script>

<style>
	.forgot {
		text-decoration: none;
		display: inline-block;
		color: black;
	}

	.btnSubmit {
		width: 50%;
		border: none;
		border-radius: 1rem;
		padding: 1.5%;
		cursor: pointer;
	}

	.login-form .btnSubmit {
		font-weight: 600;
		color: #FFFF;
		background-color: #4B9EFF;
	}

	.hidden {
		display: none;
	}

	body .icField #ic {
		position: absolute;
		right: 33px;
		top: 37.5%;
		transform: translateY(-50%);
	}

	body .passwordField #PasswordToggler {
		position: absolute;
		right: 30px;
		top: 58.7%;
		transform: translateY(-50%);
		cursor: pointer;
	}
</style>

<body>
	<div class="text-center mt-5 text-uppercase">
		<h1 style="color: #FFFFFF;">Workforce Management System</h1>
	</div>

	<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body login-form">
					<h4 class="card-title text-center text-uppercase mb-5">User Login</h4>

					<form action="loginrequest.php" method="post">
						<div class="form-group">
							<div class="icField">
								<label for="userIc">User IC:</label>
								<input type="text" id="user_ic" name="user_ic" class="form-control"
									placeholder="Enter IC Number" required />
								<span><i id="ic" class="fa fa-user"></i></span>
							</div>
						</div>

						<div class="form-group mt-3">
							<div class="passwordField">
								<label for="passwordField">Password:</label>
								<input type="password" id="password" name="password" class="form-control"
									placeholder="Enter Password" required />
								<span><i id="PasswordToggler" class="fa-solid fa-eye"
										onclick="togglePasswordVisibility('password', this)"></i></span>
							</div>
						</div>

						<div class="form-group text-center mt-5">
							<input type="submit" id="submit" class="btnSubmit" name="submit" value="Login">
						</div>

						<div class="form-group text-center mt-2">
							<a href="forgot_password.php" class="forgot" style="font-size: 13px; color: blue;">
								Forgot Password?
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		function togglePasswordVisibility(inputId, iconElement) {
			const passwordInput = document.getElementById(inputId);

			if (passwordInput.type === "password") {
				passwordInput.type = "text";
				iconElement.classList.remove("fa-eye");
				iconElement.classList.add("fa-eye-slash");
			} else {
				passwordInput.type = "password";
				iconElement.classList.remove("fa-eye-slash");
				iconElement.classList.add("fa-eye");
			}
		}
	</script>
</body>

</html>