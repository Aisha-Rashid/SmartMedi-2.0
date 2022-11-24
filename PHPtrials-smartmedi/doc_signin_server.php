<?php
$db = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();

$id = "";



if(isset($_POST["password"]) and isset($_POST["id"])){
    // $username = mysqli_real_escape_string($db, $_POST['username']);
	// $password = mysqli_real_escape_string($db, $_POST['password']);
    // $mdpass = md5($password);

    $id = $_POST['id'];
    $password = $_POST['password'];
    $mdpass=md5($password);
    echo $mdpass;
	// Error message if the input field is left blank
	if (empty($id)) {
		array_push($errors, "Account ID is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}


$query = "SELECT * FROM `doctors` WHERE id='$id' AND password='" . md5($password) . "'";
$data = mysqli_query($db, $query) or die(mysql_error());

        $rows = mysqli_num_rows($data);
        echo $rows;
        // $rows = $data -> fetch_assoc();
//  $newQuery = "SELECT ID from `patients` WHERE username = '$username'";
//  $newResult = mysql_query($newQuery);
//  while($row=mysql_fetch_array($newResult)){
//     $uid=$row['uid'];
//     echo $uid;
// }     


        // $query = "SELECT uid FROM master WHERE emailid = '$email' ";
        // $result = mysql_query($query);
// $data = mysqli_query($db, "SELECT * FROM patients WHERE username = `".$username."` AND `password` = `".$mdpass."`");

if ($rows == 1) {
    $_SESSION['id'] = $id;
    $row = mysqli_fetch_row($data);
        echo $row[6];

    // $row = mysqli_fetch_row($data);
    // $_SESSION['FirstName'] = $FirstName;
    // Redirect to user dashboard page
    header("Location: DocDashboard.php");
    

    
}


// $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM doctors WHERE doctor_ID='".$doc_id."' AND `password` ='".$mdpass."'"));

// if ($data ){
//     $patientData = mysqli_fetch_array($db, $data);
// 	header("Location: dashboard.php");
// 		$_SESSION['username'] = $username;

// }
}
?>


<!-- 
if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        } -->

