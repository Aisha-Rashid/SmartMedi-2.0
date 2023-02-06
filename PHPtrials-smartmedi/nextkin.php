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


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php if (isset($_SESSION['IDNo'])) : 
   
   
   $unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   
   ?>
<?php
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['kinsub'])!=""){
	
	$kinFirstName = mysqli_real_escape_string($db, $_POST['kinFirstName']);
	$kinLastName = mysqli_real_escape_string($db, $_POST['kinLastName']);
	$relationship = mysqli_real_escape_string($db, $_POST['relationship']);
	$telephone = mysqli_real_escape_string($db, $_POST['telephone']);
	
		 
	
$query=$conn->query("INSERT INTO nextofkin (kinFirstName, kinLastName, relationship, telephone, IDNo) VALUES ('$kinFirstName', '$kinLastName', '$relationship', '$telephone', '$unique')");
if($query){
header("location:dashboard.php");
}
else{
die(mysqli_error($conn));
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
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<h3><b>Next of kin Details</b></h3>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" action="" method="post">
															
								<TABLE width=100%>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><b>1</b></h3></TD></TR>
								<TR><TD >First Name</TD><TD><input type="text" class="form-control"  name="kinFirstName" placeholder="---" ></TD></TR>
								<TR><TD >Last Name</TD><TD><input type="text" class="form-control"  name="kinLastName" placeholder="---" ></TD></TR>
								<TR><TD >Relationship</TD><TD>
									<SELECT NAME="relationship" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>  
										<OPTION VALUE="Parent">Parent
										<OPTION VALUE="Significant other">Significant other
										<OPTION VALUE="Sibling">Sibling
										<OPTION VALUE="Son/Daughter">Son/Daughter
										<OPTION VALUE="Relative">Relative
										<OPTION VALUE="Guardian">Guardian<BR>
									</SELECT>
								</TD></TR>
								<TR><TD >Telephone Number</TD><TD><input type="number" class="form-control"  name="telephone" placeholder="---" ></TD></TR>
								
								
								
								
							</TABLE>
							
							<br>
							<button type="submit" class="btn"
										name="kinsub">Submit</button>
							           
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
<?php endif ?> 
</body>
</html>