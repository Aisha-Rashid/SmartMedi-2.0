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
	 <!-- table CSS ->
    <link rel="stylesheet" href="css/table.css"-->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php
if (isset($_SESSION['workID'])) : 
  $unique = $_SESSION['workID'];
  
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
extract($_REQUEST);

$encrypted_id = $_GET['filename'];
$id = base64_decode($encrypted_id);

$Hospitalregistered= mysqli_query($db, "select * from hospitalreg where id='$id'");
if (mysqli_num_rows($Hospitalregistered) == 1) {
$update_query = "UPDATE hospitalreg SET status = 1, approval='Inprogress' WHERE id='$id'";
mysqli_query($db, $update_query);

}
 
/* $query = "select * from hospitalreg where id='$id'";
$res = mysqli_query($db, $query);
 */
?>

	<!-- LOADER -->
    <div id="preloader">
		<div class="loader">
			<img src="images/preloader.gif" alt="" />
		</div>
    </div>
    <!-- END LOADER -->
	
	<!-- Start Medical -->
	<div  class="contact-box">
	
		<div class="container">
		<img src="dashboardimages/favicon.ico" alt="Smartmedi">
			<div class="row">
			<?php 
			 $billingquery = "SELECT hospitalreg.id, hospitalreg.hospital, hospitalreg.email, hospitalreg.applied, hospitalreg.file, 
			 billing.hospitalname, billing.amountDue, billing.amountPaid, billing.datePaid, billing.invoice
			 FROM hospitalreg, billing WHERE hospitalreg.hospital = billing.hospitalname AND hospitalreg.id ='$id'" ;
			$res = mysqli_query($db, $billingquery);
			while($row=mysqli_fetch_array($res)){
				$hospital=$row['hospital'];
				$email=$row['email'];
				$applied=$row['applied'];
				$id = $row['id'];
				$file=$row['file'];
				$amountDue=$row['amountDue'];
				$amountPaid=$row['amountPaid'];
				$invoice=$row['invoice'];
				$datePaid=$row['datePaid'];
				$encrypted_id = base64_encode($id);
				$url = "DocRegistration.php?filename=$encrypted_id";
				?>
				<div class="col-lg-12 col-xs-12">
					<h3><b>Medical Organization Registration Form</b></h3>
					
					<a href="admindash.php"><i class="fa fa-arrow-left" aria-hidden="true"></i><b> Back to Dashboard</b></a><br>
					<font size="2"><i><b>Note: </b>Only when the dues are fully paid will one be able to register staff.</i></font>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" method="post" action="DocRegistration.php">
						
							<TABLE width=100% >
							<TR><TD width=50%>Name</TD><TD><p><b><?php echo $row['hospital'];?></b></p></TD></TR>
							<TR><TD>Email</TD><TD><p><?php echo $row['email'];?></p></TD></TR>							
							<TR><TD>Applied on</TD><TD><p><?php echo $row['applied'];?></p></TD></TR>
							<TR><TD>Amount Due:</TD><TD><p><?php echo $row['amountDue'];?></p></TD></TR>
							<TR><TD>Amount paid:</TD><TD><p><?php echo $row['amountPaid']; ?></p></TD></TR>
							<TR><TD>Invoice No:</TD><TD><p><?php echo $row['invoice']; ?></p></TD></TR>
							<TR><TD>Date paid:</TD><TD><p><?php echo $row['datePaid']; ?></p></TD></TR>
							<TR><TD>File</TD><TD><a href="download.php?filename=<?php echo $row['file'];?>">
							<?php echo $row['file'];?><i class="fa fa-download" aria-hidden="true"></i></a></TD></TR>
							<?php } ?>
							</TABLE>
							<br>
							
							<a href="<?php echo $url?>" class="btn btn-primary <?php echo ($row['amountDue'] !== $row['amountPaid']) ? 'disabled' : ''; ?> ">Register Staff</a>
							           
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