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
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Nested Menu <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
			<li><a href="manage-users.php"><i class="fa fa-users"></i> Manage Users</a></li>
              <li class="active"><a href="#"><i class="fa fa-cubes"></i> Data Visualization</a></li>
          <li><a href="maps.html"><i class="fa fa-file-text"></i> Reports</a></li>
          
            </ul>
          </li>
		  <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-bar-chart-o"></i> Data Analysis per county <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="central.php"><i class="fa fa-map-marker"></i> Central Region Counties</a></li>
			  <li><a href="eastern.php"><i class="fa fa-map-marker"></i> Eastern Region Counties</a></li>
              <li><a href="chart.php"><i class="fa fa-cubes"></i> Data Visualization</a></li>
              <li><a href="maps.html"><i class="fa fa-file-text"></i> Reports</a></li>

            </ul>
          </li>
          
          <li><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <!--ol class="breadcrumb">
		  <li>Admin Panel</a></li>
					<li>Data Visualization</li>
					<li>Company Data</li>
            
          </ol-->
          


			<div class="row">
		  <div class="col-md-12 col-sm-12">
		  <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                  <li class="active"><a href="#patient_data" role="tab" data-toggle="tab">Patient Data</a></li>
				  <li><a href="#hospital_data" role="tab" data-toggle="tab">Registered Hospitals</a></li>
				  <li><a href="#gender_data" role="tab" data-toggle="tab">Gender comparison per county</a></li>
				  <li><a href="#condition_data" role="tab" data-toggle="tab">Illness concentration</a></li>
                  
                </ul>

				<div class="tab-content">
					<div class="tab-pane fade in active" id="patient_data">
						
						<div class="table-responsive">
						<table>
						<div class="templatemo-chart-box col-sm-6 col-xs-12">
							<div>
							  <canvas id="PatientPieChart"></canvas>
							  <p><b><u><i>Total registered patients in terms of Gender</i></u></b></p>
							</div>
						</div>
						<div class="templatemo-chart-box  col-sm-6 col-xs-12">
							<div>
							  <canvas id="PatientCountyChart"></canvas>
							  <p><b><u><i>Total registered patients per province</i></u></b></p>
							</div>
						</div>
						</table>
						</div>
							
					</div>
					
					<div class="tab-pane fade in active" id="hospital_data">
						
						<div class="table-responsive">
						<table>
							<div>
							  <canvas id="HospitalsChart"></canvas>
							  <p align="center"><b><u><i>Total registered hospitals per province</i></u></b></p>
							</div>
							</table>
						</div>
					</div>
					<div class="tab-pane fade in active" id="gender_data">
						
						<div class="table-responsive">
						<table>
							<div>
							  <canvas id="GenderChart"></canvas>
							  <p align="center"><b><u><i>Gender comparison per province</i></u></b></p>
							</div>
							</table>
						</div>
					</div>
					<div class="tab-pane fade in active" id="condition_data">
						
						<div class="table-responsive">
						<table>
							<div>
							  <canvas id="ConditionChart"></canvas>
							  <p align="center"><b><u><i>Illness concentration</i></u></b></p>
							</div>
							
							</table>
						</div>
					</div>
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
              <a href="sign-in.html" class="btn btn-primary">Yes</a>
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
  const ctx_barHosp = document.getElementById('HospitalsChart');
  new Chart(ctx_barHosp, {
    type: 'bar',
    data: {
      labels: ['Nairobi Province', 'Central Province', 'Eastern Province', 'Western Province', 'Nyanza Province', 'Rift Valley Province', 'North Eastern Province',
	  'Coast Province'],
      datasets: [{
        label: '# of Hospitals',
        data: [<?php echo $total_nairobi_hosp; ?>, <?php echo $total_central_hosp; ?>, <?php echo $total_eastern_hosp; ?>, <?php echo $total_western_hosp; ?>, 
		<?php echo $total_nyanza_hosp; ?>, <?php echo $total_rift_hosp; ?>, <?php echo $total_northern_hosp; ?>, <?php echo $total_coast_hosp; ?> ],
		 backgroundColor: 'rgba(162, 236, 254)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
  const ctx_piePatients = document.getElementById('PatientPieChart');
  new Chart(ctx_piePatients, {
    type: 'pie',
    data: {
      labels: ['Female', 'Male'],
      datasets: [{
        label: '# of Patients',
        data: [<?php echo $totalFemales; ?>, <?php echo $totalMales; ?> ],
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
  
  const ctx_barGender = document.getElementById('GenderChart');
  new Chart(ctx_barGender, {
    type: 'bar',
    data: {
      labels: ['Nairobi Province', 'Central Province', 'Eastern Province', 'Western Province', 'Nyanza Province', 'Rift Valley Province', 'North Eastern Province',
	  'Coast Province'],
      datasets: [{
        label: '# of male patients',
        data: [<?php echo $total_nairobi_patientM; ?>, <?php echo $total_central_patientM; ?>, <?php echo $total_eastern_patientM; ?>, <?php echo $total_western_patientM; ?>, 
		<?php echo $total_nyanza_patientM; ?>, <?php echo $total_rift_patientM; ?>, <?php echo $total_northern_patientM; ?>, <?php echo $total_coast_patientM; ?> ],
		 backgroundColor: 'rgba(110, 224, 182)',
        borderWidth: 1
      },
	  {
        label: '# of female patients',
        data: [<?php echo $total_nairobi_patientF; ?>, <?php echo $total_central_patientF; ?>, <?php echo $total_eastern_patientF; ?>, <?php echo $total_western_patientF; ?>, 
		<?php echo $total_nyanza_patientF; ?>, <?php echo $total_rift_patientF; ?>, <?php echo $total_northern_patientF; ?>, <?php echo $total_coast_patientF; ?> ],
		 backgroundColor: 'rgba(162, 236, 254)',
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
  
  const ctx_barCondition = document.getElementById('ConditionChart');
  new Chart(ctx_barCondition, {
    type: 'bar',
    data: {
      labels: ['Cancer', 'Cardiovascular', 'Respiratory', 'Endocrine', 'Eye disorders', 'Gastro-intestinal', 'Gynaecological','Genitourinary','Musculoskeletal',
	  'Neurological', 'Blood disorders','Congenital','Skin disorders'],
      datasets: [{
        label: '# Nairobi',
        data: [<?php echo $totalCancerNrb; ?>, <?php echo $totalCardiovascularNrb; ?>, <?php echo $totalRespiratoryNrb; ?>, <?php echo $totalEndocrineNrb; ?>, 
		<?php echo $totalEyeNrb; ?>, <?php echo $totalGastroNrb; ?>, <?php echo $totalGynaecologicalNrb; ?>, <?php echo $totalGenitourinaryNrb; ?>, 
		<?php echo $totalMusculoskeletalNrb; ?> , <?php echo $totalNeurologicalNrb; ?>, <?php echo $totalBloodNrb; ?>, <?php echo $totalCongenitalNrb; ?>, <?php echo $totalSkinNrb; ?>		],
		 backgroundColor: 'rgba(66, 239, 245)',
        borderWidth: 1
      },
	  {
        label: '# Central',
        data: [<?php echo $totalCancerCen; ?>, <?php echo $totalCardiovascularCen; ?>, <?php echo $totalRespiratoryCen; ?>, <?php echo $totalEndocrineCen; ?>, 
		<?php echo $totalEyeCen; ?>, <?php echo $totalGastroCen; ?>, <?php echo $totalGynaecologicalCen; ?>, <?php echo $totalGenitourinaryCen; ?>, 
		<?php echo $totalMusculoskeletalCen; ?> , <?php echo $totalNeurologicalCen; ?>, <?php echo $totalBloodCen; ?>, <?php echo $totalCongenitalCen; ?>, <?php echo $totalSkinCen; ?>		],
		 backgroundColor: 'rgba(245, 170, 66)',
        borderWidth: 1
      },
	  {
        label: '# Eastern',
        data: [<?php echo $totalCancerEast; ?>, <?php echo $totalCardiovascularEast; ?>, <?php echo $totalRespiratoryEast; ?>, <?php echo $totalEndocrineEast; ?>, 
		<?php echo $totalEyeEast; ?>, <?php echo $totalGastroEast; ?>, <?php echo $totalGynaecologicalEast; ?>, <?php echo $totalGenitourinaryEast; ?>, 
		<?php echo $totalMusculoskeletalEast; ?> , <?php echo $totalNeurologicalEast; ?>, <?php echo $totalBloodEast; ?>, <?php echo $totalCongenitalEast; ?>, <?php echo $totalSkinEast; ?>		],
		 backgroundColor: 'rgba(66, 245, 78)',
        borderWidth: 1
      },
	  {
        label: '# Western',
        data: [<?php echo $totalCancerWest; ?>, <?php echo $totalCardiovascularWest; ?>, <?php echo $totalRespiratoryWest; ?>, <?php echo $totalEndocrineWest; ?>, 
		<?php echo $totalEyeWest; ?>, <?php echo $totalGastroWest; ?>, <?php echo $totalGynaecologicalWest; ?>, <?php echo $totalGenitourinaryWest; ?>, 
		<?php echo $totalMusculoskeletalWest; ?> , <?php echo $totalNeurologicalWest; ?>, <?php echo $totalBloodWest; ?>, <?php echo $totalCongenitalWest; ?>, <?php echo $totalSkinWest; ?>		],
		 backgroundColor: 'rgba(245, 81, 66)',
        borderWidth: 1
      },
	  {
        label: '# Nyanza',
        data: [<?php echo $totalCancerNy; ?>, <?php echo $totalCardiovascularNy; ?>, <?php echo $totalRespiratoryNy; ?>, <?php echo $totalEndocrineNy; ?>, 
		<?php echo $totalEyeNy; ?>, <?php echo $totalGastroNy; ?>, <?php echo $totalGynaecologicalNy; ?>, <?php echo $totalGenitourinaryNy; ?>, 
		<?php echo $totalMusculoskeletalNy; ?> , <?php echo $totalNeurologicalNy; ?>, <?php echo $totalBloodNy; ?>, <?php echo $totalCongenitalNy; ?>, <?php echo $totalSkinNy; ?>		],
		 backgroundColor: 'rgba(206, 66, 245)',
        borderWidth: 1
      },
	  {
        label: '# Rift',
        data: [<?php echo $totalCancerRift; ?>, <?php echo $totalCardiovascularRift; ?>, <?php echo $totalRespiratoryRift; ?>, <?php echo $totalEndocrineRift; ?>, 
		<?php echo $totalEyeRift; ?>, <?php echo $totalGastroRift; ?>, <?php echo $totalGynaecologicalRift; ?>, <?php echo $totalGenitourinaryRift; ?>, 
		<?php echo $totalMusculoskeletalRift; ?> , <?php echo $totalNeurologicalRift; ?>, <?php echo $totalBloodRift; ?>, <?php echo $totalCongenitalRift; ?>, <?php echo $totalSkinRift; ?>		],
		 backgroundColor: 'rgba(223, 235, 233)',
        borderWidth: 1
      },
	  {
        label: '# North',
        data: [<?php echo $totalCancerNorth; ?>, <?php echo $totalCardiovascularNorth; ?>, <?php echo $totalRespiratoryNorth; ?>, <?php echo $totalEndocrineNorth; ?>, 
		<?php echo $totalEyeNorth; ?>, <?php echo $totalGastroNorth; ?>, <?php echo $totalGynaecologicalNorth; ?>, <?php echo $totalGenitourinaryNorth; ?>, 
		<?php echo $totalMusculoskeletalNorth; ?> , <?php echo $totalNeurologicalNorth; ?>, <?php echo $totalBloodNorth; ?>, <?php echo $totalCongenitalNorth; ?>, <?php echo $totalSkinNorth; ?>		],
		 backgroundColor: 'rgba(201, 36, 89)',
        borderWidth: 1
      },
	  {
        label: '# Coast',
        data: [<?php echo $totalCancerCoast; ?>, <?php echo $totalCardiovascularCoast; ?>, <?php echo $totalRespiratoryCoast; ?>, <?php echo $totalEndocrineCoast; ?>, 
		<?php echo $totalEyeCoast; ?>, <?php echo $totalGastroCoast; ?>, <?php echo $totalGynaecologicalCoast; ?>, <?php echo $totalGenitourinaryCoast; ?>, 
		<?php echo $totalMusculoskeletalCoast; ?> , <?php echo $totalNeurologicalCoast; ?>, <?php echo $totalBloodCoast; ?>, <?php echo $totalCongenitalCoast; ?>, <?php echo $totalSkinCoast; ?>		],
		 backgroundColor: 'rgba(66, 81, 245)',
        borderWidth: 1
      },
	  {
        label: '# Total',
        data: [<?php echo $totalCancer; ?>, <?php echo $totalCardiovascular; ?>, <?php echo $totalRespiratory; ?>, <?php echo $totalEndocrine; ?>, 
		<?php echo $totalEye; ?>, <?php echo $totalGastro; ?>, <?php echo $totalGynaecological; ?>, <?php echo $totalGenitourinary; ?>, 
		<?php echo $totalMusculoskeletal; ?> , <?php echo $totalNeurological; ?>, <?php echo $totalBlood; ?>, <?php echo $totalCongenital; ?>, <?php echo $totalSkin; ?>		],
		 backgroundColor: 'rgba(110, 224, 182)',
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
<script>
  $(document).ready(function(){
    $("#templatemo-tabs a").click(function(){
      switch($(this).attr("href")) {
        case "#patient_data":
          // Initialize the PatientPieChart and PatientCountyChart here
          break;
        case "#hospital_data":
          // Initialize the HospitalsChart here
          break;
        case "#gender_data":
          // Initialize the GenderChart here
          break;
        case "#condition_data":
          // Initialize the ConditionChart here
          break;
      }
    });
  });
</script>



     <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	
	<?php endif ?>
  </body>
</html>