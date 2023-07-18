<!DOCTYPE HTML>
<html>
<head>
<title>Makeup Artist Service Finder</title>
<link rel="shortcut icon" href="img/lipstick.png" type="image/x-icon"/>
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

   $( function() {
    $( "#dialog-message2" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog(window.location.href = "index.php");
        }
      }
    });
  } );
</script>

<script language="javascript" type="text/javascript">
function validate()
{
var formName=document.frm;

if (formName.password.value != formName.cpassword.value)
{
document.getElementById("cpassword_label").innerHTML='Password does not match!';
formName.cpassword.focus()
return false;
}

if(formName.password.value.length < 8)
{
document.getElementById("password_label").innerHTML='Must be more than 8 characters';
formName.password.focus()
return false;
}

if  (isNaN(formName.ic.value))
  {

					alert('I/C number must in number');
					formName.ic.focus();
					return false;

  }

 return true;
}
</script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#showHide").click(function () {
			if ($(".password").attr("type")=="password") {
				$(".password").attr("type", "text");
			}
			else{
				$(".password").attr("type", "password");
			}

		});
	});
	</script>

<style>
  body{
  background-color:#E83E7B;
  background-image:url("img/mua.jpg");
  background-size:cover;

  #box {
      width:700px;
  	height:450px;
  	}
  td{ text-align:left}
  th{ color:#FFF;}
  input[type=text],input[type=password],input[type=tel],input[type=email] {
      height:35px;}
</style>
</head>

<?php
if(isset($_POST['submit']))
{
include("config.php");

$sql="SELECT customer_ic FROM customer WHERE customer_ic='".$_POST['ic']."'";
$result=mysqli_query($con,$sql);
$num = mysqli_num_rows($result);

if ($num !=0)
{
  echo "<script>alert('User already exist!');";
  echo "window.location.href = 'index.php';</script>";
?>

</div>
<?php
}
else
{

mysqli_query($con,"INSERT INTO customer (customer_ic, customer_name, customer_password, customer_email, customer_address, customer_phone_no, customer_gender)
VALUES ('".$_POST['ic']."','".$_POST['name']."','".$_POST['password']."','".$_POST['email']."','".$_POST['address']."','".$_POST['phone']."', '".$_POST['gender']."')") or die ( mysqli_error($con));
echo "<script>alert('Successfully registered!');";
echo "window.location.href = 'index.php';</script>";
?>

<?php
}
}
?>

<body>
<br><br>
<center>
<h1><font color="#E83E7B">Makeup Artist Finder</font></h1>
</center>

		<div class="login-bottom" align="center">
			<h2><font color="black">Customer Registration Form</font></h2><br>
		<form method="post" class="login-form"  name='frm' onSubmit="return validate();">

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Identification Card (IC):</font></label>
        <input name="ic" type="text" class="form-control" placeholder="Example : 960203015655" pattern=".{12}" required="required" title="Must be in 12 numbers!"/>
      </div>

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Name :</font></label>
        <input name="name" type="text" class="form-control" required="required" placeholder="Please enter your name"/>
      </div>

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Password :</font></label>
        <input name="password" type="password" size='55' class="password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{1,}" title="Must contain at least one number and one uppercase letter"/>

        <font color="#FF0000" size="-1"><label id="password_label" class="level_msg"></label></font>
        <td><input name="showHide" id="showHide" type="checkbox"/>  Show Password</td>
      </div>


      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Confirm Password :</font></label>
        <input name="cpassword" id="cpassword" type="password" class="form-control" required="required" title="Must contain at least one number and one uppercase letter"/>
        <font color="#FF0000" size="-1"><label id="cpassword_label" class="level_msg"></label></font>
      </div>

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Email Address :</font></label>
        <input name="email" type="email" class="form-control" placeholder="youremail@mail.com" required="required"/>
      </div>

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Address :</font></label>
        <input name="address" type="text" class="form-control" required="required" placeholder="Please enter your address"/>
      </div>

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Phone Number :</font></label>
        <input name="phone" type="tel" class="form-control" pattern='^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$' size='40' placeholder="Example : 0123456789 (without dash)" required="required"/>
      </div>

      <div class="form-group" align="left">
        <label for="text"><font color="#E83E7B">Gender :</font></label>
        <div class="radio">
          <label><input type="radio" name="gender" id="gender" value="male">Male</label>
          <label><input type="radio" name="gender" id="gender" value="female">Female</label>
        </div>

<br>

  <div align="center">
  <input name="submit" type="submit" class='btn btn-primary' value="Register">

  <input id="myButton" class='btn btn-primary' value="Cancel">
  <script type="text/javascript">
      document.getElementById("myButton").onclick = function ()
       {
          location.href = "index.php";
       };

  </script>
  </div>

  </form>
  </div>



<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>
