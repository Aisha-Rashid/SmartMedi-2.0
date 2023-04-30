<?php
include('server.php');

?>
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
	<link rel="stylesheet" href="dashboardcss/custom.css">
    
	<!--Password eye icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php
//$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
//Doctor's details
if(isset($_POST['submit'])!=""){
	$fname =filter_var ($_POST['fname'], FILTER_SANITIZE_STRING);
	$lname =filter_var ($_POST['lname'], FILTER_SANITIZE_STRING);
	$nationalid = filter_var($_POST['nationalid'], FILTER_SANITIZE_NUMBER_INT);
	$workid = filter_var($_POST['workid'], FILTER_SANITIZE_NUMBER_INT);
	$new_password = mysqli_real_escape_string($db, $_POST['new_password']);
	$conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);
	
	$query= "select * from doctors where fname='$fname' and lname = '$lname' and nationalid = '$nationalid' and workid='$workid'";
	$result= mysqli_query($db, $query);
	if ($result){
		
		if ($new_password == $conf_password) {
					$enc_password = md5($new_password);
					$query=mysqli_query($db, "UPDATE doctors SET password='$enc_password' WHERE nationalid='$nationalid' ");
					if($query){
					header("location:DocLogin.php");
					}
					else{
					echo "Registration Unsuccessful";
					}
				}
				 else {
		  echo "Error: new password and confirm password do not match.";
				
				
			}
	
}
else{
	echo "Error: Details do not match our records";
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
	
	<!-- Start Medical -->
	<div id="medical" class="contact-box">
	
		<div class="container">
		<img src="dashboardimages/favicon.ico" alt="Smartmedi">
			<div class="row">
			
				<div class="col-lg-12 col-xs-12">
					<h3><b>Medical Practictioner Registration Form</b></h3>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" method="post" action="">
						
							<TABLE width=100% >
							<input type="hidden" name="organization" value="<?php echo $array[1]; ?>">
							<TR><TD width=50%>First Name</TD><TD><input type="text" class="form-control" id="fname" name="fname" placeholder="---" required="required"></TD></TR>
							<TR><TD>Last Name</TD><TD><input type="text" class="form-control" id="lname" name="lname" placeholder="---" required="required"></TD></TR>							
							<TR><TD>National ID</TD><TD ><input type="number" class="form-control" id="nationalid" name="nationalid" placeholder="---" required="required"></TD></TR>
							<TR><TD>Work ID</TD><TD><input type="number" class="form-control" id="workid" name="workid" placeholder="---" required="required"></TD></TR>
							<tr><td><p>New Password :</p></td><td><input type="password" class="form-control" name="new_password" id="new_password" required="required">
							<span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
							<tr><td><p>Confirm Password :</p></td><td><input type="password" class="form-control" name="conf_password" id="conf_password" required="required">
							<span toggle="#conf_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
							</TABLE>
							<br>
							<button type="submit" class="btn"
										name="submit">Register</button>
							           
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