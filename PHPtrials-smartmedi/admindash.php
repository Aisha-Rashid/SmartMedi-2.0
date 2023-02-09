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
    $array = mysqli_fetch_row($res);
    $rows = mysqli_num_rows($res);
	
	// number of results per page
	$results_per_page = 10; 

	if (!isset($_GET['page'])) {
	  $page = 1;
	} else {
	  $page = $_GET['page'];
	}
	// Calculate the starting row
	$start_row = ($page-1) * $results_per_page;
	
	$query="select * from patients";
	$total_patients=mysqli_query($db, $query);
	$total_number_patients=mysqli_num_rows($total_patients);
	
	$patientsquery="SELECT * FROM patients LIMIT $start_row, $results_per_page";
    $AllPatientsRes = mysqli_query($db, $patientsquery);
    $totalPatients = mysqli_num_rows($AllPatientsRes);
	
	// Calculate the total number of rows
	$total_rows_query = "SELECT COUNT(*) as total FROM patients";
	$total_rows_result = mysqli_query($db, $total_rows_query);
	$total_rows = mysqli_fetch_assoc($total_rows_result)['total'];

	// Calculate the total number of pages
	$total_pages = ceil($total_rows / $results_per_page);



    $x =  "SELECT DISTINCT hospitalname FROM `hospitals`";
    $Res = mysqli_query($db, $x);
    $totalHospitals = mysqli_num_rows($Res);
	

    $doctorsQuery = "SELECT * FROM `doctors` ORDER by id";
    $doctorsRes = mysqli_query($db, $doctorsQuery);
    $totalDoctors = mysqli_num_rows($doctorsRes);

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
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Nested Menu <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="manage-users.php"><i class="fa fa-users"></i> Manage Users</a></li>
              <li><a href="chart.php"><i class="fa fa-cubes"></i> Data Visualization</a></li>
              <li><a href="maps.html"><i class="fa fa-file-text"></i> Reports</a></li>

            </ul>
          </li>

          <li><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
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

          <div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li class="active"><a href="#">Total Patients Registered <span class="badge"><?php echo $total_number_patients ?></span></a></li>
                <li class="active"><a href="#">Medical Practitioners <span class="badge"><?php echo $totalDoctors; ?></span></a></li>
                <li class="active"><a href="#">Hospitals Registered <span class="badge"><?php echo $totalHospitals; ?></span></a></li>
              </ul>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 col-sm-12">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                <li class="active"><a href="#home" role="tab" data-toggle="tab">General Users</a></li>
                <li><a href="#doctors" role="tab" data-toggle="tab">Medical Practitioners</a></li>
                <li><a href="#hospitals" role="tab" data-toggle="tab">Medical institutions</a></li>
                <!--li><a href="#admin" role="tab" data-toggle="tab">Admin</a></li-->
              </ul>

              <!-- General User pane -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                  <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">

                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>LastName</th>
                            <th>ID Number</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          
                          while ($row = mysqli_fetch_array($AllPatientsRes)) {
                            

                            $FirstName = $row['FirstName'];
                            $LastName = $row['LastName'];
                            $IDNo = $row['IDNo'];
                          ?>
                            <tr>
                              <td><?php echo $row['FirstName'] ?></td>
                              <td><?php echo $row['LastName'] ?></td>
                              <td><?php echo $row['IDNo'] ?></td>

                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
					  <!-- Page navigation links -->
<div class="pagination">
  <?php
  for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='?page=".$i."'>".$i."</a> ";
  }
  ?>
</div>

                    </div>
                  </div>
                  <span class="btn btn-primary"><a href="manage-users.php">Manage</a></span>
                </div>

                <!-- Medical Practitioners pane -->
                <div class="tab-pane fade" id="doctors">
                  <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Hospital</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          //$query="select * from doctors";
                          //$res = mysqli_query($db, $query);
                          while ($row = mysqli_fetch_array($doctorsRes)) {

                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $nationalid = $row['nationalid'];
                            $hospital = $row['hospital'];
                          ?>
                            <tr>
                              <td>
                                <?php echo $row['fname'];
                                echo " ";
                                echo $row['lname'];; ?></td>
                              <td><?php echo $row['nationalid'] ?></td>
                              <td><?php echo $row['hospital'] ?></td>

                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <span class="btn btn-primary"><a href="manage-users.php">Manage</a></span>
                </div>

                <!-- Medical Institutions pane -->
                <div class="tab-pane fade" id="hospitals">
                  <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Hospital Name</th>
                            <th>Region</th>


                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = "select * from hospitals";
                          $res = mysqli_query($db, $query);
                          while ($row = mysqli_fetch_array($res)) {

                            $HospitalID = $row['hospitalID'];
                            $county = $row['county'];
                            $hospitalname = $row['hospitalname'];

                          ?>
                            <tr>

                              <td><?php echo $row['hospitalID'] ?></td>
                              <td><?php echo $row['hospitalname'] ?></td>
                              <td><?php echo $row['county'] ?></td>

                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <span class="btn btn-primary"><a href="manage-users.php">Manage</a></span>
                </div>
              </div> <!-- tab-content -->
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

    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
    <script src="dashboardjs/Graph.js"></script>





    <script type="text/javascript">
      // Line chart
      var randomScalingFactor = function() {
        return Math.round(Math.random() * 100)
      };
      var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
          },
          {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
          }
        ]

      }

      window.onload = function() {
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        window.myLine = new Chart(ctx_line).Line(lineChartData, {
          responsive: true
        });
      };

      $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
      });

      $('#loading-example-btn').click(function() {
        var btn = $(this);
        btn.button('loading');
        // $.ajax(...).always(function () {
        //   btn.button('reset');
        // });
      });
    </script>
  <?php endif ?>
</body>

</html>