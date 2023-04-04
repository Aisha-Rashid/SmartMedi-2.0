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
<html>

<head>
	<meta charset="utf-8">
	<!--[if IE]--><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!--[endif]-->
	<title>SmartMedi User Dashboard</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="dashboardcss/templatemo_main.css">
	<link rel="stylesheet" href="dashboardcss/profpic.scss">
	<link rel="shortcut icon" href="dashboardimages/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="dashboardimages/apple-touch-icon.png">
</head>
<body>
	<?php if (isset($_SESSION['IDNo'])) :
		$unique = $_SESSION['IDNo'];
		$query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
		$res = mysqli_query($db, $query);
		$array = mysqli_fetch_row($res);
		$rows = mysqli_num_rows($res);
	?>

<!-- Start menu -->
		<div class="template-page-wrapper">
			<div class="navbar-collapse collapse templatemo-sidebar">
				<ul class="templatemo-sidebar-menu">
					<li>
						<img src="dashboardimages/favicon.ico" alt="Smartmedi">
					</li>
					<li ><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
					<li><a href="dash_medhist.php"><i class="fa fa-stethoscope"></i>User Data</a></li>
					<li><a href="attachments.php"><i class="fa fa-folder-open"></i>Attachments</a></li>
					<li class="active"><a href="#"><i class="fa fa-child"></i>Dependants</a></li>
					<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
					<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
				</ul>
			</div>
<!--End of menu-->
<!--Start of detailed body-->
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
									  <?php } ?>
									   <h3><?php echo $array[1]; ?></h3>
									  </div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="card shadow-sm">
										<div class="card-header bg-transparent border-0">
											<h3 class="mb-0">Dependents</h3>
										</div>
										<table  class="table table-bordered" id="dependents">
										  
										  <?php 
											$query = "SELECT * FROM dependants WHERE IDNo = '$unique'";
											$res = mysqli_query($db, $query);
											while($row=mysqli_fetch_array($res)){
											  $FirstName_dep=$row['FirstName_dep'];
											  $dob=$row['dob'];
											  $gender_dep=$row['gender_dep'];
											  $blood_group=$row['blood_group'];
											  $allergies=$row['allergies'];
											  $medical_conditions=$row['medical_conditions'];
										  ?>
										  <tr>
											<td>
											  <u><b><?php echo $row['FirstName_dep']?><br><br></b></u>
											  <?php echo $row['dob']?><br>
											  <?php echo $row['gender_dep']?><br>
											  <?php echo $row['blood_group']?><br>
											  <?php echo $row['allergies']?><br>
											  <?php echo $row['medical_conditions']?><br>
											</td>
										  </tr>
										  <?php } ?> 
										</table>
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
<!-- End of body -->
				</div>
			</div>
		</div>
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
		<footer class="templatemo-footer">
      <div class="templatemo-copyright">
        <p>Copyright &copy; 2022 SmartMedi</p>
      </div>
    </footer>
		
<!-- End popup -->
		<script src="dashboardjs/jquery.min.js"></script>
		<script src="dashboardjs/bootstrap.min.js"></script>
		<script src="dashboardjs/templatemo_script.js"></script>
		<script type="text/javascript"></script>
		<script>
			/* function loadFile(event) {
				var output = document.getElementById("output");
				output.src = URL.createObjectURL(event.target.files[0]);

				var data = new FormData();
				data.append("file", event.target.files[0]);

				$.ajax({
					type: "POST",
					url: "upload2.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						console.log(response);
					},
					error: function(error) {
						console.log("Error uploading image: " + error);
					}
				});
			}; */
			var coll = document.getElementsByClassName("collapsible");
			var i;
			for (i = 0; i < coll.length; i++) {
				coll[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var content = this.nextElementSibling;
					if (content.style.maxHeight) {
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