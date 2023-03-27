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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /-->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
		  <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-users"></i> Manage users<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              
              
			  <li><a href="patients.php"><i class="fa fa-male"></i><i class="fa fa-female"></i> Patients</a></li>
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
			<li><a href="report.php"><i class="fa fa-file-text"></i> Reports</a></li>
          <li><a href="adminpassword.php"><i class="fa fa-cog"></i>Preferences</a></li>
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
		  <br>
          <p>Work ID : <b><?php echo $array[2]; ?></b></p>
          <p>Name : <b><?php echo $array[0];
                        echo " ";
                        echo $array[1];; ?></b></p>
          <hr>
<?php
/* $query = "SELECT * FROM hospitalreg WHERE approved = 0";
$result = mysqli_query($db, $query);
$num_rows = mysqli_num_rows($result); */

?>
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
    <div class="navbar-header">
     <h4>Message Board</h4>
    </div>
    <ul class="nav navbar-nav navbar-right">
     <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span>
		<i class="fa fa-bell" aria-hidden="true" style="font-size:18px;"></i></a>	  
      <ul class="dropdown-menu">
	  <?php /* while($row = mysqli_fetch_array($result)) { ?>
    <li>
      <a href="#">
        <strong><?php echo $row['hospital']; ?></strong>
        <br>
        <small><em><?php echo $row['branch']; ?> - <?php echo $row['county']; ?></em></small>
      </a>
    </li>
    <?php }  */?>
	  </ul>
     </li>
    </ul>
	
   </div>
  </nav>
  <table class="table table-striped table-hover table-bordered">
  
								  <thead>
									<tr>
									  
									  <th>Id</th>
									  <th>Hospital Name</th>
									  <th>Branch</th>
									  <th>County</th>
									  <th>Email</th>
									  <th>Tel</th>
									  <th>Applied on</th>
									  <th>Attachment</th>
									  <th>Reviewed By</th>
									  <th>Approved By</th>
									</tr>
								  </thead>
								  <tbody>
								  <?php
								 
							$query="select * from hospitalreg WHERE status = 1";
							$res = mysqli_query($db, $query);
							
							$counter = 1;
							
							while($row=mysqli_fetch_array($res)){
							$number = $counter;
							$counter++;
							$hospital=$row['hospital'];
							$branch=$row['branch'];
							$county=$row['county'];
							$email=$row['email'];
							$tel=$row['tel'];
							$applied=$row['applied'];
							$file=$row['file'];
							
  
  ?>
								<tr>
								<td><?php echo $number;?></td>
								<td><?php echo $row['hospital'];?></td>
								<td><?php echo $row['branch'];?></td>
								<td><?php echo $row['county'];?></td>
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['tel'];?></td>
								<td><?php echo $row['applied'];?></td>
								<td><?php echo $row['file'];?></td>
								<td></td>
								<td></td>
								</tr>
								<?php } ?> 
								  </tbody>
								</table>
          <div class="row">
            <div class="col-md-12 col-sm-12">
             
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
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();

 
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);

});
</script>

	
    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <!--script src="dashboardjs/Chart.min.js"></script-->
    <script src="dashboardjs/templatemo_script.js"></script>
  
  <?php endif ?>
</body>

</html>