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
    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php if (isset($_SESSION['IDNo'])) : 
   
   
   $unique = $_SESSION['IDNo'];
   
  
$query = "SELECT * FROM `response` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   if($res->num_rows >= 1) {
	   echo"<script>alert('Record already exists. To edit, visit the Settings page'); window.location.href ='/SmartMedi-2.0/PHPtrials-smartmedi/dashboard.php'; </script>";
   }
   else{
$con=mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi')or die("cannot connect");//connection string  
if(isset($_POST['sub'])!=""){
	
	$allergies = mysqli_real_escape_string($db, $_POST['allergies']);
	$notes = mysqli_real_escape_string($db, $_POST['notes']);
	$checkbox1=$_POST['quiz']; 
	
	$chk="";  
	foreach($checkbox1 as $chk1)  
	   {  
		  $chk .= $chk1.", ";  
	   }  
	$in_ch=mysqli_query($con,"insert into response(IDNo, conditions, allergies, notes) values ('$unique','$chk', '$allergies','$notes')");
  
	if($in_ch==1)  
	   {  
		  echo"<script>alert('Inserted Successfully')</script>"; 
header("location:dashboard.php");		  
	   }  
	
	else{
die(mysqli_error($conn));
   }}}?>  
	
	
  


	<!-- LOADER -->
    <div id="preloader">
		<div class="loader">
			<img src="images/preloader.gif" alt="" />
		</div>
    </div>
    <!-- END LOADER -->
	
	<!-- Start Medical -->
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<h3><i><b>Please fill the form below:</b></i></h3>
					<p><i>Ask a doctor for assistance if needed</i></P>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" action="" method="post">
							<TABLE width=100%>
										
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><b><u>Part A: Allergies</u></b></i></h3></TD></TR>
								
								</TABLE>
								<textarea id="allergies" name="allergies" rows="5" cols="160" placeholder="please supply full details of what you are allergic to"></textarea>
								
								<TABLE width=100%>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><b><u>Part B: Medical History</u></b></i></h3></TD></TR>
								<TR><TD colspan="2"><i>Have <u>you</u> or <u>any other family member</u> ever had(been diagnosed and/or treated for) any of the following medical conditions? Kindly check all that applies<br>
								<b>Note:</b> if any of the questions is checked, you will be required to provide full details of the medical condition.</i></TD></TR>
								
								<TR><TD width = 80%><b>1.</b> Cancer, growths or tumors whether benign or malignant.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Cancer, growths or tumors"></TD></TR>
										<TR><TD></TD><TD></TD></TR>
										
								<TR><TD><b>2.</b> Cardiovascular (heart and blood vessels) disorders including high blood pressure, heart disease, deep venous thrombosis (DVT), congenital heart disease,
											chest pain, coronery artery disease/ ischaemic heart disease, valvular heart disease, arrhythmias, varicose veins, coronary artery stenting, peripheral artery
											disease, aneurysm, palpitations, rheumatic fever and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Cardiovascular (heart and blood vessels) disorders"></TD></TR>
										<TR><TD></TD><TD></TD></TR>
										
								<TR><TD><b>3.</b> Respiratory and Ear Nose and Throat (ENT) disorders including asthma, tuberculosis, hearing and speech imapirment, adenoids, cleft lip and palate, tonsils, nose 
											injuries, nose bleeding, sinus, cigarette smoking bronchitis, allergic rhinitis, chronic obstructive pulmonary disease and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Respiratory and Ear Nose and Throat (ENT) disorders"></TD></TR>
										
								<TR><TD><b>4.</b> Endocrine disorders including high cholestrol, diabetes, thyroid abnormalities, obesity, hormonal imbalances, diabetic coma and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Endocrine disorders"></TD></TR>
										
								<TR><TD><b>5.</b> Eye related disorders including glaucoma, blindness, cataracts, renitis pigmentosa, lens implants, laser eye surgery, retinoblastoma and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Eye related disorders"></TD></TR>
										
								<TR><TD><b>6.</b> Gastro-intestinal disorders including peptic ulcer disease, heartburn, reflux, dyspepsia, haemorrhoids,pancreatis, gall bladder disease, hepatitis, hernias, anal 
											fissures, rectal bleeding and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Gastro-intestinal disorders"></TD></TR>
										
								<TR><TD><b>7.</b> Gynaecological and Obstetric disorders including caesarian section complications, fibroids, ovarian cysts, infertility, pelvic inflammatory disease, menstrual 
											irregularities, abnormal pap smear, hormonal treatment, miscarriages, endometriosis and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Gynaecological and Obstetric disorders"></TD></TR>
											
								<TR><TD><b>8.</b> Genitourinary disorders including enlarged postrate, kidney failure, on dialysis, kidney stones, bladder disorders, pyelonephritis, syphilis, gonorrhea, chlamydia 
											genital herpes and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Genitourinary disorders"></TD></TR>
										
								<TR><TD><b>9.</b> Musculoskeletal disorders including arthritis, gout, back problems, physical disabilities, joint problems, sporting injuries, osteoporosis, scoliosis, kyphosis 
											and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Musculoskeletal disorders"></TD></TR>
										
								<TR><TD><b>10.</b> Neurological and psychological disorders including epilepsy, mental disabilities, paralysis, schizophrenia, depression, bipolar disorder, panic attack, personality
											disorder, anxiety, attention deficit disorder, post traumatic stress disorder, anorexia nervosa, bulimia, alcohol or drug dependency/ addiction and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Neurological and psychological disorders"></TD></TR>
											
								<TR><TD><b>11.</b> Blood and connective tissue disorder including leukemia, HIV and AIDS, Systemic lupus erythematosus (SLE) and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Blood and connective tissue disorder"></TD></TR>
										
								<TR><TD><b>12.</b> Congenital/inherited/hereditary disorders including birth defects, sickle cell disease, umbilical hernia and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Congenital/inherited/hereditary disorders"></TD></TR>
								
								<TR><TD><b>13.</b> Skin disorders including eczema keloids, warts, acne, moles, melanoma, skin cancer, hypertrophic scars, burns and any other.</TD>
										<TD align = "left"><input type="checkbox" name="quiz[]" value="Skin disorders"></TD></TR>
										
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h4><i><b>If you checked any of the above questions in Part B, please supply full details below</b></i></h4></TD></TR>
							</TABLE>
							<textarea id="notes" name="notes" rows="5" cols="160" placeholder="notes"></textarea>
							<br>
							<button type="submit" class="btn"
										name="sub">Submit</button>
							           
						</form>
						
					</div>
				</div>
			</div>
		</div>

	<!-- End Medical -->	
	
	<a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery.min.js"></script>
	
	<script src="js/bootstrap.min.js"></script>
	
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