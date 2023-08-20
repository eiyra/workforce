<?php
require('config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/vendor/autoload.php';

class User extends Dbconfig
{
	protected $host;
	protected $username;
	protected $password;
	protected $dbName;
	private $employeeTable = 'employee';
	private $dbConnect = false;
	public function __construct()
	{
		parent::__construct();
		if (!$this->dbConnect) {
			$database = new dbConfig();
			$this->host = $database->host;
			$this->username = $database->username;
			$this->password = $database->password;
			$this->dbName = $database->dbName;
			$conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function resetPassword()
	{
		$sqlQuery = "
			SELECT emp_email 
			FROM " . $this->employeeTable . " 
			WHERE emp_email='" . $_POST['userEmail'] . "' AND emp_ic='" . $_POST['userIc'] . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if ($numRows) {
			$query = mysqli_query($this->dbConnect, "UPDATE employee SET authtoken='" . md5($row['emp_email']) . "' WHERE emp_email = '" . $_POST['userEmail'] . "'");

			$link = "<a href='http://" . $_SERVER["HTTP_HOST"] . "/workforce/reset_password.php?authtoken=" . md5($row['emp_email']) . "'>Reset Password</a>";
			$to = $row['emp_email'];
			$subject = "Reset your password on Workforce Management website";
			$msg = "Hi there, click on this " . $link . " to reset your password.";

			// Initialize PHPMailer
			$mail = new PHPMailer(true);
			try {
				//Server settings
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				// $mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->Username = 'thefourpawss@gmail.com';
				$mail->Password = 'qhozkysyfuenfsay';
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

				//Recipients
				$mail->setFrom('thefourpawss@gmail.com', 'Workforce');
				$mail->addAddress($to);
				$mail->addReplyTo('admin@workforce.com', 'Admin');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				//Attachments
				// $mail->addAttachment('/path/');

				//Content
				$mail->isHTML(true);
				$mail->Subject = $subject;
				$mail->Body = $msg;
				// $mail->AltBody = '';

				$mail->send();
				return 1;
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
			}
		} else {
			return 0;
		}
	}
	public function savePassword()
	{
		$sqlQuery = "
			SELECT emp_email, authtoken 
			FROM " . $this->employeeTable . " 
			WHERE authtoken='" . $_POST['authtoken'] . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		if ($numRows) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$sqlQuery = "
					UPDATE " . $this->employeeTable . " 
					SET emp_password='" . $_POST['newPassword'] . "'
					WHERE emp_email='" . $row['emp_email'] . "' AND authtoken='" . $row['authtoken'] . "'";
				mysqli_query($this->dbConnect, $sqlQuery);
			}
			return 1;
		} else {
			return 0;
		}
	}
}
?>