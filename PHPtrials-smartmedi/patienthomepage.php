<?php
include('signin.php'); 

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
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>SmartMedi User Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="dashboardcss/templatemo_main.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="shortcut icon" href="dashboardimages/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="dashboardimages/apple-touch-icon.png">
 
</head>
<body>
<?php if (isset($_SESSION['IDNo'])) : 
   
   
   $unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   //echo $array[1];
   
   ?>
   <?php
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      // Get the file details
      $fileName = basename($_FILES['image']['name']);
      $fileSize = $_FILES['image']['size'];
      $fileType = $_FILES['image']['type'];
      $tmpName  = $_FILES['image']['tmp_name'];

      // Validate the file type
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (!in_array($fileType, $allowedTypes)) {
        // Display an error message
        echo 'Error: Only JPEG, PNG, and GIF files are allowed';
        exit;
      }

      // Validate the file size
      if ($fileSize > 500000) {
        // Display an error message
        echo 'Error: File size must be less than 500KB';
        exit;
      }

      // Generate a unique filename
      $fileName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

      // Save the uploaded file
      move_uploaded_file($tmpName, "files/$fileName");

	  $query=$conn->query("INSERT INTO patients (pic) VALUES ('$fileName')");

      // Display a success message
      echo 'File uploaded successfully';
    } else {
      // Display an error message
      echo 'Error: No file was uploaded';
    }
  }
?>
  

<!-- Start menu -->
    <div class="template-page-wrapper">
		<div class="navbar-collapse collapse templatemo-sidebar">
			<ul class="templatemo-sidebar-menu">
				<li>
				
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
				<li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="sub">
				<a href="javascript:;">
				<i class="fa fa-database"></i> Menu <div class="pull-right"><span class="caret"></span></div>
				</a>
				<ul class="templatemo-submenu">
				
				<li><a href="attachments.php">Attachments</a></li>
				<li><a href="appointment.php">Appointments</a></li>
				</ul>
				</li>
				<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			<ol class="breadcrumb">
            <li>Patient Panel</a></li>
           
            <li>Overview</li>
			</ol>
			

<!-- Content start -->










<!-- Content end-->
           
    		</div>
		</div>
    </div>
</section>

 	
	<!-- End menu    -->	  
		  	  
    <!-- Start popup -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
					</div>
					<div class="modal-footer">
					<a href="dashboard.php?logout='1'" class="btn btn-primary">Yes</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
	<!-- End popup -->

    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	<script src="dashboardjs/Graph.js"></script>
    <script type="text/javascript"></script>
	
	<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<?php endif ?>   
</body>
</html>
