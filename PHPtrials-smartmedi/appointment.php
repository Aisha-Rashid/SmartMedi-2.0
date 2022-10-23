<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
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
<?php if (isset($_SESSION['username'])) : ?>
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
				<li><a href="medicalhist.php">Medical History</a></li>
				<li><a href="#">Attachments</a></li>
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
			<?php echo $_SESSION['username']; ?>
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
				<form id="form_create_appointment">
                            <div class="row">
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
                                        <select id="time" name="time" class="form-control">
                                            <option value="8:00 to 9:00">8:00 to 9:00</option>
                                            <option value="9:00 to 10:00">9:00 to 10:00</option>
                                            <option value="10:00 to 1:00">10:00 to 1:00</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="appointmentfor">Department</label>
                                        <select id="appointmentfor" name="appointmentfor" class="form-control">
                                            <option value="Choose Department">Choose Department</option>
											<option value="Gynacology">Gynacology</option>
											<option value="Dermatologist">Dermatologist</option>
											<option value="Orthology">Orthology</option>
											<option value="Anesthesiology">Anesthesiology</option>
											<option value="Ayurvedic">Ayurvedic</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" class="new-btn-d br-2" onclick="make_appointment()">Make An Appointment</button>
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
							  <tr>
								<th>Date</th>
								<th>Department</th>
								<th>Time</th>
								<th>Action</th>
							  </tr>
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