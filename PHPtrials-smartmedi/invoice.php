<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <!-- Site Metas -->
    <title>SmartMedi EHR</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS ->
    <link rel="stylesheet" href="css/custom.css"-->
	<!--Password eye icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
<?php if (isset($_SESSION['hospital'])) : 

   $unique = $_SESSION['hospital'];
   $query = "SELECT * FROM `hospitalreg` WHERE hospital = '$unique'";
	$res = mysqli_query($db, $query);
	$array = mysqli_fetch_row($res);
	$rows = mysqli_num_rows($res);
	
	$subscription = 8000;
	$date = date('d-m-Y');
	$subtotal = $array[2] * $subscription;
	$service = 156;	
	$total = $subtotal + $service;
	$due = date('d-m-Y', strtotime($date . ' +1 day'));
	
$invoice_query = "SELECT MAX(invoice) AS max_invoice FROM billing";
$result = mysqli_query($db, $invoice_query);
$row = $result->fetch_assoc();
$next_invoice = $row["max_invoice"] + 1;
	
if(isset($_POST['payment'])!=""){
	
  $datepaid = date('Y-m-d');
$query="INSERT INTO billing (hospitalname, invoice, amountDue, amountPaid, datePaid) VALUES ('$unique', '$next_invoice', '$total', '$total', '$datepaid')";
$results= mysqli_query($db, $query);
if($results){
$_SESSION['hospital'] = $hospital;
	
echo"<script>alert('Payment Successful.'); window.location.href ='/SmartMedi-2.0/PHPtrials-smartmedi/sendmail.php?type=receipt&filename=".$unique."'; </script>";
}
else{
echo "Failed to register";
}
}
	
?>

	<!-- LOADER -->
    <div id="preloader">
		<div class="loader">
			<img src="images/preloader.gif" alt="" />
		</div>
    </div>
    <!-- END LOADER -->
	
	
	
		
		<div class="container">
			<!--div class="row"->
			
				<div class="col-lg-12 col-xs-12">
					<div class="contact-block"-->
						<form class="form-horizontal templatemo-signin-form" method="post" action="">
						<div class="table table-bordered">
						<div class="invoice p-3 mb-3">
						
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                   <img src="dashboardimages/favicon.ico" alt="Smartmedi"> SmartMedi Kenya.
                    <small class="float-right"><?php echo $date; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, SmartMedi Kenya.</strong><br>
                    Ground floor, room 105<br>
                    Allimex Plaza, Mombasa Road<br>
                    Phone: (+254)743 234567 / (+254) 790 453627<br>
                    Email: admin@smartmedike.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>Admin</strong><br>
                    <?php echo $array[1];?><br>
                    Phone: 0<?php echo $array[4];?><br>
                    Email: <?php echo $array[3];?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?php echo $next_invoice;?></b><br>
                  <br>
                  <b>Payment Due By: <?php echo $due; ?></b><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      
                      <th>Service</th>
                      <th>Organization</th>
					  <th>Qty</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $array[1];?></td>
                      <td><?php echo $array[2];?></td>
                      <td>Yearly subscription @Ksh.<?php echo $subscription;?> </td>
                      <td><?php echo $subtotal;?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Method:</p>
                  <img src="images/mpesa.png" alt="Mpesa"><b><u> Lipa na Mpesa.</u></b>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
				  You can make payments via the below details. Once payment is done and Mpesa message received,
				click on submit payment button.<br><b>
                    Paybill Number: 303030<br>
					Account Number: <?php echo $array[1]?> </b>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Ksh.<?php echo $subtotal;?></td>
                      </tr>
                      <tr>
                        <th>Service Fee</th>
                        <td>Ksh.<?php echo $service;?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Ksh.<?php echo $total ?></td>
                      </tr>
                    </table>
					<button type="submit" class="btn btn-success float-right" name="payment"><i class="fa fa-money"></i> Submit
                    Payment
                  </button>
                  </div>
                </div>
                <!-- /.col -->
              </div>
			   </div>
              <!-- /.row -->
			  <!-- this row will not appear when printing -->
             
            </div>
						
						</form>
					</div>
				</div>
				
				
				
			</div>
		</div>
	</div>						
	
	<!-- ALL JS FILES -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/passwordToggle.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script> 
	<script src="js/slider-index.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
	<script src="js/isotope.min.js"></script>	
	<script src="js/images-loded.min.js"></script>	
    <script src="js/custom.js"></script>

<?php endif ?>	
</body>
</html>