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
  <link rel="shortcut icon" href="dashboardimages/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="dashboardimages/apple-touch-icon.png">
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<body>
<?php if (isset($_SESSION['IDNo'])) : 
   
   
   $unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   
   ?>
	<!-- Start Preferences -->
	<div id="main-wrapper">
		<div class="template-page-wrapper">
			<div class="navbar-collapse collapse templatemo-sidebar">
				<ul class="templatemo-sidebar-menu">
				<li>
				<form class="navbar-form">
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				</form>
				</li>
				<li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="sub">
				<a href="javascript:;">
				<i class="fa fa-database"></i> Menu <div class="pull-right"><span class="caret"></span></div>
				</a>
				<ul class="templatemo-submenu">
				
				<li><a href="attachments.php">Attachments</a></li>
				<li><a href="appointment.php">Appointments</a></li>
				</ul>
				</li>
				<li class="active"><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
				</ul>
			</div>
			<div class="templatemo-content-wrapper">
				<div class="templatemo-content">
					<!--ol class="breadcrumb">
					<li><a href="dashboard.php">User Panel</a></li>
					<li><a href="#">Settings</a></li>
					</ol-->
					<div class="row">
						<div class="col-md-12">
							<form role="form" id="templatemo-preferences-form">
								<div class="row">
									
									<h2>Settings</h2>
									
									
								<hr>
								
								<label class="collapsible">Update Profile Picture</label>
								<div class="content">
								<input type="file" id="myFile" name="filename"><br><input type="submit">
								</div>
								<hr>
								<label class="collapsible">Update medical history details</label>
								<div class="content">
								<input type="file" id="myFile" name="filename"><br><input type="submit">
								</div>
								<hr>
								<label class="collapsible">Update medical history details</label>
								<div class="content">
								<input type="password" class="form-control" name="password1" placeholder ="Password"><br><input type="submit">
								</div>
								<hr>
							
								<div class="row">
									<div class="col-md-10 margin-bottom-1">
									<h3>Update medical history details</h3><br>
									<a href = "mediform.php">Update details</a>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-10 margin-bottom-1">
									<h3>Change Password</h3><br>
									<label>Password</label>
									<div class="form-group">
									<input type="password" class="form-control" name="password1">                 
									</div>
									<label> Confirm Password</label>
									<div class="form-group">
									<input type="password" class="form-control" name="password2">
									</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6 margin-bottom-1">
									<h3>Upgrade Package</h3><br>
									<a href = "">Add Payment details</a>
									</div>
								</div>
								<hr>
								<div class="row templatemo-form-buttons">
									<div class="col-md-12">
									<button type="submit" class="btn btn-primary">Update</button>
									<button type="reset" class="btn btn-default">Reset</button>    
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- Start menu -->

		<!-- Start popup -->
			<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
						</div>
						<div class="modal-footer">
						<a href="appointment.php?logout='1'" class="btn btn-primary">Yes</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						</div>
					</div>
				</div>
			</div>
		<!-- End popup -->		
		</div>
	</div>
	<!-- ALL JS FILES -->	
    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	<script src="dashboardjs/Graph.js"></script>
	<script src="dashboardjs/appointment.js"></script>
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

var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

</script>
<?php endif ?> 
</body>
</html>