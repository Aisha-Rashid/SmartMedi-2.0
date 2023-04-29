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

<?php
date_default_timezone_set("Africa/Nairobi");
//echo date_default_timezone_get();
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
 
</head>
<body>

<?php if (isset($_SESSION['IDNo'])) : 

   $unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
?>


	<!-- Start menu -->
	
    <div class="template-page-wrapper">
		<div class="navbar-collapse collapse templatemo-sidebar">
			<ul class="templatemo-sidebar-menu">
				<li>
			
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
				<li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="active"><a href="dash_medhist.php"><i class="fa fa-stethoscope"></i>User Data</a></li>
				<li><a href="attachments.php"><i class="fa fa-folder-open"></i>Attachments</a></li>
				<li><a href="children.php"><i class="fa fa-child"></i>Dependants</a></li>
				<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			
			<div class="student-profile py-4">
			  <div class="container">
				<div class="row">
				 <div class="col-lg-4">
									<div class="card shadow-sm">
									  <div class="card-header bg-transparent text-center">
									  <?php
										$query = " select * from patients where IDNO='$unique' ";
										$result = mysqli_query($db, $query);

										while ($data = mysqli_fetch_assoc($result)) {
									  ?>
									   <a href = "uploadProfile.php"><img class="profile_img" src="./uploads/<?php echo $data['filename']; ?>" alt="Profile Pic"></a>
									  <?php } ?>
									   <h3><?php echo $array[1]; ?></h3>
									  </div>
									</div>
								</div>
	  
	   <div class="col-lg-8">
	   <div class="card shadow-sm">
          
         <h3 class="mb-0">Medical History</h3>
		 
		 
		
            
											<?php
												$query = "select * from response WHERE IDNO = '$unique'";
												$res = mysqli_query($db, $query);
												while ($row = mysqli_fetch_array($res)) {

													$allergies = $row['allergies'];
													$conditions = $row['conditions'];
													$notes = $row['notes'];
												?>
													<table class="table table-bordered">
														
														<tr>
															<th width="30%">Allergies</th>
															<td width="2%">:</td>

															<td>
																<?php echo $row['allergies'] ?><br><br>
															</td>
														</tr>
														<tr>
															<th width="30%">Conditions</th>
															<td width="2%">:</td>

															<td>
																<?php echo $row['conditions'] ?><br><br>
															</td>
														</tr>
														<tr>
															<th width="30%">Additional Information</th>
															<td width="2%">:</td>

															<td>
																<?php echo $row['notes'] ?><br><br>
															</td>

														</tr>
														
													</table>
												<?php } ?>
												<table  class="table table-bordered" id="docdatatable">
  <tr>
    <th width="30%">Doctors Notes</th>
  </tr>
  <?php 
    $query = "SELECT doctors.fname, doctors.lname, doctors.hospital, docnotes.date, docnotes.notes FROM doctors, docnotes WHERE doctors.nationalid = docnotes.docid AND docnotes.IDNo ='$unique'" ;
    $res = mysqli_query($db, $query);
    while($row=mysqli_fetch_array($res)){
      $date=$row['date'];
      $fname=$row['fname'];
      $lname=$row['lname'];
      $hospital=$row['hospital'];
      $notes=$row['notes'];
  ?>
  <tr>
    <td>
      <b><?php echo $row['date']?><br>
      <?php echo $row['fname']; echo " "; echo $row['lname'];?><br>
      <?php echo $row['hospital']?><br></b>
      <?php echo $row['notes']?><br>
    </td>
  </tr>
  <?php } ?> 
</table>
												<hr>
					
					<h3 class="mb-0">Insurance Details</h3>
		 
		 
		 <?php
												$query = "select nhiftype, nhifnumber from medicalcover WHERE IDNO = '$unique' and nhiftype !='NA'";
												$res = mysqli_query($db, $query);
												while ($row = mysqli_fetch_array($res)) {

													$nhiftype = $row['nhiftype'];
													$nhifnumber = $row['nhifnumber'];
												?>
													<table class="table table-bordered">
														<u> NHIF Details </u>
														<thead>
															<tr>
																<th>Cover Type</th>
																<th>Member Number</th>


															</tr>
														</thead>
														<tbody>
															<tr>
																<td><?php echo $row['nhiftype'] ?></td>
																<td><?php echo $row['nhifnumber'] ?></td>
															</tr>
														</tbody>
													</table>
													<?php } ?>

													
														<u> Other Insurance Details </u>
														
												<table width = 70% class="table table-bordered">
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
									
									<tr><td width =40%> Insurance Name :</td><td><b><?php echo $row['insurancetype'] ?></b></td></tr>
									<tr><td> Member Number :</td><td><?php echo $row['insurancenumber'] ?></td></tr>
									<tr><td> Principal Member :</td><td><?php echo $row['insuranceprincipal'] ?></td></tr>
									<tr><td> Expiry Date :</td><td><?php echo $row['expiry'] ?></td></tr>
									<?php } ?> 
									</table><hr>
												
						<h3 class="mb-0">Next of Kin Details</h3>
						<table width = 70% class="table table-bordered">
									  <?php 
							$query = "select * from nextofkin WHERE IDNO = '$unique'";
												$res = mysqli_query($db, $query);
												while ($row = mysqli_fetch_array($res)) {

													$kinFirstName = $row['kinFirstName'];
													$kinLastName = $row['kinLastName'];
													$relationship = $row['relationship'];
													$telephone = $row['telephone'];
							?>
									
									<tr><td width =40%> Name :</td><td><b><?php echo $row['kinFirstName'];
																	echo " ";
																	echo $row['kinLastName'];; ?></b></td></tr>
									<tr><td>Relationship :</td><td><?php echo $row['relationship'] ?></td></tr>
									<tr><td> Phone Number :</td><td><?php echo $row['telephone'] ?></td></tr>
									<?php } ?> 
									</table>
		 
										
					
		</div>
        </div>
	   </div>
    
    </div>
	
		
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
		
   

 	
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
					<a href="dash_medhist.php?logout='1'" class="btn btn-primary">Yes</a>
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

    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>

    <script src="dashboardjs/templatemo_script.js"></script>

    <script type="text/javascript"></script>
	
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	
</script>
   <?php endif ?> 
</body>
</html>