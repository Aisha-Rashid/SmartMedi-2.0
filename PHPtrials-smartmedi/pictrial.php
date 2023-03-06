<?php
include('server.php'); 

// Starting the session, to use and
// store data in session variable
// session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['IDNo'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['IDNo']);
	header("location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php if (isset($_SESSION['IDNo'])) : 

   $unique = $_SESSION['IDNo'];
   
?>
<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./uploads/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "phptrials-smartmedi");

	// Get all the submitted data from the form
	$sql = "update patients set filename='$filename' where IDNo='$unique'";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
			<div class="form-group">
				<a href="dashboard.php">Back</a>
			</div>
		</form>
	</div>
	<div id="display-image">
		<?php
		$query = " select * from patients where IDNO='$unique' ";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./uploads/<?php echo $data['filename']; ?>">

		<?php
		}
		?>
	</div>
</body>
<?php endif ?> 
</html>
