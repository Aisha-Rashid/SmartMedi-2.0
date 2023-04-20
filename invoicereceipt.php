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
<?php				
$subscription = 8000;
	
$invoice_query = "SELECT MAX(invoice) AS max_invoice FROM billing";
$result = mysqli_query($db, $invoice_query);
$row = $result->fetch_assoc();
$invoice = $row["max_invoice"]; 

$query="select * from billing where invoice='$invoice'";
$results = mysqli_query($db, $query);
$array = mysqli_fetch_row($results);
$rows = mysqli_num_rows($results);
?>
	<div class="page">
		<h1>Thank you for your subscription.</h1>

		<p>Payment Details:</p>

		<h3>From:<i>Admin, SmartMedi Kenya.</i></h3>
                  
		<p><u>Invoice #<?php echo $invoice;?></u></p>
		<table>
			<tr>
				<th>Service</th>
                <th>Organization</th>
                <th>Amount Paid</th>
			</tr>
			<tr>
			<td>Yearly subscription @Ksh.<?php echo $subscription;?></td>
            <td><?php echo $array[1];?></td>
            <td><?php echo $array[4];?></td>	
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