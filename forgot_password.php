<?php
include('config.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $userType = '';
    $userTable = '';

    // Check if the email exists in any of the tables
    $checkEmailQuery = "SELECT 'admin' AS user_type, admin_ic AS user_id FROM admin WHERE admin_email = ? 
                        UNION
                        SELECT 'adm' AS user_type, adm AS user_id FROM adm WHERE adm_email = ? 
                        UNION
                        SELECT 'employee' AS user_type, emp_ic AS user_id FROM employee WHERE emp_email = ?";
    
    $stmtCheckEmail = mysqli_prepare($con, $checkEmailQuery);
    mysqli_stmt_bind_param($stmtCheckEmail, "sss", $email, $email, $email);
    mysqli_stmt_execute($stmtCheckEmail);
    mysqli_stmt_bind_result($stmtCheckEmail, $userType, $user_id);
    mysqli_stmt_fetch($stmtCheckEmail);
    mysqli_stmt_close($stmtCheckEmail);

    if ($userType && $user_id) {
        // Generate a random token
        $token = bin2hex(random_bytes(32));

        // Set token expiration time (e.g., 1 hour from now)
        $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Update reset token and token expiry in the appropriate table
        $updateTokenQuery = "UPDATE $userType SET reset_token = ?, token_expiry = ? WHERE $userType"."_email = ?";
        $stmtUpdateToken = mysqli_prepare($con, $updateTokenQuery);
        mysqli_stmt_bind_param($stmtUpdateToken, "sss", $token, $expiryTime, $email);
        mysqli_stmt_execute($stmtUpdateToken);

        // Send email with reset link
        $resetLink = "https://workforcetqm.000webhostapp.com/reset_password.php?token=" . $token;
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $resetLink";

        if (mail($email, $subject, $message)) {
            echo "An email with instructions to reset your password has been sent.";
        } else {
            echo "Failed to send email. Please check your email configuration.";
        }
    } else {
        echo "Email not found in our records.";
    }

    mysqli_close($con);
}
?>


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
			<h2>Forgot Password?</h2>
		<form action="" name="frmAdd" method="POST">
		
		<div class="col-md-10">
			<div class="col-md-10 login-mail">
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required> 
			</div>
			<button type="submit" name="submit">Reset Password</button>
		</div>
			

			<div class="col-md-10"><br>
				<h5><a href = "index.php">Already have an account?</a></h5> 
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


