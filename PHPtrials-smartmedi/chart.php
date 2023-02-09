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
   
   //Patient vs gender pie chart
   $AllDataRes1 = mysqli_query($db, "select * from patients where gender = 'Female'");
   $totalFemales = mysqli_num_rows($AllDataRes1);
   
   $AllDataRes2 = mysqli_query($db, "select * from patients where gender = 'Male'");
   $totalMales = mysqli_num_rows($AllDataRes2);
   
   
   //Patients per county pie chart
   $nairobi_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county='Nairobi City'");
   $total_nairobi_patient = mysqli_num_rows($nairobi_patient_query);
   
   $central_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')");
   $total_central_patient = mysqli_num_rows($central_patient_query);
   
   $eastern_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')");
   $total_eastern_patient = mysqli_num_rows($eastern_patient_query);
   
   $western_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')");
   $total_western_patient = mysqli_num_rows($western_patient_query);
   
   $nyanza_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')");
   $total_nyanza_patient = mysqli_num_rows($nyanza_patient_query);
   
   $rift_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')");
   $total_rift_patient = mysqli_num_rows($rift_patient_query);
   
   $northern_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Garissa', 'Wajir', 'Mandera')");
   $total_northern_patient = mysqli_num_rows($northern_patient_query);
   
   $coast_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')");
   $total_coast_patient = mysqli_num_rows($coast_patient_query);
   
   //Patients per county per gender pie chart
	   //Male
	   $nairobi_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county ='Nairobi City' AND gender='Male'");
	   $total_nairobi_patientM = mysqli_num_rows($nairobi_patientM_query);
	   
	   $central_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND gender='Male'");
	   $total_central_patientM = mysqli_num_rows($central_patientM_query);
	   
	   $eastern_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND gender='Male'");
	   $total_eastern_patientM = mysqli_num_rows($eastern_patientM_query);
	   
	   $western_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND gender='Male'");
	   $total_western_patientM = mysqli_num_rows($western_patientM_query);
	   
	   $nyanza_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND gender='Male'");
	   $total_nyanza_patientM = mysqli_num_rows($nyanza_patientM_query);
	   
	   $rift_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND gender='Male'");
	   $total_rift_patientM = mysqli_num_rows($rift_patientM_query);
	   
	   $northern_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Garissa', 'Wajir', 'Mandera') AND gender='Male'");
	   $total_northern_patientM = mysqli_num_rows($northern_patientM_query);
	   
	   $coast_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND gender='Male'");
	   $total_coast_patientM = mysqli_num_rows($coast_patientM_query);
	   
	   //Female
	   $nairobi_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nairobi City') AND gender='Female'");
	   $total_nairobi_patientF = mysqli_num_rows($nairobi_patientF_query);
	   
	   $central_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND gender='Female'");
	   $total_central_patientF = mysqli_num_rows($central_patientF_query);
	   
	   $eastern_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND gender='Female'");
	   $total_eastern_patientF = mysqli_num_rows($eastern_patientF_query);
	   
	   $western_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND gender='Female'");
	   $total_western_patientF = mysqli_num_rows($western_patientF_query);
	   
	   $nyanza_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND gender='Female'");
	   $total_nyanza_patientF = mysqli_num_rows($nyanza_patientF_query);
	   
	   $rift_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND gender='Female'");
	   $total_rift_patientF = mysqli_num_rows($rift_patientF_query);
	   
	   $northern_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Garissa', 'Wajir', 'Mandera') AND gender='Female'");
	   $total_northern_patientF = mysqli_num_rows($northern_patientF_query);
	   
	   $coast_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND gender='Female'");
	   $total_coast_patientF = mysqli_num_rows($coast_patientF_query);
   
   
   
   //Hospitals per county Bar graph
   $nairobi_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county='Nairobi City'");
   $total_nairobi_hosp = mysqli_num_rows($nairobi_hosp_query);
   
   $central_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')");
   $total_central_hosp = mysqli_num_rows($central_hosp_query);
   
   $eastern_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')");
   $total_eastern_hosp = mysqli_num_rows($eastern_hosp_query);
   
   $western_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')");
   $total_western_hosp = mysqli_num_rows($western_hosp_query);
   
   $nyanza_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')");
   $total_nyanza_hosp = mysqli_num_rows($nyanza_hosp_query);
   
   $rift_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')");
   $total_rift_hosp = mysqli_num_rows($rift_hosp_query);
   
   $northern_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Garissa', 'Wajir', 'Mandera')");
   $total_northern_hosp = mysqli_num_rows($northern_hosp_query);
   
   $coast_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')");
   $total_coast_hosp = mysqli_num_rows($coast_hosp_query);
   
   
   //No. of patients per illness Bar graph
	$AllDataRes1 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Cancer%'");
   $totalCancer = mysqli_num_rows($AllDataRes1);
   
   $AllDataRes2 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Cardiovascular%'");
   $totalCardiovascular = mysqli_num_rows($AllDataRes2);
   
   $AllDataRes3 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Respiratory%'");
   $totalRespiratory = mysqli_num_rows($AllDataRes3);
   
   $AllDataRes4 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Endocrine%'");
   $totalEndocrine = mysqli_num_rows($AllDataRes4);
   
   $AllDataRes5 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Eye%'");
   $totalEye = mysqli_num_rows($AllDataRes5);
   
   $AllDataRes6 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Gastro-intestinal%'");
   $totalGastro = mysqli_num_rows($AllDataRes6);
   
   $AllDataRes7 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Gynaecological%'");
   $totalGynaecological = mysqli_num_rows($AllDataRes7);
   
   $AllDataRes8 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Genitourinary%'");
   $totalGenitourinary = mysqli_num_rows($AllDataRes8);
   
   $AllDataRes9 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Musculoskeletal%'");
   $totalMusculoskeletal = mysqli_num_rows($AllDataRes9);
   
   $AllDataRes10 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Neurological%'");
   $totalNeurological = mysqli_num_rows($AllDataRes10);
   
   $AllDataRes11 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Blood%'");
   $totalBlood = mysqli_num_rows($AllDataRes11);
   
   $AllDataRes12 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Congenital%'");
   $totalCongenital = mysqli_num_rows($AllDataRes12);
   
   $AllDataRes13 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Skin%'");
   $totalSkin = mysqli_num_rows($AllDataRes13);
   
  
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
						</div>
							
					</div>
					
					<div class="tab-pane fade in active" id="hospital_data">
						
						<div class="table-responsive">
							<div>
							  <canvas id="HospitalsChart"></canvas>
							  <p align="center"><b><u><i>Total registered hospitals per province</i></u></b></p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade in active" id="gender_data">
						
						<div class="table-responsive">
							<div>
							  <canvas id="GenderChart"></canvas>
							  <p align="center"><b><u><i>Gender comparison per province</i></u></b></p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade in active" id="condition_data">
						
						<div class="table-responsive">
							<div>
							  <canvas id="ConditionChart"></canvas>
							  <p align="center"><b><u><i>Illness concentration</i></u></b></p>
							</div>
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
      labels: ['Male', 'Female'],
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
        label: '# of Patients',
        data: [<?php echo $totalCancer; ?>, <?php echo $totalCardiovascular; ?>, <?php echo $totalRespiratory; ?>, <?php echo $totalEndocrine; ?>, 
		<?php echo $totalEye; ?>, <?php echo $totalGastro; ?>, <?php echo $totalGynaecological; ?>, <?php echo $totalGenitourinary; ?>, 
		<?php echo $totalMusculoskeletal; ?> , <?php echo $totalNeurological; ?>, <?php echo $totalBlood; ?>, <?php echo $totalCongenital; ?>, <?php echo $totalSkin; ?>		],
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
</script>



     <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	
	<?php endif ?>
  </body>
</html>