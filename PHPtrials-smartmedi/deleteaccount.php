<?php
extract($_REQUEST);
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
	//Delete Patient record
	if ($_GET['type'] == 'patient'){
		
		$tables = array("patients","nextofkin","fileupload","response","medicalcover","docnotes");
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
	if ($_GET['type'] == 'hospital'){
		
		$tables = array("doctors","hospitals");
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
?>