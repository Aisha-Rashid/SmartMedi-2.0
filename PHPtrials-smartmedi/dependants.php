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

// if (isset($_POST['kidData'])) {
    // $num_boxes = $_POST['num_boxes']; 
    
    // $query = "INSERT INTO dependants (IDNo, kidName, kidDOB, kidGender, kidBlood, kidAllergies, kidConditions) VALUES ('$unique', ?, ?, ?, ?, ?, ?)";
    // $stmt = $conn->prepare($query);

    // for ($i = 1; $i <= $num_boxes; $i++) {
        // if (isset($_POST['box_' . $i])) {
            // $box_name = $_POST['box_name' . $i];
            // $box_DOB = $_POST['box_DOB' . $i];
            // $box_gender = $_POST['box_gender' . $i];
            // $box_blood = $_POST['box_blood' . $i];
            // $box_allergies = $_POST['box_allergies' . $i];
            // $box_conditions = $_POST['box_conditions' . $i];
            // $spousename = $_POST['spousename'];
            // $spousetel = $_POST['spousetel'];

            // $stmt->execute([$unique, $box_name, $box_DOB, $box_gender, $box_blood, $box_allergies, $box_conditions]);
            // if ($stmt->rowCount() > 0) {
                // echo "Box $i value saved successfully.<br>";
            // } else {
                // error_log("Error inserting into dependants table: " . $stmt->errorInfo()[2]);
                // echo "Error: Unable to save box $i value.";
            // }
        // }
    // }
// }
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
					<h3><b>Dependants Details</b></h3>
					<hr>
					<div class="contact-block">
						<form class="form-horizontal templatemo-signin-form" action="" method="post">
															
								<!--TABLE width=100%>
								<TR><TD >Spouse Full Name</TD><TD><input type="text" class="form-control"  name="spousename" placeholder="---" ></TD></TR>
								<TR><TD >Spouse Telephone Number</TD><TD><input type="number" class="form-control"  name="spousetel" placeholder="---" ></TD></TR>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><p><b>Minors details (under 18 years of age) will be under the parent's account</b></p></TD></TR>
								</TABLE-->
								<label for="num_boxes">Enter the number of children:</label><input type="number" name="num_boxes" id="num_boxes">
								<button type="submit">Submit</button><hr>
								<a href="dashboard.php" class="btn btn-info"><b>Back to Dashboard</b></a>
								</form>
								
								<?php
								if (isset($_POST['num_boxes'])) {
								  $num_boxes = $_POST['num_boxes'];
								  echo '<form method="post" action="">';
								  for ($i = 1; $i <= $num_boxes; $i++) {
									  ?>
								<TABLE width=100%>
								<TR bgcolor="#d3fcf3"><TD colspan="2"><p><b><?php echo $i ?></b></p></TD></TR>
								<TR><TD><?php echo '<label for="box_' . $i . '"> Full Name:</label>'; ?></TD><TD><?php echo '<input type="text" name="box_name' . $i . '" id="box_' . $i . '" class="form-control">';?></TD></TR> 
								<TR><TD><?php echo '<label for="box_' . $i . '">Date of Birth :</label>';?></TD><TD><?php echo '<input type="date" name="box_DOB' . $i . '" id="box_' . $i . '" class="form-control">';?></TD></TR>
								<TR><TD><?php echo '<label for="box_' . $i . '">Gender:</label>';?></TD><TD><?php echo '<input type="text" name="box_gender' . $i . '" id="box_' . $i . '" class="form-control">';?></TD></TR>
								<TR><TD><?php echo '<label for="box_' . $i . '">Blood Group:</label>';?></TD><TD><?php echo '<input type="text" name="box_blood' . $i . '" id="box_' . $i . '" class="form-control">';?></TD></TR>
								<TR><TD><?php echo '<label for="box_' . $i . '">Allergies:</label>';?></TD><TD><?php echo '<input type="text" name="box_allergies' . $i . '" id="box_' . $i . '" class="form-control">';?></TD></TR>
								<TR><TD><?php echo '<label for="box_' . $i . '">Medical Conditions:</label>';?></TD><TD><?php echo '<input type="text" name="box_conditions' . $i . '" id="box_' . $i . '" class="form-control">';?></TD></TR>
								</TABLE>
									
								<?php	
								}
								  echo '<button type="submit" name="kidData">Submit Data</button>';
								  
								 if (isset($_POST['kidData'])) {
    //$num_boxes = $_POST['num_boxes']; 
    
    $query = "INSERT INTO dependants (name, dob, gender, blood_group, medical_conditions) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    for ($i = 1; $i <= $num_boxes; $i++) {
        if (isset($_POST['box_' . $i])) {
            $box_name = $_POST['box_name' . $i];
            $box_DOB = $_POST['box_DOB' . $i];
            $box_gender = $_POST['box_gender' . $i];
            $box_blood = $_POST['box_blood' . $i];
            $box_allergies = $_POST['box_allergies' . $i];
            $box_conditions = $_POST['box_conditions' . $i];
            // $spousename = $_POST['spousename'];
            // $spousetel = $_POST['spousetel'];

            $stmt->execute([$unique, $box_name, $box_DOB, $box_gender, $box_blood, $box_allergies, $box_conditions]);
            if ($stmt->rowCount() > 0) {
                echo "Box $i value saved successfully.<br>";
            } else {
                error_log("Error inserting into dependants table: " . $stmt->errorInfo()[2]);
                echo "Error: Unable to save box $i value.";
            }
        }
    } 
	}							  
								  
								  
								  echo '</form>';
								}
								?>
								
								
								
							
							
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