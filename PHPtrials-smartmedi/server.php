<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$FirstName = "";
$LastName = "";
$username = "";
$TelNo = "";
$IDNo = "";
$DOB = "";
$gender = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";


// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');

// Registration code
if (isset($_POST['reg_user'])) {
 
	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
	$LastName = mysqli_real_escape_string($db, $_POST['LastName']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$TelNo = mysqli_real_escape_string($db, $_POST['TelNo']);
	$IDNo = mysqli_real_escape_string($db, $_POST['IDNo']);
	$DOB = mysqli_real_escape_string($db, $_POST['DOB']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($FirstName)) { array_push($errors, "First Name is required"); }
	if (empty($LastName)) { array_push($errors, "Last Name is required"); }
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($TelNo)) { array_push($errors, "Telephone Number is required"); }
	if (empty($IDNo)) { array_push($errors, "ID Number is required"); }
	if (empty($DOB)) { array_push($errors, "Date of Birth is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password1)) { array_push($errors, "Password is required"); }

	if ($password1 != $password2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$password = md5($password1);


		$age = date_diff(date_create($DOB), date_create('today'))->y;

// Check if the user is 18 years or older
if ($age < 18) {
  // Redirect the user to an error page or display an error message
echo("You must be 18 years to Register");
  exit;
} else	 {
  // Process the user's sign up
  // ...		
		// Inserting data into table
		$query = "INSERT INTO patients (FirstName, LastName, username, TelNo, IDNo, DOB, gender, email, password)
				VALUES('$FirstName' , '$LastName' , '$username', '$TelNo' , '$IDNo' , '$DOB' , '$gender', '$email', '$password')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['username'] = $username;
		$_SESSION['FirstName'] = $FirstName;
		$_SESSION['LastName'] = $LastName;
		$_SESSION['DOB'] = $DOB;
		$_SESSION['gender'] = $gender;
		
		
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		
		// Page on which the user will be
		// redirected after logging in
		header('location: dashboard.php');
}
	}
}


// User login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Error message if the input field is left blank
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		$password = md5($password);
		
		$query = "SELECT * FROM patients WHERE username=
				'$username' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['FirstName'] = $FirstName;
			$_SESSION['username'] = $username;
			
			
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
?>
