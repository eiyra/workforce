<?php
include('config.php');
session_start();
?>


<?php
if(isset($_POST['submit']))
{

$username = $_POST['user_ic'];
$password = $_POST['password'];

// $login = mysqli_query($con,"SELECT adm_ic, adm_password FROM adm WHERE adm_ic='$username' AND adm_password='$password'");
// $row = mysqli_fetch_array($login);
$login2 = mysqli_query($con,"SELECT emp_ic, emp_password FROM employee WHERE emp_ic='$username' AND emp_password='$password'");
$row2 = mysqli_fetch_array($login2);
$login3 = mysqli_query($con,"SELECT admin_ic, admin_password FROM admin WHERE admin_ic='$username' AND admin_password='$password'");
$rows = mysqli_fetch_array($login3);

// $id = $row['adm_ic'];
$id2 = $row2['emp_ic'];
$idad = $rows['admin_ic'];

    // if($id==$username) {
		// $_SESSION['ad_ic'] = $id;
        // header('Location:admDashboard.php');
    // }

	if($id2==$username) {
	$_SESSION['emp_ic'] = $row2['emp_ic'];

    header('Location: empDashboard.php');
	}

	elseif($idad==$username) {
	$_SESSION['admin_ic'] = $rows['admin_ic'];

    header('Location: adminDashboard.php');
	}
	else
	{
    echo "<script>alert('Login Failed! Wrong IC or Password!');";
    echo "window.location.href = 'index.php';</script>";
    exit;
  }

}

?>
