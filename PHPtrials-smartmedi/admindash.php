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
   
   ?>


	<div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>SmartMedi - Admin Dashboard</h1></div>
        
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
              <li><a href="data-visualization.php"><i class="fa fa-cubes"></i> Data Visualization</a></li>
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
            <li><a href="#">Admin Panel</a></li>
            <li>Overview</li>
			</ol>
          <h1>SmartMedi - Admin Dashboard</h1>
		  <hr>
		  <p>Work ID :	<b><?php echo $array[2];?></b></p> 
		  <p>Name :	<b><?php echo $array[0]; echo " "; echo $array[1];;?></b></p>
			<hr>

      <div class="row margin-bottom-30">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="active"><a href="#">Total Patients Registered <span class="badge">42</span></a></li>
            <li class="active"><a href="#">Medical Practitioners <span class="badge">107</span></a></li>
            <li class="active"><a href="#">Hospitals Registered <span class="badge">3</span></a></li>
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
							$query="select * from patients";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
								$count = $res;
							
							$FirstName =$row['FirstName'];
							$LastName=$row['LastName'];
							$IDNo=$row['IDNo'];
							?>
					<tr>
						<td><?php echo $row['FirstName'] ?></td>
						<td><?php echo $row['LastName'] ?></td>
						<td><?php echo $row['IDNo'] ?></td>
						
					</tr>
					<?php } ?>
				 </tbody>
				 </table>
					
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
							$query="select * from doctors";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$fname =$row['fname'];
							$lname=$row['lname'];
							$nationalid=$row['nationalid'];
							$hospital=$row['hospital'];
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
						
					</tr>
					<?php } ?>
				 </tbody>
				 </table>
                      </div>
                    </div>
					<span class="btn btn-primary"><a href="manage-users.php">Manage</a></span>
                  </div>
				  
				  <!-- Admin pane --
                  <div class="tab-pane fade" id="admin">
                    <div class="panel panel-primary">
                      <div class="panel-heading"></div>
                      <div class="panel-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>ID Number</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>John</td>
                              <td>Smith</td>
                              <td>@js</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Bill</td>
                              <td>Jones</td>
                              <td>@bj</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Marry</td>
                              <td>James</td>
                              <td>@mj</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
					<span class="btn btn-primary"><a href="manage-users.php">Manage</a></span>
                  </div-->
                </div> <!-- tab-content --> 
              </div> 
                        
            </div>
			<hr>
          
			
			
			<!--hr>
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <!-- Nav tabs --
                <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                  <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li>
                  <li><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
                  <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
                  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>

                <!-- Tab panes --
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="home">
                    <ul class="list-group">
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Suspendisse dapibus sodales</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Proin mattis ex vitae</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Aenean euismod dui vel</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Vivamus dictum posuere odio</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Morbi convallis sed nisi suscipit</li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="profile">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <span class="badge">33</span>
                        Vivamus dictum posuere odio
                      </li>
                      <li class="list-group-item">
                        <span class="badge">9</span>
                        Dapibus ac facilisis in
                      </li>
                      <li class="list-group-item">
                        <span class="badge">0</span>
                        Morbi convallis sed nisi suscipit
                      </li>
                      <li class="list-group-item">
                        <span class="badge">14</span>
                        Cras justo odio
                      </li>
                      <li class="list-group-item">
                        <span class="badge">2</span>
                        Vestibulum at eros
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="messages">
                    <div class="list-group">
                      <a href="#" class="list-group-item active">
                        Morbi convallis sed nisi suscipit
                      </a>
                      <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                      <a href="#" class="list-group-item">Morbi leo risus</a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                      <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="settings">
                    <div class="list-group">
                      <a href="#" class="list-group-item disabled">
                        Vivamus dictum posuere odio
                      </a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                      <a href="#" class="list-group-item">Vestibulum at eros</a>
                      <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                      <a href="#" class="list-group-item">Morbi leo risus</a>
                    </div>
                  </div>
                </div> <!-- tab-content -- 
              </div> 
              <div class="col-md-6 col-sm-6">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          Accordion Item 1
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          Accordion Item 2
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Accordion Item 3
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        <button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">
                          Click here
                        </button> to load.
                      </div>
                    </div>
                  </div>
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
					<a href="admindash.php?logout='1'" class="btn btn-primary">Yes</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2084 Your Company Name</p>
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
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(220,220,220,0.2)",
        strokeColor : "rgba(220,220,220,1)",
        pointColor : "rgba(220,220,220,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(220,220,220,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        label: "My Second dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
      ]

    }

    window.onload = function(){
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
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