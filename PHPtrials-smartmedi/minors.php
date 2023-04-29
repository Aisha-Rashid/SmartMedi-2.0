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
<html>
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
<?php if (isset($_SESSION['nationalid'])) : 
 
   $unique = $_SESSION['nationalid'];
   $query = "SELECT * FROM `doctors` WHERE nationalid = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);

   ?>
 
  

<!-- Start menu -->
    <div class="template-page-wrapper">
		<div class="navbar-collapse collapse templatemo-sidebar">
			<ul class="templatemo-sidebar-menu">
				<li>
				
				<img src="dashboardimages/favicon.ico" alt="Smartmedi">
				
				</li>
				<li><a href="DocDashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="active"><a href="#"><i class="fa fa-child"></i>Children Records</a></li>
				
				<li><a href="DocSettings.php"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			
			


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      
        <div class="card shadow-sm">
         
		  <p><b>
		  Dr. 
						<?php 
            
            echo $array[2];
			echo " ";
			echo $array[3];?><br>
			<?php 
            
            echo $array[1];?><br>
			<?php 
            
            echo $array[6];?><br>
			<?php 
            
            echo $array[4];?><br>
		  </b></p>
          
        </div><hr>
		<h3 class="mb-0" align ="center" ><i class="far fa-clone pr-1"></i>Minors Record Search</h3>
		
		<form method="post" action="" >
		<TABLE width=70% align ="center">
			<TR><TD><input type="text" class="form-control"  name="search" placeholder="Search patient record" required="required"></td><td><button type="submit" class="btn"
										name = "searchsub">Search</button></td></tr>
		</table>
            </form>
          
		
		<hr>
		
	<div class="table-responsive">  
		
				
	  <table class="table" class="table table-condensed" >
	    <thead>
	      <tr>
	        <!--th>#</th-->
	        <th>Patient Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Action</th>
	        
	      </tr>
	    </thead>
	    <tbody>
		 <?php if(isset($_POST['searchsub'])!=""){
					$search = $_POST['search'];
					
					if(!empty($_POST['search'])) {
					$result = mysqli_query($db,"select * from dependants where FirstName_dep like '%$search%' or LastName_dep like '%$search%'");

					if ($result->num_rows > 0){
					while($row = $result->fetch_assoc() ){
						$rowcount=mysqli_num_rows($result);
						
						$dob=$row['dob'];
						$age = $dob;
						$year = explode('-', $age);
						$patientAge = date("Y") - $year[0];
						
						$FirstName_dep=$row['FirstName_dep'];
						$LastName_dep=$row['LastName_dep'];
						$gender_dep=$row['gender_dep'];
						$ID_dep=$row['ID_dep'];
						$encrypted_id = base64_encode($ID_dep);
						$url = "medicalhist_dep.php?filename=$encrypted_id";
						$link = urlencode(base64_encode($row['ID_dep']));
?>				
     			<tr>	
                        <td><?php echo $row['FirstName_dep'];  echo " "; echo $row['LastName_dep'];  ?></td>
						<td><?php echo $patientAge ?></td>
						<td><?php echo $row['gender_dep'] ?></td>
						<td><a href="<?php echo $url ?>" title="click to view">
						<button>View</button>
						</a></td>
	    	</tr>
			<?php }}
			else{
				echo "User not found";
			}
			} } ?> 
	     </tbody>
	  </table><hr>
      </div>
    </div>
	</div>
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
					<a href="minors.php?logout='1'" class="btn btn-primary">Yes</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
	<!-- End popup -->
	<footer class="templatemo-footer">
      <div class="templatemo-copyright">
        <p>Copyright &copy; 2022 SmartMedi</p>
      </div>
    </footer>

    <script src="dashboardjs/jquery.min.js"></script>
    <script src="dashboardjs/bootstrap.min.js"></script>
	<script src="dashboardjs/DT_bootstrap.js"></script>
	<script src="dashboardjs/jquery.dataTables.js"></script>
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