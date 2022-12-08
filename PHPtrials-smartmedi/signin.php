<?php
$db = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();




if(isset($_POST["password"]) and isset($_POST["IDNo"])){
    // $username = mysqli_real_escape_string($db, $_POST['username']);
	// $password = mysqli_real_escape_string($db, $_POST['password']);
    // $mdpass = md5($password);

    $IDNo = $_POST['IDNo'];
    $password = $_POST['password'];
    $mdpass=md5($password);
    echo $mdpass;
	// Error message if the input field is left blank
	if (empty($IDNo)) {
		array_push($errors, "ID number is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}


$query = "SELECT * FROM `patients` WHERE IDNo='$IDNo' AND password='" . md5($password) . "'";
$data = mysqli_query($db, $query) or die(mysql_error());

        $rows = mysqli_num_rows($data);
        echo $rows;
        

if ($rows == 1) {
    $_SESSION['IDNo'] = $IDNo;
	
    $row = mysqli_fetch_row($data);
        echo $row[8];

    // $row = mysqli_fetch_row($data);
    // $_SESSION['FirstName'] = $FirstName;
    // Redirect to user dashboard page
    header("Location: dashboard.php");
    

    
}


}
?>

