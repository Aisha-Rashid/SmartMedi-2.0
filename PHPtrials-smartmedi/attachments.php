<?php
include('server.php'); 

if (!isset($_SESSION['IDNo'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

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

<?php if (isset($_SESSION['IDNo'])) : 

   $unique = $_SESSION['IDNo'];
   $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
   $res = mysqli_query($db, $query);
   $array=mysqli_fetch_row($res);
   $rows = mysqli_num_rows($res);
?>

<?php
//$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$name);

//$query=$conn->query("INSERT INTO fileupload (name,date, IDNo) VALUES ('$name','$date', '$unique')");
$query=mysqli_query($db,"INSERT INTO fileupload (name,date, IDNo) VALUES ('$name','$date', '$unique')");
if($query){
header("location:attachments.php");
}
else{
//die(mysqli_error($conn));
echo "File not uploaded";
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
				<li class="active"><a href="attachments.php"><i class="fa fa-folder-open"></i>Attachments</a></li>
				<li><a href="children.php"><i class="fa fa-child"></i>Dependants</a></li>
				<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
			</ul>
		</div><!--/.navbar-collapse-->
		<div class="templatemo-content-wrapper">
			<div class="templatemo-content">
			
			
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
          
         <h3 class="mb-0">Upload Files</h3>
		 <hr>
		 
		<!--form enctype="multipart/form-data"  method="post" action="attachments.php"--> 
		<form enctype="multipart/form-data"  action="" id="wb_Form1" name="form" method="post">
			<TABLE width=70% align ="left" class="table table-bordered">
				
				<TR><TD><input type="file" name="photo" id="photo" required="required"></td><td><input type="submit"  value="SUBMIT" name="submit"></td></tr>
						
				
			</table>
		</form>
            
			<br>
			<hr>
		<form method="post" action="delete.php" >
                        <TABLE width=70% align ="left" class="table table-bordered">
                            
                            <thead>
						
                                <tr>
                                    
                                   <th>No.</th>
                                    <th>FILE NAME</th>
                                   <th>Date</th>
				<th>Download</th>
				<th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php 
							$query="select * from fileupload WHERE IDNO = '$unique'";
							$res = mysqli_query($db, $query);
							
							$counter = 1;
							
							while($row=mysqli_fetch_array($res)){
							$number = $counter;
							$counter++;
							$name=$row['name'];
							$date=$row['date'];
							?>
                              
										<tr>
										
                                         <td><?php echo $number;?></td>
                                         <td><?php echo $row['name'] ?></td>
                                         <td><?php echo $row['date'] ?></td>
										<td>
				<a href="download.php?filename=<?php echo $name;?>" title="click to download"><i class="fa fa-download" aria-hidden="true"></i></a>
				</td>
				<td>
				<a href="delete.php?del=<?php echo $row['name']?>"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
				</td>
				
                                </tr>
                         
						         <?php } ?> 
                            </tbody>
                        </table>
					</form>
					
					
					
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
					<a href="attachments.php?logout='1'" class="btn btn-primary">Yes</a>
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

    <script src="dashboardjs/templatemo_script.js"></script>

    <script type="text/javascript"></script>
	
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	
</script>
   <?php endif ?> 
</body>
</html>