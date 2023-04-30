<?php 
include('server.php');
//$to = "aisha.wrashid64@gmail.com";

$subject = "SmartMedi Registration";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
								
$headers .= 'From: <chuchuaisha@gmail.com>' . "\r\n";

$message = "
	<html>
<head>
	<meta charset='utf-8'>
	<title>HTML email template</title>
	<style>
		
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body{
			font-family: sans-serif;
			min-height: 100vh;
		}

		.page{
			width: 768px;
			margin:  0 auto;
			font-size: 16px;
			color: #555555;
		}

		h1{
			background-color: #f4f4f4;
			padding: 20px;
			margin-top: 20px;
		}

		h2{
			padding: 20px;
		}

		p{
			padding: 10px 20px;
			line-height: 26px;
		}	

		h3{
			padding: 20px;
		}

		table{
			padding: 20px;
			width:  100%;
		}

		table tr{}
		table th{
			text-align: left;
			padding: 10px;
			background-color: #40c4e6;
		}
		table td{
			border: thin solid #d4d4d4;
			padding: 10px;
		}
		table td1{
			padding: 10px;
		}

		footer{
			padding: 20px;
		}

		footer a{
			text-decoration: none;
			color: #155197;
		}
	</style>
</head>";

if ($_GET['type'] == 'approved'){ 


$encrypted_id = $_GET['filename'];
$id = base64_decode($encrypted_id);
$date = date('Y-m-d_H:i:s');

$Hospitalapproval= mysqli_query($db, "select * from hospitalreg where id='$id'");
if (mysqli_num_rows($Hospitalapproval) == 1) {
$update_query = "UPDATE hospitalreg SET approval='approved', approvalDate='$date', mail=1 WHERE id='$id'";
mysqli_query($db, $update_query);

}
$Hospquery="SELECT doctors.fname, doctors.lname, doctors.workid, doctors.specialty, 
hospitalreg.hospital FROM doctors, hospitalreg WHERE doctors.hospital = hospitalreg.hospital 
AND hospitalreg.id ='$id'";
$res = mysqli_query($db, $Hospquery);

$rows = array();

    while($row=mysqli_fetch_array($res)){
    $rows[] = array(
        'fname' => $row['fname'],
        'lname' => $row['lname'],
        'workid' => $row['workid'],
        'specialty' => $row['specialty'],
		'email' => $row['email'],
    );
	
}
$emailquery=mysqli_query($db, "select email from hospitalreg where id='$id'");
$row = mysqli_fetch_array($emailquery);
$to = $row['email'];
$url = "localhost/SmartMedi-2.0/PHPtrials-smartmedi/DocPassword.php";      
ob_start();


	//include("mailstructure.php");
	//$message = ob_get_contents();
	
$message .="
<body>
	<div class='page'>
		
		<h1>Registration Successful!</h1>

		<p>Staff Details:</p>
		<table>
		<thead>
			<tr>
				<th>First Name</th>
                <th>Last Name</th>
                <th>Work ID</th>
                <th>Specialty</th>
			</tr>
		</thead>
		<tbody>";
		foreach ($rows as $row){
			$message .="
				<tr>
						<td>" . $row['fname'] . "</td>
						<td>" . $row['lname'] . "</td>
						<td>" . $row['workid'] . "</td>
						<td>" . $row['specialty'] . "</td>
					</tr>";
		}
		$message .="
		</tbody>
		
		</table>
		<p>The aforementioned can now log into the system using this <a href='$url'> link.</a><br> 
		For any assistance, kindly get in touch via the contact details below.</p>
		<footer>
			<address>
                    <strong>SmartMedi Kenya.</strong><br>
                    Ground floor, room 105<br>
                    Allimex Plaza, Mombasa Road<br>
                    Phone: (+254)743 234567 / (+254) 790 453627<br>
                    Email: admin@smartmedike.com
                  </address>
		</footer>
	</div>
</body>
</html>";

	ob_end_clean();
	
	mail($to, $subject, $message, $headers);
	header('location: admindash.php');
	
}		

if ($_GET['type'] == 'receipt'){ 
$unique = $_GET['filename'];

$Invoicequery="SELECT * from billing WHERE hospitalname = '$unique'"; 
$result = mysqli_query($db, $Invoicequery);

$emailq=mysqli_query($db, "select email from hospitalreg where hospital='$unique'");
$row = mysqli_fetch_array($emailq);
$to = $row['email'];

while($row=mysqli_fetch_array($result)){
	$hospitalname = $row['hospitalname'];
	$amountPaid = $row['amountPaid'];
	$invoice = $row['invoice'];
    
	
//$subscription = 8000;

	ob_start();
	//include("invoicereceipt.php");
	$message .= "
	<body>

	<div class='page'>
		<h1>Thank you for your subscription.</h1>

		<p>Payment Details:</p>

		<h3>From:<i>Admin, SmartMedi Kenya.</i></h3>
                  
		<p><u>Invoice #" . $row['invoice'] . "</u></p>
		<table>
			<tr>
				<th>Service</th>
                <th>Organization</th>
                <th>Amount Paid</th>
			</tr>
			<tr>
			<td>Yearly subscription @Ksh.8,000</td>
            <td>" . $row['hospitalname'] . "</td>
            <td>" . $row['amountPaid'] . "</td>	
			</tr>
			
</table>
		<footer>
			<address>
                    <strong>SmartMedi Kenya.</strong><br>
                    Ground floor, room 105<br>
                    Allimex Plaza, Mombasa Road<br>
                    Phone: (+254)743 234567 / (+254) 790 453627<br>
                    Email: admin@smartmedike.com
                  </address>
		</footer>
	</div>
</body>
</html>
	";}
	ob_end_clean();
	
	mail($to, $subject, $message, $headers);
								
header('location: index.php');
}
//Password reset
if ($_GET['type'] == 'reset'){ 
$to = $_GET['filename'];

$query="SELECT * from patients WHERE email = '$to'"; 
$result = mysqli_query($db, $query);
$rows = array();

    while($row=mysqli_fetch_array($result)){
    $rows[] = array(
        'FirstName' => $row['FirstName'],
        'LastName' => $row['LastName'],
        'IDNo' => $row['IDNo'],
    );
	
}


	ob_start();
	//include("invoicereceipt.php");
	$message .= "
	<body>

	<div class='page'>
		<h1>Password Reset</h1><br>";
		foreach ($rows as $row){
		$encrypted_id = base64_encode($row['IDNo']);
		$url = "localhost/SmartMedi-2.0/PHPtrials-smartmedi/resetPwd.php?type=newpwd&filename=$encrypted_id'";
		
		$message .="	
		<p>Dear <b>" . $row['FirstName'] . " " . $row['LastName'] . ",</b><br>
		A password reset request has been recieved. Use the link below to create a new password.<br>
		<a href='$url'>Create new password</a><br>
			
		For any enquiries, kindly get in touch via the contact details below.
		
		</p>
		
		<footer>
			<address>
                    <strong>SmartMedi Kenya.</strong><br>
                    Ground floor, room 105<br>
                    Allimex Plaza, Mombasa Road<br>
                    Phone: (+254)743 234567 / (+254) 790 453627<br>
                    Email: admin@smartmedike.com
                  </address>
		</footer>
			</div>
		</body>
		</html>";
		}
        
	ob_end_clean();
	
	mail($to, $subject, $message, $headers);
								
header('location: login.php');
}

?>