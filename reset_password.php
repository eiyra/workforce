<?php
include('config.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $userType = '';
    $userId = '';

    // Retrieve user information based on token
    $getUserQuery = "SELECT 'admin' AS user_type, admin_ic AS user_id FROM admin WHERE reset_token = ? AND token_expiry > NOW() 
                     UNION
                     SELECT 'adm' AS user_type, adm AS user_id FROM adm WHERE reset_token = ? AND token_expiry > NOW() 
                     UNION
                     SELECT 'employee' AS user_type, emp_ic AS user_id FROM employee WHERE reset_token = ? AND token_expiry > NOW()";

    $stmt = mysqli_prepare($con, $getUserQuery);
    mysqli_stmt_bind_param($stmt, "sss", $token, $token, $token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userType, $userId);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($userType && $userId) {
        // Process password reset for the appropriate user table
        if ($userType === 'admin') {
            // Update admin's password and clear/reset token
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateAdminPasswordQuery = "UPDATE admin SET admin_password = ?, reset_token = NULL, token_expiry = NULL WHERE admin_ic = ?";
            $stmt = mysqli_prepare($con, $updateAdminPasswordQuery);
            mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $userId);
            mysqli_stmt_execute($stmt);
        } elseif ($userType === 'adm') {
            // Update adm's password and clear/reset token
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateAdmPasswordQuery = "UPDATE adm SET adm_password = ?, reset_token = NULL, token_expiry = NULL WHERE adm = ?";
            $stmt2 = mysqli_prepare($con, $updateAdmPasswordQuery);
            mysqli_stmt_bind_param($stmt2, "ss", $hashedPassword, $userId);
            mysqli_stmt_execute($stmt2);
        } elseif ($userType === 'employee') {
            // Update employee's password and clear/reset token
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateEmployeePasswordQuery = "UPDATE employee SET emp_password = ?, reset_token = NULL, token_expiry = NULL WHERE emp_ic = ?";
            $stmt3 = mysqli_prepare($con, $updateEmployeePasswordQuery);
            mysqli_stmt_bind_param($stmt3, "ss", $hashedPassword, $userId);
            mysqli_stmt_execute($stmt3);
        }

        echo "Password reset successful.";
    } else {
        echo "Invalid or expired token.";
    }
}

mysqli_close($con);
?>

<!-- Your HTML and form code here -->


<!DOCTYPE html>
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
			<h2>Reset Password</h2>
		<form action="" name="frmAdd" method="POST">
		
		<div class="col-md-10">
			<div class="col-md-10 login-mail">
			<label for="new_password">New Password:</label>
			<input type="password" id="new_password" name="new_password" required><br>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" id="confirm_password" name="confirm_password" required><br>
			</div>
			<button type="submit" name="submit">Reset Password</button>
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
