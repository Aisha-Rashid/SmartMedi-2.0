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
			  <li class ="active"><a href="#"><i class="fa fa-map-marker"></i> Rift Valley Region</a></li>
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
							  <canvas id="RiftBarChart"></canvas>
							  <p align="center"><b><u><i>Rift Valley Region</i></u></b></p>
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
              <a href="rift.php?logout='1'" class="btn btn-primary">Yes</a>
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

  const ctx_barRift = document.getElementById('RiftBarChart');
  new Chart(ctx_barRift, {
    type: 'bar',
    data: {
      labels: ['Cancer', 'Cardiovascular', 'Respiratory', 'Endocrine', 'Eye disorders', 'Gastro-intestinal', 'Gynaecological','Genitourinary','Musculoskeletal',
	  'Neurological', 'Blood disorders','Congenital','Skin disorders'],
      datasets: [{
        label: '# Baringo',
        data: [<?php echo $totalCancerBaringo; ?>, <?php echo $totalCardiovascularBaringo; ?>, <?php echo $totalRespiratoryBaringo; ?>, <?php echo $totalEndocrineBaringo; ?>, 
		<?php echo $totalEyeBaringo; ?>, <?php echo $totalGastroBaringo; ?>, <?php echo $totalGynaecologicalBaringo; ?>, <?php echo $totalGenitourinaryBaringo; ?>, 
		<?php echo $totalMusculoskeletalBaringo; ?> , <?php echo $totalNeurologicalBaringo; ?>, <?php echo $totalBloodBaringo; ?>, <?php echo $totalCongenitalBaringo; ?>, <?php echo $totalSkinBaringo; ?>		],
		 backgroundColor: 'rgba(66, 239, 245)',
        borderWidth: 1
      },
	  {
        label: '# Bomet',
        data: [<?php echo $totalCancerBomet; ?>, <?php echo $totalCardiovascularBomet; ?>, <?php echo $totalRespiratoryBomet; ?>, <?php echo $totalEndocrineBomet; ?>, 
		<?php echo $totalEyeBomet; ?>, <?php echo $totalGastroBomet; ?>, <?php echo $totalGynaecologicalBomet; ?>, <?php echo $totalGenitourinaryBomet; ?>, 
		<?php echo $totalMusculoskeletalBomet; ?> , <?php echo $totalNeurologicalBomet; ?>, <?php echo $totalBloodBomet; ?>, <?php echo $totalCongenitalBomet; ?>, <?php echo $totalSkinBomet; ?>		],
		 backgroundColor: 'rgba(245, 170, 66)',
        borderWidth: 1
      },
	  {
        label: '# Elgeyo/Marakwet',
        data: [<?php echo $totalCancerElgeyo; ?>, <?php echo $totalCardiovascularElgeyo; ?>, <?php echo $totalRespiratoryElgeyo; ?>, <?php echo $totalEndocrineElgeyo; ?>, 
		<?php echo $totalEyeElgeyo; ?>, <?php echo $totalGastroElgeyo; ?>, <?php echo $totalGynaecologicalElgeyo; ?>, <?php echo $totalGenitourinaryElgeyo; ?>, 
		<?php echo $totalMusculoskeletalElgeyo; ?> , <?php echo $totalNeurologicalElgeyo; ?>, <?php echo $totalBloodElgeyo; ?>, <?php echo $totalCongenitalElgeyo; ?>, <?php echo $totalSkinElgeyo; ?>		],
		 backgroundColor: 'rgba(66, 245, 78)',
        borderWidth: 1
      },
	  {
        label: '# Kajiado',
        data: [<?php echo $totalCancerKajiado; ?>, <?php echo $totalCardiovascularKajiado; ?>, <?php echo $totalRespiratoryKajiado; ?>, <?php echo $totalEndocrineKajiado; ?>, 
		<?php echo $totalEyeKajiado; ?>, <?php echo $totalGastroKajiado; ?>, <?php echo $totalGynaecologicalKajiado; ?>, <?php echo $totalGenitourinaryKajiado; ?>, 
		<?php echo $totalMusculoskeletalKajiado; ?> , <?php echo $totalNeurologicalKajiado; ?>, <?php echo $totalBloodKajiado; ?>, <?php echo $totalCongenitalKajiado; ?>, <?php echo $totalSkinKajiado; ?>		],
		 backgroundColor: 'rgba(245, 81, 66)',
        borderWidth: 1
      },
	  {
        label: '# Kericho',
        data: [<?php echo $totalCancerKericho; ?>, <?php echo $totalCardiovascularKericho; ?>, <?php echo $totalRespiratoryKericho; ?>, <?php echo $totalEndocrineKericho; ?>, 
		<?php echo $totalEyeKericho; ?>, <?php echo $totalGastroKericho; ?>, <?php echo $totalGynaecologicalKericho; ?>, <?php echo $totalGenitourinaryKericho; ?>, 
		<?php echo $totalMusculoskeletalKericho; ?> , <?php echo $totalNeurologicalKericho; ?>, <?php echo $totalBloodKericho; ?>, <?php echo $totalCongenitalKericho; ?>, <?php echo $totalSkinKericho; ?>		],
		 backgroundColor: 'rgba(206, 66, 245)',
        borderWidth: 1
      },
	  {
        label: '# Laikipia',
        data: [<?php echo $totalCancerLaikipia; ?>, <?php echo $totalCardiovascularLaikipia; ?>, <?php echo $totalRespiratoryLaikipia; ?>, <?php echo $totalEndocrineLaikipia; ?>, 
		<?php echo $totalEyeLaikipia; ?>, <?php echo $totalGastroLaikipia; ?>, <?php echo $totalGynaecologicalLaikipia; ?>, <?php echo $totalGenitourinaryLaikipia; ?>, 
		<?php echo $totalMusculoskeletalLaikipia; ?> , <?php echo $totalNeurologicalLaikipia; ?>, <?php echo $totalBloodLaikipia; ?>, <?php echo $totalCongenitalLaikipia; ?>, <?php echo $totalSkinLaikipia; ?>		],
		 backgroundColor: 'rgba(223, 235, 233)',
        borderWidth: 1
      },
	  {
        label: '# Nakuru',
        data: [<?php echo $totalCancerNakuru; ?>, <?php echo $totalCardiovascularNakuru; ?>, <?php echo $totalRespiratoryNakuru; ?>, <?php echo $totalEndocrineNakuru; ?>, 
		<?php echo $totalEyeNakuru; ?>, <?php echo $totalGastroNakuru; ?>, <?php echo $totalGynaecologicalNakuru; ?>, <?php echo $totalGenitourinaryNakuru; ?>, 
		<?php echo $totalMusculoskeletalNakuru; ?> , <?php echo $totalNeurologicalNakuru; ?>, <?php echo $totalBloodNakuru; ?>, <?php echo $totalCongenitalNakuru; ?>, <?php echo $totalSkinNakuru; ?>		],
		 backgroundColor: 'rgba(201, 36, 89)',
        borderWidth: 1
      },
	  {
        label: '# Nandi',
        data: [<?php echo $totalCancerNandi; ?>, <?php echo $totalCardiovascularNandi; ?>, <?php echo $totalRespiratoryNandi; ?>, <?php echo $totalEndocrineNandi; ?>, 
		<?php echo $totalEyeNandi; ?>, <?php echo $totalGastroNandi; ?>, <?php echo $totalGynaecologicalNandi; ?>, <?php echo $totalGenitourinaryNandi; ?>, 
		<?php echo $totalMusculoskeletalNandi; ?> , <?php echo $totalNeurologicalNandi; ?>, <?php echo $totalBloodNandi; ?>, <?php echo $totalCongenitalNandi; ?>, <?php echo $totalSkinNandi; ?>		],
		 backgroundColor: 'rgba(66, 81, 245)',
        borderWidth: 1
      },
	  {
        label: '# Narok',
        data: [<?php echo $totalCancerNarok; ?>, <?php echo $totalCardiovascularNarok; ?>, <?php echo $totalRespiratoryNarok; ?>, <?php echo $totalEndocrineNarok; ?>, 
		<?php echo $totalEyeNarok; ?>, <?php echo $totalGastroNarok; ?>, <?php echo $totalGynaecologicalNarok; ?>, <?php echo $totalGenitourinaryNarok; ?>, 
		<?php echo $totalMusculoskeletalNarok; ?> , <?php echo $totalNeurologicalNarok; ?>, <?php echo $totalBloodNarok; ?>, <?php echo $totalCongenitalNarok; ?>, <?php echo $totalSkinNarok; ?>		],
		 backgroundColor: 'rgba(110, 224, 182)',
        borderWidth: 1
      },
	  {
        label: '# Samburu',
        data: [<?php echo $totalCancerSamburu; ?>, <?php echo $totalCardiovascularSamburu; ?>, <?php echo $totalRespiratorySamburu; ?>, <?php echo $totalEndocrineSamburu; ?>, 
		<?php echo $totalEyeSamburu; ?>, <?php echo $totalGastroSamburu; ?>, <?php echo $totalGynaecologicalSamburu; ?>, <?php echo $totalGenitourinarySamburu; ?>, 
		<?php echo $totalMusculoskeletalSamburu; ?> , <?php echo $totalNeurologicalSamburu; ?>, <?php echo $totalBloodSamburu; ?>, <?php echo $totalCongenitalSamburu; ?>, <?php echo $totalSkinSamburu; ?>		],
		 backgroundColor: 'rgba(226, 255, 130)',
        borderWidth: 1
      },
	  {
        label: '# Trans Nzoia',
        data: [<?php echo $totalCancerTrans; ?>, <?php echo $totalCardiovascularTrans; ?>, <?php echo $totalRespiratoryTrans; ?>, <?php echo $totalEndocrineTrans; ?>, 
		<?php echo $totalEyeTrans; ?>, <?php echo $totalGastroTrans; ?>, <?php echo $totalGynaecologicalTrans; ?>, <?php echo $totalGenitourinaryTrans; ?>, 
		<?php echo $totalMusculoskeletalTrans; ?> , <?php echo $totalNeurologicalTrans; ?>, <?php echo $totalBloodTrans; ?>, <?php echo $totalCongenitalTrans; ?>, <?php echo $totalSkinTrans; ?>		],
		 backgroundColor: 'rgba(12, 13, 13)',
        borderWidth: 1
      },
	  {
        label: '# Turkana',
        data: [<?php echo $totalCancerTurkana; ?>, <?php echo $totalCardiovascularTurkana; ?>, <?php echo $totalRespiratoryTurkana; ?>, <?php echo $totalEndocrineTurkana; ?>, 
		<?php echo $totalEyeTurkana; ?>, <?php echo $totalGastroTurkana; ?>, <?php echo $totalGynaecologicalTurkana; ?>, <?php echo $totalGenitourinaryTurkana; ?>, 
		<?php echo $totalMusculoskeletalTurkana; ?> , <?php echo $totalNeurologicalTurkana; ?>, <?php echo $totalBloodTurkana; ?>, <?php echo $totalCongenitalTurkana; ?>, <?php echo $totalSkinTurkana; ?>		],
		 backgroundColor: 'rgba(3, 130, 11)',
        borderWidth: 1
      },
	  {
        label: '# Uasin Gishu',
        data: [<?php echo $totalCancerUasin; ?>, <?php echo $totalCardiovascularUasin; ?>, <?php echo $totalRespiratoryUasin; ?>, <?php echo $totalEndocrineUasin; ?>, 
		<?php echo $totalEyeUasin; ?>, <?php echo $totalGastroUasin; ?>, <?php echo $totalGynaecologicalUasin; ?>, <?php echo $totalGenitourinaryUasin; ?>, 
		<?php echo $totalMusculoskeletalUasin; ?> , <?php echo $totalNeurologicalUasin; ?>, <?php echo $totalBloodUasin; ?>, <?php echo $totalCongenitalUasin; ?>, <?php echo $totalSkinUasin; ?>		],
		 backgroundColor: 'rgba(250, 5, 91)',
        borderWidth: 1
      },
	  {
        label: '# West Pokot',
        data: [<?php echo $totalCancerPokot; ?>, <?php echo $totalCardiovascularPokot; ?>, <?php echo $totalRespiratoryPokot; ?>, <?php echo $totalEndocrinePokot; ?>, 
		<?php echo $totalEyePokot; ?>, <?php echo $totalGastroPokot; ?>, <?php echo $totalGynaecologicalPokot; ?>, <?php echo $totalGenitourinaryPokot; ?>, 
		<?php echo $totalMusculoskeletalPokot; ?> , <?php echo $totalNeurologicalPokot; ?>, <?php echo $totalBloodPokot; ?>, <?php echo $totalCongenitalPokot; ?>, <?php echo $totalSkinPokot; ?>		],
		 backgroundColor: 'rgba(145, 52, 1)',
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