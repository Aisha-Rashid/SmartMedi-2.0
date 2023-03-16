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
<html lang="en">
<head>
	<!--meta charset="utf-8">
    <--meta http-equiv="X-UA-Compatible" content="IE=edge"-->   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <!-- Site Metas -->
    <title>SmartMedi EEHR</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<!--Password eye icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php if (isset($_SESSION['workID'])) :
include ('reportGeneration.php');

    $unique = $_SESSION['workID'];
    
	
	

  ?>
 <!--div id="printableArea" 
 
 <a href="javascript:void(0);" onclick="printPageArea('printableArea')" class="btn btn-info" >Print</a>
 > 
 <!--div id="header2"->
 <table width = 100% class=" table-bordered" -->
 
 <h1><img src="dashboardimages/favicon.ico" alt="Smartmedi"><b>SmartMedi Kenya</b></h1>
 <p>Allimex Plaza, Ground floor room 105 <br>  Mombasa Road, Nairobi <br>
 Email: admin@smartmedike.com <br>
 Tel: (254) 743-234567 / (254) 790-453627</p>
 
 
 <hr>
<?php
//extract($_REQUEST);
//$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
	//Delete Patient record
	if ($_GET['type'] == 'hospital'){ 
	?>

 <h1 align = "center">Report Title:</h1>
 
<TABLE width=100% >
<thead>
<tr>
                      <th>#</th>
                      <th>Name</th>
                    </tr>
                  </thead>
<?php

	while($row=mysqli_fetch_array($hospitalRes)){
							
	$HospitalID =$row['hospitalID'];
							
	$hospital=$row['hospital'];
									  ?>
								
								
                    
				  <tbody>
				  <tr>
					
						<td><?php echo $row['hospitalID'] ?></td>
						<td><?php echo $row['hospital'] ?></td>
						
						
					</tr>
					</tbody>
                
					<?php } ?> 	
					

</table>
<?php } ?>
<?php 

if ($_GET['type'] == 'doctor'){ 
?>
<h1 align = "center"><u>Report Title: List of Registered Hospitals and their Members.</u></h1>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
<tr>
                      <th>Hospital</th>
                      <th>Registered persons</th>
					  <th>Department</th>
                    </tr>
                  </thead>
				  </tbody>
<?php
	$previous_hospital = null;
    //$rowspan = 0;
	while($row=mysqli_fetch_array($doctorRes)){
							
	$id=$row['hospital'];						
	$fname=$row['fname'];
	$lname=$row['lname'];
	$specialty=$row['specialty'];
	 if($id != $previous_hospital){
          // New hospital, start a new row
          //if($previous_hospital !== null){
            //echo "<tr><td rowspan=\"$rowspan\"></td></tr>"; // Close the previous row
          //}
          // Start a new row
          echo "<tr><td>$id</td><td>$fname $lname</td><td>$specialty</td></tr>";
          $previous_hospital = $id;
          //$rowspan = 1;
        } else {
          // Same hospital as previous row, increase rowspan
          echo "<tr><td></td><td>$fname $lname</td><td>$specialty</td></tr>";
          //$rowspan++;
        }
      }
      // Close the last row
      //echo "<tr><td rowspan=\"$rowspan\"></td></tr>";
    ?>
					</tbody>
						
</table>



</div><br>
	<?php } ?>

<script>
 window.addEventListener("load", window.print());
/*function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}*/
</script>
<?php endif ?>
</body>
</html>