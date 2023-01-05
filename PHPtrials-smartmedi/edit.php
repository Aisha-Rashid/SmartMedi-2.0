<?php

require_once('server.php');
if (isset($_SESSION['IDNo']) && isset($_POST['editForm']) && isset($_GET['id'])){
   
    $id =$_GET['id'];
    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
	$LastName = mysqli_real_escape_string($db, $_POST['LastName']);
	$TelNo = mysqli_real_escape_string($db, $_POST['TelNo']);
	$IDNo = mysqli_real_escape_string($db, $_POST['IDNo']);
	$DOB = mysqli_real_escape_string($db, $_POST['DOB']);
	// $gender = mysqli_real_escape_string($db, $_POST['gender']);
	// $bloodgroup = mysqli_real_escape_string($db, $_POST['bloodgroup']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	// $county = mysqli_real_escape_string($db, $_POST['county']);
	$town = mysqli_real_escape_string($db, $_POST['town']);
	$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	
    $updateQuery = "UPDATE `patients` SET 
    
    `FirstName`='$FirstName',
    `LastName`='$LastName',
    `TelNo`='$TelNo',
    `IDNo`='$IDNo ',
    `DOB`='$DOB ',
    `email`='$email',
    `town`='$town ',
    `password`='$password1', 
    WHERE ID = $id";
    if ($db->query($updateQuery)===TRUE){
        echo "updated Record";
    }else{
        echo "something went wrong try again ";
    }


}else{
    echo"not working";
}


?>