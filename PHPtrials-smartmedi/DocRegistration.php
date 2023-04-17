<?php
include('server.php');

if (!isset($_SESSION['workID'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: AdminLogin.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['workID']);
  header("location: AdminLogin.php");
}
if (isset($_SESSION['workID'])) : 
  $unique = $_SESSION['workID'];
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
    <!-- Custom CSS ->
    <link rel="stylesheet" href="css/custom.css"-->
	<!--Password eye icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php
 
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
extract($_REQUEST);

$encrypted_id = $_GET['filename'];
$id = base64_decode($encrypted_id);
$date = date('Y-m-d_H:i:s');

$Hospitalapproval= mysqli_query($db, "select * from hospitalreg where id='$id'");
if (mysqli_num_rows($Hospitalapproval) == 1) {
$update_query = "UPDATE hospitalreg SET approval='approved', approvalDate='$date' WHERE id='$id'";
mysqli_query($db, $update_query);

} 
 
$query = "select * from hospitalreg where id='$id'";
$res = mysqli_query($db, $query);
$array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   $hospital = $array[1];
   
  

if (isset($_POST['reg_doc'])) {
 
	$fname =filter_var ($_POST['fname'], FILTER_SANITIZE_STRING);
	$lname =filter_var ($_POST['lname'], FILTER_SANITIZE_STRING);
	$nationalid = filter_var($_POST['nationalid'], FILTER_SANITIZE_NUMBER_INT);
	$workid = filter_var($_POST['workid'], FILTER_SANITIZE_NUMBER_INT);
	$specialty = mysqli_real_escape_string($db, $_POST['specialty']);
	$password ="SMedi@123";
	$organization = $_POST['organization'];
	
	
	
		// Inserting data into table
		$query = "INSERT INTO doctors (nationalid, fname, lname, hospital, workid, specialty, password)
				VALUES('$nationalid' , '$fname' , '$lname' , '$organization', '$workid' , '$specialty', '$password')";
		
		mysqli_query($db, $query);
$hospitalregistered=mysqli_query($db, "select * from hospitalreg where hospital='$organization'");
	$row = mysqli_fetch_array($hospitalregistered);
	if ($row) {
        // Extract the value from the array into a variable
        $id = $row['id'];
		$encrypted_id = base64_encode($id);
     
header("Location: DocRegistration.php?filename=$encrypted_id");}
exit();
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
					<a href="admindash.php"><i class="fa fa-arrow-left" aria-hidden="true"></i><b> Back to Dashboard</b></a>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" method="post" action="DocRegistration.php">
						
							<TABLE width=100% >
							<input type="hidden" name="organization" value="<?php echo $array[1]; ?>">
							<TR><TD width=50%>First Name</TD><TD><input type="text" class="form-control" id="fname" name="fname" placeholder="---" required="required"></TD></TR>
							<TR><TD>Last Name</TD><TD><input type="text" class="form-control" id="lname" name="lname" placeholder="---" required="required"></TD></TR>							
							<TR><TD>National ID</TD><TD ><input type="number" class="form-control" id="nationalid" name="nationalid" placeholder="---" required="required"></TD></TR>
							<TR><TD>Organization</TD><TD><input disabled type="text" class="form-control" value="<?php echo $array[1];?>"></TD>
							 </TR>
							<TR><TD>Work ID</TD><TD><input type="number" class="form-control" id="workid" name="workid" placeholder="---" required="required"></TD></TR>
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
<?php  endif  ?>
</body>
</html>