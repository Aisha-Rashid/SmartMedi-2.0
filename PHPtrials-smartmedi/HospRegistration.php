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
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  
  $hospital =filter_var ($_POST['hospital'], FILTER_SANITIZE_STRING);
  $branch =filter_var ($_POST['branch'], FILTER_SANITIZE_STRING);
  $county = mysqli_real_escape_string($db, $_POST['county']);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $tel = filter_var($_POST['tel'], FILTER_SANITIZE_NUMBER_INT);
  //$status = 0;
  
  move_uploaded_file($temp,"Hospitals/".$name);

$query=$conn->query("INSERT INTO hospitalreg (hospital, branch, county, email, tel, applied, file) VALUES ('$hospital', '$branch', '$county', '$email', '$tel', '$date', '$name')");
if($query){
	echo "success";
//echo"<script>alert('Thank You for registering with SmartMedi. You will receive further communication on your email.'); window.location.href ='/SmartMedi-2.0/PHPtrials-smartmedi/index.php'; </script>";
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
		<img src="dashboardimages/favicon.ico" alt="Smartmedi">
			<div class="row">
			
				<div class="col-lg-12 col-xs-12">
					<h3><b>Medical Institution Registration Form</b></h3>
					<p><i>Kindly note that your organization is required to provide a list of medical practitioners that will be granted access to the patients' data.
					The list must include <b>FULL</b> name of the practitioner, national ID number, word ID and specialty/department.</i></P>
					<hr>
					<div class="contact-block">
						<form enctype="multipart/form-data"  action="" id="wb_Form1" name="form" method="post" class="form-horizontal templatemo-signin-form" >
						
							<TABLE width=100% >
							<TR><TD width=50%>Institution Name</TD><TD><input type="text" class="form-control" id="hospital" name="hospital" placeholder="---" required="required"></TD></TR>
							<TR><TD>Branch</TD><TD><input type="text" class="form-control" id="branch" name="branch" placeholder="---" ></TD></TR>
							<TR><TD>Email</TD><TD><input type="email" class="form-control" id="email" name="email" placeholder="---" required="required"></TD></TR>
							<TR><TD>Main Telephone number</TD><TD><input type="number" class="form-control" id="tel" name="tel" placeholder="---" required="required"></TD></TR>
							<TR><TD>County</TD><TD ><SELECT NAME="county" class="form-control" required="required">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED" >---</OPTION>
										<?php 
										$query ="SELECT county FROM counties";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option required="required"><?php echo $option['county']; ?> </option>
										<?php } ?>
										
									</SELECT></TD></TR>
							<TR><TD>Attachment</TD><TD><input type="file" name="file" id="file" required="required"></TD></TR>
							
							
							</TABLE>
							<br>
							<input type="submit"  value="SUBMIT" name="submit">
							           
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