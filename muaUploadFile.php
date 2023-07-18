<?php include_once("config.php");
session_start();

// Call our connection file
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mua";

		// Create connection
		$conn=mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

// Check to see if the type of file uploaded is a valid image type
function is_valid_type($file)
{
	// This is an array that holds all the valid image MIME types
	$valid_types = array("image/jpg", "image/jpeg","image/png");

	if (in_array($file['type'], $valid_types))
		return 1;
	return 0;
}



// Just a short function that prints out the contents of an array in a manner that's easy to read
// I used this function during debugging but it serves no purpose at run time for this example
function showContents($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

// Set some constants

// This variable is the path to the image folder where all the images are going to be stored
// Note that there is a trailing forward slash
$TARGET_PATH = "img/";

// Get our POSTed variables
$fullname1= $_POST['fullname'];
//$type1= $_POST['type'];
$email1= $_POST['email'];
$image= $_FILES['image'];
$phone1= $_POST['phoneno'];
$address1= $_POST['location'];
$lat1= $_POST['lat'];
$lng1= $_POST['lng'];
$charge1= $_POST['charge'];

// Sanitize our inputs
$fullname= mysqli_real_escape_string($conn,$fullname1);
//$type= mysqli_real_escape_string($conn,$type1);
$email= mysqli_real_escape_string($conn,$email1);
$image['name'] = mysqli_real_escape_string($conn,$image['name']);
$phone= mysqli_real_escape_string($conn,$phone1);
$address= mysqli_real_escape_string($conn,$address1);
$lat= mysqli_real_escape_string($conn,$lat1);
$lng= mysqli_real_escape_string($conn,$lng1);
$charge= mysqli_real_escape_string($conn,$charge1);

// Build our target path full string.  This is where the file will be moved do
// i.e.  images/picture.jpg
$TARGET_PATH .= $image['name'];

// Make sure all the fields from the form have inputs
if ( $fullname== "" || $email== "" || $image['name'] == "" || $phone== "" || $address== "" || $lat== "" || $lng== "" || $charge== ""  )
{

	echo "<script>window.alert('All fields are required!');window.location.href='muaUpdateProfile.php'</script>";
	exit;
}

// Check to make sure that our file is actually an image
// You check the file type instead of the extension because the extension can easily be faked
if (!is_valid_type($image))
{
	echo "<script>window.alert('You must upload only .jpeg, .png or .jpg file type!');window.location.href='muaUpdateProfile.php'</script>";
	exit;
}

// Here we check to see if a file with that name already exists
// You could get past filename problems by appending a timestamp to the filename and then continuing
if (file_exists($TARGET_PATH))
{
		echo "<script>window.alert('A file with that name already exists!');window.location.href='muaUpdateProfile.php'</script>";
	exit;
}

// Lets attempt to move the file from its temporary directory to its new home
if (move_uploaded_file($image['tmp_name'], $TARGET_PATH))
{
	// NOTE: This is where a lot of people make mistakes.
	// We are *not* putting the image into the database; we are putting a reference to the file's location on the server
	$sql="UPDATE makeupartist SET mua_name='$fullname',mua_email='$email',mua_image='".$image['name']."',mua_phone_no='$phone',mua_address='$address',latitude='$lat',longitude='$lng',mua_charge='$charge' WHERE mua_ic='".$_SESSION['mua_ic']."'";
	$result=mysqli_query($conn,$sql) or die ("Could not insert data into DB: " . mysqli_error());
	echo "<script>window.alert('Successfully updated!');window.location.href='muaProfile.php'</script>";
	exit;
}
else
{
	// A common cause of file moving failures is because of bad permissions on the directory attempting to be written to
	// Make sure you chmod the directory to be writeable

	echo "<script>window.alert('Could not upload file! Check permissions on the directory.');window.location.href='muaUpdateProfile.php'</script>";
	exit;
}
?>
