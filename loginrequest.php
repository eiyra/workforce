<?php
include('config.php');
session_start();

if (isset($_POST['submit'])) {

   $username = $_POST['user_ic'];
   $password = $_POST['password'];

   // Query the employee table for employee role
   $employee_query = mysqli_query($con, "SELECT emp_ic FROM employee WHERE emp_ic='$username' AND emp_password='$password'");

   if (mysqli_num_rows($employee_query) > 0) {
      $row_employee = mysqli_fetch_array($employee_query);
      $_SESSION['emp_ic'] = $row_employee['emp_ic'];
      header('Location: empDashboard.php');
      exit;
   }

   // Query the admin table for admin role
   $admin_query = mysqli_query($con, "SELECT admin_ic FROM admin WHERE admin_ic='$username' AND admin_password='$password'");

   if (mysqli_num_rows($admin_query) > 0) {
      $row_admin = mysqli_fetch_array($admin_query);
      $_SESSION['admin_ic'] = $row_admin['admin_ic'];
      header('Location: adminDashboard.php');
      exit;
   }
   
   // If no matching role is found
   echo "<script>alert('Login Failed! Wrong IC or Password!');
         window.location.href = 'index.php';</script>";
   exit;

//   // $id = $row['adm_ic'];
//   $id2 = $row2['emp_ic'];
//   $idad = $rows['admin_ic'];

//   // if($id==$username) {
//   // $_SESSION['ad_ic'] = $id;
//   // header('Location:admDashboard.php');
//   // }

//   if ($id2 == $username) {
//       $_SESSION['emp_ic'] = $row2['emp_ic'];
//       header('Location: empDashboard.php');
//       exit; // Important: Exit after sending header
//   } elseif ($idad == $username) {
//       $_SESSION['admin_ic'] = $rows['admin_ic'];
//       header('Location: adminDashboard.php');
//       exit; // Important: Exit after sending header
//   } else {
//       echo "<script>alert('Login Failed! Wrong IC or Password!');
//         window.location.href = 'index.php';</script>";
//       exit;
//   }
}
?>
