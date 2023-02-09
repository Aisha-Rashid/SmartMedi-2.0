<?php
include('server.php');

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['nationalid'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: DocLogin.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy(); 
	unset($_SESSION['nationalid']);
	header("location: DocLogin.php");
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
		
	</head>

	<body>
<?php if (isset($_SESSION['nationalid'])) :

	$unique = $_SESSION['nationalid'];
   $query = "SELECT * FROM `doctors` WHERE nationalid = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
?>
<?php 
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
//Doctor's details
if(isset($_POST['submit'])!=""){
		
	$hospital = mysqli_real_escape_string($db, $_POST['hospital']);
	$workid = mysqli_real_escape_string($db, $_POST['workid']);
	$specialty = mysqli_real_escape_string($db, $_POST['specialty']);
	$current_password = mysqli_real_escape_string($db, $_POST['current_password']);
	$new_password = mysqli_real_escape_string($db, $_POST['new_password']);
	$conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);
	
	if (!empty($hospital)) {
	$query=$conn->query("update doctors set hospital='$hospital' where nationalid='$unique'");
	}
	if (!empty($workid)) {
	$query=$conn->query("update doctors set workid='$workid' where nationalid='$unique'");
	}
	if (!empty($specialty)) {
	$query=$conn->query("update doctors set specialty='$specialty' where nationalid='$unique'");
	}
	if (!empty($current_password)) {
		
			if ($new_password == $conf_password) {
				
				$enc_password = md5($new_password);
				$query=$conn->query("UPDATE doctors SET password='$enc_password' WHERE nationalid='$unique' ");
				
			}
			 else {
      echo "Error: new password and confirm password do not match.";
			
			
		}
	
	}
	
	
	if($query){
header("location:DocDashboard.php");
}
else{
die(mysqli_error($conn));
}
}

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
						<li><a href="DocDashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
						
						<li class="active"><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
						<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
					</ul>
				</div>
				<div class="templatemo-content-wrapper">
					<div class="templatemo-content">
						<ol class="breadcrumb">
					<li>Dashboard</a></li>
					<li>Settings</li>
					</ol>
				
					<div class="row">
		  <div class="col-md-12 col-sm-12">
		  	
              
							<form id="personal-details" method="post" action="">
								<table width = 70%>
								
									<tr><td colspan = "2" ><h4><u><b>User Details</b></u></h4></td></tr>
									<tr><td><h4>Workplace :</h4></td>
									<td>
									<SELECT NAME="hospital" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT hospitalname FROM hospitals";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['hospitalname']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Work ID :</h4></td><td><input type="number" class="form-control" name="workid"></td></tr>
									<tr><td><h4>Specialty :</h4></td>
									<td>
									<SELECT NAME="specialty" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT specialty FROM docspecialty";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['specialty']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td colspan = "2" ><h4><u><b>Change Password </b></u></h4></td></tr>
									<tr><td><h4>Enter current password :</h4></td><td><input type="password" class="form-control" name="current_password"></td></tr>
									<tr><td><h4>New Password :</h4></td><td><input type="password" class="form-control" name="new_password"></td></tr>
									<tr><td><h4>Confirm Password :</h4></td><td><input type="password" class="form-control" name="conf_password"></td></tr>
									
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
			var coll = document.getElementsByClassName("collapsible");
			var i;

			for (i = 0; i < coll.length; i++) {
				coll[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var content = this.nextElementSibling;
					if (content.style.maxHeight) {
						content.style.maxHeight = null;
					} else {
						content.style.maxHeight = content.scrollHeight + "px";
					}
				});
			}

			var loadFile = function(event) {
				var image = document.getElementById("output");
				image.src = URL.createObjectURL(event.target.files[0]);
			};
		</script>
	<?php endif ?>
	</body>

	</html>