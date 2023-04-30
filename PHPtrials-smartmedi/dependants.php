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
    <link rel="stylesheet" href="css/custom.css">
	<!--Password eye icon->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php
//session_start();
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));


if (isset($_SESSION['IDNo'])) {
   $unique = $_SESSION['IDNo'];
   //$query = "SELECT * FROM `patients` WHERE IDNo = ?";
   //$stmt = $conn->prepare($query);
   // $stmt->execute([$unique]);
   // $array = $stmt->fetch();
   // $rows = $stmt->rowCount();
}

if(isset($_POST['submit'])!=""){
	
	$FirstName =filter_var ($_POST['FirstName'], FILTER_SANITIZE_STRING);
	$LastName =filter_var ($_POST['LastName'], FILTER_SANITIZE_STRING);
	$dob = mysqli_real_escape_string($db, $_POST['dob']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$bloodgroup = mysqli_real_escape_string($db, $_POST['bloodgroup']);
	$allergies =filter_var ($_POST['allergies'], FILTER_SANITIZE_STRING);
	$notes =filter_var ($_POST['notes'], FILTER_SANITIZE_STRING);
	//$medical_conditions =filter_var ($_POST['medical_conditions'], FILTER_SANITIZE_STRING);
	$condition1 = mysqli_real_escape_string($db, $_POST['condition1']);
	$condition2 = mysqli_real_escape_string($db, $_POST['condition2']);
	$condition3 = mysqli_real_escape_string($db, $_POST['condition3']);
	$condition4 = mysqli_real_escape_string($db, $_POST['condition4']);
	$condition5 = mysqli_real_escape_string($db, $_POST['condition5']);
	
	
	if (!empty($condition1) || !empty($condition2) || !empty($condition3) || !empty($condition4) || !empty($condition5)) {
	$medical_conditions = $condition1 . ' , ' . $condition2 . ' , ' . $condition3 . ' , ' . $condition4 . ' , ' . $condition5  . ' , ' . $notes;
	}
	$query=$conn->query("INSERT INTO dependants (`IDNo`, `FirstName_dep`, `LastName_dep`, `dob`, `gender_dep`, `blood_group`, `allergies`, `medical_conditions`, `notes`) VALUES 
	('$unique', '$FirstName', '$LastName', '$dob', '$gender', '$bloodgroup', '$allergies', '$medical_conditions', '$notes')");
if($query){
header("location:uploadProfile.php?type=dependent&fname=$FirstName");
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
	
	<!-- Start Medical ->
	
	<div id="medical" class="contact-box"-->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
				<br>
					<h1><b>Dependants Details</b></h1>
					<a href="dashboard.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> <b>Back to Dashboard</b></a>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" action="" method="post">
								<TABLE width=100%>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><p><b>Child Data</b></p></TD></TR>
								<TR><TD width=40%><label>First Name:</label></TD><TD><input type="text" name="FirstName" class="form-control" required="required"></TD></TR>
								<TR><TD width=40%><label>Last Name:</label></TD><TD><input type="text" name="LastName" class="form-control" required="required"></TD></TR>
								<TR><TD><label>Date of Birth:</label></TD><TD><input type="date" name="dob" class="form-control" required="required"></TD></TR>
								<TR><TD><label>Gender:</label></TD><TD><select name="gender" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION>  
										<OPTION VALUE="Male">Male
										<OPTION VALUE="Female">Female
									</SELECT></TD></TR>
								<TR><TD><label>Blood Group:</label></TD><TD><SELECT NAME="bloodgroup" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT bloodgroup FROM blood";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['bloodgroup']; ?> </option>
										<?php 
										}
										?>
										
									</SELECT></TD></TR>
								<TR><TD><label>Allergies:</label></TD><TD>
								<textarea id="allergies" name="allergies" rows="5" cols="100" placeholder="please supply full details of what you are allergic to"></textarea></TD></TR>
								<TR><TD><label>Condition 1:</label></TD><TD>
								<SELECT NAME="condition1" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
								</TD></TR>
								<tr><td><p>Condition 2 :</p></td>
									<td>
									<SELECT NAME="condition2" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><p>Condition 3 :</p></td><td>
									<SELECT NAME="condition3" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><p>Condition 4 :</p></td><td>
									<SELECT NAME="condition4" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><p>Condition 5 :</p></td><td>
									<SELECT NAME="condition5" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<TR><TD><label>Notes:</label></TD><TD>
								<textarea id="notes" name="notes" rows="5" cols="100" placeholder="please supply full details of the conditions selected"></textarea></TD></TR>
								
								</TABLE>
								<button type="submit" name="submit">Submit</button>
								
								</form>
								
							
							<br>
							
							           
						
						
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
<?php //endif ?> 
</body>
</html>