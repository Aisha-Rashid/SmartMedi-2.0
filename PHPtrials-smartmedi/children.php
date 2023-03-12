<?php
include('server.php'); 

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

<?php
date_default_timezone_set("Africa/Nairobi");
//echo date_default_timezone_get();
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
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$name);

$query=$conn->query("INSERT INTO fileupload (name,date, IDNo) VALUES ('$name','$date', '$unique')");
if($query){
header("location:attachments.php");
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
			
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
				<li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
				<li><a href="dash_medhist.php"><i class="fa fa-stethoscope"></i>User Data</a></li>
				<li><a href="attachments.php"><i class="fa fa-folder-open"></i>Attachments</a></li>
				<li class="active"><a href="children.php"><i class="fa fa-child"></i>Dependants</a></li>
				<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			<ol class="breadcrumb">
            <li><a href="dashboard.php">User Panel</a></li>
            <li><a href="#">Attachments</a></li>
            <li>Overview</li>
			</ol>
			
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
									<div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
		  <?php
			$query = " select * from patients where IDNO='$unique' ";
			$result = mysqli_query($db, $query);

			while ($data = mysqli_fetch_assoc($result)) {
			?>
				<a href = "uploadProfile.php"><img class="profile_img" src="./uploads/<?php echo $data['filename']; ?>" alt="Profile Pic"></a>
				<!--input id="file" type="file" onchange="loadFile(event)"/-->
				
				<?php
		}
		?>
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
          
        
				<form method="post" action="children.php">
				  <label for="num_boxes">Enter the number of children:</label>
				  <input type="number" name="num_boxes" id="num_boxes">
				  <button type="submit">Submit</button>
				</form>

				<?php
				if (isset($_POST['num_boxes'])) {
				  $num_boxes = $_POST['num_boxes'];
				  echo '<form method="post" action="children.php">';
				  for ($i = 1; $i <= $num_boxes; $i++) {
					echo '<label for="box_' . $i . '">' . $i . ' Full Name:</label>';
					echo '<input type="text" name="box_' . $i . '" id="box_' . $i . '"><br>';
					echo '<label for="box_' . $i . '">Date of Birth :</label>';
					echo '<input type="text" name="box_' . $i . '" id="box_' . $i . '"><br>';
					echo '<label for="box_' . $i . '">Gender:</label>';
					echo '<input type="text" name="box_' . $i . '" id="box_' . $i . '"><br>';
					echo '<label for="box_' . $i . '">Blood Group:</label>';
					echo '<input type="text" name="box_' . $i . '" id="box_' . $i . '"><br>';
					echo '<label for="box_' . $i . '">Medical Conditions:</label>';
					echo '<input type="text" name="box_' . $i . '" id="box_' . $i . '"><br>';
				  }
				  echo '<button type="submit">Submit Boxes</button>';
				  echo '</form>';
				}
				?>
	
					
					
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

    <script src="dashboardjs/templatemo_script.js"></script>

    <script type="text/javascript"></script>
	
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	
</script>
   <?php endif ?> 
</body>
</html>