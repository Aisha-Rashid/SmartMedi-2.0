<?php 
/*session_start();

$workID = "";
$adminpass = "";

$db = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');

if (isset($_POST['admin_login'])) {
	
	// Data sanitization to prevent SQL injection
	$workID = mysqli_real_escape_string($db, $_POST['workID']);
	$adminpass = mysqli_real_escape_string($db, $_POST['adminpass']);
	
	// Error message if the input field is left blank
	if (empty($workID)) {
		array_push($errors, "Work ID is required");
	}
	if (empty($adminpass)) {
		array_push($errors, "Password is required");
	}
	
	if (count($errors) == 0) {
		
		$query = "SELECT adminFname, adminLname, workID, IDnumber, email, phone FROM `admin` WHERE workID=
				'$workID' AND adminpass='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['FirstName'] = $FirstName;
			$_SESSION['workID'] = $username;B;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: admindash.html');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Work ID or password incorrect");
		}
	
}
}*/
include('server.php'); 

 ?>
<!DOCTYPE html>
<html>
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

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

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
					<h2>SmartMedi Admin Platform</h2><br>
				</div>
			</div>
		</div>
		
		<div class="contact-block">
			<div class="template-page-wrapper" align="center">
				<form class="form-horizontal templatemo-signin-form" method="post" action="signin.php">
				<!-- <?php include('errors.php'); ?> -->
				
				
				<div class="form-group">
						<div class="col-md-6">
							<label>Work ID</label>
								<div class="col-sm-6">
								<input type="number" class="form-control" name="workID">
								</div>
						</div>              
				</div>
				<div class="form-group">
						<div class="col-md-6">
							<label>Password</label>
								<div class="col-sm-6">
								<input type="password" class="form-control" name="adminpass">
								</div>
						</div>              
				</div>
				<div class="form-group">
						<div class="col-md-12">
							<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn"
							name="admin_login">Log In</button>
							</div>
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
	<!--script src="js/password-validator.js"></script-->	

</body>

</html>
