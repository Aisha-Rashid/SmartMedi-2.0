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
   
  
   $AllDataRes1 = mysqli_query($db, "select * from patients where gender = 'Female'");
   $totalFemales = mysqli_num_rows($AllDataRes1);
   
   $AllDataRes2 = mysqli_query($db, "select * from patients where gender = 'Male'");
   $totalMales = mysqli_num_rows($AllDataRes2);
   
   
   $AllDataRes3 = mysqli_query($db, "select * from patients where bloodgroup = 'O+' and gender = 'Female'");
   $totalpatientsOFem = mysqli_num_rows($AllDataRes3);
   
   $AllDataRes4 = mysqli_query($db, "select * from patients where bloodgroup = 'A+' and gender = 'Female'");
   $totalpatientsAFem = mysqli_num_rows($AllDataRes4);
   
   $AllDataRes5 = mysqli_query($db, "select * from patients where bloodgroup = 'AB+' and gender = 'Female'");
   $totalpatientsABFem = mysqli_num_rows($AllDataRes5);
   
   $AllDataRes6 = mysqli_query($db, "select * from patients where bloodgroup = 'O+' and gender = 'Male'");
   $totalpatientsOMale = mysqli_num_rows($AllDataRes6);
   
   $AllDataRes7 = mysqli_query($db, "select * from patients where bloodgroup = 'A+' and gender = 'Male'");
   $totalpatientsAMale = mysqli_num_rows($AllDataRes7);
   
   $AllDataRes8 = mysqli_query($db, "select * from patients where bloodgroup = 'AB+' and gender = 'Male'");
   $totalpatientsABMale = mysqli_num_rows($AllDataRes8);
   
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
          <ol class="breadcrumb">
            <li><a href="admindash.php">Admin Panel</a></li>
            <li><a href="#">Data Visualization</a></li>
            <li class="active">Charts</li>
          </ol>
          <h1>Data Visualization</h1>
          <p>Credit goes to <a href="http://www.chartjs.org">chartjs.org</a></p>  <hr>       
          
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                  <div class="panel-heading">Pie Chart &amp; Doughnut Chart</div>
                </div>
                <div class="row templatemo-chart-row">

                  <div class="templatemo-chart-box col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <canvas id="templatemo-pie-chart"></canvas>
                    <h4>Pie Chart</h4>
                    <span class="text-muted">Maecenas non</span>  
                  </div>

                </div>                  
              </div>
            </div>
            <!--div class="row">
			<div class="col-md-6 col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">Bar Chart</div>
                  <canvas id="templatemo-bar-chart"></canvas>
                </div>
              </div> 
            </div-->
			<div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="panel panel-success">
                  <div class="panel-heading">Line Chart</div>
                  <canvas id="templatemo-line-chart"></canvas>
                </div>                       
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">Bar Chart</div>
                  <canvas id="templatemo-bar-chart"></canvas>
                </div>
              </div> 
            </div-->
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
          <p>Copyright &copy; 2084 Your Company Name <!-- Credit: www.templatemo.com --></p>
        </div>
      </footer>
    </div>

</div>

     <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	<script src="dashboardjs/Graph.js"></script>
    <script type="text/javascript">
      // Line chart
      var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
      var lineChartData = {
        labels : ["A","AB","O"],
        datasets : [
        {
          label: "Female Blood Group",
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [<?php echo $totalpatientsAFem; ?>, <?php echo $totalpatientsABFem; ?>, <?php echo $totalpatientsOFem; ?>]
        },
        {
          label: "Male blood group",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [<?php echo $totalpatientsAMale; ?>, <?php echo $totalpatientsABMale; ?>, <?php echo $totalpatientsOMale; ?>]
        }
        ]

      } // lineChartData
//pie chart data
      var pieChartData = [
      {
        value: <?php echo $totalFemales; ?> ,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Female"
      },
      {
        value: <?php echo $totalMales; ?> ,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Male"
      },
      
      ] // pie chart data

      // // radar chart
      // var radarChartData = {
      //   labels: ["Eating", "Drinking"],
      //   datasets: [
      //   {
      //     label: "My First dataset",
      //     fillColor: "rgba(220,220,220,0.2)",
      //     strokeColor: "rgba(220,220,220,1)",
      //     pointColor: "rgba(220,220,220,1)",
      //     pointStrokeColor: "#fff",
      //     pointHighlightFill: "#fff",
      //     pointHighlightStroke: "rgba(220,220,220,1)",
      //     data: [65, 59, 90, 81, 56, 55, 40]
      //   },
      //   {
      //     label: "My Second dataset",
      //     fillColor: "rgba(151,187,205,0.2)",
      //     strokeColor: "rgba(151,187,205,1)",
      //     pointColor: "rgba(151,187,205,1)",
      //     pointStrokeColor: "#fff",
      //     pointHighlightFill: "#fff",
      //     pointHighlightStroke: "rgba(151,187,205,1)",
      //     data: [28, 48, 40, 19, 96, 27, 100]
      //   }
      //   ]
      // }; */ radar chart

      // polar area chart
      

      window.onload = function(){
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        var ctx_bar = document.getElementById("templatemo-bar-chart").getContext("2d");
        var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");
        //var ctx_doughnut = document.getElementById("templatemo-doughnut-chart").getContext("2d");
        //var ctxRadar = document.getElementById("templatemo-radar-chart").getContext("2d");
        //var ctxPolar = document.getElementById("templatemo-polar-chart").getContext("2d");

        window.myLine = new Chart(ctx_line).Line(lineChartData, {
          responsive: true
        });
        window.myBar = new Chart(ctx_bar).Bar(lineChartData, {
          responsive: true
        });
        window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
          responsive: true
        });
        /*window.myDoughnutChart = new Chart(ctx_doughnut).Doughnut(pieChartData,{
          responsive: true
        });
        var myRadarChart = new Chart(ctxRadar).Radar(radarChartData, {
          responsive: true
        });
        var myPolarAreaChart = new Chart(ctxPolar).PolarArea(polarAreaChartData, {
          responsive: true
        });*/
      }
    </script>
	<?php endif ?>
  </body>
</html>