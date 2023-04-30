<?php
// Starting the session, necessary
// for using session variables
session_start();
// Declaring and hoisting the variables
$FirstName = "";
$LastName = "";
$bloodgroup = "";
$TelNo = "";
$IDNo = "";
$DOB = "";
$gender = "";
$email = "";
$county ="";
$town = "";
$id = "";
$nationalid = "";
$fname = "";
$lname = "";
$hospital = "";
$branch = "";
$workid = "";
$errors = array();
$_SESSION['success'] = "";
$workID = "";
$adminpass = "";

$db = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');

// Patient Registration code
if (isset($_POST['reg_user'])) {
 
	// Receiving the values entered and storing in the variables
	// Data sanitization is done to prevent SQL injections
	$FirstName =filter_var ($_POST['FirstName'], FILTER_SANITIZE_STRING);
	$LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING);
	$TelNo = filter_var($_POST['TelNo'], FILTER_SANITIZE_NUMBER_INT);
	$IDNo = filter_var($_POST['IDNo'], FILTER_SANITIZE_NUMBER_INT);
	$DOB = mysqli_real_escape_string($db, $_POST['DOB']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$bloodgroup = mysqli_real_escape_string($db, $_POST['bloodgroup']);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$county = mysqli_real_escape_string($db, $_POST['county']);
	$town = filter_var($_POST['town'], FILTER_SANITIZE_STRING);
	$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	$role="patient";
	if ($password1 != $password2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}
	// If the form is error free, then register the user
	if (count($errors) == 0) {
		// Password encryption to increase data security
		$password = md5($password1);
		// Inserting data into tables
		$query = "INSERT INTO patients (FirstName, LastName, TelNo, IDNo, DOB, gender, bloodgroup, email, county, town, password, role)
				VALUES('$FirstName' , '$LastName' , '$TelNo' , '$IDNo' , '$DOB' , '$gender', '$bloodgroup', '$email', '$county', '$town', '$password', '$role')";
		
		mysqli_query($db, $query);

		$_SESSION['IDNo'] = $IDNo;
		
		// Page on which the user will be redirected after logging in
		header('location: uploadProfile.php?type=register');
	}
}

// Patient login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$IDNo = mysqli_real_escape_string($db, $_POST['IDNo']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		$password = md5($password);
		
		$query = "SELECT * FROM patients WHERE IDNo=
				'$IDNo' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['IDNo'] = $IDNo;
		
			// Page on which the user is sent to after logging in
			header('location: dashboard.php');
		}
		else {
			// If the username and password doesn't match
			echo "Username or password incorrect";
		}
	}
}
// Password Reset
if (isset($_POST['resetpwd'])) {
	
	// Data sanitization to prevent SQL injection
	$IDNo = filter_var($_POST['IDNo'], FILTER_SANITIZE_NUMBER_INT);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

	// Checking for the errors
	if (count($errors) == 0) {
		$query = "SELECT * FROM patients WHERE IDNo=
				'$IDNo' AND email='$email'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			$query="update patients set password='' where IDNo='$IDNo' and email='$email'";
			$result = mysqli_query($db, $query);
			
			if($results){	
			header("Location: sendmail.php?type=reset&filename=" . $email);
			exit(); 
		}
		else {
			// If the username and password doesn't match
			echo "Unable to update";
		}}
		else {
			// If the username and password doesn't match
			echo "Email or ID incorrect";
		}
	}
}


// Doctor login
if (isset($_POST['doc_login'])) {
	
	// Data sanitization to prevent SQL injection
	$nationalid = mysqli_real_escape_string($db, $_POST['nationalid']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		  //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		$password = md5($password);
		
		$query = "SELECT * FROM doctors WHERE nationalid=
				'$nationalid' AND password='$password'";
		$results = mysqli_query($db, $query);
		
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['nationalid'] = $nationalid;
			header('location: DocDashboard.php');
		}
		else {
			echo "Username or password incorrect";
		}
	}
}


//Admin Login

if (isset($_POST['admin_login'])) {
	
	// Data sanitization to prevent SQL injection
	$workID = mysqli_real_escape_string($db, $_POST['workID']);
	$adminpass = mysqli_real_escape_string($db, $_POST['adminpass']);

	// Checking for the errors
	if (count($errors) == 0) {
		
		//$default="SMadmin@123";
		$adminpass = md5($adminpass);
		
		$query = "SELECT adminFname, adminLname, workID FROM `admin` WHERE workID='$workID' AND adminpass='SMadmin@123'";
		$res = mysqli_query($db, $query);
			
		if (mysqli_num_rows($res) == 1) {
			$_SESSION['workID'] = $workID;
			header('location: adminpassword.php');
		}
		
		
		else {
			
			$query = "SELECT adminFname, adminLname, workID FROM `admin` WHERE workID='$workID' AND adminpass='$adminpass'";
			$res = mysqli_query($db, $query);
			
			if (mysqli_num_rows($res) == 1) {
				$_SESSION['workID'] = $workID;
				header('location: admindash.php');
			}
			
			else{
			 //If the username and password doesn't match
			array_push($errors, "Work ID or password incorrect");
			}
		}
	}
}

// Hospital Registration code
if(isset($_POST['submitHosp'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  $date = date('Y-m-d_H:i:s');
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  
  $hospital =filter_var ($_POST['hospital'], FILTER_SANITIZE_STRING);
  $branch =filter_var ($_POST['branch'], FILTER_SANITIZE_NUMBER_INT);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $tel = filter_var($_POST['tel'], FILTER_SANITIZE_NUMBER_INT);
  //$status = 0;
  $status ="Not-Reveiwed";
  move_uploaded_file($temp,"files/".$name);

$query="INSERT INTO hospitalreg (hospital, branch, email, tel, applied, file, approval) VALUES ('$hospital', '$branch', '$email', '$tel', '$date', '$name', '$status')";
$results= mysqli_query($db, $query);
if($results){
$_SESSION['hospital'] = $hospital;	
echo"<script>alert('Thank You for registering with SmartMedi. You will receive further communication on your email after making payment.'); window.location.href ='/SmartMedi-2.0/PHPtrials-smartmedi/invoice.php'; </script>";
}
else{
echo "Failed to register";
}
}


?>
