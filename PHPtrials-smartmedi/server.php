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
$workid = "";
//$randomNumber = rand(10000000,99999999);
$errors = array();
$_SESSION['success'] = "";
$workID = "";
$adminpass = "";


// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');

// Patient Registration code
if (isset($_POST['reg_user'])) {
 
	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
	$LastName = mysqli_real_escape_string($db, $_POST['LastName']);
	$TelNo = mysqli_real_escape_string($db, $_POST['TelNo']);
	$IDNo = mysqli_real_escape_string($db, $_POST['IDNo']);
	$DOB = mysqli_real_escape_string($db, $_POST['DOB']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$bloodgroup = mysqli_real_escape_string($db, $_POST['bloodgroup']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$county = mysqli_real_escape_string($db, $_POST['county']);
	$town = mysqli_real_escape_string($db, $_POST['town']);
	$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	
	

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($FirstName)) { array_push($errors, "First Name is required"); }
	if (empty($LastName)) { array_push($errors, "Last Name is required"); }
	if (empty($TelNo)) { array_push($errors, "Telephone Number is required"); }
	if (empty($IDNo)) { array_push($errors, "ID Number is required"); }
	if (empty($DOB)) { array_push($errors, "Date of Birth is required"); }
	if (empty($county)) { array_push($errors, "County is required"); }
	//if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password1)) { array_push($errors, "Password is required"); }

	if ($password1 != $password2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$password = md5($password1);
		
		// Inserting data into tables
		$query = "INSERT INTO patients (FirstName, LastName, TelNo, IDNo, DOB, gender, bloodgroup, email, county, town, password)
				VALUES('$FirstName' , '$LastName' , '$TelNo' , '$IDNo' , '$DOB' , '$gender', '$bloodgroup', '$email', '$county', '$town', '$password')";
		
		
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		//$_SESSION['FirstName'] = $FirstName;
		//$_SESSION['LastName'] = $LastName;
		//$_SESSION['bloodgroup'] = $bloodgroup;
		//$_SESSION['DOB'] = $DOB;
		//$_SESSION['gender'] = $gender;
		$_SESSION['IDNo'] = $IDNo;
		
		
		
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		
		// Page on which the user will be
		// redirected after logging in
		header('location: uploadProfile.php');
	}
}

// Patient login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$IDNo = mysqli_real_escape_string($db, $_POST['IDNo']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Error message if the input field is left blank
	if (empty($IDNo)) {
		array_push($errors, "ID number is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		  //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		$password = md5($password);
		
		$query = "SELECT * FROM patients WHERE IDNo=
				'$IDNo' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			//$_SESSION['FirstName'] = $FirstName;
			$_SESSION['IDNo'] = $IDNo;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: dashboard.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Username or password incorrect");
		}
	}
}


// Doctor Registration code
if (isset($_POST['reg_doc'])) {
 
	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$nationalid = mysqli_real_escape_string($db, $_POST['nationalid']);
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$hospital = mysqli_real_escape_string($db, $_POST['hospital']);
	$workid = mysqli_real_escape_string($db, $_POST['workid']);
	$specialty = mysqli_real_escape_string($db, $_POST['specialty']);
	$docpassword1 = mysqli_real_escape_string($db, $_POST['docpassword1']);
	$docpassword2 = mysqli_real_escape_string($db, $_POST['docpassword2']);
	

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($nationalid)) { array_push($errors, "required"); }
	if (empty($fname)) { array_push($errors, "required"); }
	if (empty($lname)) { array_push($errors, "required"); }
	if (empty($hospital)) { array_push($errors, "required"); }
	if (empty($workid)) { array_push($errors, "required"); }
	if (empty($specialty)) { array_push($errors, "required"); }
	if (empty($docpassword1)) { array_push($errors, "Password is required"); }

	if ($docpassword1 != $docpassword2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}
		
	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$password = md5($docpassword1);
		
		// Inserting data into table
		$query = "INSERT INTO doctors (nationalid, fname, lname, hospital, workid, specialty, password)
				VALUES('$nationalid' , '$fname' , '$lname' , '$hospital', '$workid' , '$specialty', '$password')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		//$_SESSION['fname'] = $fname;
		//$_SESSION['lname'] = $lname;
		$_SESSION['nationalid'] = $nationalid;
		//$_SESSION['hospital'] = $hospital;
		
		
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		
		// Page on which the user will be
		// redirected after logging in
		header('location: DocDashboard.php');
}
}

// Doctor login
if (isset($_POST['doc_login'])) {
	
	// Data sanitization to prevent SQL injection
	$nationalid = mysqli_real_escape_string($db, $_POST['nationalid']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Error message if the input field is left blank
	if (empty($nationalid)) {
		array_push($errors, "ID number is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		  //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
		$password = md5($password);
		
		$query = "SELECT * FROM doctors WHERE nationalid=
				'$nationalid' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			//$_SESSION['FirstName'] = $FirstName;
			$_SESSION['nationalid'] = $nationalid;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: DocDashboard.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "ID or password incorrect");
		}
	}
}


//Admin Login

if (isset($_POST['admin_login'])) {
	
	// Data sanitization to prevent SQL injection
	$workID = mysqli_real_escape_string($db, $_POST['workID']);
	$adminpass = mysqli_real_escape_string($db, $_POST['adminpass']);

	// Error message if the input field is left blank
	if (empty($workID)) {
		array_push($errors, "Work ID is required");
	}
	if (empty($adminpass)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
				
		$query = "SELECT adminFname, adminLname, workID FROM `admin` WHERE workID=
				'$workID' AND adminpass='$adminpass'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			//$_SESSION['FirstName'] = $FirstName;
			$_SESSION['workID'] = $workID;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: admindash.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Work ID or password incorrect");
		}
	}
}




?>
