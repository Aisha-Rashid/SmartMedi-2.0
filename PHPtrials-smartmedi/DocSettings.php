<?php
include('server.php');

if (!isset($_SESSION['nationalid'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: DocLogin.php');
}

if (isset($_GET['logout'])) {
	session_destroy(); 
	unset($_SESSION['nationalid']);
	header("location: DocLogin.php");
}
?>

<html>
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
		<link rel="stylesheet" href="dashboardcss/custom.css">
		<!--Password eye icon->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"-->
		
	</head>

	<body>
<?php if (isset($_SESSION['nationalid'])) :

	$unique = $_SESSION['nationalid'];
   $query = "SELECT * FROM `doctors` WHERE nationalid = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   
   if(isset($_POST['submit'])!=""){
		
	$hospital = mysqli_real_escape_string($db, $_POST['hospital']);
	$workid = mysqli_real_escape_string($db, $_POST['workid']);
	$specialty = mysqli_real_escape_string($db, $_POST['specialty']);
	$current_password = mysqli_real_escape_string($db, $_POST['current_password']);
	$new_password = mysqli_real_escape_string($db, $_POST['new_password']);
	$conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);
	
	if (!empty($hospital)) {
	$query=mysqli_query($db,"update doctors set hospital='$hospital' where nationalid='$unique'");
	}
	if (!empty($workid)) {
	$query=mysqli_query($db,"update doctors set workid='$workid' where nationalid='$unique'");
	}
	if (!empty($specialty)) {
	$query=mysqli_query($db,"update doctors set specialty='$specialty' where nationalid='$unique'");
	}
	if (!empty($current_password)) {
		
			if ($new_password == $conf_password) {
				
				$enc_password = md5($new_password);
				$query=mysqli_query($db,"UPDATE doctors SET password='$enc_password' WHERE nationalid='$unique' ");
				
			}
			 else {
      echo "Error: new password and confirm password do not match.";
		}}
if($query){
header("location:DocDashboard.php");
}
else{
echo "Change Failure";}
}
?>



		<!-- Start Preferences -->
		<div id="main-wrapper">
			<div class="template-page-wrapper">
				<div class="navbar-collapse collapse templatemo-sidebar">
					<ul class="templatemo-sidebar-menu">
						<li>
							
								<img src="dashboardimages/favicon.ico" alt="Smartmedi">
							
						</li>
						<li><a href="DocDashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
						<li><a href="minors.php"><i class="fa fa-child"></i>Children Records</a></li>
						<li class="active"><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
						<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
					</ul>
				</div>
				<div class="templatemo-content-wrapper">
					<div class="templatemo-content">
						
				
			<div class="student-profile py-4">
  <div class="container">
		  	<div class="row">
              <div class="card shadow-sm">
         
		  <p><b>
		  Dr. 
						<?php 
            
            echo $array[2];
			echo " ";
			echo $array[3];?><br>
			<?php 
            
            echo $array[1];?><br>
			<?php 
            
            echo $array[6];?><br>
			<?php 
            
            echo $array[4];?><br>
		  </b></p>
          
        </div><hr>
							<form id="personal-details" method="post" action="">
								<table width = 70%>
								
									<tr><td colspan = "2" ><h4><u><b>User Details</b></u></h4></td></tr>
									<tr><td><p>Workplace :</p></td>
									<td>
									<SELECT NAME="hospital" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT hospital FROM hospitals";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['hospital']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><p>Work ID :</p></td><td><input type="number" class="form-control" name="workid"></td></tr>
									<tr><td><p>Specialty :</p></td>
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
									<tr><td><p>Enter current password :</p></td><td><input type="password" class="form-control" name="current_password" id="current_password">
									<span toggle="#current_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
									<tr><td><p>New Password :</p></td><td><input type="password" class="form-control" name="new_password" id="new_password">
									<span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
									<tr><td><p>Confirm Password :</p></td><td><input type="password" class="form-control" name="conf_password" id="conf_password">
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
			<footer class="templatemo-footer">
      <div class="templatemo-copyright">
        <p>Copyright &copy; 2022 SmartMedi</p>
      </div>
    </footer>	
				
				
				
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