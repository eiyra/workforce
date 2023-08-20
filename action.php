<?php
include("inc/User.php");
$user = new User();

// Forgot password validation
if (!empty($_POST['action']) && $_POST['action'] == 'forgotPassword') {
    if ($_POST['userIc'] == '' && $_POST['userEmail'] == '') {
        $message = "Please enter IC number and email to proceed with password reset";
        $status = 2;
    } else {
        $userDetails = $user->resetPassword();
        if ($userDetails) {
            $message = "Password reset link send. Please check your mailbox to reset password.";
            $status = 1;
        } else {
            $message = "No account exist with entered IC number and email address.";
            $status = 0;
        }
    }
    $jsonResponse = array(
        "message" => $message,
        "success" => $status,
    );
    echo json_encode($jsonResponse);
}

// Reset Password validation
if (!empty($_POST['action']) && $_POST['action'] == 'savePassword' && $_POST['authtoken']) {
    if ($_POST['newPassword'] != $_POST['confirmNewPassword']) {
        $message = "Password does not match";
        $status = 1;
    } else {
        $isPasswordSaved = $user->savePassword();
        if ($isPasswordSaved) {
            $message = "Password reset successfully.You can login now.";
            $status = 1;
        } else {
            $message = "Invalid password reset request.";
            $status = 0;
        }
    }
    $jsonResponse = array(
        "message" => $message,
        "success" => $status
    );
    echo json_encode($jsonResponse);
}
?>