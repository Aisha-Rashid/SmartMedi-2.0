<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
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
	 <!-- table CSS ->
    <link rel="stylesheet" href="css/table.css"-->

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
	
	<!-- Start Medical -->
	<div id="medical" class="contact-box">
	
		<div class="container">
		<img src="dashboardimages/favicon.ico" alt="Smartmedi">
			<div class="row">
			
				<div class="col-lg-12 col-xs-12">
					<h3><b>Medical Practictioner Registration Form</b></h3>
					<p><i>Kindly note that your organization must be registered first before filling this form. Administration must send email to SmartMedi
					to have the organization registered</i></P>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" method="post" action="DocRegistration.php">
						<!-- <?php include('errors.php'); ?> -->
							<TABLE width=100% >
							<TR><TD width=50%>First Name</TD><TD><input type="text" class="form-control" id="fname" name="fname" placeholder="---"></TD></TR>
							<TR><TD>Last Name</TD><TD><input type="text" class="form-control" id="lname" name="lname" placeholder="---"></TD></TR>							
							<TR><TD>National ID</TD><TD ><input type="number" class="form-control" id="nationalid" name="nationalid" placeholder="---"></TD></TR>
							<TR><TD>Organization</TD><TD>
							<select name="hospital" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION>  
										<?php 
										$query ="SELECT hospitalname FROM hospitals";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['hospitalname']; ?> </option>
										<?php 
										}
										?>
									</SELECT>
							
							</TD></TR>
							<TR><TD>Work ID</TD><TD><input type="number" class="form-control" id="workid" name="workid" placeholder="---"></TD></TR>
							<TR><TD>Specialty</TD><TD>
							<select name="specialty" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION>  
										<?php 
										$query ="SELECT specialty FROM docspecialty";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['specialty']; ?> </option>
										<?php 
										}
										?>
									</SELECT>
							
							</TD></TR>
							<TR><TD>Password</TD><TD><input type="password" class="form-control" id = "docpassword1" name="docpassword1">
							<span toggle="#docpassword1" class="fa fa-fw fa-eye field-icon toggle-password"></span></TD><TR>
				
							<TR><TD>Confirm Password</TD><TD><input type="password" class="form-control" id = "docpassword2" name="docpassword2">
							<span toggle="#docpassword2" class="fa fa-fw fa-eye field-icon toggle-password"></span></TD><TR>
							
							</TABLE>
							<br>
							<button type="submit" class="btn"
										name="reg_doc">Register</button>
							           
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Medical -->	
	
	<a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>

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