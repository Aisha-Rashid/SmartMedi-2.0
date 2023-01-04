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
   echo $array[1];
   
   ?>
   <?php
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      // Get the file details
      $fileName = basename($_FILES['image']['name']);
      $fileSize = $_FILES['image']['size'];
      $fileType = $_FILES['image']['type'];
      $tmpName  = $_FILES['image']['tmp_name'];

      // Validate the file type
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (!in_array($fileType, $allowedTypes)) {
        // Display an error message
        echo 'Error: Only JPEG, PNG, and GIF files are allowed';
        exit;
      }

      // Validate the file size
      if ($fileSize > 500000) {
        // Display an error message
        echo 'Error: File size must be less than 500KB';
        exit;
      }

      // Generate a unique filename
      $fileName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

      // Save the uploaded file
      move_uploaded_file($tmpName, "files/$fileName");

	  $query=$conn->query("INSERT INTO patients (pic) VALUES ('$fileName')");

      // Display a success message
      echo 'File uploaded successfully';
    } else {
      // Display an error message
      echo 'Error: No file was uploaded';
    }
  }
?>
  

<!-- Start menu -->
    <div class="template-page-wrapper">
		<div class="navbar-collapse collapse templatemo-sidebar">
			<ul class="templatemo-sidebar-menu">
				<li>
				
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
				<li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="sub">
				<a href="javascript:;">
				<i class="fa fa-database"></i> Menu <div class="pull-right"><span class="caret"></span></div>
				</a>
				<ul class="templatemo-submenu">
				
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
            <li><a href="#">User Panel</a></li>
           
            <li>Overview</li>
			</ol>
			


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
		  <form action="" method="post" enctype="multipart/form-data">
		  <input type="file" id="fileInput" accept="image/*" style="display:none !important" />
		  <img  class="profile_img" id="preview" src="https://www.pngkey.com/png/detail/349-3499617_person-placeholder-person-placeholder.png" alt="Image preview" />
		    <!-- <img class="profile_img" src="https://www.pngkey.com/png/detail/349-3499617_person-placeholder-person-placeholder.png" alt="Profile Pic"> -->
			</form>
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
            <h3 class="mb-0">General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                
				<td>
						<?php 
            
            echo $array[1];
            echo " ";
            echo $array[2];?>
				</td>
              </tr>
			  <tr>
                <th width="30%">ID Number</th>
                <td width="2%">:</td>
                <td>
                <?php echo $array[4] ?>
                </td>
              </tr>
              <tr>
                <th width="30%">Age</th>
               
                <td width="2%">:</td>
                <td>
                <?php 
                $age = $array[5] ;
                $year = explode('-', $age);
                $patientAge = date("Y") - $year[0];
                echo $patientAge
                ?>
                </td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td>
                <?php echo $array[6] ?>
                </td>
              </tr>
              <tr>
                <th width="30%">Blood Group</th>
                <td width="2%">:</td>
                <td>
                <?php echo $array[7] ?>
                </td>
              </tr>
			  <tr>
                <th width="30%">County</th>
                <td width="2%">:</td>
                <td>
                <?php echo $array[9] ?>
                </td>
              </tr>
			  <tr>
                <th width="30%">Town</th>
                <td width="2%">:</td>
                <td>
                <?php echo $array[10] ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
		<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Quick Profile Setup</h3>
		<div class="card-header bg-transparent border-0">
			<button class="collapsible">Basic Medical History</button>
			<div class="content">
				 <a href="mediform.php">Click here to fill in the Basic Medical History form</a><br><br><br>
				 
				 <?php 
							$query="select * from response WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$allergies=$row['allergies'];
							$conditions=$row['conditions'];
							$notes=$row['notes'];
							?>
				  <table class="table table-bordered">
				  <u> History Details </u>
				<tr>
					<th width="30%">Allergies</th>
					<td width="2%">:</td>
					
					<td>
					<?php echo $row['allergies'] ?><br><br>
					</td>
				</tr>
				<tr>
                <th width="30%">Conditions</th>
                <td width="2%">:</td>
                
				<td>
						<?php echo $row['conditions'] ?><br><br>
				</td>
              </tr>
			   <tr>
                <th width="30%">Additional Information</th>
                <td width="2%">:</td>
                
				<td>
						<?php echo $row['notes'] ?><br><br>
				</td>
				 
              </tr>
				 </table>
				 <?php } ?> 
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">Insurance Details</button>
			<div class="content">
			
				 <a href="insuranceform.php">Click to add Insurance Cover Details</a><br><br><br>
				 <?php 
							$query="select * from medicalcover WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$nhiftype=$row['nhiftype'];
							$nhifnumber=$row['nhifnumber'];
							$insurancetype=$row['insurancetype'];
							$insurancenumber=$row['insurancenumber'];
							$insuranceprincipal=$row['insuranceprincipal'];
							$expiry=$row['expiry'];
							?>
				 <table class="table table-bordered">
				<u> NHIF Details </u>
				 <thead>
					<tr>
						<th>Cover Type</th>
                        <th>Member Number</th>
						
						
                    </tr>
                 </thead>
				 <tbody>
					<tr>
						<td><?php echo $row['nhiftype'] ?></td>
						<td><?php echo $row['nhifnumber'] ?></td>
					</tr>
				 </tbody>
				 </table>
				 
				 
				 <table class="table table-bordered">
				 <u> Other Insurance Details </u>
				 <thead>
					<tr>
						<th>Insurance Name</th>
                        <th>Member Number</th>
						<th>Principal Member</th>
						<th>Expiry Date</th>
                    </tr>
                 </thead>
				 <tbody>
					<tr>
						<td><?php echo $row['insurancetype'] ?></td>
						<td><?php echo $row['insurancenumber'] ?></td>
						<td><?php echo $row['insuranceprincipal'] ?></td>
						<td><?php echo $row['expiry'] ?></td>
					</tr>
				 </tbody>
				 </table>
				 <?php } ?> 
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">Next of Kin details</button>
			<div class="content">
				 <a href="nextkin.php">Click to add Next of Kin Details</a><br><br><br>
				 <?php 
							$query="select * from nextofkin WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$kinFirstName=$row['kinFirstName'];
							$kinLastName=$row['kinLastName'];
							$relationship=$row['relationship'];
							$telephone=$row['telephone'];
							?>
				 <table class="table table-bordered">
				<u> Kin Details </u>
				 <thead>
					<tr>
						<th>Name</th>
                        <th>Relationship</th>
						<th>Phone Number</th>
						
                    </tr>
                 </thead>
				 <tbody>
					<tr>
						<td>
						<?php echo $row['kinFirstName'];
						echo " ";
						echo $row['kinLastName'];; ?> 
						</td>
						<td><?php echo $row['relationship'] ?></td>
						<td><?php echo $row['telephone'] ?></td>
					</tr>
				 </tbody>
				 </table>
				 
				 
				 <?php }
				
				  ?> 
				 
			</div>
          </div>
		  <br>
		  <div class="card-header bg-transparent border-0">
			<button class="collapsible">Package</button>
			<div class="content">
				 <a href="#">Upgrade or retore previous package</a>
			</div>
          </div>
		  <br>
		  
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
