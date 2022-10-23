<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
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
	 <!-- table CSS -->
    <link rel="stylesheet" href="css/table.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php if (isset($_SESSION['username'])) : ?>

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
					<h3><i><b>Please fill the form below:</b></i></h3>
					<p><i>Ask a doctor for assistance if needed</i></P>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" action="mediform.php" method="post">
							<TABLE>
								<TR><TD>Marital Status</TD><TD>
									<SELECT NAME="SUBJECT" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>  
										<OPTION VALUE="SUBJECT">Single
										<OPTION VALUE="SUBJECT">Married
										<OPTION VALUE="SUBJECT">Divorced
										<OPTION VALUE="SUBJECT">Widowed<BR>
									</SELECT></TD></TR>
								<TR><TD >Number of children</TD><TD><input type="text" class="form-control" name="FirstName" placeholder="---" ><!--value="<-?php echo $children; ?>"--> </TD></TR>
								<TR><TD >Town</TD><TD><input type="text" class="form-control" id="town" name="town" placeholder="---"></TD></TR>
								<TR><TD >County</TD><TD>
									<SELECT NAME="SUBJECT" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>  
										<OPTION VALUE="SUBJECT">Nairobi
										<OPTION VALUE="SUBJECT">Kisumu
										<OPTION VALUE="SUBJECT">Mombasa
										<OPTION VALUE="SUBJECT">Kakamega
										<OPTION VALUE="SUBJECT">---<BR>
									</SELECT></TD></TR>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><b><u>Part A: Insurance Details</u></b></i></h3></TD></TR>
								<TR><TD >NHIF Number</TD><TD><input type="number" class="form-control" id="nhif" name="nhif" placeholder="---" ></TD></TR>
								<TR><TD >Do you have any other Insurance?</TD><TD align="right"><INPUT TYPE="radio" NAME="insurance" VALUE="yes">Yes<INPUT TYPE="radio" NAME="insurance" VALUE="no">No</TD></TR>
								<TR><TD >Insurance Provider</TD><TD><input type="text" class="form-control" id="insname" name="insname" placeholder="---" ></TD></TR>
								<TR><TD >Principal Member</TD><TD><input type="text" class="form-control" id="principalname" name="principalname" placeholder="---" ></TD></TR>
								<TR><TD >Member Number</TD><TD><input type="number" class="form-control" id="membernumber" name="membernumber" placeholder="---" ></TD></TR>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><b><u>Part B: Next of kin Details</u></b></i></h3></TD></TR>
								<TR><TD >Name</TD><TD><input type="text" class="form-control" id="nokname" name="nokname" placeholder="---" ></TD></TR>
								<TR><TD >Relationship</TD><TD>
									<SELECT NAME="SUBJECT" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>  
										<OPTION VALUE="SUBJECT">Parent
										<OPTION VALUE="SUBJECT">Husband/Wife
										<OPTION VALUE="SUBJECT">Brother/Sister
										<OPTION VALUE="SUBJECT">Son/Daughter
										<OPTION VALUE="SUBJECT">Relative
										<OPTION VALUE="SUBJECT">Guardian<BR>
									</SELECT></TD></TR>
								<TR><TD >Telephone Number</TD><TD><input type="tel" class="form-control" id="noktel" name="noktel" placeholder="---" ></TD></TR>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><b><u>Part C: Family Member Details(for children under 18 years)</u></b></i></h3></TD></TR>
								<TR><TD >Name</TD><TD><input type="text" class="form-control" id="kidname" name="kidname" placeholder="---" ></TD></TR>
								<TR><TD>Gender</TD><TD align="right"><INPUT TYPE="radio" NAME="kidgender" VALUE="Male">Male<INPUT TYPE="radio" NAME="kidgender" VALUE="FEMALE">Female</TD></TR>
								<TR><TD >Date of birth</TD><TD><input type="date" id="date" class="form-control" name="kiddateofbirth" placeholder=""></TD></TR>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><b><u>Part D: Medical History</u></b></i></h3></TD></TR>
								<TR><TD colspan="2"><i>Have <u>you</u> or <u>any other family member</u> ever had(been diagnosed and/or treated for) any of the following medical conditions?<br>
								<b>Note:</b> if the answer is <b>YES</b> to any of the questions which follow, you will be required to provide full details of the medical condition.</i></TD></TR>
								<TR><TD><b>1.</b> Cancer, growths or tumors whether benign or malignant.</TD><TD align="right"><INPUT id="qn1" TYPE="radio" NAME="qn1" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn1" VALUE="no">No</TD></TR>
								<TR><TD><b>2.</b> Cardiovascular (heart and blood vessels) disorders including high blood pressure, heart disease, deep venous thrombosis (DVT), congenital heart disease,
											chest pain, coronery artery disease/ ischaemic heart disease, valvular heart disease, arrhythmias, varicose veins, coronary artery stenting, peripheral artery
											disease, aneurysm, palpitations, rheumatic fever and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn2" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn2" VALUE="no">No</TD></TR>
								<TR><TD><b>3.</b> Respiratory and Ear Nose and Throat (ENT) disorders including asthma, tuberculosis, hearing and speech imapirment, adenoids, cleft lip and palate, tonsils, nose 
											injuries, nose bleeding, sinus, cigarette smoking bronchitis, allergic rhinitis, chronic obstructive pulmonary disease and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn3" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn3" VALUE="no">No</TD></TR>
								<TR><TD><b>4.</b> Endocrine disorders including high cholestrol, diabetes, thyroid abnormalities, obesity, hormonal imbalances, diabetic coma and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn4" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn4" VALUE="no">No</TD></TR>
								<TR><TD><b>5.</b> Eye related disorders including glaucoma, blindness, cataracts, renitis pigmentosa, lens implants, laser eye surgery, retinoblastoma and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn5" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn5" VALUE="no">No</TD></TR>
								<TR><TD><b>6.</b> Gastro-intestinal disorders including peptic ulcer disease, heartburn, reflux, dyspepsia, haemorrhoids,pancreatis, gall bladder disease, hepatitis, hernias, anal 
											fissures, rectal bleeding and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn6" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn6" VALUE="no">No</TD></TR>
								<TR><TD><b>7.</b> Gynaecological and Obstetric disorders including caesarian section complications, fibroids, ovarian cysts, infertility, pelvic inflammatory disease, menstrual 
											irregularities, abnormal pap smear, hormonal treatment, miscarriages, endometriosis and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn7" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn7" VALUE="no">No</TD></TR>
								<TR><TD><b>8.</b> Genitourinary disorders including enlarged postrate, kidney failure, on dialysis, kidney stones, bladder disorders, pyelonephritis, syphilis, gonorrhea, chlamydia 
											genital herpes and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn8" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn8" VALUE="no">No</TD></TR>
								<TR><TD><b>9.</b> Musculoskeletal disorders including arthritis, gout, back problems, physical disabilities, joint problems, sporting injuries, osteoporosis, scoliosis, kyphosis 
											and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn9" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn9" VALUE="no">No</TD></TR>
								<TR><TD><b>10.</b> Neurological and psychological disorders including epilepsy, mental disabilities, paralysis, schizophrenia, depression, bipolar disorder, panic attack, personality
											disorder, anxiety, attention deficit disorder, post traumatic stress disorder, anorexia nervosa, bulimia, alcohol or drug dependency/ addiction and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn10" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn10" VALUE="no">No</TD></TR>
								<TR><TD><b>11.</b> Blood and connective tissue disorder including leukemia, HIV and AIDS, Systemic lupus erythematosus (SLE) and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn11" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn11" VALUE="no">No</TD></TR>
								<TR><TD><b>12.</b> Congenital/inherited/hereditary disorders including birth defects, sickle cell disease, umbilical hernia and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn12" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn12" VALUE="no">No</TD></TR>
								<TR><TD><b>13.</b> Skin disorders including eczema keloids, warts, acne, moles, melanoma, skin cancer, hypertrophic scars, burns and any other.</TD><TD align="right"><INPUT TYPE="radio" NAME="qn13" VALUE="yes">Yes<INPUT TYPE="radio" NAME="qn13" VALUE="no">No</TD></TR>
								<TR><TD colspan="2"><h3><i><u>If you anwered <b>YES</b> to any of the above, please supply full details below</u></i></h3></TD></TR>
								<TR><TD><input type="text" class="form-control" id="mname" name="mname" placeholder="Condition"></TD>
								<TD>
									<SELECT NAME="SUBJECT" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">Question number</OPTION>  
										<OPTION VALUE="SUBJECT">1
										<OPTION VALUE="SUBJECT">2
										<OPTION VALUE="SUBJECT">3
										<OPTION VALUE="SUBJECT">4
										<OPTION VALUE="SUBJECT">5
										<OPTION VALUE="SUBJECT">6
										<OPTION VALUE="SUBJECT">7
										<OPTION VALUE="SUBJECT">8
										<OPTION VALUE="SUBJECT">9
										<OPTION VALUE="SUBJECT">10
										<OPTION VALUE="SUBJECT">11
										<OPTION VALUE="SUBJECT">12
										<OPTION VALUE="SUBJECT">13<br>
									</SELECT></TD></TR>
								<TR><TD><input type="text" class="form-control" id="mname" name="mname" placeholder="Condition"></TD>
								<TD>
									<SELECT NAME="SUBJECT" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">Question number</OPTION>  
										<OPTION VALUE="SUBJECT">1
										<OPTION VALUE="SUBJECT">2
										<OPTION VALUE="SUBJECT">3
										<OPTION VALUE="SUBJECT">4
										<OPTION VALUE="SUBJECT">5
										<OPTION VALUE="SUBJECT">6
										<OPTION VALUE="SUBJECT">7
										<OPTION VALUE="SUBJECT">8
										<OPTION VALUE="SUBJECT">9
										<OPTION VALUE="SUBJECT">10
										<OPTION VALUE="SUBJECT">11
										<OPTION VALUE="SUBJECT">12
										<OPTION VALUE="SUBJECT">13<br>
									</SELECT></TD></TR>
						
								<TR><TD><input type="text" class="form-control" id="mname" name="mname" placeholder="Condition"></TD>
								<TD>
									<SELECT NAME="SUBJECT" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">Question number</OPTION>  
										<OPTION VALUE="SUBJECT">1
										<OPTION VALUE="SUBJECT">2
										<OPTION VALUE="SUBJECT">3
										<OPTION VALUE="SUBJECT">4
										<OPTION VALUE="SUBJECT">5
										<OPTION VALUE="SUBJECT">6
										<OPTION VALUE="SUBJECT">7
										<OPTION VALUE="SUBJECT">8
										<OPTION VALUE="SUBJECT">9
										<OPTION VALUE="SUBJECT">10
										<OPTION VALUE="SUBJECT">11
										<OPTION VALUE="SUBJECT">12
										<OPTION VALUE="SUBJECT">13<br>
									</SELECT></TD></TR>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><h3><i><u>Allergies</u></i></h3></TD></TR>
								<TR><TD ROWSPAN="5"><i>please supply full details of what you are allergic to</i></TD><TD><input type="text" class="form-control" id="allergy1" name="allergy" placeholder="---"></TD></TR>
								<TR><TD><input type="text" class="form-control" id="allergy2" name="allergy" placeholder="---" ></TD></TR>
								<TR><TD><input type="text" class="form-control" id="allergy3" name="allergy" placeholder="---" ></TD></TR>
								<TR><TD><input type="text" class="form-control" id="allergy4" name="allergy" placeholder="---" ></TD></TR>
								<TR><TD><input type="text" class="form-control" id="allergy5" name="allergy" placeholder="---" ></TD></TR>
							</TABLE>
							<div class="row">	  	
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-sm-offset-2 col-sm-10" >
										<button type="submit" class="btn"
										name="update">Update</button>
										<input type="submit" value="Update" class="btn btn-default">
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