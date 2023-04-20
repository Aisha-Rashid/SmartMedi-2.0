<?php
include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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

		footer{
			padding: 20px;
		}

		footer a{
			text-decoration: none;
			color: #155197;
		}
	</style>
</head>
<body>
	<div class="page">
		
		<h1>Registration Successful!</h1>

		<p>Staff Details:</p>
<?php

	$mailquery = "select * from hospitalreg where mail='1'";
	$result = mysqli_query($db, $mailquery);
	while($row=mysqli_fetch_array($result)){
	$hospital=$row['hospital'];
        
		$query = "select * from doctors where hospital='$hospital'";
		$res = mysqli_query($db, $query);
		while($row=mysqli_fetch_array($res)){
				$hospital=$row['hospital'];
				$fname=$row['fname'];
				$lname=$row['lname'];
				$workid=$row['workid'];
				$specialty=$row['specialty'];
?>                 
		<table>
		<thead>
			<tr>
				<th>First Name</th>
                <th>Last Name</th>
                <th>Work ID</th>
                <th>Specialty</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $row['fname']; ?></td>
				<td><?php echo $row['lname'];?></td>
				<td><?php echo $row['workid'];?></td>
				<td><?php echo $row['specialty'];?></td>
			</tr>
		</tbody>
		<?php }}?>
		</table>
		<p>The aforementioned can now log into the system. Instructions on how to do so has been mailed to the individuals. 
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
</html>