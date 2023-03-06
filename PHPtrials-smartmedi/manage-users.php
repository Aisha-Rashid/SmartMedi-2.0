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
  <title>SmartMedi EEHR</title>
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
<?php if (isset($_SESSION['workID'])) : 
   
   
   $unique = $_SESSION['workID'];
   $query = "SELECT adminFname, adminLname, workID, IDnumber, email, phone FROM `admin` WHERE workID = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   
   $AllPatientsQuery = "SELECT * FROM `patients` ORDER by id";
   $AllPatientsRes = mysqli_query($db, $AllPatientsQuery);
   $totalPatients = mysqli_num_rows($AllPatientsRes);
   
   $x =  "SELECT DISTINCT hospitalname FROM `hospitals`";
        $Res = mysqli_query($db, $x);
        $totalHospitals = mysqli_num_rows($Res);
   
   $doctorsQuery = "SELECT * FROM `doctors` ORDER by id";
   $doctorsRes = mysqli_query($db, $doctorsQuery);
   $totalDoctors = mysqli_num_rows($doctorsRes);
   
   ?>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>SmartMedi - Admin Dashboard</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
				
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
          <li><a href="admindash.php"><i class="fa fa-home"></i>Dashboard</a></li>
          <li><a href="manage-users.php"><i class="fa fa-users"></i> Manage Users</a></li>
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-cubes"></i> Data Visualization<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              
			  <li><a href="gendercomparison.php"><i class="fa fa-user"></i> Gender Comparison</a></li>
			  <li><a href="hospitalchart.php"><i class="fa fa-hospital-o"></i> Hospitals Onboard</a></li>
              

            </ul>
          </li>
		  <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-bar-chart-o"></i> Data Analysis per county <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
			  <li><a href="conditionschart.php"><i class="fa fa-medkit"></i> Conditions</a></li>
			  <li><a href="nairobi.php"><i class="fa fa-map-marker"></i> Nairobi Region</a></li>
              <li><a href="central.php"><i class="fa fa-map-marker"></i> Central Region</a></li>
			  <li><a href="eastern.php"><i class="fa fa-map-marker"></i> Eastern Region</a></li>
			  <li><a href="western.php"><i class="fa fa-map-marker"></i> Western Region</a></li>
			  <li><a href="nyanza.php"><i class="fa fa-map-marker"></i> Nyanza Region</a></li>
			  <li><a href="rift.php"><i class="fa fa-map-marker"></i> Rift Valley Region</a></li>
			  <li><a href="north.php"><i class="fa fa-map-marker"></i> North Eastern Region</a></li>
			  <li><a href="coast.php"><i class="fa fa-map-marker"></i> Coast Region</a></li>
              

            </ul>
          </li>
			<li><a href="maps.html"><i class="fa fa-file-text"></i> Reports</a></li>
          <li><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  <!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <!--ol class="breadcrumb">
            <li><a href="admindash.php">Admin Panel</a></li>
            <li><a href="#">Manage Users</a></li>
            <li class="active">Tables</li>
          </ol-->
          <h1>Manage Users</h1>
          <hr>

          <!--div class="row margin-bottom-30">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="active"><a href="#">Total Patients Registered <span class="badge"><?php echo $totalPatients; ?></span></a></li>
            <li class="active"><a href="#">Medical Practitioners <span class="badge"><?php echo $totalDoctors; ?></span></a></li>
            <li class="active"><a href="#">Hospitals Registered <span class="badge"><?php echo $totalHospitals; ?></span></a></li>
          </ul>          
        </div>
      </div-->
		  
          <div class="row">
		  <div class="col-md-12 col-sm-12">
		  <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                  <li class="active"><a href="#home" role="tab" data-toggle="tab">Patients</a></li>
                  <li><a href="#doctors" role="tab" data-toggle="tab">Medical Practitioners</a></li>
                  <li><a href="#hospitals" role="tab" data-toggle="tab">Medical institutions</a></li>
                  <!--li><a href="#admin" role="tab" data-toggle="tab">Admin</a></li-->
                </ul>
				<!-- Tab panes -->	
                <div class="tab-content">
					<div class="tab-pane fade in active" id="home">
						
						<div class="table-responsive">
							<!--h4 class="margin-bottom-15">Patients Table</h4-->
								<table class="table table-striped table-hover table-bordered">
								  <thead>
									<tr>
									  
									  <th>First Name</th>
									  <th>Last Name</th>
									  <th>ID Number</th>
									  <th>Phone Number</th>
									  <th>Email</th>
									  <th>Action</th>
									</tr>
								  </thead>
								  <tbody>
									<?php 
							//$query="select * from patients";
							//$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($AllPatientsRes)){
								//$count = $res;
							
							$FirstName =$row['FirstName'];
							$LastName=$row['LastName'];
							$IDNo=$row['IDNo'];
							$IDNo=$row['TelNo'];
							$IDNo=$row['email'];
							?>
					<tr>
						<td><?php echo $row['FirstName'] ?></td>
						<td><?php echo $row['LastName'] ?></td>
						<td><?php echo $row['IDNo'] ?></td>
						<td><?php echo $row['TelNo'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td>
						<div class="btn-group">
										  <button type="button" class="btn btn-info">Action</button>
										  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu" role="menu">
											<li><a href="#">Delete</a></li>
											<li><a href="#">Upgrade</a></li>
											
										  </ul>
										</div>
						</td>
						
					</tr>
					<?php } ?>                   
								  </tbody>
								</table>
						</div>
					</div>
			  
					<div class="tab-pane fade" id="doctors">
						
						<div class="table-responsive">
                <!--h4 class="margin-bottom-15">Medical Practitioners Table</h4-->
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>ID Number</th>
                      <th>Hospital</th>
                      <th>Work ID</th>
                      <th>Specialty</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
							//$query="select * from doctors";
							//$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($doctorsRes)){
							
							$fname =$row['fname'];
							$lname=$row['lname'];
							$nationalid=$row['nationalid'];
							$hospital=$row['hospital'];
							$workid=$row['workid'];
							$specialty=$row['specialty'];
							?>
					<tr>
						<td><?php echo $row['fname'] ?></td>
						<td><?php echo $row['lname'] ?></td>
						<td><?php echo $row['nationalid'] ?></td>
						<td><?php echo $row['hospital'] ?></td>
						<td><?php echo $row['workid'] ?></td>
						<td><?php echo $row['specialty'] ?></td>
						<td>
						<div class="btn-group">
										  <button type="button" class="btn btn-info">Action</button>
										  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu" role="menu">
											<li><a href="#">Delete</a></li>
											
											
										  </ul>
										</div>
						</td>
						
					</tr>
					<?php } ?>                  
                  </tbody>
                </table>
              </div>
			  </div>
			  
			  <div class="tab-pane fade" id="hospitals">
						
						<div class="table-responsive">
                <!--h4 class="margin-bottom-15">Hospitals Table</h4-->
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
							$query="select * from hospitals";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$HospitalID =$row['hospitalID'];
							
							$hospitalname=$row['hospitalname'];
							?>
					<tr>
					
						<td><?php echo $row['hospitalID'] ?></td>
						<td><?php echo $row['hospitalname'] ?></td>
						<td>
						<div class="btn-group">
										  <button type="button" class="btn btn-info">Action</button>
										  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										  </button>
										  <ul class="dropdown-menu" role="menu">
											<li><a href="#">Delete</a></li>
											
											
										  </ul>
										</div>
						</td>
						
					</tr>
					<?php } ?>                   
                  </tbody>
                </table>
              </div>
			  </div>
			  
			  <!--div class="tab-pane fade" id="admin">
						<div class="btn-group pull-right" id="templatemo_sort_btn">
							<button type="button" class="btn btn-default">Sort by</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							  <span class="caret"></span>
							  <span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
							  <li><a href="#">First Name</a></li>
							  <li><a href="#">Last Name</a></li>
							  <li><a href="#">Username</a></li>
							</ul>
						 </div>
						<div class="table-responsive">
                <h4 class="margin-bottom-15">Admin Table</h4>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                            
                  </tbody>
                </table>
              </div>
			  </div-->
			  </div>
		  
                
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="admindash.php?logout='1'" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>

      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2022 SmartMedi <!-- Credit: www.templatemo.com --></p>
        </div>
      </footer>
    </div>
</div>
    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	<script src="dashboardjs/Graph.js"></script>
	<?php endif ?>
  </body>
</html>