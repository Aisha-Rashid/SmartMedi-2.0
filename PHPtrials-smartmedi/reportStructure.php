<?php
include('server.php');

if (!isset($_SESSION['workID'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: AdminLogin.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['workID']);
  header("location: AdminLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--meta charset="utf-8">
    <--meta http-equiv="X-UA-Compatible" content="IE=edge"-->   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <!-- Site Metas -->
    <title>SmartMedi EEHR</title>  
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
<body>
<?php if (isset($_SESSION['workID'])) :
include ('data-visualization.php');

    $unique = $_SESSION['workID'];
?>
 <!--div id="printableArea" 
 
 <a href="javascript:void(0);" onclick="printPageArea('printableArea')" class="btn btn-info" >Print</a>
 > 
 <!--div id="header2"->
 <table width = 100% class=" table-bordered" -->
<div class="container"> 
 <h1><img src="dashboardimages/favicon.ico" alt="Smartmedi"><b>SmartMedi Kenya</b></h1>
 <p>Allimex Plaza, Ground floor room 105 <br>  Mombasa Road, Nairobi <br>
 Email: admin@smartmedike.com <br>
 Tel: (254) 743-234567 / (254) 790-453627</p>
 
 
 <hr>
<?php
	if ($_GET['type'] == 'hospital'){ 
	?>
 <h1 align = "center">Report Title: List of  Registered Hospitals</h1>
<TABLE width=80% class=" table-bordered" align="center" >
<thead>
<tr bgcolor="#d3fcf3">
                      <th>#</th>
                      <th>Name</th>
					  <th>No. of branches</th>
					  <th>Email</th>
					  <th>Tel No.</th>
					  <th>Onboarded on</th>
					  
                    </tr>
                  </thead>
<?php
	$counter = 1;
	while($row=mysqli_fetch_array($hospitalReportRes)){
		
	$number = $counter;
	$counter++;						
	$hospital=$row['hospital'];
	$branch=$row['branch'];
	$email=$row['email'];
	$tel=$row['tel'];
	$applied=$row['applied'];
	$approvalDate=$row['approvalDate']; ?>
				  <tbody>
				  <tr>
						<td><?php echo $number;?></td>
						<td><?php echo $row['hospital'] ?></td>
						<td><?php echo $row['branch'];?></td>
						<td><?php echo $row['email'];?></td>
						<td>0<?php echo $row['tel'];?></td>
						<td><?php if ($row['approvalDate'] != "0000-00-00 00:00:00") {echo $row['approvalDate'];}?></td>
						
					</tr>
					</tbody>
					<?php } ?> 	
					<tr ><td colspan=6><h3><b>Total: <?php echo $totalHospitalsUsers; ?></b></h3></td></tr>		
</table>

<?php } if ($_GET['type'] == 'doctor'){  ?>

<h1 align = "center"><u>Report Title: List of Registered Medical Practitioners per Organization.</u></h1>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
<tr>
                      <th>Hospital</th>
                      <th>Registered persons</th>
					  <th>Department</th>
                    </tr>
                  </thead>
				  </tbody>
<?php
	$previous_hospital = null;
    //$rowspan = 0;
	while($row=mysqli_fetch_array($doctorReportRes)){
							
	$id=$row['hospital'];						
	$fname=$row['fname'];
	$lname=$row['lname'];
	$specialty=$row['specialty'];
	 if($id != $previous_hospital){
          
          echo "<tr><td>$id</td><td>$fname $lname</td><td>$specialty</td></tr>";
          $previous_hospital = $id;
          //$rowspan = 1;
        } else {
          // Same hospital as previous row, increase rowspan
          echo "<tr><td></td><td>$fname $lname</td><td>$specialty</td></tr>";
          //$rowspan++;
        }
      }
      // Close the last row
      //echo "<tr><td rowspan=\"$rowspan\"></td></tr>";
    ?>
					</tbody>
						
</table>
<?php } if ($_GET['type'] == 'region'){ ?>

<h1 align = "center"><u>Report Title: List of Illnesses per Region.</u></h1>
<?php if ($_GET['location'] == 'nairobi' ){ ?>
<h3 align = "center">Nairobi Region</h3>
<TABLE width=100% class=" table-bordered" align="center">
<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Nairobi County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNrb ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNrb ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNrb ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNrb ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNrb ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNrb ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNrb ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNrb ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNrb ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNrb ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNrb ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNrb ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNrb ?></td></tr>
				  <tr><td><h3><b>Total:</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNrb + $totalCancerNrb + $totalCardiovascularNrb + $totalCongenitalNrb + $totalEndocrineNrb + $totalEyeNrb + $totalGastroNrb
				  + $totalGenitourinaryNrb + $totalGynaecologicalNrb + $totalMusculoskeletalNrb + $totalNeurologicalNrb + $totalRespiratoryNrb + $totalSkinNrb
				  ?></b></h3></td></b></tr>
					
					
					
					
					
					</tbody>
</table>
<?php } if ($_GET['location'] == 'central'){?>
<h3 align = "center">Central Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kiambu County</b></th></tr>
					 <tr>
					 <thead>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKiambu ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKiambu ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKiambu ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKiambu ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKiambu ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKiambu ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKiambu ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKiambu ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKiambu ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKiambu ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKiambu ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKiambu ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKiambu ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKiambu + $totalCancerKiambu + $totalCardiovascularKiambu + $totalCongenitalKiambu + $totalEndocrineKiambu + $totalEyeKiambu + $totalGastroKiambu
				  + $totalGenitourinaryKiambu + $totalGynaecologicalKiambu + $totalMusculoskeletalKiambu + $totalNeurologicalKiambu + $totalRespiratoryKiambu + $totalSkinKiambu
				  ?></b></h3></td></b></tr>
					
					
					</tbody>					
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kirinyaga County</b></th></tr>
					 <tr>
					 <thead>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKiri ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKiri ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKiri ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKiri ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKiri ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKiri ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKiri ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKiri ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKiri ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKiri ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKiri ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKiri ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKiri ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKiri + $totalCancerKiri + $totalCardiovascularKiri + $totalCongenitalKiri + $totalEndocrineKiri + $totalEyeKiri + $totalGastroKiri
				  + $totalGenitourinaryKiri + $totalGynaecologicalKiri + $totalMusculoskeletalKiri + $totalNeurologicalKiri + $totalRespiratoryKiri + $totalSkinKiri
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Murang'a County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMuranga ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMuranga ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMuranga ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMuranga ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMuranga ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMuranga ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMuranga ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMuranga ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMuranga ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMuranga ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMuranga ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMuranga ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMuranga ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMuranga + $totalCancerMuranga + $totalCardiovascularMuranga + $totalCongenitalMuranga + $totalEndocrineMuranga + $totalEyeMuranga + $totalGastroMuranga
				  + $totalGenitourinaryMuranga + $totalGynaecologicalMuranga + $totalMusculoskeletalMuranga + $totalNeurologicalMuranga + $totalRespiratoryMuranga + $totalSkinMuranga
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Nyandarua County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNyan ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNyan ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNyan ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNyan ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNyan ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNyan ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNyan ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNyan ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNyan ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNyan ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNyan ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNyan ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNyan ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNyan + $totalCancerNyan + $totalCardiovascularNyan + $totalCongenitalNyan + $totalEndocrineNyan + $totalEyeNyan + $totalGastroNyan
				  + $totalGenitourinaryNyan + $totalGynaecologicalNyan + $totalMusculoskeletalNyan + $totalNeurologicalNyan + $totalRespiratoryNyan + $totalSkinNyan
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Nyeri County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNyeri ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNyeri ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNyeri ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNyeri ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNyeri ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNyeri ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNyeri ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNyeri ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNyeri ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNyeri ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNyeri ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNyeri ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNyeri ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNyeri + $totalCancerNyeri + $totalCardiovascularNyeri + $totalCongenitalNyeri + $totalEndocrineNyeri + $totalEyeNyeri + $totalGastroNyeri
				  + $totalGenitourinaryNyeri + $totalGynaecologicalNyeri + $totalMusculoskeletalNyeri + $totalNeurologicalNyeri + $totalRespiratoryNyeri + $totalSkinNyeri
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
						
</table>

<?php } if ($_GET['location'] == 'eastern'){?>
<h3 align = "center">Eastern Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Embu County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodEmbu ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerEmbu ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularEmbu ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalEmbu ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineEmbu ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeEmbu ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroEmbu ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryEmbu ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalEmbu ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalEmbu ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalEmbu ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryEmbu ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinEmbu ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodEmbu + $totalCancerEmbu + $totalCardiovascularEmbu + $totalCongenitalEmbu + $totalEndocrineEmbu + $totalEyeEmbu + $totalGastroEmbu
				  + $totalGenitourinaryEmbu + $totalGynaecologicalEmbu + $totalMusculoskeletalEmbu + $totalNeurologicalEmbu + $totalRespiratoryEmbu + $totalSkinEmbu
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Isiolo County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodIsiolo ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerIsiolo ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularIsiolo ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalIsiolo ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineIsiolo ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeIsiolo ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroIsiolo ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryIsiolo ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalIsiolo ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalIsiolo ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalIsiolo ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryIsiolo ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinIsiolo ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodIsiolo + $totalCancerIsiolo + $totalCardiovascularIsiolo + $totalCongenitalIsiolo + $totalEndocrineIsiolo + $totalEyeIsiolo + $totalGastroIsiolo
				  + $totalGenitourinaryIsiolo + $totalGynaecologicalIsiolo + $totalMusculoskeletalIsiolo + $totalNeurologicalIsiolo + $totalRespiratoryIsiolo + $totalSkinIsiolo
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kitui County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKitui ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKitui ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKitui ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKitui ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKitui ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKitui ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKitui ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKitui ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKitui ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKitui ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKitui ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKitui ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKitui ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKitui + $totalCancerKitui + $totalCardiovascularKitui + $totalCongenitalKitui + $totalEndocrineKitui + $totalEyeKitui + $totalGastroKitui
				  + $totalGenitourinaryKitui + $totalGynaecologicalKitui + $totalMusculoskeletalKitui + $totalNeurologicalKitui + $totalRespiratoryKitui + $totalSkinKitui
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Machakos County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMachakos ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMachakos ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMachakos ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMachakos ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMachakos ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMachakos ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMachakos ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMachakos ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMachakos ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMachakos ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMachakos ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMachakos ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMachakos ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMachakos + $totalCancerMachakos + $totalCardiovascularMachakos + $totalCongenitalMachakos + $totalEndocrineMachakos + $totalEyeMachakos + $totalGastroMachakos
				  + $totalGenitourinaryMachakos + $totalGynaecologicalMachakos + $totalMusculoskeletalMachakos + $totalNeurologicalMachakos + $totalRespiratoryMachakos + $totalSkinMachakos
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Makueni County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMakueni ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMakueni ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMakueni ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMakueni ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMakueni ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMakueni ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMakueni ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMakueni ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMakueni ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMakueni ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMakueni ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMakueni ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMakueni ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMakueni + $totalCancerMakueni + $totalCardiovascularMakueni + $totalCongenitalMakueni + $totalEndocrineMakueni + $totalEyeMakueni + $totalGastroMakueni
				  + $totalGenitourinaryMakueni + $totalGynaecologicalMakueni + $totalMusculoskeletalMakueni + $totalNeurologicalMakueni + $totalRespiratoryMakueni + $totalSkinMakueni
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Marsabit County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMarsabit ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMarsabit ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMarsabit ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMarsabit ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMarsabit ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMarsabit ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMarsabit ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMarsabit ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMarsabit ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMarsabit ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMarsabit ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMarsabit ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMarsabit ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMarsabit + $totalCancerMarsabit + $totalCardiovascularMarsabit + $totalCongenitalMarsabit + $totalEndocrineMarsabit + $totalEyeMarsabit + $totalGastroMarsabit
				  + $totalGenitourinaryMarsabit + $totalGynaecologicalMarsabit + $totalMusculoskeletalMarsabit + $totalNeurologicalMarsabit + $totalRespiratoryMarsabit + $totalSkinMarsabit
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Meru County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMeru ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMeru ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMeru ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMeru ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMeru ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMeru ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMeru ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMeru ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMeru ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMeru ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMeru ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMeru ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMeru ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMeru + $totalCancerMeru + $totalCardiovascularMeru + $totalCongenitalMeru + $totalEndocrineMeru + $totalEyeMeru + $totalGastroMeru
				  + $totalGenitourinaryMeru + $totalGynaecologicalMeru + $totalMusculoskeletalMeru + $totalNeurologicalMeru + $totalRespiratoryMeru + $totalSkinMeru
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Tharaka-Nithi County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodTharaka ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerTharaka ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularTharaka ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalTharaka ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineTharaka ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeTharaka ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroTharaka ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryTharaka ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalTharaka ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalTharaka ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalTharaka ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryTharaka ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinTharaka ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodTharaka + $totalCancerTharaka + $totalCardiovascularTharaka + $totalCongenitalTharaka + $totalEndocrineTharaka + $totalEyeTharaka + $totalGastroTharaka
				  + $totalGenitourinaryTharaka + $totalGynaecologicalTharaka + $totalMusculoskeletalTharaka + $totalNeurologicalTharaka + $totalRespiratoryTharaka + $totalSkinTharaka
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
						
</table>

<?php } if ($_GET['location'] == 'western'){  ?>
<h3 align = "center">Western Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Bungoma County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodBungoma ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerBungoma ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularBungoma ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalBungoma ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineBungoma ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeBungoma ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroBungoma ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryBungoma ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalBungoma ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalBungoma ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalBungoma ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryBungoma ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinBungoma ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodBungoma + $totalCancerBungoma + $totalCardiovascularBungoma + $totalCongenitalBungoma + $totalEndocrineBungoma + $totalEyeBungoma + $totalGastroBungoma
				  + $totalGenitourinaryBungoma + $totalGynaecologicalBungoma + $totalMusculoskeletalBungoma + $totalNeurologicalBungoma + $totalRespiratoryBungoma + $totalSkinBungoma
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Busia County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodBusia ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerBusia ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularBusia ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalBusia ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineBusia ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeBusia ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroBusia ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryBusia ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalBusia ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalBusia ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalBusia ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryBusia ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinBusia ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodBusia + $totalCancerBusia + $totalCardiovascularBusia + $totalCongenitalBusia + $totalEndocrineBusia + $totalEyeBusia + $totalGastroBusia
				  + $totalGenitourinaryBusia + $totalGynaecologicalBusia + $totalMusculoskeletalBusia + $totalNeurologicalBusia + $totalRespiratoryBusia + $totalSkinBusia
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kakamega County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKakamega ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKakamega ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKakamega ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKakamega ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKakamega ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKakamega ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKakamega ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKakamega ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKakamega ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKakamega ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKakamega ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKakamega ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKakamega ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKakamega + $totalCancerKakamega + $totalCardiovascularKakamega + $totalCongenitalKakamega + $totalEndocrineKakamega + $totalEyeKakamega + $totalGastroKakamega
				  + $totalGenitourinaryKakamega + $totalGynaecologicalKakamega + $totalMusculoskeletalKakamega + $totalNeurologicalKakamega + $totalRespiratoryKakamega + $totalSkinKakamega
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Vihiga County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodVihiga ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerVihiga ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularVihiga ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalVihiga ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineVihiga ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeVihiga ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroVihiga ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryVihiga ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalVihiga ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalVihiga ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalVihiga ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryVihiga ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinVihiga ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodVihiga + $totalCancerVihiga + $totalCardiovascularVihiga + $totalCongenitalVihiga + $totalEndocrineVihiga + $totalEyeVihiga + $totalGastroVihiga
				  + $totalGenitourinaryVihiga + $totalGynaecologicalVihiga + $totalMusculoskeletalVihiga + $totalNeurologicalVihiga + $totalRespiratoryVihiga + $totalSkinVihiga
				  ?></b></h3></td></b></tr>
					
					
					</tbody>
						
</table>
<?php }  if ($_GET['location'] == 'nyanza'){?>
<h3 align = "center">Nyanza Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Homa Bay County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodHoma ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerHoma ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularHoma ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalHoma ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineHoma ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeHoma ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroHoma ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryHoma ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalHoma ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalHoma ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalHoma ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryHoma ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinHoma ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodHoma + $totalCancerHoma + $totalCardiovascularHoma + $totalCongenitalHoma + $totalEndocrineHoma + $totalEyeHoma + $totalGastroHoma
				  + $totalGenitourinaryHoma + $totalGynaecologicalHoma + $totalMusculoskeletalHoma + $totalNeurologicalHoma + $totalRespiratoryHoma + $totalSkinHoma
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kisii County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKisii ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKisii ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKisii ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKisii ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKisii ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKisii ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKisii ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKisii ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKisii ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKisii ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKisii ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKisii ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKisii ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKisii + $totalCancerKisii + $totalCardiovascularKisii + $totalCongenitalKisii + $totalEndocrineKisii + $totalEyeKisii + $totalGastroKisii
				  + $totalGenitourinaryKisii + $totalGynaecologicalKisii + $totalMusculoskeletalKisii + $totalNeurologicalKisii + $totalRespiratoryKisii + $totalSkinKisii
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kisumu County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKisumu ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKisumu ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKisumu ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKisumu ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKisumu ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKisumu ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKisumu ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKisumu ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKisumu ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKisumu ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKisumu ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKisumu ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKisumu ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKisumu + $totalCancerKisumu + $totalCardiovascularKisumu + $totalCongenitalKisumu + $totalEndocrineKisumu + $totalEyeKisumu + $totalGastroKisumu
				  + $totalGenitourinaryKisumu + $totalGynaecologicalKisumu + $totalMusculoskeletalKisumu + $totalNeurologicalKisumu + $totalRespiratoryKisumu + $totalSkinKisumu
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Migori County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMigori ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMigori ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMigori ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMigori ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMigori ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMigori ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMigori ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMigori ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMigori ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMigori ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMigori ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMigori ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMigori ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMigori + $totalCancerMigori + $totalCardiovascularMigori + $totalCongenitalMigori + $totalEndocrineMigori + $totalEyeMigori + $totalGastroMigori
				  + $totalGenitourinaryMigori + $totalGynaecologicalMigori + $totalMusculoskeletalMigori + $totalNeurologicalMigori + $totalRespiratoryMigori + $totalSkinMigori
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Nyamira County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNyamira ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNyamira ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNyamira ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNyamira ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNyamira ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNyamira ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNyamira ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNyamira ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNyamira ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNyamira ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNyamira ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNyamira ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNyamira ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNyamira + $totalCancerNyamira + $totalCardiovascularNyamira + $totalCongenitalNyamira + $totalEndocrineNyamira + $totalEyeNyamira + $totalGastroNyamira
				  + $totalGenitourinaryNyamira + $totalGynaecologicalNyamira + $totalMusculoskeletalNyamira + $totalNeurologicalNyamira + $totalRespiratoryNyamira + $totalSkinNyamira
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Siaya County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodSiaya ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerSiaya ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularSiaya ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalSiaya ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineSiaya ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeSiaya ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroSiaya ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinarySiaya ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalSiaya ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalSiaya ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalSiaya ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratorySiaya ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinSiaya ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodSiaya + $totalCancerSiaya + $totalCardiovascularSiaya + $totalCongenitalSiaya + $totalEndocrineSiaya + $totalEyeSiaya + $totalGastroSiaya
				  + $totalGenitourinarySiaya + $totalGynaecologicalSiaya + $totalMusculoskeletalSiaya + $totalNeurologicalSiaya + $totalRespiratorySiaya + $totalSkinSiaya
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
<?php }  if ($_GET['location'] == 'rift'){?>
<h3 align = "center">Rift Valley Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Baringo County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodBaringo ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerBaringo ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularBaringo ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalBaringo ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineBaringo ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeBaringo ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroBaringo ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryBaringo ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalBaringo ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalBaringo ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalBaringo ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryBaringo ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinBaringo ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodBaringo + $totalCancerBaringo + $totalCardiovascularBaringo + $totalCongenitalBaringo + $totalEndocrineBaringo + $totalEyeBaringo + $totalGastroBaringo
				  + $totalGenitourinaryBaringo + $totalGynaecologicalBaringo + $totalMusculoskeletalBaringo + $totalNeurologicalBaringo + $totalRespiratoryBaringo + $totalSkinBaringo
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Bomet County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodBomet ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerBomet ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularBomet ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalBomet ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineBomet ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeBomet ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroBomet ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryBomet ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalBomet ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalBomet ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalBomet ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryBomet ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinBomet ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodBomet + $totalCancerBomet + $totalCardiovascularBomet + $totalCongenitalBomet + $totalEndocrineBomet + $totalEyeBomet + $totalGastroBomet
				  + $totalGenitourinaryBomet + $totalGynaecologicalBomet + $totalMusculoskeletalBomet + $totalNeurologicalBomet + $totalRespiratoryBomet + $totalSkinBomet
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Elgeyo/Marakwet County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodElgeyo ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerElgeyo ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularElgeyo ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalElgeyo ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineElgeyo ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeElgeyo ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroElgeyo ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryElgeyo ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalElgeyo ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalElgeyo ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalElgeyo ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryElgeyo ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinElgeyo ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodElgeyo + $totalCancerElgeyo + $totalCardiovascularElgeyo + $totalCongenitalElgeyo + $totalEndocrineElgeyo + $totalEyeElgeyo + $totalGastroElgeyo
				  + $totalGenitourinaryElgeyo + $totalGynaecologicalElgeyo + $totalMusculoskeletalElgeyo + $totalNeurologicalElgeyo + $totalRespiratoryElgeyo + $totalSkinElgeyo
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kajiado County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKajiado ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKajiado ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKajiado ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKajiado ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKajiado ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKajiado ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKajiado ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKajiado ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKajiado ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKajiado ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKajiado ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKajiado ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKajiado ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKajiado + $totalCancerKajiado + $totalCardiovascularKajiado + $totalCongenitalKajiado + $totalEndocrineKajiado + $totalEyeKajiado + $totalGastroKajiado
				  + $totalGenitourinaryKajiado + $totalGynaecologicalKajiado + $totalMusculoskeletalKajiado + $totalNeurologicalKajiado + $totalRespiratoryKajiado + $totalSkinKajiado
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kericho County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKericho ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKericho ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKericho ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKericho ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKericho ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKericho ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKericho ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKericho ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKericho ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKericho ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKericho ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKericho ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKericho ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKericho + $totalCancerKericho + $totalCardiovascularKericho + $totalCongenitalKericho + $totalEndocrineKericho + $totalEyeKericho + $totalGastroKericho
				  + $totalGenitourinaryKericho + $totalGynaecologicalKericho + $totalMusculoskeletalKericho + $totalNeurologicalKericho + $totalRespiratoryKericho + $totalSkinKericho
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Laikipia County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodLaikipia ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerLaikipia ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularLaikipia ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalLaikipia ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineLaikipia ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeLaikipia ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroLaikipia ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryLaikipia ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalLaikipia ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalLaikipia ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalLaikipia ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryLaikipia ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinLaikipia ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodLaikipia + $totalCancerLaikipia + $totalCardiovascularLaikipia + $totalCongenitalLaikipia + $totalEndocrineLaikipia + $totalEyeLaikipia + $totalGastroLaikipia
				  + $totalGenitourinaryLaikipia + $totalGynaecologicalLaikipia + $totalMusculoskeletalLaikipia + $totalNeurologicalLaikipia + $totalRespiratoryLaikipia + $totalSkinLaikipia
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Nakuru County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNakuru ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNakuru ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNakuru ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNakuru ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNakuru ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNakuru ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNakuru ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNakuru ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNakuru ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNakuru ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNakuru ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNakuru ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNakuru ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNakuru + $totalCancerNakuru + $totalCardiovascularNakuru + $totalCongenitalNakuru + $totalEndocrineNakuru + $totalEyeNakuru + $totalGastroNakuru
				  + $totalGenitourinaryNakuru + $totalGynaecologicalNakuru + $totalMusculoskeletalNakuru + $totalNeurologicalNakuru + $totalRespiratoryNakuru + $totalSkinNakuru
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Nandi County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNandi ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNandi ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNandi ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNandi ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNandi ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNandi ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNandi ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNandi ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNandi ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNandi ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNandi ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNandi ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNandi ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNandi + $totalCancerNandi + $totalCardiovascularNandi + $totalCongenitalNandi + $totalEndocrineNandi + $totalEyeNandi + $totalGastroNandi
				  + $totalGenitourinaryNandi + $totalGynaecologicalNandi + $totalMusculoskeletalNandi + $totalNeurologicalNandi + $totalRespiratoryNandi + $totalSkinNandi
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Narok County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodNarok ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerNarok ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularNarok ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalNarok ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineNarok ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeNarok ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroNarok ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryNarok ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalNarok ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalNarok ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalNarok ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryNarok ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinNarok ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodNarok + $totalCancerNarok + $totalCardiovascularNarok + $totalCongenitalNarok + $totalEndocrineNarok + $totalEyeNarok + $totalGastroNarok
				  + $totalGenitourinaryNarok + $totalGynaecologicalNarok + $totalMusculoskeletalNarok + $totalNeurologicalNarok + $totalRespiratoryNarok + $totalSkinNarok
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Samburu County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodSamburu ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerSamburu ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularSamburu ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalSamburu ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineSamburu ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeSamburu ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroSamburu ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinarySamburu ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalSamburu ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalSamburu ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalSamburu ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratorySamburu ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinSamburu ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodSamburu + $totalCancerSamburu + $totalCardiovascularSamburu + $totalCongenitalSamburu + $totalEndocrineSamburu + $totalEyeSamburu + $totalGastroSamburu
				  + $totalGenitourinarySamburu + $totalGynaecologicalSamburu + $totalMusculoskeletalSamburu + $totalNeurologicalSamburu + $totalRespiratorySamburu + $totalSkinSamburu
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Trans Nzoia County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodTrans ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerTrans ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularTrans ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalTrans ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineTrans ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeTrans ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroTrans ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryTrans ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalTrans ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalTrans ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalTrans ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryTrans ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinTrans ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodTrans + $totalCancerTrans + $totalCardiovascularTrans + $totalCongenitalTrans + $totalEndocrineTrans + $totalEyeTrans + $totalGastroTrans
				  + $totalGenitourinaryTrans + $totalGynaecologicalTrans + $totalMusculoskeletalTrans + $totalNeurologicalTrans + $totalRespiratoryTrans + $totalSkinTrans
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Turkana County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodTurkana ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerTurkana ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularTurkana ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalTurkana ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineTurkana ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeTurkana ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroTurkana ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryTurkana ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalTurkana ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalTurkana ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalTurkana ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryTurkana ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinTurkana ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodTurkana + $totalCancerTurkana + $totalCardiovascularTurkana + $totalCongenitalTurkana + $totalEndocrineTurkana + $totalEyeTurkana + $totalGastroTurkana
				  + $totalGenitourinaryTurkana + $totalGynaecologicalTurkana + $totalMusculoskeletalTurkana + $totalNeurologicalTurkana + $totalRespiratoryTurkana + $totalSkinTurkana
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Uasin Gishu County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodUasin ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerUasin ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularUasin ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalUasin ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineUasin ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeUasin ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroUasin ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryUasin ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalUasin ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalUasin ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalUasin ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryUasin ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinUasin ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodUasin + $totalCancerUasin + $totalCardiovascularUasin + $totalCongenitalUasin + $totalEndocrineUasin + $totalEyeUasin + $totalGastroUasin
				  + $totalGenitourinaryUasin + $totalGynaecologicalUasin + $totalMusculoskeletalUasin + $totalNeurologicalUasin + $totalRespiratoryUasin + $totalSkinUasin
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>West Pokot County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodPokot ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerPokot ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularPokot ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalPokot ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrinePokot ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyePokot ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroPokot ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryPokot ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalPokot ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalPokot ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalPokot ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryPokot ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinPokot ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodPokot + $totalCancerPokot + $totalCardiovascularPokot + $totalCongenitalPokot + $totalEndocrinePokot + $totalEyePokot + $totalGastroPokot
				  + $totalGenitourinaryPokot + $totalGynaecologicalPokot + $totalMusculoskeletalPokot + $totalNeurologicalPokot + $totalRespiratoryPokot + $totalSkinPokot
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
<?php } if ($_GET['location'] == 'north'){ ?>
<h3 align = "center">North Eastern Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Garissa County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodGarissa ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerGarissa ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularGarissa ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalGarissa ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineGarissa ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeGarissa ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroGarissa ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryGarissa ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalGarissa ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalGarissa ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalGarissa ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryGarissa ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinGarissa ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodGarissa + $totalCancerGarissa + $totalCardiovascularGarissa + $totalCongenitalGarissa + $totalEndocrineGarissa + $totalEyeGarissa + $totalGastroGarissa
				  + $totalGenitourinaryGarissa + $totalGynaecologicalGarissa + $totalMusculoskeletalGarissa + $totalNeurologicalGarissa + $totalRespiratoryGarissa + $totalSkinGarissa
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Mandera County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMandera ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMandera ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMandera ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMandera ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMandera ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMandera ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMandera ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMandera ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMandera ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMandera ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMandera ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMandera ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMandera ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMandera + $totalCancerMandera + $totalCardiovascularMandera + $totalCongenitalMandera + $totalEndocrineMandera + $totalEyeMandera + $totalGastroMandera
				  + $totalGenitourinaryMandera + $totalGynaecologicalMandera + $totalMusculoskeletalMandera + $totalNeurologicalMandera + $totalRespiratoryMandera + $totalSkinMandera
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Wajir County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodWajir ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerWajir ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularWajir ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalWajir ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineWajir ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeWajir ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroWajir ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryWajir ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalWajir ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalWajir ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalWajir ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryWajir ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinWajir ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodWajir + $totalCancerWajir + $totalCardiovascularWajir + $totalCongenitalWajir + $totalEndocrineWajir + $totalEyeWajir + $totalGastroWajir
				  + $totalGenitourinaryWajir + $totalGynaecologicalWajir + $totalMusculoskeletalWajir + $totalNeurologicalWajir + $totalRespiratoryWajir + $totalSkinWajir
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
<?php }  if ($_GET['location'] == 'coast'){?>
<h3 align = "center">Coastal Region</h3>
<TABLE width=90% class=" table-bordered" align="center">
<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kilifi County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  </tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKilifi ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKilifi ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKilifi ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKilifi ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKilifi ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKilifi ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKilifi ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKilifi ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKilifi ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKilifi ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKilifi ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKilifi ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKilifi ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKilifi + $totalCancerKilifi + $totalCardiovascularKilifi + $totalCongenitalKilifi + $totalEndocrineKilifi + $totalEyeKilifi + $totalGastroKilifi
				  + $totalGenitourinaryKilifi + $totalGynaecologicalKilifi + $totalMusculoskeletalKilifi + $totalNeurologicalKilifi + $totalRespiratoryKilifi + $totalSkinKilifi
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Kwale County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodKwale ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerKwale ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularKwale ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalKwale ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineKwale ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeKwale ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroKwale ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryKwale ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalKwale ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalKwale ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalKwale ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryKwale ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinKwale ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodKwale + $totalCancerKwale + $totalCardiovascularKwale + $totalCongenitalKwale + $totalEndocrineKwale + $totalEyeKwale + $totalGastroKwale
				  + $totalGenitourinaryKwale + $totalGynaecologicalKwale + $totalMusculoskeletalKwale + $totalNeurologicalKwale + $totalRespiratoryKwale + $totalSkinKwale
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Lamu County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodLamu ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerLamu ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularLamu ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalLamu ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineLamu ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeLamu ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroLamu ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryLamu ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalLamu ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalLamu ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalLamu ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryLamu ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinLamu ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodLamu + $totalCancerLamu + $totalCardiovascularLamu + $totalCongenitalLamu + $totalEndocrineLamu + $totalEyeLamu + $totalGastroLamu
				  + $totalGenitourinaryLamu + $totalGynaecologicalLamu + $totalMusculoskeletalLamu + $totalNeurologicalLamu + $totalRespiratoryLamu + $totalSkinLamu
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Mombasa County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodMombasa ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerMombasa ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularMombasa ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalMombasa ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineMombasa ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeMombasa ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroMombasa ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryMombasa ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalMombasa ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalMombasa ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalMombasa ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryMombasa ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinMombasa ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodMombasa + $totalCancerMombasa + $totalCardiovascularMombasa + $totalCongenitalMombasa + $totalEndocrineMombasa + $totalEyeMombasa + $totalGastroMombasa
				  + $totalGenitourinaryMombasa + $totalGynaecologicalMombasa + $totalMusculoskeletalMombasa + $totalNeurologicalMombasa + $totalRespiratoryMombasa + $totalSkinMombasa
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Taita/Taveta County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodTaita ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerTaita ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularTaita ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalTaita ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineTaita ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeTaita ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroTaita ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryTaita ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalTaita ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalTaita ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalTaita ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryTaita ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinTaita ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodTaita + $totalCancerTaita + $totalCardiovascularTaita + $totalCongenitalTaita + $totalEndocrineTaita + $totalEyeTaita + $totalGastroTaita
				  + $totalGenitourinaryTaita + $totalGynaecologicalTaita + $totalMusculoskeletalTaita + $totalNeurologicalTaita + $totalRespiratoryTaita + $totalSkinTaita
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
					<TABLE width=90% class=" table-bordered" align="center">
					<thead>
					<tr>
					 <th colspan=2 bgcolor="#d3fcf3"><b>Tana River County</b></th></tr>
					 <tr>
                      <th>Illness</th>
                      <th>No. of affected persons</th>
                    </tr>
                  </thead>
				  
				  <tbody>
				  <tr><td>Blood and connective tissue disorder</td><td><?php echo $totalBloodTana ?></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><?php echo $totalCancerTana ?></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><?php echo $totalCardiovascularTana ?></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><?php echo $totalCongenitalTana ?></td></tr>
				  <tr><td>Endocrine disorders</td><td><?php echo $totalEndocrineTana ?></td></tr>
				  <tr><td>Eye related disorders</td><td><?php echo $totalEyeTana ?></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><?php echo $totalGastroTana ?></td></tr>
				  <tr><td>Genitourinary disorders</td><td><?php echo $totalGenitourinaryTana ?></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><?php echo $totalGynaecologicalTana ?></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><?php echo $totalMusculoskeletalTana ?></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><?php echo $totalNeurologicalTana ?></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><?php echo $totalRespiratoryTana ?></td></tr>
				  <tr><td>Skin disorders</td><td><?php echo $totalSkinTana ?></td></tr>
				  <tr><td><h3><b>Total</b></h3></td><td><h3><b><?php 
				  echo $totalBloodTana + $totalCancerTana + $totalCardiovascularTana + $totalCongenitalTana + $totalEndocrineTana + $totalEyeTana + $totalGastroTana
				  + $totalGenitourinaryTana + $totalGynaecologicalTana + $totalMusculoskeletalTana + $totalNeurologicalTana + $totalRespiratoryTana + $totalSkinTana
				  ?></b></h3></td></b></tr>
					
					
					</tbody></table>
<?php }  ?>
<hr>
<h4>Index</h4>
<font size="1">
<TABLE width=100%  class=" table-bordered" align="center">
		
				  <tr><td colspan=2><b>The following ailments include, but not limited to, the specified conditions listed below:</b></td></tr>
				  <tr><td width=20%>Blood and connective tissue disorder</td><td><i>Leukemia, HIV and AIDS, Systemic lupus erythematosus (SLE) and any other.<i></td></tr>
				  <tr><td>Cancer, growths or tumors</td><td><i>Any type, whether benign or malignant.</i></td></tr>
				  <tr><td>Cardiovascular (heart and blood vessels) disorders</td><td><i>High blood pressure, heart disease, deep venous thrombosis (DVT), congenital heart disease,
											chest pain, coronery artery disease/ ischaemic heart disease, valvular heart disease, arrhythmias, varicose veins, coronary artery stenting, peripheral artery
											disease, aneurysm, palpitations, rheumatic fever and any other.</i></td></tr>
				  <tr><td>Congenital/inherited/hereditary disorders</td><td><i>Any form of birth defects, sickle cell disease, umbilical hernia and any other.</i></td></tr>
				  <tr><td>Endocrine disorders</td><td><i>High cholestrol, diabetes, thyroid abnormalities, obesity, hormonal imbalances, diabetic coma and any other.</i></td></tr>
				  <tr><td>Eye related disorders</td><td><i>Glaucoma, blindness, cataracts, renitis pigmentosa, lens implants, laser eye surgery, retinoblastoma and any other.</i></td></tr>
				  <tr><td>Gastro-intestinal disorders</td><td><i>Peptic ulcer disease, chronic heartburn, reflux, dyspepsia, haemorrhoids,pancreatis, gall bladder disease, hepatitis, hernias, anal 
											fissures, rectal bleeding and any other.</i></td></tr>
				  <tr><td>Genitourinary disorders</td><td><i>Enlarged postrate, kidney failure, on dialysis, kidney stones, bladder disorders, pyelonephritis, syphilis, gonorrhea, chlamydia 
											genital herpes and any other.</i></td></tr>
				  <tr><td>Gynaecological and Obstetric disorders</td><td><i>Caesarian section complications, fibroids, ovarian cysts, infertility, pelvic inflammatory disease, menstrual 
											irregularities, abnormal pap smear, hormonal treatment, miscarriages, endometriosis and any other.</i></td></tr>
				  <tr><td>Musculoskeletal disorders</td><td><i>Arthritis, gout, back problems, physical disabilities, joint problems, sporting injuries, osteoporosis, scoliosis, kyphosis 
											and any other.</i></td></tr>
				  <tr><td>Neurological and psychological disorders</td><td><i>Epilepsy, mental disabilities, paralysis, schizophrenia, depression, bipolar disorder, panic attack, personality
											disorder, anxiety, attention deficit disorder, post traumatic stress disorder, anorexia nervosa, bulimia, alcohol or drug dependency/ addiction and any other.</i></td></tr>
				  <tr><td>Respiratory and Ear Nose and Throat (ENT) disorders</td><td><i>Asthma, tuberculosis, hearing and speech imapirment, adenoids, cleft lip and palate, tonsils, nose 
											injuries, nose bleeding, sinus, cigarette smoking bronchitis, allergic rhinitis, chronic obstructive pulmonary disease and any other.</i></td></tr>
				  <tr><td>Skin disorders</td><td><i>Eczema keloids, warts, acne, moles, melanoma, hypertrophic scars, burns and any other.</i></td></tr>
</table>
</font>



<?php }  ?>

</div>
<script>
 window.addEventListener("load", window.print());
</script>
<?php endif ?>
</body>
</html>