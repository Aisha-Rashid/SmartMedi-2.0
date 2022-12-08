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
  	
			
			<ol class="breadcrumb">
			<li><img src="dashboardimages/favicon.ico" alt="Smartmedi"></li>
            <li><b>ID : <?php echo $array[4];?></b></li>
			</ol>
			


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
		    <img class="profile_img" src="https://www.pngkey.com/png/detail/349-3499617_person-placeholder-person-placeholder.png" alt="Profile Pic">
            <h3 >
				<?php echo $array[1];
				echo " ";
				echo $array[2];; ?> 
				<br>
				<?php 
                $age = $array[5] ;
                $year = explode('-', $age);
                $patientAge = date("Y") - $year[0];
                echo $patientAge
                ?>yrs
				<br>
				<?php echo $array[6] ?>
			</h3>
          </div>
          <div class="card-body" align = "center">
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0">General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              
			  <tr>
                <th width="30%">Next of Kin</th>
                <td width="2%">:</td>
                
				<td>
						<?php ;?>
				</td>
              </tr>
			  <tr>
                <th width="30%">Insurance Details</th>
                <td width="2%">:</td>
                
				<td>
						<?php ;?>
				</td>
              </tr>
			  <tr>
                <th width="30%">Blood Group</th>
                <td width="2%">:</td>
                
				<td>
						<?php echo $array[7] ;?>
				</td>
              </tr>
			  <tr>
                <th width="30%">Allergies</th>
                <td width="2%">:</td>
                
				<td>
						<?php ;?>
				</td>
              </tr>
			  <tr>
                <th width="30%">Conditions</th>
                <td width="2%">:</td>
                
				<td>
						<?php ;?>
				</td>
              </tr>
			  
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
		  
        <div class="card shadow-sm">
		
		<div class="card-header bg-transparent border-0">
			<button class="collapsible">Medical History</button>
			<div class="content">
				 <a href="mediform.php">Click here to fill in the Basic History form</a>
			</div>
          </div>
		  <br>
          <div class="card-header bg-transparent border-0">
			<button class="collapsible">Insurance Details</button>
			<div class="content">
				 <a href="#">Download/print report</a>
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">Next of Kin Details</button>
			<div class="content">
				 <a href="appointment.html">Upgrade or retore previous package</a>
			</div>
          </div>
		  <br>
		    <div class="card-header bg-transparent border-0">
			<button class="collapsible">Attachments</button>
			<div class="content">
				 <a href="appointment.html">Upgrade or retore previous package</a>
			</div>
          </div>
		  <br>
		  <button onClick="window.print()">Print</button>
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
					<a href="dashboard.php?logout='1'" class="btn btn-primary">Yes</a>
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
</script>
<?php endif ?>   
</body>
</html>