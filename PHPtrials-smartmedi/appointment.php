<?php
include('signin.php'); 

// Starting the session, to use and
// store data in session variable
// session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['IDNo'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['IDNo']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>SmartMedi User Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="dashboardcss/templatemo_main.css">
  <link rel="shortcut icon" href="dashboardimages/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="dashboardimages/apple-touch-icon.png">
 
</head>
<body>
<?php if (isset($_SESSION['IDNo'])) : 
   
   
   $unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   
?>
<?php
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['appointbtn'])!=""){
  $hospital = mysqli_real_escape_string($db, $_POST['hospital']);
  $visit = mysqli_real_escape_string($db, $_POST['visit']);
  $doctype = mysqli_real_escape_string($db, $_POST['doctype']);
  $clinic = mysqli_real_escape_string($db, $_POST['clinic']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  
 

$query=$conn->query("INSERT INTO appointments (IDNo, hospital, clinic, visit, doctype, date, time) VALUES ('$unique', '$hospital', '$clinic', '$visit', '$doctype', '$date', '$time')");
if($query){
header("location:appointment.php");
}
else{
die(mysqli_error($conn));
}
}
?>

	<!-- Start menu -->
    <div class="template-page-wrapper">
		<div class="navbar-collapse collapse templatemo-sidebar">
			<ul class="templatemo-sidebar-menu">
				<li>
				<form class="navbar-form">
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				</form>
				</li>
				<li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="sub open">
				<a href="javascript:;">
				<i class="fa fa-database"></i> Menu <div class="pull-right"><span class="caret"></span></div>
				</a>
				<ul class="templatemo-submenu">
				
				<li><a href="attachments.php">Attachments</a></li>
				<li class="active"><a href="#">Appointments</a></li>
				</ul>
				</li>
				<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			<ol class="breadcrumb">
            <li><a href="dashboard.php">User Panel</a></li>
            <li><a href="#">Appointments</a></li>
            <li>Overview</li>
			</ol>
			


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
				
				<img class="profile_img" src="https://www.pngkey.com/png/detail/349-3499617_person-placeholder-person-placeholder.png" alt="Profile Pic">
				<!--input id="file" type="file" onchange="loadFile(event)"/-->
            <h3>
			<?php echo $array[1]; ?>
			</h3>
          </div>
          <div class="card-body" align = "center">
          </div>
        </div>
      </div>
	  
	   <div class="col-lg-8">
	   <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Book an appointment</h3>
          </div>
          <div class="card-body pt-0">
              <!-- Form start -->
				<form id="form_create_appointment" method="post" action="">
                            <div class="row">
							
							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select Hospital</label>
                                        <select name="hospital" class="form-control">
                                            <OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION>
											<?php 
										$query ="SELECT hospitalname FROM hospitals";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['hospitalname']; ?> </option>
										<?php 
										}
										?>
											
                                        </select>
                                    </div>
                            </div>
							<div class="col-md-6">
							<div class="form-group">
							<label>First Visit?</label><br>
							<select name="visit" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION> 
										<option VALUE="First Visit">Yes</option>
										<option VALUE="Regular Patient">No</option>
							</select>
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
							<label>Type of Doctor</label><br>
							<select name="doctype" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION> 
										<option VALUE="General Doctor">General Doctor</option>
										<option VALUE="Specialist">Specialist</option>
							</select>							
							</div>
							</div><br>
							
							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select clinic</label>
                                        <select name="clinic" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION>  
										<?php 
										$query ="SELECT specialty FROM docspecialty";
										$result = mysqli_query($db, $query);
										if($result->num_rows> 0){
										  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
										}
										
											foreach ($options as $option) {
										?>
										<option><?php echo $option['specialty']; ?> </option>
										<?php 
										}
										?>
										</select>
                                    </div>
                            </div>
							
							
							
							
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="date">Preferred Date</label>
                                        <input id="date" name="date" type="date" placeholder="Preferred Date" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="time">Preferred Time</label>
										<select name="time" id="time" class="form-control">
										<OPTION SELECTED="TRUE" DISABLED="DISABLED">---</OPTION> 
										<?php
										$start = '9:00:00';
										$end = '16:00:00';
										$interval = '30 minutes';

										$range = array();

										$current = new DateTime($start);
										$end = new DateTime($end);

										while ($current <= $end) {
											$range[] = $current->format('g:i a');
											$current->modify($interval);
										}

										foreach ($range as $time) {
											echo "<option value='$time'>$time</option>";
										}
										?>
									</select><br>
                                    </div>
                                </div>
                                
                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn"
										name="appointbtn">Make An Appointment</button>
                                    </div>
                                </div>
							</div>	  
						</form>
                        <!-- form end -->
						
						<div class="card-header bg-transparent border-0">
							<h3 class="mb-0">Appointments </h3> 
						</div>
						
						<div class="card-body pt-0">
                            <table class="table table-bordered" id="appointment_list" >
							<thead>
							  <tr>
								<th>Date</th>
								<th>Hospital</th>
								<th>Clinic</th>
								<th>Time</th>
								<th></th>
							  </tr>
							  </thead>
							  <tbody>
								<?php 
							$query="select * from appointments WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$IDNo=$row['IDNo'];
							$date=$row['date'];
							$hospital=$row['hospital'];
							$clinic=$row['clinic'];
							$time=$row['time'];
							?>
                              
										<tr>
										
                                         
                                         <td><?php echo $row['date'] ?></td>
                                         <td><?php echo $row['hospital'] ?></td>
										 <td><?php echo $row['clinic'] ?></td>
										 <td><?php echo $row['time'] ?></td>
										 <td><a href="server.php?del_app=<?php echo $row['IDNo']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></td>
										
				
                                </tr>
                         
						         <?php } ?> 
                            </tbody>
							</table>
                        </div>
						
						
          </div>
		  
		   
		  
		  
		  
		  
		  
		  
        </div>
	   </div>
    
    </div>
	
		
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>

 	
	<!-- End menu    -->	  
		  	  
    <!-- Start popup -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
					</div>
					<div class="modal-footer">
					<a href="appointment.php?logout='1'" class="btn btn-primary">Yes</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
	<!-- End popup -->

    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
    <script src="dashboardjs/Chart.min.js"></script>
    <script src="dashboardjs/templatemo_script.js"></script>
	<script src="dashboardjs/Graph.js"></script>
	<script src="dashboardjs/appointment.js"></script>
    <script type="text/javascript"></script>
	
	<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};


</script>
  <?php endif ?>   
</body>
</html>