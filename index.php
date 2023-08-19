<!DOCTYPE HTML>
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
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
 
body 
{
	background-color: #FFFFFF;
    background-image: url("img/logo/bg.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
} 
  
</style>
</head>

<script>
  $( function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog("close");
        }
      }
    });
  } );
  </script>

<style>
#box { height:380px; }
input[type="text"],input[type="password"]
{
	height:60px;
	border: 2px solid #e0ebeb;
}
</style>

<body>

	<div class="login">
    	   <h1><font color="#FFFFFF">Workforce Management System</font></h1><br>
		<!-- <h4><p href="index.html">tagline </p></h4> -->

		<div class="login-bottom">
			<h2>User Login</h2>
		<form action="loginrequest.php" name="frmAdd" method="post">
			<div class="col-md-10">
				<div class=" col-md-10 login-mail">
					<input type="text" id="user_ic" name="user_ic" placeholder="User IC" required="">
					<i class="fa fa-user"></i>
				</div>
				<div class="col-md-10 login-mail">
					<input type="password" id="password" name="password" placeholder="Password" required="">
					<i class="fa fa-key"></i>
				</div>
			</div>
			
			<br><br>
			
			<div class="col-md-5 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<center><input type="submit" id="submit" name="submit" value="login"></center>
				</label>
			</div>

			<div class="col-md-10"><br>
				<h5><a href = "forgot_password.php">Forgot Password?</a></h5> 
			</div> 
		
		<div class="clearfix"> </div>
		
		</form>
		
		
		</div>
	
	</div>


<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->

</body>
</html>
