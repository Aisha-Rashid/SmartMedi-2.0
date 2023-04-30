<?php
extract($_REQUEST);
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
	//Delete Patient record
	if ($_GET['type'] == 'patient'){
		
		$tables = array("patients","nextofkin","fileupload","response","medicalcover","docnotes", "dependants");
		foreach($tables as $table) {
		$query=$conn->query("DELETE FROM $table WHERE IDNo = '$id'");	
			
		if($query){
		header("location:patients.php");
		}
		else{
		die(mysqli_error($conn));
		}
		}
}
//Delete child record
	elseif ($_GET['type'] == 'minor'){
		
		$query = $conn->query("DELETE FROM dependants WHERE IDNo = '$id' and FirstName_dep='$fname'");
		
		if($query){
		header("location:minorpatients.php");
		}
		else{
		die(mysqli_error($conn));
		}
}
	//Delete Doc
	elseif ($_GET['type'] == 'doctor') {
		// Delete a doctor
		$query = $conn->query("DELETE FROM doctors WHERE nationalid = '$id'");
		
		if($query){
		header("location:doctors.php");
		}
		else{
		die(mysqli_error($conn));
		}
	}
	
	//Delete Hospital
	elseif ($_GET['type'] == 'hospital'){
		
		$tables = array("doctors","hospitalreg");
		foreach($tables as $table) {
		$query=$conn->query("DELETE FROM $table WHERE hospital = '$id'");	
			
		if($query){
		header("location:hospitals.php");
		}
		else{
		die(mysqli_error($conn));
		}
		}
}
//Delete kin
	elseif ($_GET['type'] == 'kin') {
		
		$query = $conn->query("DELETE FROM nextofkin WHERE id = '$id'");
		
		if($query){
		header("location:preferences.php");
		}
		else{
		die(mysqli_error($conn));
		}
	}
//Delete insurance
	elseif ($_GET['type'] == 'insurance') {
		
		$query = $conn->query("DELETE FROM medicalcover WHERE id = '$id'");
		
		if($query){
		header("location:preferences.php");
		}
		else{
		die(mysqli_error($conn));
		}
	}

?>