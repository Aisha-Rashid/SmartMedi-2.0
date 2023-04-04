<?php
include('server.php');

// Starting the session, to use and
// store data in session variable
// session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['workID'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: AdminLogin.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['workID']);
  header("location: AdminLogin.php");
}
?>


<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
		<title>SmartMedi - Admin Dashboard</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="dashboardcss/templatemo_main.css">
		<link rel="shortcut icon" href="dashboardimages/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="dashboardimages/apple-touch-icon.png">
		<link rel="stylesheet" href="dashboardcss/custom.css">
		<!--Password eye icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		
	</head>
 <?php if (isset($_SESSION['workID'])) :
//include ('data-visualization.php');

    $unique = $_SESSION['workID'];
?>
	<body>
 

<?php 
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
//Doctor's details
if(isset($_POST['submit'])!=""){
		
	$current_password = mysqli_real_escape_string($db, $_POST['current_password']);
	$new_password = mysqli_real_escape_string($db, $_POST['new_password']);
	$conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);
	
	
	if (!empty($current_password)) {
		
			if ($new_password == $conf_password) {
				
				$enc_password = md5($new_password);
				$query=$conn->query("UPDATE admin SET adminpass='$enc_password' WHERE workID='$unique' ");
				
			}
			 else {
      echo "Error: new password and confirm password do not match.";
			
			
		}
	
	}
	
	
	if($query){
header("location:admindash.php");
}
else{
die(mysqli_error($conn));
}
}

?>


		<!-- Start Preferences -->
		<div id="main-wrapper">
			<div class="template-page-wrapper">
				
				<div class="templatemo-content-wrapper">
					<div class="templatemo-content">
						<!--ol class="breadcrumb">
					<li>Dashboard</a></li>
					<li>Settings</li>
					</ol-->
				
					<div class="row">
		  <div class="col-md-12 col-sm-12">
		  	
              
							<form id="personal-details" method="post" action="">
								<table width = 70%>
								
									<tr><td colspan = "2" ><h4><u><b>Change Password </b></u></h4></td></tr>
									<tr><td><h4>Enter current password :</h4></td><td><input type="password" class="form-control" id="current_password" name="current_password">
									<span toggle="#current_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
									<tr><td><h4>New Password :</h4></td><td><input type="password" class="form-control" name="new_password" id="new_password">
									<span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
									<tr><td><h4>Confirm Password :</h4></td><td><input type="password" class="form-control" name="conf_password" id="conf_password">
									<span toggle="#conf_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
									
								</table>
								<br><br>
								<button type="submit" class="btn btn-primary" name="submit">Submit</button>
								</form>
						</div>
					
							
			  </div>
			
			  </div>
		  
                
            </div>
          </div>
</div>





				<!-- Start popup -->
				<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
							</div>
							<div class="modal-footer">
								<a href="DocSettings.php?logout='1'" class="btn btn-primary">Yes</a>
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
			$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
		</script>
	<?php endif ?>
	</body>

	</html>