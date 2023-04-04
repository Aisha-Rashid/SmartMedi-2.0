<?php
include('server.php'); 

if (!isset($_SESSION['nationalid'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: DocLogin.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['nationalid']);
	header("location: DocLogin.php");
}
?>
<?php if (isset($_SESSION['nationalid'])) : 
  $unique = $_SESSION['nationalid'];
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
<?php
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
extract($_REQUEST);

$encrypted_id = $_GET['filename'];
$ID_dep = base64_decode($encrypted_id);

$query = "select * from dependants where ID_dep='$ID_dep'";
//$sql=mysqli_query($conn,"select * from patients where IDNo='$filename'");

	$res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
   $patient = $array[0];
   $parentID = $array[1];
  

if(isset($_POST['submit'])!=""){

	$note = mysqli_real_escape_string($db, $_POST['note']);
	$date = date('Y-m-d');
	$query="insert into docnotesdependants(dependantID, docid, date, notes) values ('$patient', '$unique', '$date', '$note')"; 
	
	mysqli_query($db, $query);

}

?>


			
			<ol class="breadcrumb">
			<li><a href="DocDashboard.php"><img src="dashboardimages/favicon.ico" alt="Smartmedi"></a></li>
            <li><a href="minors.php"><b>Back to Dashboard</b></a></li>
			</ol>
			


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
		  <?php
			$query = " select * from dependants where ID_dep='$patient' ";
			$result = mysqli_query($db, $query);

			while ($data = mysqli_fetch_assoc($result)) {
			?>
		    <img class="profile_img" src="./uploads/<?php echo $data['filename']; ?>" alt="Profile Pic">
			<?php
		}
		?>
            <h3 >
				<?php echo $array[2];
				echo " ";
				echo $array[3];; ?> 
				<br>
				<?php 
                $age = $array[4] ;
                $year = explode('-', $age);
                $patientAge = date("Y") - $year[0];
                echo $patientAge
                ?>yrs
				<br>
				<?php echo $array[5] ?>
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
            <table class="table table-bordered" id="datatable">
              
			  <tr>
                <th width="30%">Blood Group</th>
                <td width="2%">:</td>
                
				<td>
						<?php echo $array[6] ;?><br><br>
				</td>
              </tr>
			  <tr>
                <th width="30%">Allergies</th>
                <td width="2%">:</td>
                
				<td><?php echo $array[7] ?><br><br>
				</td>
              </tr>
			  <tr>
                <th width="30%">Conditions</th>
                <td width="2%">:</td>
                
				<td>
						<?php echo $array[8] ?><br><br>
				</td>
              </tr>
			  <tr>
                <th width="30%">Additional Information</th>
                <td width="2%">:</td>
                
				<td>
						<?php echo $array[9] ?><br><br>
				</td>
				
              </tr>
			  <tr>
                <th width="30%">Parent's Details</th>
                <td width="2%">:</td>
                <?php 
							$query="select * from patients WHERE IDNO = '$parentID'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$FirstName=$row['FirstName'];
							$LastName=$row['LastName'];
							$IDNO=$row['IDNo'];
							$TelNo=$row['TelNo'];
							?>
				<td>
						<b>Name : </b><?php echo $row['FirstName'];
						echo " ";
						echo $row['LastName'];; ?> <br>
						<b>ID Number : </b><?php echo $row['IDNo'] ?><br>
						<b>Phone Number : </b><?php echo $row['TelNo'] ?><br><br>
						
				</td>
				<?php } ?> 
              </tr>
			   <tr>
                <th width="30%">Parent's Insurance Details</th>
                <td width="2%">:</td>
                <?php 
							$query="select * from medicalcover WHERE IDNO = '$parentID'";
							$res = mysqli_query($db, $query);
							while($row=mysqli_fetch_array($res)){
							
							$nhiftype=$row['nhiftype'];
							$nhifnumber=$row['nhifnumber'];
							$insurancetype=$row['insurancetype'];
							$insurancenumber=$row['insurancenumber'];
							$insuranceprincipal=$row['insuranceprincipal'];
							$expiry=$row['expiry'];
							?>
				<td>
						<b>NHIF Cover Type : </b><?php echo $row['nhiftype'] ?><br>
						<b>NHIF Member Number : </b><?php echo $row['nhifnumber'] ?> <br><br>
						<b>Other Insurance Cover : </b><?php echo $row['insurancetype'] ?><br>
						<b>Member Number : </b><?php echo $row['insurancenumber'] ?><br>
						<b>Principal Member : </b><?php echo $row['insuranceprincipal'] ?><br>
						<b>Expiry Date : </b><?php echo $row['expiry'] ?><br><br>
						
						
				</td>
				<?php } ?> 
              </tr>
			  
			 
			  
            </table>
			
			
			<table  class="table table-bordered" id="docdatatable">
  <tr>
    <th width="30%">Doctors Notes</th>
  </tr>
  <?php 
    $query = "SELECT doctors.fname, doctors.lname, doctors.hospital, docnotesdependants.date, docnotesdependants.notes FROM doctors, docnotesdependants WHERE doctors.nationalid = docnotesdependants.docid AND docnotesdependants.dependantID ='$patient'" ;
    $res = mysqli_query($db, $query);
    while($row=mysqli_fetch_array($res)){
      $date=$row['date'];
      $fname=$row['fname'];
      $lname=$row['lname'];
      $hospital=$row['hospital'];
      $notes=$row['notes'];
  ?>
  <tr>
    <td>
      <b><?php echo $row['date']?><br>
      <?php echo $row['fname']; echo " "; echo $row['lname'];?><br>
      <?php echo $row['hospital']?><br></b>
      <?php echo $row['notes']?><br>
    </td>
  </tr>
  <?php } ?> 
</table>

<table  class="table" id="docdatatable">
<tr>
                <th width="30%">Add Note</th>
                <td width="2%">:</td>
                
				<td>
						<form method="post" action="">
						<textarea id="note" name="note" rows="5" cols="78" ></textarea>
						<button type="submit" class="btn" name="submit">Submit</button>
						</form>
				</td>
              </tr>
            </table>

				
			
			<form>
			
			</form>
			
          </div>
		  
			
        </div>
         
		  
        
		<!--button onClick="window.print()">Print</button>
		<!--button onclick="history.back()">Go Back</button-->
      </div>
    </div>
	
		
  </div>
</div>
<!-- partial -->
       

 	
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