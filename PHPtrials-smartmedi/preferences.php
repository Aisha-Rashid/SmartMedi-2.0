<?php
include('server.php');

if (!isset($_SESSION['IDNo'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy(); 
	unset($_SESSION['IDNo']);
	header("location: login.php");
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
<?php 
	if (isset($_SESSION['IDNo'])) :

	$unique = $_SESSION['IDNo'];
	$query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
	$res = mysqli_query($db, $query);
	$array=mysqli_fetch_row($res);
	$rows = mysqli_num_rows($res);

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
		$query=mysqli_query($db,"update patients set email='$email' where IDNo='$unique'");
	}
	if (!empty($TelNo)) {
		$query=mysqli_query($db,"update patients set TelNo='$TelNo' where IDNo='$unique'");
	}
	if (!empty($county)) {
		$query=mysqli_query($db,"update patients set county='$county' where IDNo='$unique'");
	}
	if (!empty($town)) {
		$query=mysqli_query($db,"update patients set town='$town' where IDNo='$unique'");
	}
	if (!empty($current_password)) {
		
			if ($new_password == $conf_password) {
				
				$enc_password = md5($new_password);
				$query=mysqli_query($db,"UPDATE patients SET password='$enc_password' WHERE IDNo='$unique' ");			
			}
			 else {
      echo "Error: new password and confirm password do not match.";			
		}
	
	}
	
	
	if($query){
header("location:preferences.php");
}
else{
	echo "Change Failure";
}
}
//Next of kin details
if(isset($_POST['sub2'])!=""){
	
	$kinFirstName = mysqli_real_escape_string($db, $_POST['kinFirstName']);
	$kinLastName = mysqli_real_escape_string($db, $_POST['kinLastName']);
	$relationship = mysqli_real_escape_string($db, $_POST['relationship']);
	$telephone = mysqli_real_escape_string($db, $_POST['telephone']);
	
	if (!empty($kinFirstName) && !empty($kinLastName) && !empty($relationship) && !empty($telephone)) {
	$query=mysqli_query($db,"INSERT INTO nextofkin (kinFirstName, kinLastName, relationship, telephone, IDNo) VALUES ('$kinFirstName', '$kinLastName', '$relationship', '$telephone', '$unique')");
	}
	
if($query){
header("location:preferences.php");
}
else{
echo "Change Failure";
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
	$query=mysqli_query($db,"update response set allergies = CONCAT_WS(' ,', allergies, '$allergies') where IDNo='$unique'");
	}
	if (!empty($condition1)) {
	$query=mysqli_query($db,"update response set conditions = CONCAT_WS(' ,', conditions, '$condition1') where IDNo='$unique'");
	}
	if (!empty($condition2)) {
	$query=mysqli_query($db,"update response set conditions = CONCAT_WS(' ,', conditions, '$condition2') where IDNo='$unique'");
	}
	if (!empty($condition3)) {
	$query=mysqli_query($db,"update response set conditions = CONCAT_WS(' ,', conditions, '$condition3') where IDNo='$unique'");
	}
	if (!empty($condition4)) {
	$query=mysqli_query($db,"update response set conditions = CONCAT_WS(' ,', conditions, '$condition4') where IDNo='$unique'");
	}
	if (!empty($condition5)) {
	$query=mysqli_query($db,"update response set conditions = CONCAT_WS(' ,', conditions, '$condition5') where IDNo='$unique'");
	}
	if (!empty($notes)) {
	$query=mysqli_query($db,"update response set notes = CONCAT_WS(' ,',notes, '$notes') where IDNo='$unique'");
	}
	
if($query){
header("location:preferences.php");
}
else{
echo "Change Failure";
}	
}
//Insurance Details
if(isset($_POST['sub4'])!=""){
	
	$insurer = mysqli_real_escape_string($db, $_POST['insurer']);
	$insurancenumber = mysqli_real_escape_string($db, $_POST['insurancenumber']);
	$insuranceprincipal = mysqli_real_escape_string($db, $_POST['insuranceprincipal']);
	$expiry = mysqli_real_escape_string($db, $_POST['expiry']);
	$NA = "NA";
	$NIL = 0;
	
	if (!empty($insurer) && !empty($insurancenumber) && !empty($insuranceprincipal) && !empty($expiry)) {
	$query=mysqli_query($db,"INSERT INTO medicalcover (nhiftype, nhifnumber, insurancetype, insurancenumber, insuranceprincipal, expiry, IDNo) VALUES ('$NA', '$NIL', '$insurer', '$insurancenumber', '$insuranceprincipal', '$expiry', '$unique')");
	}
	
if($query){
header("location:preferences.php");
}
else{
echo "Change Failure";
}	
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
						<li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
						<li><a href="dash_medhist.php"><i class="fa fa-stethoscope"></i>User Data</a></li>
						<li><a href="attachments.php"><i class="fa fa-folder-open"></i>Attachments</a></li>
						<li><a href="children.php"><i class="fa fa-child"></i>Dependants</a></li>
						<li class="active"><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
						<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
					</ul>
				</div>
				<div class="templatemo-content-wrapper">
					<div class="templatemo-content">
						
				
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
									<tr><td><p>Current Email :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $array[8]?>"></b></td></tr>
									<tr><td><p>New Email :</p></td><td><input type="email" class="form-control" name="email"></td></tr>
									<tr><td><p>Telephone Number :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $array[3]?>"></b></td></tr>
									<tr><td><p>Add Telephone number :</p></td><td><input type="text" class="form-control" name="TelNo"></td></tr>
									<tr><td colspan = "2" ><h4><u><b>Change Residence </b></u></h4></td></tr>
									<tr>
									<td><p>County :</p></td>
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
									<tr><td><p>Town :</p></td><td><input type="text" class="form-control" name="town"></td></tr>
									<tr><td colspan = "2" ><h4><u><b>Change Password </b></u></h4></td></tr>
									<tr><td><p>Enter current password :</p></td><td><input type="password" class="form-control" id="current_password" name="current_password" >
									<span toggle="#current_password" class="fa fa-fw fa-eye field-icon toggle-password" ></span></td></tr>
									<tr><td><p>New Password :</p></td><td><input type="password" class="form-control" id="new_password" name="new_password">
									<span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password"></span></td></tr>
									<tr><td><p>Confirm Password :</p></td><td><input type="password" class="form-control" id="conf_password" name="conf_password">
									<span toggle="#conf_password" class="fa fa-fw fa-eye field-icon toggle-password"></span></td></tr>
									
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
							$id=$row['id'];
							$kinFirstName=$row['kinFirstName'];
							$kinLastName=$row['kinLastName'];
							$relationship=$row['relationship'];
							$telephone=$row['telephone'];
							?>
									<tr><td><p>Name :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['kinFirstName']; echo " "; echo $row['kinLastName']; ?>"></b></td></tr>
									<tr><td><p>Relationship :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['relationship'] ?>"></b></td></tr>
									<tr><td><p>Telephone Number :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['telephone'] ?>"></b>
									<a href="deleteaccount.php?type=kin&id=<?php echo $row['id'] ?>" class="btn btn-danger" 
						onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td></tr>
									<?php } ?> 
									<tr><td colspan = "2" ><h4><u><b>New Details </b></u></h4></td></tr>
									<tr><td><p>First Name :</p></td><td><input type="text" class="form-control" name="kinFirstName"></td></tr>
									<tr><td><p>Last Name :</p></td><td><input type="text" class="form-control" name="kinLastName"></td></tr>
									<tr><td><p>Relationship :</p></td><td>
									<SELECT NAME="relationship" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="disabled">---</OPTION>  
										<OPTION VALUE="Parent">Parent
										<OPTION VALUE="Significant other">Significant other
										<OPTION VALUE="Sibling">Sibling
										<OPTION VALUE="Son/Daughter">Son/Daughter
										<OPTION VALUE="Relative">Relative
										<OPTION VALUE="Guardian">Guardian<BR>
									</SELECT>
									</td></tr>
									<tr><td><p>Telephone Number :</p></td><td><input type="text" class="form-control" name="telephone"></td></tr>
									
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
									<tr><td colspan = "2" ><b><textarea disabled id="history" name="history" rows="5" cols="120" placeholder="<?php echo $row['conditions'] ."\n\n". $row['notes'] ; ?>" ></textarea></b></td></tr>
									<?php } ?> 
									<tr><td colspan = "2" ><h4><b>Add conditions</b></h4></td></tr>
									<tr><td><p>Allergies :</p></td><td><input type="text" name="allergies" class="form-control"></td></tr>
									<tr><td><p>Condition 1 :</p></td>
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
									<tr><td><p>Condition 2 :</p></td>
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
									<tr><td><p>Condition 3 :</p></td><td>
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
									<tr><td><p>Condition 4 :</p></td><td>
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
									<tr><td><p>Condition 5 :</p></td><td>
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
							$query="select nhiftype, nhifnumber from medicalcover WHERE IDNO = '$unique' and nhiftype !='NA'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$nhiftype=$row['nhiftype'];
							$nhifnumber=$row['nhifnumber'];
							?>
									<tr><td colspan = "2" ><h4><u><b>Current Insurance Details</b></u></h4></td></tr>
									<tr><td colspan = "2" ><h4><b>Nhif</b></h4></td></tr>
									<tr><td><p>Cover Type :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['nhiftype'] ?>"></b></td></tr>
									<tr><td><p>Member Number :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['nhifnumber'] ?>"></b></td></tr>
									</table><?php } ?>
									<table width = 70%>
									  <?php 
							$query="select id, insurancetype, insurancenumber, insuranceprincipal, expiry from medicalcover WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							$id = $row['id'];
							$insurancetype=$row['insurancetype'];
							$insurancenumber=$row['insurancenumber'];
							$insuranceprincipal=$row['insuranceprincipal'];
							$expiry=$row['expiry'];
							?>
									<tr><td colspan = "2" ><h4><b>Other Insurance</b></h4></td></tr>
									<tr><td width =40%><p>Insurance Name :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['insurancetype'] ?>"></b></td></tr>
									<tr><td><p>Member Number :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['insurancenumber'] ?>"></b></td></tr>
									<tr><td><p>Principal Member :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['insuranceprincipal'] ?>"></b></td></tr>
									<tr><td><p>Expiry Date :</p></td><td><b><input disabled type="text" class="form-control" value="<?php echo $row['expiry'] ?>"></b>
									<a href="deleteaccount.php?type=insurance&id=<?php echo $row['id'] ?>" class="btn btn-danger" 
						onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td></tr>
									<?php } ?> 
									<tr><td colspan = "2" ><h4><u><b>New Insurance Details </b></u></h4></td></tr>
									<tr><td><h4>Insurance Name :</h4></td>
									<td>
									<SELECT NAME="insurer" class="form-control">
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
									<tr><td><p>Member Number :</p></td><td><input type="number" class="form-control" name="insurancenumber"></td></tr>
									<tr><td><p>Principal Member :</p></td><td><input type="text" class="form-control" name="insuranceprincipal"></td></tr>
									<tr><td><p>Expiry Date :</p></td><td><input type="date" class="form-control" name="expiry"></td></tr>
									
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
								<a href="preferences.php?logout='1'" class="btn btn-primary">Yes</a>
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