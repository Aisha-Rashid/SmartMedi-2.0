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
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
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
		//echo $array[1];

	?>
		


		<!-- Start menu -->
		<div class="template-page-wrapper">
			<div class="navbar-collapse collapse templatemo-sidebar">
				<ul class="templatemo-sidebar-menu">
					<li>

						<img src="dashboardimages/favicon.ico" alt="Smartmedi">

					</li>
					<li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
					<li><a href="dash_medhist.php"><i class="fa fa-stethoscope"></i>User Data</a></li>
					<li><a href="attachments.php"><i class="fa fa-folder-open"></i>Attachments</a></li>
					<li><a href="children.php"><i class="fa fa-child"></i>Dependants</a></li>
					<li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
					<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
				</ul>
			</div><!--/.navbar-collapse-->
			<div class="templatemo-content-wrapper">
				<div class="templatemo-content">
					<ol class="breadcrumb">
						<li>Patient Panel</a></li>

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
														echo $array[2]; ?>
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
														$age = $array[5];
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
												<a href="mediform.php">Click here to fill in the Basic Medical History form</a>

												
											</div>
										</div>
										<br>
										<div class="card-header bg-transparent border-0">
											<button class="collapsible">Insurance Details</button>
											<div class="content">

												<a href="insuranceform.php">Click to add Insurance Cover Details</a>
												
											</div>
										</div>
										<br>
										<div class="card-header bg-transparent border-0">
											<button class="collapsible">Dependants details</button>
											<div class="content">
												<a href="dependants.php">Click to add Next of Kin Details</a>
												

											</div>
										</div>
										<br>
										<div class="card-header bg-transparent border-0">
											<button class="collapsible">Next of Kin details</button>
											<div class="content">
												<a href="nextkin.php">Click to add Next of Kin Details</a>
												

											</div>
										</div>
										<br>

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
					if (content.style.maxHeight) {
						content.style.maxHeight = null;
					} else {
						content.style.maxHeight = content.scrollHeight + "px";
					}
				});
			}
		</script>
		<!--script>
var uploadImage = function (event) {
  var image = document.getElementById("output");
  var file = event.target.files[0];
  var formData = new FormData();
  formData.append("file", file);
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "upload.php", true);
  xhr.onload = function () {
    if (this.status === 200) {
      image.src = this.responseText;
    }
  };
  xhr.send(formData);
};
</script-->


		<script>
function loadFile(event) {
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
			}
</script>


	<?php endif ?>
</body>

</html>