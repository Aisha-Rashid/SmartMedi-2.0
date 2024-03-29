<?php include('server.php') ?>
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
	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	<!-- LOADER -->
    <div id="preloader">
		<div class="loader">
			<img src="images/preloader.gif" alt="" />
		</div>
    </div>
    <!-- END LOADER -->
	
	<div id="register" class="contact-box">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Create Account</h2>
				</div>
			</div>
		</div>		
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" method="post" action="register.php">
						<?php include('errors.php'); ?>
						
						<div class="row">
								<div class="col-md-6">
									<label>First Name</label>
									<div class="form-group">
									<input type="text" class="form-control" name="FirstName" value="<?php echo $FirstName; ?>">
									</div>   
								</div> 
								<div class="col-md-6">
									<label>Last Name</label>
									<div class="form-group">
									<input type="text" class="form-control" name="LastName" value="<?php echo $LastName; ?>">
									</div>   
								</div> 
								<div class="col-md-6">
									<label>Username</label>
									<div class="form-group">
									<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
									</div>   
								</div>
								<div class="col-md-6">
									<label>Email</label>
									<div class="form-group">
									<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
									</div>   
								</div>
								<div class="col-md-6">
									<label>Telephone No</label>
									<div class="form-group">
									<input type="text" class="form-control" name="TelNo" value="<?php echo $TelNo; ?>">
									</div>   
								</div> 
								<div class="col-md-6">
									<label>ID Number</label>
									<div class="form-group">
									<input type="number" class="form-control" name="IDNo" value="<?php echo $IDNo; ?>">
									</div>   
								</div> 
								<div class="col-md-6">
									<label>Date of Birth</label>
									<div class="form-group">
									<input type="date" class="form-control" name="DOB" value="<?php echo $DOB; ?>">
									</div>   
								</div> 
								<div class="col-md-6">
									<label>Gender</label>
									<div class="form-group">
									<select name="gender" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION>  
										<OPTION VALUE="Male">Male
										<OPTION VALUE="Female">Female
									</SELECT>
									</div>   
								</div> 
								<div class="col-md-6">
									<label>Password</label>
									<div class="form-group">
									<input type="password" class="form-control" name="password1">
									</div>
								</div> 
								<div class="col-md-6">
									<label> Confirm Password</label>
									<div class="form-group">
									<input type="password" class="form-control" name="password2">
									</div>
								</div> 
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn"
										name="reg_user">Register</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>						
	
	<!-- ALL JS FILES -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/passwordToggle.js"></script>
    <!-- ALL PLUGINS -->
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

	
</body>
</html>