<?php
include('server.php');

//$id = $_GET['id'];
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
<?php if (isset($_SESSION['IDNo'])) :



	$unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
	// echo $row;
	// while ($row = $res->fetch_array()) {
	// 	echo $row;}

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
<?php 
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
//Patients details
if(isset($_POST['sub1'])!=""){
		
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$TelNo = mysqli_real_escape_string($db, $_POST['TelNo']);
	$county = mysqli_real_escape_string($db, $_POST['county']);
	$town = mysqli_real_escape_string($db, $_POST['town']);
	$current_password = mysqli_real_escape_string($db, $_POST['current_password']);
	$new_password = mysqli_real_escape_string($db, $_POST['new_password']);
	$conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);
	
	
	
	if (!empty($email)) {
	$query=$conn->query("update patients set email='$email' where IDNo='$unique'");
	}
	if (!empty($TelNo)) {
	$query=$conn->query("update patients set TelNo='$TelNo' where IDNo='$unique'");
	}
	if (!empty($county)) {
	$query=$conn->query("update patients set county='$county' where IDNo='$unique'");
	}
	if (!empty($town)) {
	$query=$conn->query("update patients set town='$town' where IDNo='$unique'");
	}
	if (!empty($current_password)) {
		
			if ($new_password == $conf_password) {
				
				$enc_password = md5($new_password);
				$query=$conn->query("UPDATE patients SET password='$enc_password' WHERE IDNo='$unique' ");
				
			}
			 else {
      // Error: new password and confirm password do not match
      echo "Error: new password and confirm password do not match.";
			
			
		}
	
	}
	
	
	if($query){
header("location:dashboard.php");
}
else{
die(mysqli_error($conn));
}
}
//Next of kin details
if(isset($_POST['sub2'])!=""){
	
	$kinFirstName = mysqli_real_escape_string($db, $_POST['kinFirstName']);
	$kinLastName = mysqli_real_escape_string($db, $_POST['kinLastName']);
	$relationship = mysqli_real_escape_string($db, $_POST['relationship']);
	$telephone = mysqli_real_escape_string($db, $_POST['telephone']);
	
	if (!empty($kinFirstName) && !empty($kinLastName) && !empty($relationship) && !empty($telephone)) {
	$query=$conn->query("update nextofkin set kinFirstName='$kinFirstName', kinLastName='$kinLastName', relationship='$relationship', telephone='$telephone' where IDNo='$unique'");
	}
	
if($query){
header("location:preferences.php");
}
else{
die(mysqli_error($conn));
}	
}
//Medical records
if(isset($_POST['sub3'])!=""){
	
	$allergies = mysqli_real_escape_string($db, $_POST['allergies']);
	$condition1 = mysqli_real_escape_string($db, $_POST['condition1']);
	$condition2 = mysqli_real_escape_string($db, $_POST['condition2']);
	$condition3 = mysqli_real_escape_string($db, $_POST['condition3']);
	$condition4 = mysqli_real_escape_string($db, $_POST['condition4']);
	$condition5 = mysqli_real_escape_string($db, $_POST['condition5']);
	$notes = mysqli_real_escape_string($db, $_POST['notes']);
	
	if (!empty($allergies)) {
	$query=$conn->query("update response set allergies = CONCAT_WS(' ,', allergies, '$allergies') where IDNo='$unique'");
	}
	if (!empty($condition1)) {
	$query=$conn->query("update response set conditions = CONCAT_WS(' ,', conditions, '$condition1') where IDNo='$unique'");
	}
	if (!empty($condition2)) {
	$query=$conn->query("update response set conditions = CONCAT_WS(' ,', conditions, '$condition2') where IDNo='$unique'");
	}
	if (!empty($condition3)) {
	$query=$conn->query("update response set conditions = CONCAT_WS(' ,', conditions, '$condition3') where IDNo='$unique'");
	}
	if (!empty($condition4)) {
	$query=$conn->query("update response set conditions = CONCAT_WS(' ,', conditions, '$condition4') where IDNo='$unique'");
	}
	if (!empty($condition5)) {
	$query=$conn->query("update response set conditions = CONCAT_WS(' ,', conditions, '$condition5') where IDNo='$unique'");
	}
	if (!empty($notes)) {
	$query=$conn->query("update response set notes = CONCAT_WS(' ,',notes, '$notes') where IDNo='$unique'");
	}
	
if($query){
header("location:preferences.php");
}
else{
die(mysqli_error($conn));
}	
}
//Insurance Details
if(isset($_POST['sub4'])!=""){
	
	$insurancetype = mysqli_real_escape_string($db, $_POST['insurancetype']);
	$insurancenumber = mysqli_real_escape_string($db, $_POST['insurancenumber']);
	$insuranceprincipal = mysqli_real_escape_string($db, $_POST['insuranceprincipal']);
	$expiry = mysqli_real_escape_string($db, $_POST['expiry']);
	
	if (!empty($insurancetype) && !empty($insurancenumber) && !empty($insuranceprincipal) && !empty($expiry)) {
	$query=$conn->query("update medicalcover set insurancetype='$insurancetype', insurancenumber='$insurancenumber', insuranceprincipal='$insuranceprincipal', expiry='$expiry' where IDNo='$unique'");
	}
	
if($query){
header("location:preferences.php");
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
						<ol class="breadcrumb">
					<li>Patient Panel</a></li>
					<li>Settings</li>
					</ol>
						





					<div class="row">
		  <div class="col-md-12 col-sm-12">
		  <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                  <li class="active"><a href="#personal-details" role="tab" data-toggle="tab">Personal Details</a></li>
				  <li><a href="#nok" role="tab" data-toggle="tab">Next of Kin Details</a></li>
                  <li><a href="#records" role="tab" data-toggle="tab">Medical Records</a></li>
                  <li><a href="#insurance" role="tab" data-toggle="tab">Insurance Details</a></li>
                  <!--li><a href="#admin" role="tab" data-toggle="tab">Admin</a></li-->
                </ul>
				<!-- Tab panes -->	
                <div class="tab-content">
					<div class="tab-pane fade in active" id="personal-details">
						
						<div class="table-responsive">
							<!--h4 class="margin-bottom-15">Patients Table</h4-->
							<br>
							<form id="personal-details" method="post" action="">
								<table width = 70%>
								
									<tr><td colspan = "2" ><h4><u><b>Contact Details</b></u></h4></td></tr>
									<tr><td><h4>Current Email :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $array[8]?>"></b></td></tr>
									<tr><td><h4>New Email :</h4></td><td><input type="email" class="form-control" name="email"></td></tr>
									<tr><td><h4>Telephone Number :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $array[3]?>"></b></td></tr>
									<tr><td><h4>Add Telephone number :</h4></td><td><input type="text" class="form-control" name="TelNo"></td></tr>
									<tr><td colspan = "2" ><h4><u><b>Change Residence </b></u></h4></td></tr>
									<tr>
									<td><h4>County :</h4></td>
									<td>
									<SELECT NAME="county" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT county FROM counties";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['county']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Town :</h4></td><td><input type="text" class="form-control" name="town"></td></tr>
									<tr><td colspan = "2" ><h4><u><b>Change Password </b></u></h4></td></tr>
									<tr><td><h4>Enter current password :</h4></td><td><input type="password" class="form-control" name="current_password"></td></tr>
									<tr><td><h4>New Password :</h4></td><td><input type="password" class="form-control" name="new_password"></td></tr>
									<tr><td><h4>Confirm Password :</h4></td><td><input type="password" class="form-control" name="conf_password"></td></tr>
									
								</table>
								<br><br>
								<button type="submit" class="btn btn-primary" name="sub1">Submit</button>
								</form>
						</div>
					</div>
			  
					<div class="tab-pane fade" id="nok">
						
						<div class="table-responsive">
						
						<br>
							<form id="nok" method="post" action="">
								<table width = 70%>
								
								  
									<tr><td colspan = "2" ><h4><u><b>Current Details</b></u></h4></td></tr>
									<?php 
							$query="select * from nextofkin WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$kinFirstName=$row['kinFirstName'];
							$kinLastName=$row['kinLastName'];
							$relationship=$row['relationship'];
							$telephone=$row['telephone'];
							?>
									<tr><td><h4>Name :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['kinFirstName']; echo " "; echo $row['kinLastName']; ?>"></b></td></tr>
									<tr><td><h4>Relationship :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['relationship'] ?>"></b></td></tr>
									<tr><td><h4>Telephone Number :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['telephone'] ?>"></b></td></tr>
									<?php } ?> 
									<tr><td colspan = "2" ><h4><u><b>New Details </b></u></h4></td></tr>
									<tr><td><h4>First Name :</h4></td><td><input type="text" class="form-control" name="kinFirstName"></td></tr>
									<tr><td><h4>Last Name :</h4></td><td><input type="text" class="form-control" name="kinLastName"></td></tr>
									<tr><td><h4>Relationship :</h4></td><td>
									<SELECT NAME="relationship" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>  
										<OPTION VALUE="Parent">Parent
										<OPTION VALUE="Significant other">Significant other
										<OPTION VALUE="Sibling">Sibling
										<OPTION VALUE="Son/Daughter">Son/Daughter
										<OPTION VALUE="Relative">Relative
										<OPTION VALUE="Guardian">Guardian<BR>
									</SELECT>
									</td></tr>
									<tr><td><h4>Telephone Number :</h4></td><td><input type="text" class="form-control" name="telephone"></td></tr>
									
								</table>
								<br><br>
								<button type="submit" class="btn btn-primary" name="sub2">Submit</button>
								</form>
						</div>
					</div>
					<div class="tab-pane fade" id="records">
						
						<div class="table-responsive">
						<br>
							<form id="records" method="post" action="">
								<table width = 70%>
									<?php 
							$query="select * from response WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$allergies=$row['allergies'];
							$conditions=$row['conditions'];
							$notes=$row['notes'];
							?>
									<tr><td colspan = "2" ><h4><u><b>Allergies</b></u></h4></td></tr>
									<tr><td colspan = "2" ><b><textarea disabled id="allergies" name="allergies" rows="3" cols="120" placeholder="<?php echo $row['allergies'] ?>" ></textarea></b></td></tr>
									<tr><td colspan = "2" ><h4><u><b>Medical History</b></u></h4></td></tr>
									<tr><td colspan = "2" ><b><textarea disabled id="allergies" name="allergies" rows="5" cols="120" placeholder="<?php echo $row['conditions'] ."\n\n". $row['notes'] ; ?>" ></textarea></b></td></tr>
									<?php } ?> 
									<tr><td colspan = "2" ><h4><b>Add conditions</b></h4></td></tr>
									<tr><td><h4>Allergies :</h4></td><td><input type="text" name="allergies" class="form-control"></td></tr>
									<tr><td><h4>Condition 1 :</h4></td>
									<td>
									<SELECT NAME="condition1" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Condition 2 :</h4></td>
									<td>
									<SELECT NAME="condition2" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Condition 3 :</h4></td><td>
									<SELECT NAME="condition3" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Condition 4 :</h4></td><td>
									<SELECT NAME="condition4" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Condition 5 :</h4></td><td>
									<SELECT NAME="condition5" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT conditions FROM conditions";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['conditions']; ?> </option>
										<?php } ?>
										
									</SELECT>
									</td></tr>
									<tr><td colspan = "2" ><h4><b>Add notes for new conditions</b></h4></td></tr>
									<tr><td colspan = "2" ><b><textarea id="notes" name="notes" rows="5" cols="120" ></textarea></b></td></tr>
									
									
								</table>
								<br><br>
								<button type="submit" class="btn btn-primary" name="sub3">Submit</button>
								</form>
                
						</div>
					</div>
			  
			  <div class="tab-pane fade" id="insurance">
						
					<div class="table-responsive">
					<br>
						<form id="insurance" method="post" action="">
								<table width = 70%>
								  
								  <?php 
							$query="select * from medicalcover WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$nhiftype=$row['nhiftype'];
							$nhifnumber=$row['nhifnumber'];
							$insurancetype=$row['insurancetype'];
							$insurancenumber=$row['insurancenumber'];
							$insuranceprincipal=$row['insuranceprincipal'];
							$expiry=$row['expiry'];
							?>
									<tr><td colspan = "2" ><h4><u><b>Current Insurance Details</b></u></h4></td></tr>
									<tr><td colspan = "2" ><h4><b>Nhif</b></h4></td></tr>
									<tr><td><h4>Cover Type :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['nhiftype'] ?>"></b></td></tr>
									<tr><td><h4>Member Number :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['nhifnumber'] ?>"></b></td></tr>
									<tr><td colspan = "2" ><h4><b>Other Insurance</b></h4></td></tr>
									<tr><td><h4>Insurance Name :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['insurancetype'] ?>"></b></td></tr>
									<tr><td><h4>Member Number :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['insurancenumber'] ?>"></b></td></tr>
									<tr><td><h4>Principal Member :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['insuranceprincipal'] ?>"></b></td></tr>
									<tr><td><h4>Expiry Date :</h4></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['expiry'] ?>"></b></td></tr>
									<?php } ?> 
									<tr><td colspan = "2" ><h4><u><b>New Insurance Details </b></u></h4></td></tr>
									<tr><td><h4>Insurance Name :</h4></td>
									<td>
									<SELECT NAME="insurancetype" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="dISABLED">---</OPTION>
										<?php 
										$query ="SELECT insurer FROM insurance";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['insurer']; ?> </option>
										<?php 
										}
										?>
										
									</SELECT>
									</td></tr>
									<tr><td><h4>Member Number :</h4></td><td><input type="number" class="form-control" name="insurancenumber"></td></tr>
									<tr><td><h4>Principal Member :</h4></td><td><input type="text" class="form-control" name="insuranceprincipal"></td></tr>
									<tr><td><h4>Expiry Date :</h4></td><td><input type="date" class="form-control" name="expiry"></td></tr>
									
								</table>
								<br><br>
								<button type="submit" class="btn btn-primary" name="sub4">Submit</button>
							</form>
					</div>
			  </div>
			
			  </div>
		  
                
            </div>
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