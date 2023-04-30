<?php
include('server.php'); 

if (!isset($_SESSION['workID'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: AdminLogin.php');
}


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
   
   ?>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h3>SmartMedi - Admin Dashboard</h3></div>
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
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-users"></i> Manage users<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              
			  <li><a href="patients.php"><i class="fa fa-male"></i><i class="fa fa-female"></i> Patients</a></li>
			  <li><a href="minorPatients.php"><i class="fa fa-child"></i> Minors</a></li>
			  <li><a href="doctors.php"><i class="fa fa-user-md"></i> Medical Practitioners</a></li>
			  <li><a href="#"><i class="fa fa-h-square"></i> Hospitals</a></li>
              

            </ul>
          </li>
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-cubes"></i> Data Visualization<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              <li><a href="totalpatients.php"><i class="fa fa-user" ></i><i class="fa fa-user" ></i> Total Patients</a></li>
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
			<li class="active"><a href="report.php"><i class="fa fa-file-text"></i> Reports</a></li>
          <li><a href="adminsettings.php"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  <!--/.navbar-collapse ->

      <div class="templatemo-content-wrapper"-->
        <div class="templatemo-admincontent">
          <h3>List of available printable reports</h3><hr>
		  
			<div class="card-header bg-transparent border-0" >
				<button class="collapsible">1. List of Doctors and hospitals</button>
				<div class="content">
					<a href="reportStructure.php?type=hospital" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Print Hospital list</a><br><br>
					<a href="reportStructure.php?type=doctor" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Print Medical Practitioners list</a><br>
				</div>
			</div>
			<br>
			<div class="card-header bg-transparent border-0" >
				<button class="collapsible">2. Illness Concentration per region</button>
				<div class="content">
					<a href="reportStructure.php?type=region&location=nairobi" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Nairobi Region</a><br><br>
					<a href="reportStructure.php?type=region&location=central" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Central Region</a><br><br>
					<a href="reportStructure.php?type=region&location=eastern" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Eastern Region</a><br><br>
					<a href="reportStructure.php?type=region&location=western" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Western Region</a><br><br>
					<a href="reportStructure.php?type=region&location=nyanza" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Nyanza Region</a><br><br>
					<a href="reportStructure.php?type=region&location=rift" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Rift Valley Region</a><br><br>
					<a href="reportStructure.php?type=region&location=coast" rel="noopener" target="_blank" ><i class="fa fa-print"></i> Coast Region</a><br><br>
					<a href="reportStructure.php?type=region&location=north" rel="noopener" target="_blank" ><i class="fa fa-print"></i> North Eastern Region</a><br><br>
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
              <a href="report.php?logout='1'" class="btn btn-primary">Yes</a>
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
		</script>
	<?php endif ?>
  </body>
</html>