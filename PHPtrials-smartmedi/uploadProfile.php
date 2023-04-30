<?php
include('server.php'); 

if (!isset($_SESSION['IDNo'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['IDNo']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <!-- Site Metas -->
    <title>SmartMedi EHR</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<!--Password eye icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<?php if (isset($_SESSION['IDNo'])) : 

   $unique = $_SESSION['IDNo'];
?>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php


error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./uploads/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "phptrials-smartmedi");
		if ($_GET['type'] == 'register'){ 
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
		elseif ($_GET['type'] == 'dependent'){ 
		$fname = $_GET['fname'];
			// Get all the submitted data from the form
			$query = "update dependants set filename='$filename' where IDNo='$unique' and FirstName_dep = '$fname'";

			// Execute query
			mysqli_query($db, $query);

			// Now let's move the uploaded image into the folder: image
			if (move_uploaded_file($tempname, $folder)) {
				
				echo"<script>alert('Image uploaded successfully!'); window.location.href ='/SmartMedi-2.0/PHPtrials-smartmedi/dependants.php'; </script>";
				//echo "<h3> Image uploaded successfully!</h3>";
			} else {
				//echo "<h3> Failed to upload image!</h3>";
				echo "<script>alert('Failed to upload image!'); window.location.href ='/SmartMedi-2.0/PHPtrials-smartmedi/dependants.php'; </script>";
			}
		}
}
?>

	<!-- LOADER -->
     <div id="preloader">
		<div class="loader">
			<img src="images/preloader.gif" alt="" />
		</div>
    </div>
    <!-- END LOADER -->
	
	<div id="login" class="contact-box">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Create Account</h2>
					<h3>Step 2: Upload Profile Picture</h3>
				</div>
			</div>
		</div>
		
		<div class="contact-block">
			<div class="template-page-wrapper" align="center">
				<form class="form-horizontal templatemo-signin-form" method="post" action="" enctype="multipart/form-data">
				
				
				<div class="form-group">
						<div class="col-md-6">
							<input class="form-control" type="file" name="uploadfile" value="" />
						</div>              
				</div>
				<div class="form-group">
						<div class="col-md-6">
							<button class="btn" type="submit" name="upload">UPLOAD</button>
						</div>  
				</div>
				<div class="form-group">		
						<div class="col-md-6">
							<a href="dashboard.php"><h2><b><u>Proceed to dashboard</u></b></h2></a>
						</div> 
				</div>
				
				<div class="form-group">
						<div class="col-md-6">
							<p>New Here?
							<a href="register.php"><u>Click here to register!</u></a>
							</p>
						</div>              
				</div>
			</div>
		</div>
	</form>
	</div>
	
<!-- ALL JS FILES -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/passwordToggle.js"></script>
	
    <!-- ALL PLUGINS--> 
	<script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script> 
	<script src="js/slider-index.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
	<script src="js/isotope.min.js"></script>	
	<script src="js/images-loded.min.js"></script>	
    <script src="js/custom.js"></script>
	<script src="js/password-validator.js"></script>	

</body>
<?php endif ?> 
</html>
