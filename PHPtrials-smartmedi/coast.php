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
   
   
   $unique = $_SESSION['workID'];
   
   
   include ('data-visualization.php');
  
   ?>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>SmartMedi - Admin Dashboard</h1></div>
        
      </div>   
    </div>
    <div class="template-page-wrapper">
      <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
				
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
          <li ><a href="admindash.php"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-users"></i> Manage users<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              
			  <li><a href="patients.php"><i class="fa fa-male"></i><i class="fa fa-female"></i> Patients</a></li>
			  <li><a href="minorPatients.php"><i class="fa fa-child"></i> Minors</a></li>
			  <li><a href="doctors.php"><i class="fa fa-user-md"></i> Medical Practitioners</a></li>
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
		  <li class="sub open">
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
			  <li class ="active"><a href="#"><i class="fa fa-map-marker"></i> Coast Region</a></li>
              

            </ul>
          </li>
			<li><a href="report.php"><i class="fa fa-file-text"></i> Reports</a></li>
          <li><a href="adminsettings.php"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  <!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <!--ol class="breadcrumb">
		  <li>Admin Panel</a></li>
					<li>Data Visualization</li>
					<li>Company Data</li>
            
          </ol-->
          


			<div class="row">
		  <div class="col-md-12 col-sm-12">
		  <table>
							<div>
							  <canvas id="CoastBarChart"></canvas>
							  <p align="center"><b><u><i>Coast Region</i></u></b></p>
							</div>
		  </table>
		  
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
              <a href="coast.php?logout='1'" class="btn btn-primary">Yes</a>
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
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  const ctx_barCoast = document.getElementById('CoastBarChart');
  new Chart(ctx_barCoast, {
    type: 'bar',
    data: {
      labels: ['Cancer', 'Cardiovascular', 'Respiratory', 'Endocrine', 'Eye disorders', 'Gastro-intestinal', 'Gynaecological','Genitourinary','Musculoskeletal',
	  'Neurological', 'Blood disorders','Congenital','Skin disorders'],
      datasets: [{
        label: '# Kilifi',
        data: [<?php echo $totalCancerKilifi; ?>, <?php echo $totalCardiovascularKilifi; ?>, <?php echo $totalRespiratoryKilifi; ?>, <?php echo $totalEndocrineKilifi; ?>, 
		<?php echo $totalEyeKilifi; ?>, <?php echo $totalGastroKilifi; ?>, <?php echo $totalGynaecologicalKilifi; ?>, <?php echo $totalGenitourinaryKilifi; ?>, 
		<?php echo $totalMusculoskeletalKilifi; ?> , <?php echo $totalNeurologicalKilifi; ?>, <?php echo $totalBloodKilifi; ?>, <?php echo $totalCongenitalKilifi; ?>, <?php echo $totalSkinKilifi; ?>		],
		 backgroundColor: 'rgba(66, 239, 245)',
        borderWidth: 1
      },
	  {
        label: '# Kwale',
        data: [<?php echo $totalCancerKwale; ?>, <?php echo $totalCardiovascularKwale; ?>, <?php echo $totalRespiratoryKwale; ?>, <?php echo $totalEndocrineKwale; ?>, 
		<?php echo $totalEyeKwale; ?>, <?php echo $totalGastroKwale; ?>, <?php echo $totalGynaecologicalKwale; ?>, <?php echo $totalGenitourinaryKwale; ?>, 
		<?php echo $totalMusculoskeletalKwale; ?> , <?php echo $totalNeurologicalKwale; ?>, <?php echo $totalBloodKwale; ?>, <?php echo $totalCongenitalKwale; ?>, <?php echo $totalSkinKwale; ?>		],
		 backgroundColor: 'rgba(245, 170, 66)',
        borderWidth: 1
      },
	  {
        label: '# Lamu',
        data: [<?php echo $totalCancerLamu; ?>, <?php echo $totalCardiovascularLamu; ?>, <?php echo $totalRespiratoryLamu; ?>, <?php echo $totalEndocrineLamu; ?>, 
		<?php echo $totalEyeLamu; ?>, <?php echo $totalGastroLamu; ?>, <?php echo $totalGynaecologicalLamu; ?>, <?php echo $totalGenitourinaryLamu; ?>, 
		<?php echo $totalMusculoskeletalLamu; ?> , <?php echo $totalNeurologicalLamu; ?>, <?php echo $totalBloodLamu; ?>, <?php echo $totalCongenitalLamu; ?>, <?php echo $totalSkinLamu; ?>		],
		 backgroundColor: 'rgba(66, 245, 78)',
        borderWidth: 1
      },
	  {
        label: '# Mombasa',
        data: [<?php echo $totalCancerMombasa; ?>, <?php echo $totalCardiovascularMombasa; ?>, <?php echo $totalRespiratoryMombasa; ?>, <?php echo $totalEndocrineMombasa; ?>, 
		<?php echo $totalEyeMombasa; ?>, <?php echo $totalGastroMombasa; ?>, <?php echo $totalGynaecologicalMombasa; ?>, <?php echo $totalGenitourinaryMombasa; ?>, 
		<?php echo $totalMusculoskeletalMombasa; ?> , <?php echo $totalNeurologicalMombasa; ?>, <?php echo $totalBloodMombasa; ?>, <?php echo $totalCongenitalMombasa; ?>, <?php echo $totalSkinMombasa; ?>		],
		 backgroundColor: 'rgba(245, 81, 66)',
        borderWidth: 1
      },
	  {
        label: '# Taita/Taveta',
        data: [<?php echo $totalCancerTaita; ?>, <?php echo $totalCardiovascularTaita; ?>, <?php echo $totalRespiratoryTaita; ?>, <?php echo $totalEndocrineTaita; ?>, 
		<?php echo $totalEyeTaita; ?>, <?php echo $totalGastroTaita; ?>, <?php echo $totalGynaecologicalTaita; ?>, <?php echo $totalGenitourinaryTaita; ?>, 
		<?php echo $totalMusculoskeletalTaita; ?> , <?php echo $totalNeurologicalTaita; ?>, <?php echo $totalBloodTaita; ?>, <?php echo $totalCongenitalTaita; ?>, <?php echo $totalSkinTaita; ?>		],
		 backgroundColor: 'rgba(206, 66, 245)',
        borderWidth: 1
      },
	  {
        label: '# Tana River',
        data: [<?php echo $totalCancerTana; ?>, <?php echo $totalCardiovascularTana; ?>, <?php echo $totalRespiratoryTana; ?>, <?php echo $totalEndocrineTana; ?>, 
		<?php echo $totalEyeTana; ?>, <?php echo $totalGastroTana; ?>, <?php echo $totalGynaecologicalTana; ?>, <?php echo $totalGenitourinaryTana; ?>, 
		<?php echo $totalMusculoskeletalTana; ?> , <?php echo $totalNeurologicalTana; ?>, <?php echo $totalBloodTana; ?>, <?php echo $totalCongenitalTana; ?>, <?php echo $totalSkinTana; ?>		],
		 backgroundColor: 'rgba(206, 66, 245)',
        borderWidth: 1
      }
	  ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>




     <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	
	<?php endif ?>
  </body>
</html>