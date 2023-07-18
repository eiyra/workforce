<?php
	session_start();
	include('config.php');
	require 'PHPMailer/PHPMailerAutoload.php';


	function sanitizeString($var)
	{
		$var = stripslashes($var);
		$var = htmlentities($var);
		$var = strip_tags($var);
		return $var;
	}

	$ic = $_SESSION['mua_ic'];

	if ($ic == "")
	{
		echo"<script type='text/javascript'>
	 	 	alert('Session end! Please login again!')
		    location.href='index.php'
		 	</script>";
			exit();
	}
	else
	{
		if(isset($_GET['app_id']))
		{
			$app_id=$_GET['app_id'];
			$query1=mysqli_query($con,"UPDATE appointment set app_status='REJECTED' where app_id='$app_id'");
			if($query1)
			{
				$query = "SELECT * FROM appointment A,customer C WHERE A.customer_ic = C.customer_ic AND A.app_id = '".$app_id."'";
				$result = mysqli_query ($con, $query) or exit("The query could not be performed");
				$objResult = mysqli_fetch_array($result);

					$email = $objResult["customer_email"];

					$mail = new PHPMailer;

					// creates object
					$mail->SetLanguage( 'en', 'PHPMailer/language/' );


					if($objResult == true)
					{

						$querySupp = "SELECT * FROM makeupartist WHERE mua_ic = '".$ic."'";
						$resultSupp = mysqli_query ($con, $querySupp) or exit("The query could not be performed");
						$objResultSupp = mysqli_fetch_assoc($resultSupp);

						// HTML email starts here
						$subject = "Makeup Artist Finder Appointment Status";
						$message  = "<table width='50%' align='center'><tr><td>
											<center>
											Your appointment has been ".$objResult["app_status"]."
											<h1 style='font-family:sans-serif; font-size:40px'>Appointment Status</h1>
											<br>Dear <strong>".$objResult["customer_name"]."</strong> ,
											<br>
											Sorry, your appointment with ".$objResultSupp["mua_name"]." has been rejected.
											<br><br><br>
											<strong>Have a question?</strong>
											<br>
											Contact your makeup artist at ".$objResultSupp["mua_phone_no"]." or ".$objResultSupp["mua_email"]."
											<br><br>
											</center>

											<table style='background-color:#ecf0f1; width:100%'><tr><td><br>
											<strong>Appointment Date</strong> : ".$objResult["app_date"]."<br>
											<strong>Appointment Session</strong> : ".$objResult["app_session"]."<br>
											<strong>Booked By</strong> : ".$objResult["customer_name"]. " <br>
											<strong>Total Charge (RM)</strong> : ".$objResult["total_charge"]." <br><br>
											</td></tr></table>
											<br>
											<br><br>
											<center>

											<br></center>
											</td></tr></table>";

						// HTML email ends here

						try
						{
							$mail->isSMTP();
							$mail->Host = 'smtp.gmail.com';
							$mail->SMTPAuth = true;
							$mail->SMTPSecure = 'tls';
							$mail->Port = 587;
							$mail->AddAddress($email);
							$mail->Username   ="findermakeupartist@gmail.com";
							$mail->Password   ="Makeup1234";
							$mail->SetFrom('findermakeupartist@gmail.com','Makeup Artist Finder');
							$mail->AddReplyTo("findermakeupartist@gmail.com","Appointment Respond");
							$mail->Subject    = $subject;
							$mail->Body 	  = $message;
							$mail->AltBody    = $message;
							$mail->isHTML(true);
							$mail->SMTPOptions = array
								(
									'ssl' => array(
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
									)
								);

								//echo $ic;
							if($mail->Send())
							{
								echo "<script>alert('Notification has been sent to customer email!');";
								echo "window.location.href = 'muaManageApp.php';</script>";
							}
							else
							{
								//echo "<script>alert('Your password not send to your email');";
								//echo "window.location.href = 'custShipping.php';</script>";
								echo 'Mailer Error: ' . $mail->ErrorInfo;
							}
						}
						catch(phpmailerException $ex)
						{
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						}
					}

			}
		}

	}

		mysqli_close($con);
	?>
	<!-- stop php for lost form-->
