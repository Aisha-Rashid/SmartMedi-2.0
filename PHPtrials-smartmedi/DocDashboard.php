<?php
include('doc_signin_server.php'); 

// Starting the session, to use and
// store data in session variable
// session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['id'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: DocLogin.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['id']);
	header("location: DocLogin.php");
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
<?php if (isset($_SESSION['id'])) : 
   
   
   $unique = $_SESSION['id'];
   $query = "SELECT * FROM `doctors` WHERE id = '$unique'";
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
				<li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
				
				<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			<ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li>Overview</li>
			</ol>
			


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
            
            echo $array[0];?><br>
			<?php 
            
            echo $array[6];?><br>
			<?php 
            
            echo $array[4];?><br>
		  </b></p>
          
        </div><hr>
		<h3 class="mb-0" align ="center" ><i class="far fa-clone pr-1"></i>Record Search</h3>
		
		<form method="post" action="" >
		<TABLE width=70% align ="center">
			<TR><TD><input type="text" class="form-control"  name="search" placeholder="Search patient record"></td><td><button type="submit" class="btn"
										name = "searchsub">Search</button></td></tr>
		</table>
            </form>
          <div style="height: 26px"></div>
		
		<hr>
		
	<div class="table-responsive">  
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
	  <table class="table" class="table table-condensed" id="example">
	    <thead>
	      <tr>
	        <!--th>#</th-->
	        <th>Patient Name</th>
	        <th>ID No</th>
			<th>Action</th>
	        
	      </tr>
	    </thead>
	    <tbody>
		 
	    	
				<?php if(isset($_POST['searchsub'])!=""){

					$search = $_POST['search'];

					$servername = "localhost";
					$username = "root";
					$password = "";
					$db = "phptrials-smartmedi";

					$conn = new mysqli($servername, $username, $password, $db);




					$result = $conn->query("select * from patients where FirstName like '%$search%' or LastName like '%$search%'");

					

					if ($result->num_rows > 0){
					while($row = $result->fetch_assoc() ){
						$rowcount=mysqli_num_rows($result);
						
						$FirstName=$row['FirstName'];
						$LastName=$row['LastName'];
						$IDNo=$row['IDNo'];
						/*echo "<tr>";
						
						 echo "<td>" .$row["FirstName"]." ". $row['LastName'] .  "</td>";
						 echo "<td>" .$row["IDNo"]. "</td>";
						 echo $row["IDNo"] "<td><a href='medicalhist.php'><button name='view'>View</button></a> </td>";
						echo "</tr>";
						
					}
					} else {
						
						echo "0 records";
						
					}*/

					
				

?>				
     			<tr>	
						
                        <td><?php echo $row['FirstName'];  echo " "; echo $row['LastName'];  ?></td>
						<td><?php echo $row['IDNo'] ?></td>	
						<td><a href="medicalhist.php?filename=<?php echo  $row['IDNo'];?>" title="click to view">
						<button>View</button>
						</a></td>
						
	    	</tr>
			<?php }}} ?> 
	     </tbody>
	  </table>
		 
		<!--a href ='medicalhist.php'>View</a>-->
		
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
					<a href="DocDashboard.php?logout='1'" class="btn btn-primary">Yes</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
	<!-- End popup -->

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