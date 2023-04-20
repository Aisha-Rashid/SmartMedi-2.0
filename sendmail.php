<?php 
include('server.php');
$to = "aisha.wrashid64@gmail.com";

$subject = "SmartMedi Registration";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
								
$headers .= 'From: <chuchuaisha@gmail.com>' . "\r\n";

if ($_GET['type'] == 'approved'){ 


$encrypted_id = $_GET['filename'];
$id = base64_decode($encrypted_id);
$date = date('Y-m-d_H:i:s');

$Hospitalapproval= mysqli_query($db, "select * from hospitalreg where id='$id'");
if (mysqli_num_rows($Hospitalapproval) == 1) {
$update_query = "UPDATE hospitalreg SET approval='approved', approvalDate='$date', mail=1 WHERE id='$id'";
mysqli_query($db, $update_query);

}
ob_start();
	include("mailstructure.php");
	$message = ob_get_contents();
	ob_end_clean();
	
	mail($to, $subject, $message, $headers);
	header('location: admindash.php');
	
	}	

if ($_GET['type'] == 'receipt'){ 	
	ob_start();
	include("invoicereceipt.php");
	$message = ob_get_contents();
	ob_end_clean();
	
	mail($to, $subject, $message, $headers);
								
header('location: index.php');
}
 

?>