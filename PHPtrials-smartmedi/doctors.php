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
<html>
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
   include ('data-visualization.php');
   
   $unique = $_SESSION['workID'];
   
   ?>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo">
          <h3>SmartMedi - Admin Dashboard</h3>
		  
        </div>

      </div>
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
				
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
          <li><a href="admindash.php"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-users"></i> Manage users<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              
			  <li><a href="patients.php"><i class="fa fa-male"></i><i class="fa fa-female"></i> Patients</a></li>
			  <li><a href="minorPatients.php"><i class="fa fa-child"></i> Minors</a></li>
			  <li class="active"><a href="#"><i class="fa fa-user-md"></i> Medical Practitioners</a></li>
			  <li><a href="hospitals.php"><i class="fa fa-h-square"></i> Hospitals</a></li>
              

            </ul>
          </li>
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-cubes"></i> Data Visualization<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              <li><a href="totalpatients.php"><i class="fa fa-user" ></i><i class="fa fa-user" ></i> Total Patients</a></li>
			  <li><a href="gendercomparison.php"><i class="fa fa-user"></i> Gender Comparison</a></li>
              

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
			<li><a href="report.php"><i class="fa fa-file-text"></i> Reports</a></li>
          <li><a href="adminsettings.php"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  <!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-admincontent">
          <!--ol class="breadcrumb">
            <li><a href="admindash.php">Admin Panel</a></li>
            <li><a href="#">Manage Users</a></li>
            <li class="active">Tables</li>
          </ol->
          <h1>Patients</h1>
          <hr-->

          <div class="row margin-bottom-30">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="active"><a href="#">Total Medical Practitioners <span class="badge"><?php echo $totalDoctorsUsers; ?></span></a></li>
            
          </ul>          
        </div>
      </div>
		  
          <div class="row">
		  <div class="col-md-12 col-sm-12">
		  
		  
		  <div class="table-responsive">
							<!--h4 class="margin-bottom-15">Patients Table</h4-->
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
						<td><a href="deleteaccount.php?type=doctor&id=<?php echo $row['nationalid'] ?>" class="btn btn-danger" 
						onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
						
					</tr>
					<?php } ?>                  
                  </tbody>
                </table>
								<?php // Output the page links
	echo "<div class='pagination'>";
	for ($i = 1; $i <= $total_doc_pages; $i++) {
		if ($i == $page) {
			echo "<button class='current-page'>$i</button>";
		} else {
			echo "<a href='?page=$i'><button>$i</button></a>";
		}
	}
	echo "</div>";

	// Output the patients for the current page
	echo "<ul>";
	while ($row = mysqli_fetch_assoc($doctorsRes)) {
		echo "<li>" . $row['name'] . "</li>";
	}
	echo "</ul>";?>
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
              <a href="doctors.php?logout='1'" class="btn btn-primary">Yes</a>
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