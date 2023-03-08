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
include ('data-visualization.php');

    $unique = $_SESSION['workID'];
    $query = "SELECT adminFname, adminLname, workID, IDnumber, email, phone FROM `admin` WHERE workID = '$unique'";
    $res = mysqli_query($db, $query);
    $array = mysqli_fetch_row($res);
    $rows = mysqli_num_rows($res);
	
	

  ?>


    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo">
          <h1>SmartMedi - Admin Dashboard</h1>
        </div>

      </div>
    </div>

    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>

            <img src="dashboardimages/favicon.ico" alt="Smartmedi">

          </li>
          <li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
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
            <li><a href="#">Admin Panel</a></li>
            <li>Overview</li>
          </ol>
          <!--h1>SmartMedi - Admin Dashboard</h1>
          <hr-->
          <p>Work ID : <b><?php echo $array[2]; ?></b></p>
          <p>Name : <b><?php echo $array[0];
                        echo " ";
                        echo $array[1];; ?></b></p>
          <hr>

          <div class="row margin-bottom-30" >
            <div class="col-md-12">
              <ul class="nav nav-pills" >
                <li class="active"><a href="gendercomparison.php">Total Patients Registered <span class="badge"><?php echo $total_number_patients ?></span></a></li>
                <!--li class="active"><a href="#">Medical Practitioners <span class="badge"><?php echo $totalDoctors; ?></span></a></li-->
                <li class="active"><a href="hospitalchart.php">Hospitals Registered <span class="badge"><?php echo $totalHospitals; ?></span></a></li>
              </ul>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 col-sm-12">
              

              <!-- General User pane -->
			  
							<div class="templatemo-chart-box col-sm-6 col-xs-12">
							<div>
							  <canvas id="PatientPieChart"></canvas>
							  <p><b><u><i>Total registered patients in terms of gender</i></u></b></p>
							</div>
						</div>
						<div class="templatemo-chart-box  col-sm-6 col-xs-12">
							<div>
							  <canvas id="PatientCountyChart"></canvas>
							  <p><b><u><i>Total registered patients per region</i></u></b></p>
							</div>
						</div>
		  
			  
               <!-- tab-content -->
            </div>

          </div>
          <hr>
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
        <p>Copyright &copy; 2022 SmartMedi</p>
      </div>
    </footer>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx_piePatients = document.getElementById('PatientPieChart');
  new Chart(ctx_piePatients, {
    type: 'pie',
    data: {
      labels: ['Male', 'Female'],
      datasets: [{
        label: '# of Patients',
        data: [<?php echo $totalMales; ?>, <?php echo $totalFemales; ?> ],
		 backgroundColor: ['rgba(110, 224, 182)', 'rgba(162, 236, 254)'],
        
      }]
    },
    
  });
  
  
  const ctx_piePatientCounty = document.getElementById('PatientCountyChart');
  new Chart(ctx_piePatientCounty, {
    type: 'pie',
    data: {
      labels: ['Nairobi', 'Central', 'Eastern', 'Western', 'Nyanza', 'Rift Valley', 'North Eastern','Coast'],
      datasets: [{
        label: '# of Patients',
        data: [<?php echo $total_nairobi_patient; ?>, <?php echo $total_central_patient; ?>, <?php echo $total_eastern_patient; ?>, <?php echo $total_western_patient; ?>, 
		<?php echo $total_nyanza_patient; ?>, <?php echo $total_rift_patient; ?>, <?php echo $total_northern_patient; ?>, <?php echo $total_coast_patient; ?> ],
		 backgroundColor: ['rgba(66, 239, 245)', 'rgba(245, 170,66)', 'rgba(66, 245, 78)', 'rgba(245, 81, 66)', 'rgba(206, 66, 245)', 'rgba(223, 235, 233)', 'rgba(201, 36, 89)', 'rgba(66, 81, 245)'],
        
      }]
    },
    
  });
  
</script>
	
    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
  
  <?php endif ?>
</body>

</html>