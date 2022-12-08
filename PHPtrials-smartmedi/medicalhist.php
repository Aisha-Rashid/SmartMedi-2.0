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
				<li><a href="#">Medical History</a></li>
				<li><a href="attachments.php">Attachments</a></li>
				<li><a href="appointment.php">Appointments</a></li>
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
            <li><a href="#">Medical History</a></li>
            <li>Overview</li>
			</ol>
			


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
				<a href = "preferences.php"><img class="profile_img" src="https://www.pngkey.com/png/detail/349-3499617_person-placeholder-person-placeholder.png" alt="Profile Pic"></a>
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
          
         <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Medical History</h3>
		<div class="card-header bg-transparent border-0">
			<button class="collapsible">1. Cancers and Blood Disorders</button>
			<div class="content">
				 <a href="mediform.html">Click here to fill in the Basic History form</a>
			</div>
          </div>
		  <br>
          <div class="card-header bg-transparent border-0">
			<button class="collapsible">2. Cardiovascular and Endocrine Disorders</button>
			<div class="content">
				 <a href="#">Upload file</a>
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">3. Eye, ENT and Respiratory Disorders</button>
			<div class="content">
				 <a href="appointment.html">Make an appointment</a>
			</div>
          </div>
		  <br> 
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">4. GastroIntestinal Disorders</button>
			<div class="content">
				 <a href="appointment.html">Make an appointment</a>
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">5. Gynaecological and Genitourinary Disorders</button>
			<div class="content">
				 <a href="appointment.html">Make an appointment</a>
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">6. Musculoskeletal and Neurological Disorders </button>
			<div class="content">
				 <a href="appointment.html">Make an appointment</a>
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">7. Hereditary Disorders</button>
			<div class="content">
				 <a href="appointment.html">Make an appointment</a>
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">8. Skin Disorders</button>
			<div class="content">
				 <a href="appointment.html">Make an appointment</a>
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
					<a href="medicalhist.php?logout='1'" class="btn btn-primary">Yes</a>
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