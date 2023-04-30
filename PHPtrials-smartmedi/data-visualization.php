<?php
//Report Data
$hospitalReportRes = mysqli_query($db, "SELECT * FROM `hospitalreg` WHERE status = 1 and approval='approved'");

$doctorReportRes = mysqli_query($db, "SELECT * FROM `doctors` ORDER BY hospital");

$conditionNairobiQuery = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City' ");
$conditionNairobi = mysqli_num_rows($conditionNairobiQuery);
//Pagination
// number of results per page
	$results_per_page = 10; 

	if (!isset($_GET['page'])) {
	  $page = 1;
	} else {
	  $page = $_GET['page'];
	}
	// Calculate the starting row
	$start_row = ($page-1) * $results_per_page;
	
	$query="select * from patients";
	$total_Patients=mysqli_query($db, $query);
	$total_number_patients=mysqli_num_rows($total_Patients);
	
	//patient pagination query
		$patientsquery="SELECT * FROM patients LIMIT $start_row, $results_per_page";
		$AllPatientsRes = mysqli_query($db, $patientsquery);
		$totalPatients = mysqli_num_rows($AllPatientsRes);
		
		// Calculate the total number of rows
		$total_rows_query = "SELECT COUNT(*) as total FROM patients";
		$total_rows_result = mysqli_query($db, $total_rows_query);
		$total_rows = mysqli_fetch_assoc($total_rows_result)['total'];

		// Calculate the total number of pages
		$total_pages = ceil($total_rows / $results_per_page);
		
	//minors pagination query
		$minorsquery="SELECT dependants.FirstName_dep, dependants.LastName_dep, patients.IDNo, patients.FirstName, patients.LastName, patients.TelNo  
		FROM dependants, patients where dependants.IDNo=patients.IDNo LIMIT $start_row, $results_per_page";
		$minorsRes = mysqli_query($db, $minorsquery);
		$totalminors = mysqli_num_rows($minorsRes);
		
		// Calculate the total number of rows
		$total_minors_rows_query = "SELECT COUNT(*) as total FROM dependants";
		$total_minors_rows_result = mysqli_query($db, $total_minors_rows_query);
		$total_minors_rows = mysqli_fetch_assoc($total_minors_rows_result)['total'];

		// Calculate the total number of pages
		$total_minors_pages = ceil($total_minors_rows / $results_per_page);
		
	//doctors
		$doctorsQuery =  "SELECT * FROM `doctors` LIMIT $start_row, $results_per_page";
		$doctorsRes = mysqli_query($db, $doctorsQuery);
		$totalDoctors = mysqli_num_rows($doctorsRes);
		
		// Calculate the total number of rows
		$total_doc_rows_query = "SELECT COUNT(*) as total FROM doctors";
		$total_doc_rows_result = mysqli_query($db, $total_doc_rows_query);
		$total_doc_rows = mysqli_fetch_assoc($total_doc_rows_result)['total'];

		// Calculate the total number of pages
		$total_doc_pages = ceil($total_doc_rows / $results_per_page);
		
	//Hospitals
		$hospitalQuery =  "SELECT * FROM `hospitalreg` WHERE status = 1 and approval='approved' LIMIT $start_row, $results_per_page";
		$hospitalRes = mysqli_query($db, $hospitalQuery);
		$totalHospitals = mysqli_num_rows($hospitalRes);
		
		// Calculate the total number of rows
		/* $total_hosp_rows_query = "SELECT COUNT(*) as total FROM hospitalreg";
		$total_hosp_rows_result = mysqli_query($db, $total_hosp_rows_query);
		$total_hosp_rows = mysqli_fetch_assoc($total_hosp_rows_result)['total']; */

		// Calculate the total number of pages
		$total_hosp_pages = ceil($totalHospitals / $results_per_page);
	
//Total users
   $AllDataRes0 = mysqli_query($db, "select * from patients");
   $totalPatientsUsers = mysqli_num_rows($AllDataRes0);
   
   $AllDataRes1 = mysqli_query($db, "select * from doctors");
   $totalDoctorsUsers = mysqli_num_rows($AllDataRes1);
   
   $AllDataRes2 = mysqli_query($db, "select * from hospitalreg where status =1 and approval='approved'");
   $totalHospitalsUsers = mysqli_num_rows($AllDataRes2);

//Patient vs gender pie chart
   $AllDataRes3 = mysqli_query($db, "select * from patients where gender = 'Female'");
   $totalFemales = mysqli_num_rows($AllDataRes3);
   
   $AllDataRes4 = mysqli_query($db, "select * from patients where gender = 'Male'");
   $totalMales = mysqli_num_rows($AllDataRes4);
   
   //Patients per county pie chart
   $nairobi_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county='Nairobi City'");
   $total_nairobi_patient = mysqli_num_rows($nairobi_patient_query);
   
   $central_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')");
   $total_central_patient = mysqli_num_rows($central_patient_query);
   
   $eastern_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')");
   $total_eastern_patient = mysqli_num_rows($eastern_patient_query);
   
   $western_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')");
   $total_western_patient = mysqli_num_rows($western_patient_query);
   
   $nyanza_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')");
   $total_nyanza_patient = mysqli_num_rows($nyanza_patient_query);
   
   $rift_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')");
   $total_rift_patient = mysqli_num_rows($rift_patient_query);
   
   $northern_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Garissa', 'Wajir', 'Mandera')");
   $total_northern_patient = mysqli_num_rows($northern_patient_query);
   
   $coast_patient_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')");
   $total_coast_patient = mysqli_num_rows($coast_patient_query);
   
   //Patients per county per gender pie chart
	   //Male
	   $nairobi_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county ='Nairobi City' AND gender='Male'");
	   $total_nairobi_patientM = mysqli_num_rows($nairobi_patientM_query);
	   
	   $central_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND gender='Male'");
	   $total_central_patientM = mysqli_num_rows($central_patientM_query);
	   
	   $eastern_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND gender='Male'");
	   $total_eastern_patientM = mysqli_num_rows($eastern_patientM_query);
	   
	   $western_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND gender='Male'");
	   $total_western_patientM = mysqli_num_rows($western_patientM_query);
	   
	   $nyanza_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND gender='Male'");
	   $total_nyanza_patientM = mysqli_num_rows($nyanza_patientM_query);
	   
	   $rift_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND gender='Male'");
	   $total_rift_patientM = mysqli_num_rows($rift_patientM_query);
	   
	   $northern_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Garissa', 'Wajir', 'Mandera') AND gender='Male'");
	   $total_northern_patientM = mysqli_num_rows($northern_patientM_query);
	   
	   $coast_patientM_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND gender='Male'");
	   $total_coast_patientM = mysqli_num_rows($coast_patientM_query);
	   
	   //Female
	   $nairobi_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nairobi City') AND gender='Female'");
	   $total_nairobi_patientF = mysqli_num_rows($nairobi_patientF_query);
	   
	   $central_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND gender='Female'");
	   $total_central_patientF = mysqli_num_rows($central_patientF_query);
	   
	   $eastern_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND gender='Female'");
	   $total_eastern_patientF = mysqli_num_rows($eastern_patientF_query);
	   
	   $western_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND gender='Female'");
	   $total_western_patientF = mysqli_num_rows($western_patientF_query);
	   
	   $nyanza_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND gender='Female'");
	   $total_nyanza_patientF = mysqli_num_rows($nyanza_patientF_query);
	   
	   $rift_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND gender='Female'");
	   $total_rift_patientF = mysqli_num_rows($rift_patientF_query);
	   
	   $northern_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Garissa', 'Wajir', 'Mandera') AND gender='Female'");
	   $total_northern_patientF = mysqli_num_rows($northern_patientF_query);
	   
	   $coast_patientF_query = mysqli_query($db, "SELECT * FROM patients WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND gender='Female'");
	   $total_coast_patientF = mysqli_num_rows($coast_patientF_query);
   
    
   
   //No. of patients per illness Bar graph
	//Nairobi
	$AllDataRes1Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City' AND response.conditions LIKE '%Cancer%'");
   $totalCancerNrb = mysqli_num_rows($AllDataRes1Nrb);
   
   $AllDataRes2Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularNrb = mysqli_num_rows($AllDataRes2Nrb);
   
   $AllDataRes3Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City' AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryNrb = mysqli_num_rows($AllDataRes3Nrb);
   
   $AllDataRes4Nrb= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineNrb = mysqli_num_rows($AllDataRes4Nrb);
   
   $AllDataRes5Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Eye%'");
   $totalEyeNrb = mysqli_num_rows($AllDataRes5Nrb);
   
   $AllDataRes6Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroNrb = mysqli_num_rows($AllDataRes6Nrb);
   
   $AllDataRes7Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalNrb = mysqli_num_rows($AllDataRes7Nrb);
   
   $AllDataRes8Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryNrb = mysqli_num_rows($AllDataRes8Nrb);
   
   $AllDataRes9Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalNrb = mysqli_num_rows($AllDataRes9Nrb);
   
   $AllDataRes10Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalNrb = mysqli_num_rows($AllDataRes10Nrb);
   
   $AllDataRes11Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%connective%'");
   $totalBloodNrb = mysqli_num_rows($AllDataRes11Nrb);
   
   $AllDataRes12Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City'  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalNrb = mysqli_num_rows($AllDataRes12Nrb);
   
   $AllDataRes13Nrb = mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nairobi City' AND response.conditions LIKE '%Skin%'");
   $totalSkinNrb = mysqli_num_rows($AllDataRes13Nrb);
   
   //No. of patients per illness Bar graph
	//Central
	$AllDataRes1Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND response.conditions LIKE '%Cancer%'");
   $totalCancerCen= mysqli_num_rows($AllDataRes1Cen);
   
   $AllDataRes2Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularCen= mysqli_num_rows($AllDataRes2Cen);
   
   $AllDataRes3Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryCen= mysqli_num_rows($AllDataRes3Cen);
   
   $AllDataRes4Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineCen= mysqli_num_rows($AllDataRes4Cen);
   
   $AllDataRes5Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Eye%'");
   $totalEyeCen= mysqli_num_rows($AllDataRes5Cen);
   
   $AllDataRes6Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroCen= mysqli_num_rows($AllDataRes6Cen);
   
   $AllDataRes7Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalCen= mysqli_num_rows($AllDataRes7Cen);
   
   $AllDataRes8Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryCen= mysqli_num_rows($AllDataRes8Cen);
   
   $AllDataRes9Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalCen= mysqli_num_rows($AllDataRes9Cen);
   
   $AllDataRes10Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalCen= mysqli_num_rows($AllDataRes10Cen);
   
   $AllDataRes11Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%connective%'");
   $totalBloodCen= mysqli_num_rows($AllDataRes11Cen);
   
   $AllDataRes12Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalCen= mysqli_num_rows($AllDataRes12Cen);
   
   $AllDataRes13Cen= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu') AND response.conditions LIKE '%Skin%'");
   $totalSkinCen= mysqli_num_rows($AllDataRes13Cen);
   
   //No. of patients per illness Bar graph
	//Eastern
	$AllDataRes1East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND response.conditions LIKE '%Cancer%'");
   $totalCancerEast= mysqli_num_rows($AllDataRes1East);
   
   $AllDataRes2East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularEast= mysqli_num_rows($AllDataRes2East);
   
   $AllDataRes3East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryEast= mysqli_num_rows($AllDataRes3East);
   
   $AllDataRes4East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineEast= mysqli_num_rows($AllDataRes4East);
   
   $AllDataRes5East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Eye%'");
   $totalEyeEast= mysqli_num_rows($AllDataRes5East);
   
   $AllDataRes6East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroEast= mysqli_num_rows($AllDataRes6East);
   
   $AllDataRes7East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalEast= mysqli_num_rows($AllDataRes7East);
   
   $AllDataRes8East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryEast= mysqli_num_rows($AllDataRes8East);
   
   $AllDataRes9East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalEast= mysqli_num_rows($AllDataRes9East);
   
   $AllDataRes10East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalEast= mysqli_num_rows($AllDataRes10East);
   
   $AllDataRes11East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%connective%'");
   $totalBloodEast= mysqli_num_rows($AllDataRes11East);
   
   $AllDataRes12East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalEast= mysqli_num_rows($AllDataRes12East);
   
   $AllDataRes13East= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni') AND response.conditions LIKE '%Skin%'");
   $totalSkinEast= mysqli_num_rows($AllDataRes13East);
   
   //No. of patients per illness Bar graph
	//Western
	$AllDataRes1West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND response.conditions LIKE '%Cancer%'");
   $totalCancerWest= mysqli_num_rows($AllDataRes1West);
   
   $AllDataRes2West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularWest= mysqli_num_rows($AllDataRes2West);
   
   $AllDataRes3West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryWest= mysqli_num_rows($AllDataRes3West);
   
   $AllDataRes4West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineWest= mysqli_num_rows($AllDataRes4West);
   
   $AllDataRes5West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Eye%'");
   $totalEyeWest= mysqli_num_rows($AllDataRes5West);
   
   $AllDataRes6West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroWest= mysqli_num_rows($AllDataRes6West);
   
   $AllDataRes7West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalWest= mysqli_num_rows($AllDataRes7West);
   
   $AllDataRes8West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryWest= mysqli_num_rows($AllDataRes8West);
   
   $AllDataRes9West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalWest= mysqli_num_rows($AllDataRes9West);
   
   $AllDataRes10West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalWest= mysqli_num_rows($AllDataRes10West);
   
   $AllDataRes11West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%connective%'");
   $totalBloodWest= mysqli_num_rows($AllDataRes11West);
   
   $AllDataRes12West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalWest= mysqli_num_rows($AllDataRes12West);
   
   $AllDataRes13West= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma') AND response.conditions LIKE '%Skin%'");
   $totalSkinWest= mysqli_num_rows($AllDataRes13West);
   
   //No. of patients per illness Bar graph
	//Nyanza
	$AllDataRes1Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND response.conditions LIKE '%Cancer%'");
   $totalCancerNy= mysqli_num_rows($AllDataRes1Ny);
   
   $AllDataRes2Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularNy= mysqli_num_rows($AllDataRes2Ny);
   
   $AllDataRes3Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryNy= mysqli_num_rows($AllDataRes3Ny);
   
   $AllDataRes4Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineNy= mysqli_num_rows($AllDataRes4Ny);
   
   $AllDataRes5Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Eye%'");
   $totalEyeNy= mysqli_num_rows($AllDataRes5Ny);
   
   $AllDataRes6Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroNy= mysqli_num_rows($AllDataRes6Ny);
   
   $AllDataRes7Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalNy= mysqli_num_rows($AllDataRes7Ny);
   
   $AllDataRes8Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryNy= mysqli_num_rows($AllDataRes8Ny);
   
   $AllDataRes9Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalNy= mysqli_num_rows($AllDataRes9Ny);
   
   $AllDataRes10Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalNy= mysqli_num_rows($AllDataRes10Ny);
   
   $AllDataRes11Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%connective%'");
   $totalBloodNy= mysqli_num_rows($AllDataRes11Ny);
   
   $AllDataRes12Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalNy= mysqli_num_rows($AllDataRes12Ny);
   
   $AllDataRes13Ny= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii') AND response.conditions LIKE '%Skin%'");
   $totalSkinNy= mysqli_num_rows($AllDataRes13Ny);
   
   //No. of patients per illness Bar graph
	//Rift
	$AllDataRes1Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND response.conditions LIKE '%Cancer%'");
   $totalCancerRift= mysqli_num_rows($AllDataRes1Rift);
   
   $AllDataRes2Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularRift= mysqli_num_rows($AllDataRes2Rift);
   
   $AllDataRes3Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryRift= mysqli_num_rows($AllDataRes3Rift);
   
   $AllDataRes4Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineRift= mysqli_num_rows($AllDataRes4Rift);
   
   $AllDataRes5Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Eye%'");
   $totalEyeRift= mysqli_num_rows($AllDataRes5Rift);
   
   $AllDataRes6Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroRift= mysqli_num_rows($AllDataRes6Rift);
   
   $AllDataRes7Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalRift= mysqli_num_rows($AllDataRes7Rift);
   
   $AllDataRes8Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryRift= mysqli_num_rows($AllDataRes8Rift);
   
   $AllDataRes9Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalRift= mysqli_num_rows($AllDataRes9Rift);
   
   $AllDataRes10Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalRift= mysqli_num_rows($AllDataRes10Rift);
   
   $AllDataRes11Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%connective%'");
   $totalBloodRift= mysqli_num_rows($AllDataRes11Rift);
   
   $AllDataRes12Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalRift= mysqli_num_rows($AllDataRes12Rift);
   
   $AllDataRes13Rift= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
	   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet') AND response.conditions LIKE '%Skin%'");
   $totalSkinRift= mysqli_num_rows($AllDataRes13Rift);
   
   //No. of patients per illness Bar graph
	//North
	$AllDataRes1North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera') AND response.conditions LIKE '%Cancer%'");
   $totalCancerNorth= mysqli_num_rows($AllDataRes1North);
   
   $AllDataRes2North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularNorth= mysqli_num_rows($AllDataRes2North);
   
   $AllDataRes3North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryNorth= mysqli_num_rows($AllDataRes3North);
   
   $AllDataRes4North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineNorth= mysqli_num_rows($AllDataRes4North);
   
   $AllDataRes5North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Eye%'");
   $totalEyeNorth= mysqli_num_rows($AllDataRes5North);
   
   $AllDataRes6North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroNorth= mysqli_num_rows($AllDataRes6North);
   
   $AllDataRes7North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalNorth= mysqli_num_rows($AllDataRes7North);
   
   $AllDataRes8North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryNorth= mysqli_num_rows($AllDataRes8North);
   
   $AllDataRes9North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalNorth= mysqli_num_rows($AllDataRes9North);
   
   $AllDataRes10North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalNorth= mysqli_num_rows($AllDataRes10North);
   
   $AllDataRes11North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%connective%'");
   $totalBloodNorth= mysqli_num_rows($AllDataRes11North);
   
   $AllDataRes12North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalNorth= mysqli_num_rows($AllDataRes12North);
   
   $AllDataRes13North= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Garissa', 'Wajir', 'Mandera') AND response.conditions LIKE '%Skin%'");
   $totalSkinNorth= mysqli_num_rows($AllDataRes13North);
   
   //No. of patients per illness Bar graph
	//Coast
	$AllDataRes1Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND response.conditions LIKE '%Cancer%'");
   $totalCancerCoast= mysqli_num_rows($AllDataRes1Coast);
   
   $AllDataRes2Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Cardiovascular%'");
   $totalCardiovascularCoast= mysqli_num_rows($AllDataRes2Coast);
   
   $AllDataRes3Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND response.conditions LIKE '%Respiratory%'");
   $totalRespiratoryCoast= mysqli_num_rows($AllDataRes3Coast);
   
   $AllDataRes4Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Endocrine%'");
   $totalEndocrineCoast= mysqli_num_rows($AllDataRes4Coast);
   
   $AllDataRes5Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Eye%'");
   $totalEyeCoast= mysqli_num_rows($AllDataRes5Coast);
   
   $AllDataRes6Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Gastro-intestinal%'");
   $totalGastroCoast= mysqli_num_rows($AllDataRes6Coast);
   
   $AllDataRes7Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Gynaecological%'");
   $totalGynaecologicalCoast= mysqli_num_rows($AllDataRes7Coast);
   
   $AllDataRes8Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Genitourinary%'");
   $totalGenitourinaryCoast= mysqli_num_rows($AllDataRes8Coast);
   
   $AllDataRes9Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Musculoskeletal%'");
   $totalMusculoskeletalCoast= mysqli_num_rows($AllDataRes9Coast);
   
   $AllDataRes10Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Neurological%'");
   $totalNeurologicalCoast= mysqli_num_rows($AllDataRes10Coast);
   
   $AllDataRes11Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%connective%'");
   $totalBloodCoast= mysqli_num_rows($AllDataRes11Coast);
   
   $AllDataRes12Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')  AND response.conditions LIKE '%Congenital%'");
   $totalCongenitalCoast= mysqli_num_rows($AllDataRes12Coast);
   
   $AllDataRes13Coast= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta') AND response.conditions LIKE '%Skin%'");
   $totalSkinCoast= mysqli_num_rows($AllDataRes13Coast);
   
    //Total No. of patients per illness Bar graph
	$AllDataRes1 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Cancer%'");
   $totalCancer = mysqli_num_rows($AllDataRes1);
   
   $AllDataRes2 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Cardiovascular%'");
   $totalCardiovascular = mysqli_num_rows($AllDataRes2);
   
   $AllDataRes3 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Respiratory%'");
   $totalRespiratory = mysqli_num_rows($AllDataRes3);
   
   $AllDataRes4 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Endocrine%'");
   $totalEndocrine = mysqli_num_rows($AllDataRes4);
   
   $AllDataRes5 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Eye%'");
   $totalEye = mysqli_num_rows($AllDataRes5);
   
   $AllDataRes6 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Gastro-intestinal%'");
   $totalGastro = mysqli_num_rows($AllDataRes6);
   
   $AllDataRes7 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Gynaecological%'");
   $totalGynaecological = mysqli_num_rows($AllDataRes7);
   
   $AllDataRes8 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Genitourinary%'");
   $totalGenitourinary = mysqli_num_rows($AllDataRes8);
   
   $AllDataRes9 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Musculoskeletal%'");
   $totalMusculoskeletal = mysqli_num_rows($AllDataRes9);
   
   $AllDataRes10 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Neurological%'");
   $totalNeurological = mysqli_num_rows($AllDataRes10);
   
   $AllDataRes11 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%connective%'");
   $totalBlood = mysqli_num_rows($AllDataRes11);
   
   $AllDataRes12 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Congenital%'");
   $totalCongenital = mysqli_num_rows($AllDataRes12);
   
   $AllDataRes13 = mysqli_query($db, "SELECT * FROM `response` WHERE `conditions` LIKE '%Skin%'");
   $totalSkin = mysqli_num_rows($AllDataRes13);
   
   
   
   //Illness concentration per county
   //A. Central Region
   //1. Kiambu
		   $AllDataRes1Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKiambu= mysqli_num_rows($AllDataRes1Kiambu);
		   
		   $AllDataRes2Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKiambu= mysqli_num_rows($AllDataRes2Kiambu);
		   
		   $AllDataRes3Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKiambu= mysqli_num_rows($AllDataRes3Kiambu);
		   
		   $AllDataRes4Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKiambu= mysqli_num_rows($AllDataRes4Kiambu);
		   
		   $AllDataRes5Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKiambu= mysqli_num_rows($AllDataRes5Kiambu);
		   
		   $AllDataRes6Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKiambu= mysqli_num_rows($AllDataRes6Kiambu);
		   
		   $AllDataRes7Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKiambu= mysqli_num_rows($AllDataRes7Kiambu);
		   
		   $AllDataRes8Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKiambu= mysqli_num_rows($AllDataRes8Kiambu);
		   
		   $AllDataRes9Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKiambu= mysqli_num_rows($AllDataRes9Kiambu);
		   
		   $AllDataRes10Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKiambu= mysqli_num_rows($AllDataRes10Kiambu);
		   
		   $AllDataRes11Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%connective%'");
		   $totalBloodKiambu= mysqli_num_rows($AllDataRes11Kiambu);
		   
		   $AllDataRes12Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKiambu= mysqli_num_rows($AllDataRes12Kiambu);
		   
		   $AllDataRes13Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKiambu= mysqli_num_rows($AllDataRes13Kiambu);
		   
		   
	//2. Kirinyaga
		   $AllDataRes1Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKiri= mysqli_num_rows($AllDataRes1Kiri);
		   
		   $AllDataRes2Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKiri= mysqli_num_rows($AllDataRes2Kiri);
		   
		   $AllDataRes3Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga'AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKiri= mysqli_num_rows($AllDataRes3Kiri);
		   
		   $AllDataRes4Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKiri= mysqli_num_rows($AllDataRes4Kiri);
		   
		   $AllDataRes5Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKiri= mysqli_num_rows($AllDataRes5Kiri);
		   
		   $AllDataRes6Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKiri= mysqli_num_rows($AllDataRes6Kiri);
		   
		   $AllDataRes7Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKiri= mysqli_num_rows($AllDataRes7Kiri);
		   
		   $AllDataRes8Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKiri= mysqli_num_rows($AllDataRes8Kiri);
		   
		   $AllDataRes9Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKiri= mysqli_num_rows($AllDataRes9Kiri);
		   
		   $AllDataRes10Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKiri= mysqli_num_rows($AllDataRes10Kiri);
		   
		   $AllDataRes11Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%connective%'");
		   $totalBloodKiri= mysqli_num_rows($AllDataRes11Kiri);
		   
		   $AllDataRes12Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKiri= mysqli_num_rows($AllDataRes12Kiri);
		   
		   $AllDataRes13Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKiri= mysqli_num_rows($AllDataRes13Kiri);
		   
		   
	//3. Murang'a
		   $AllDataRes1Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMuranga= mysqli_num_rows($AllDataRes1Muranga);
		   
		   $AllDataRes2Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMuranga= mysqli_num_rows($AllDataRes2Muranga);
		   
		   $AllDataRes3Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a'AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMuranga= mysqli_num_rows($AllDataRes3Muranga);
		   
		   $AllDataRes4Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMuranga= mysqli_num_rows($AllDataRes4Muranga);
		   
		   $AllDataRes5Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMuranga= mysqli_num_rows($AllDataRes5Muranga);
		   
		   $AllDataRes6Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMuranga= mysqli_num_rows($AllDataRes6Muranga);
		   
		   $AllDataRes7Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMuranga= mysqli_num_rows($AllDataRes7Muranga);
		   
		   $AllDataRes8Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMuranga= mysqli_num_rows($AllDataRes8Muranga);
		   
		   $AllDataRes9Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMuranga= mysqli_num_rows($AllDataRes9Muranga);
		   
		   $AllDataRes10Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMuranga= mysqli_num_rows($AllDataRes10Muranga);
		   
		   $AllDataRes11Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Blood%'");
		   $totalBloodMuranga= mysqli_num_rows($AllDataRes11Muranga);
		   
		   $AllDataRes12Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMuranga= mysqli_num_rows($AllDataRes12Muranga);
		   
		   $AllDataRes13Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMuranga= mysqli_num_rows($AllDataRes13Muranga);
		   
		   
	//4. Nyandarua
		   $AllDataRes1Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerNyan= mysqli_num_rows($AllDataRes1Nyan);
		   
		   $AllDataRes2Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularNyan= mysqli_num_rows($AllDataRes2Nyan);
		   
		   $AllDataRes3Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua'AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryNyan= mysqli_num_rows($AllDataRes3Nyan);
		   
		   $AllDataRes4Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineNyan= mysqli_num_rows($AllDataRes4Nyan);
		   
		   $AllDataRes5Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Eye%'");
		   $totalEyeNyan= mysqli_num_rows($AllDataRes5Nyan);
		   
		   $AllDataRes6Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroNyan= mysqli_num_rows($AllDataRes6Nyan);
		   
		   $AllDataRes7Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalNyan= mysqli_num_rows($AllDataRes7Nyan);
		   
		   $AllDataRes8Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryNyan= mysqli_num_rows($AllDataRes8Nyan);
		   
		   $AllDataRes9Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalNyan= mysqli_num_rows($AllDataRes9Nyan);
		   
		   $AllDataRes10Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalNyan= mysqli_num_rows($AllDataRes10Nyan);
		   
		   $AllDataRes11Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Blood%'");
		   $totalBloodNyan= mysqli_num_rows($AllDataRes11Nyan);
		   
		   $AllDataRes12Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalNyan= mysqli_num_rows($AllDataRes12Nyan);
		   
		   $AllDataRes13Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua' AND response.conditions LIKE '%Skin%'");
		   $totalSkinNyan= mysqli_num_rows($AllDataRes13Nyan);
		   
		   
	//5. Nyeri
		   $AllDataRes1Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerNyeri= mysqli_num_rows($AllDataRes1Nyeri);
		   
		   $AllDataRes2Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularNyeri= mysqli_num_rows($AllDataRes2Nyeri);
		   
		   $AllDataRes3Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri'AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryNyeri= mysqli_num_rows($AllDataRes3Nyeri);
		   
		   $AllDataRes4Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineNyeri= mysqli_num_rows($AllDataRes4Nyeri);
		   
		   $AllDataRes5Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Eye%'");
		   $totalEyeNyeri= mysqli_num_rows($AllDataRes5Nyeri);
		   
		   $AllDataRes6Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroNyeri= mysqli_num_rows($AllDataRes6Nyeri);
		   
		   $AllDataRes7Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalNyeri= mysqli_num_rows($AllDataRes7Nyeri);
		   
		   $AllDataRes8Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryNyeri= mysqli_num_rows($AllDataRes8Nyeri);
		   
		   $AllDataRes9Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalNyeri= mysqli_num_rows($AllDataRes9Nyeri);
		   
		   $AllDataRes10Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalNyeri= mysqli_num_rows($AllDataRes10Nyeri);
		   
		   $AllDataRes11Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%connective%'");
		   $totalBloodNyeri= mysqli_num_rows($AllDataRes11Nyeri);
		   
		   $AllDataRes12Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalNyeri= mysqli_num_rows($AllDataRes12Nyeri);
		   
		   $AllDataRes13Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri' AND response.conditions LIKE '%Skin%'");
		   $totalSkinNyeri= mysqli_num_rows($AllDataRes13Nyeri);
		   
		   
		   
   //B. Eastern Region
   //1. Embu
		   $AllDataRes1Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerEmbu= mysqli_num_rows($AllDataRes1Embu);
		   
		   $AllDataRes2Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularEmbu= mysqli_num_rows($AllDataRes2Embu);
		   
		   $AllDataRes3Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryEmbu= mysqli_num_rows($AllDataRes3Embu);
		   
		   $AllDataRes4Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineEmbu= mysqli_num_rows($AllDataRes4Embu);
		   
		   $AllDataRes5Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Eye%'");
		   $totalEyeEmbu= mysqli_num_rows($AllDataRes5Embu);
		   
		   $AllDataRes6Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroEmbu= mysqli_num_rows($AllDataRes6Embu);
		   
		   $AllDataRes7Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalEmbu= mysqli_num_rows($AllDataRes7Embu);
		   
		   $AllDataRes8Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryEmbu= mysqli_num_rows($AllDataRes8Embu);
		   
		   $AllDataRes9Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalEmbu= mysqli_num_rows($AllDataRes9Embu);
		   
		   $AllDataRes10Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalEmbu= mysqli_num_rows($AllDataRes10Embu);
		   
		   $AllDataRes11Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%connective%'");
		   $totalBloodEmbu= mysqli_num_rows($AllDataRes11Embu);
		   
		   $AllDataRes12Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalEmbu= mysqli_num_rows($AllDataRes12Embu);
		   
		   $AllDataRes13Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu' AND response.conditions LIKE '%Skin%'");
		   $totalSkinEmbu= mysqli_num_rows($AllDataRes13Embu);
		   
	//2. Isiolo
		   $AllDataRes1Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerIsiolo= mysqli_num_rows($AllDataRes1Isiolo);
		   
		   $AllDataRes2Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularIsiolo= mysqli_num_rows($AllDataRes2Isiolo);
		   
		   $AllDataRes3Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryIsiolo= mysqli_num_rows($AllDataRes3Isiolo);
		   
		   $AllDataRes4Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineIsiolo= mysqli_num_rows($AllDataRes4Isiolo);
		   
		   $AllDataRes5Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Eye%'");
		   $totalEyeIsiolo= mysqli_num_rows($AllDataRes5Isiolo);
		   
		   $AllDataRes6Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroIsiolo= mysqli_num_rows($AllDataRes6Isiolo);
		   
		   $AllDataRes7Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalIsiolo= mysqli_num_rows($AllDataRes7Isiolo);
		   
		   $AllDataRes8Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryIsiolo= mysqli_num_rows($AllDataRes8Isiolo);
		   
		   $AllDataRes9Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalIsiolo= mysqli_num_rows($AllDataRes9Isiolo);
		   
		   $AllDataRes10Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalIsiolo= mysqli_num_rows($AllDataRes10Isiolo);
		   
		   $AllDataRes11Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%connective%'");
		   $totalBloodIsiolo= mysqli_num_rows($AllDataRes11Isiolo);
		   
		   $AllDataRes12Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalIsiolo= mysqli_num_rows($AllDataRes12Isiolo);
		   
		   $AllDataRes13Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo' AND response.conditions LIKE '%Skin%'");
		   $totalSkinIsiolo= mysqli_num_rows($AllDataRes13Isiolo);
		   
	//3. Kitui
		   $AllDataRes1Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKitui= mysqli_num_rows($AllDataRes1Kitui);
		   
		   $AllDataRes2Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKitui= mysqli_num_rows($AllDataRes2Kitui);
		   
		   $AllDataRes3Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKitui= mysqli_num_rows($AllDataRes3Kitui);
		   
		   $AllDataRes4Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKitui= mysqli_num_rows($AllDataRes4Kitui);
		   
		   $AllDataRes5Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKitui= mysqli_num_rows($AllDataRes5Kitui);
		   
		   $AllDataRes6Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKitui= mysqli_num_rows($AllDataRes6Kitui);
		   
		   $AllDataRes7Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKitui= mysqli_num_rows($AllDataRes7Kitui);
		   
		   $AllDataRes8Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKitui= mysqli_num_rows($AllDataRes8Kitui);
		   
		   $AllDataRes9Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKitui= mysqli_num_rows($AllDataRes9Kitui);
		   
		   $AllDataRes10Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKitui= mysqli_num_rows($AllDataRes10Kitui);
		   
		   $AllDataRes11Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%connective%'");
		   $totalBloodKitui= mysqli_num_rows($AllDataRes11Kitui);
		   
		   $AllDataRes12Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKitui= mysqli_num_rows($AllDataRes12Kitui);
		   
		   $AllDataRes13Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKitui= mysqli_num_rows($AllDataRes13Kitui);
		   
	//4. Machakos
		   $AllDataRes1Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMachakos= mysqli_num_rows($AllDataRes1Machakos);
		   
		   $AllDataRes2Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMachakos= mysqli_num_rows($AllDataRes2Machakos);
		   
		   $AllDataRes3Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMachakos= mysqli_num_rows($AllDataRes3Machakos);
		   
		   $AllDataRes4Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMachakos= mysqli_num_rows($AllDataRes4Machakos);
		   
		   $AllDataRes5Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMachakos= mysqli_num_rows($AllDataRes5Machakos);
		   
		   $AllDataRes6Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMachakos= mysqli_num_rows($AllDataRes6Machakos);
		   
		   $AllDataRes7Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMachakos= mysqli_num_rows($AllDataRes7Machakos);
		   
		   $AllDataRes8Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMachakos= mysqli_num_rows($AllDataRes8Machakos);
		   
		   $AllDataRes9Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMachakos= mysqli_num_rows($AllDataRes9Machakos);
		   
		   $AllDataRes10Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMachakos= mysqli_num_rows($AllDataRes10Machakos);
		   
		   $AllDataRes11Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%connective%'");
		   $totalBloodMachakos= mysqli_num_rows($AllDataRes11Machakos);
		   
		   $AllDataRes12Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMachakos= mysqli_num_rows($AllDataRes12Machakos);
		   
		   $AllDataRes13Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMachakos= mysqli_num_rows($AllDataRes13Machakos);
		   
	//5. Makueni
		   $AllDataRes1Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMakueni= mysqli_num_rows($AllDataRes1Makueni);
		   
		   $AllDataRes2Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMakueni= mysqli_num_rows($AllDataRes2Makueni);
		   
		   $AllDataRes3Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMakueni= mysqli_num_rows($AllDataRes3Makueni);
		   
		   $AllDataRes4Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMakueni= mysqli_num_rows($AllDataRes4Makueni);
		   
		   $AllDataRes5Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMakueni= mysqli_num_rows($AllDataRes5Makueni);
		   
		   $AllDataRes6Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMakueni= mysqli_num_rows($AllDataRes6Makueni);
		   
		   $AllDataRes7Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMakueni= mysqli_num_rows($AllDataRes7Makueni);
		   
		   $AllDataRes8Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMakueni= mysqli_num_rows($AllDataRes8Makueni);
		   
		   $AllDataRes9Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMakueni= mysqli_num_rows($AllDataRes9Makueni);
		   
		   $AllDataRes10Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMakueni= mysqli_num_rows($AllDataRes10Makueni);
		   
		   $AllDataRes11Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%connective%'");
		   $totalBloodMakueni= mysqli_num_rows($AllDataRes11Makueni);
		   
		   $AllDataRes12Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMakueni= mysqli_num_rows($AllDataRes12Makueni);
		   
		   $AllDataRes13Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMakueni= mysqli_num_rows($AllDataRes13Makueni);
		   
	//6. Marsabit
		   $AllDataRes1Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMarsabit= mysqli_num_rows($AllDataRes1Marsabit);
		   
		   $AllDataRes2Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMarsabit= mysqli_num_rows($AllDataRes2Marsabit);
		   
		   $AllDataRes3Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMarsabit= mysqli_num_rows($AllDataRes3Marsabit);
		   
		   $AllDataRes4Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMarsabit= mysqli_num_rows($AllDataRes4Marsabit);
		   
		   $AllDataRes5Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMarsabit= mysqli_num_rows($AllDataRes5Marsabit);
		   
		   $AllDataRes6Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMarsabit= mysqli_num_rows($AllDataRes6Marsabit);
		   
		   $AllDataRes7Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMarsabit= mysqli_num_rows($AllDataRes7Marsabit);
		   
		   $AllDataRes8Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMarsabit= mysqli_num_rows($AllDataRes8Marsabit);
		   
		   $AllDataRes9Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMarsabit= mysqli_num_rows($AllDataRes9Marsabit);
		   
		   $AllDataRes10Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMarsabit= mysqli_num_rows($AllDataRes10Marsabit);
		   
		   $AllDataRes11Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%connective%'");
		   $totalBloodMarsabit= mysqli_num_rows($AllDataRes11Marsabit);
		   
		   $AllDataRes12Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMarsabit= mysqli_num_rows($AllDataRes12Marsabit);
		   
		   $AllDataRes13Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMarsabit= mysqli_num_rows($AllDataRes13Marsabit);
		   
	//7. Meru
		   $AllDataRes1Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMeru= mysqli_num_rows($AllDataRes1Meru);
		   
		   $AllDataRes2Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMeru= mysqli_num_rows($AllDataRes2Meru);
		   
		   $AllDataRes3Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMeru= mysqli_num_rows($AllDataRes3Meru);
		   
		   $AllDataRes4Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMeru= mysqli_num_rows($AllDataRes4Meru);
		   
		   $AllDataRes5Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMeru= mysqli_num_rows($AllDataRes5Meru);
		   
		   $AllDataRes6Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMeru= mysqli_num_rows($AllDataRes6Meru);
		   
		   $AllDataRes7Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMeru= mysqli_num_rows($AllDataRes7Meru);
		   
		   $AllDataRes8Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMeru= mysqli_num_rows($AllDataRes8Meru);
		   
		   $AllDataRes9Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMeru= mysqli_num_rows($AllDataRes9Meru);
		   
		   $AllDataRes10Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMeru= mysqli_num_rows($AllDataRes10Meru);
		   
		   $AllDataRes11Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%connective%'");
		   $totalBloodMeru= mysqli_num_rows($AllDataRes11Meru);
		   
		   $AllDataRes12Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMeru= mysqli_num_rows($AllDataRes12Meru);
		   
		   $AllDataRes13Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMeru= mysqli_num_rows($AllDataRes13Meru);
		   
	//8. Tharaka-Nithi
		   $AllDataRes1Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerTharaka= mysqli_num_rows($AllDataRes1Tharaka);
		   
		   $AllDataRes2Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularTharaka= mysqli_num_rows($AllDataRes2Tharaka);
		   
		   $AllDataRes3Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryTharaka= mysqli_num_rows($AllDataRes3Tharaka);
		   
		   $AllDataRes4Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineTharaka= mysqli_num_rows($AllDataRes4Tharaka);
		   
		   $AllDataRes5Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Eye%'");
		   $totalEyeTharaka= mysqli_num_rows($AllDataRes5Tharaka);
		   
		   $AllDataRes6Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroTharaka= mysqli_num_rows($AllDataRes6Tharaka);
		   
		   $AllDataRes7Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalTharaka= mysqli_num_rows($AllDataRes7Tharaka);
		   
		   $AllDataRes8Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryTharaka= mysqli_num_rows($AllDataRes8Tharaka);
		   
		   $AllDataRes9Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalTharaka= mysqli_num_rows($AllDataRes9Tharaka);
		   
		   $AllDataRes10Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalTharaka= mysqli_num_rows($AllDataRes10Tharaka);
		   
		   $AllDataRes11Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%connective%'");
		   $totalBloodTharaka= mysqli_num_rows($AllDataRes11Tharaka);
		   
		   $AllDataRes12Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalTharaka= mysqli_num_rows($AllDataRes12Tharaka);
		   
		   $AllDataRes13Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi' AND response.conditions LIKE '%Skin%'");
		   $totalSkinTharaka= mysqli_num_rows($AllDataRes13Tharaka);
		   
	//C. Western Region
   //1. Bungoma
		   $AllDataRes1Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerBungoma= mysqli_num_rows($AllDataRes1Bungoma);
		   
		   $AllDataRes2Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularBungoma= mysqli_num_rows($AllDataRes2Bungoma);
		   
		   $AllDataRes3Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryBungoma= mysqli_num_rows($AllDataRes3Bungoma);
		   
		   $AllDataRes4Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineBungoma= mysqli_num_rows($AllDataRes4Bungoma);
		   
		   $AllDataRes5Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Eye%'");
		   $totalEyeBungoma= mysqli_num_rows($AllDataRes5Bungoma);
		   
		   $AllDataRes6Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroBungoma= mysqli_num_rows($AllDataRes6Bungoma);
		   
		   $AllDataRes7Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalBungoma= mysqli_num_rows($AllDataRes7Bungoma);
		   
		   $AllDataRes8Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryBungoma= mysqli_num_rows($AllDataRes8Bungoma);
		   
		   $AllDataRes9Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalBungoma= mysqli_num_rows($AllDataRes9Bungoma);
		   
		   $AllDataRes10Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalBungoma= mysqli_num_rows($AllDataRes10Bungoma);
		   
		   $AllDataRes11Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%connective%'");
		   $totalBloodBungoma= mysqli_num_rows($AllDataRes11Bungoma);
		   
		   $AllDataRes12Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalBungoma= mysqli_num_rows($AllDataRes12Bungoma);
		   
		   $AllDataRes13Bungoma= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bungoma' AND response.conditions LIKE '%Skin%'");
		   $totalSkinBungoma= mysqli_num_rows($AllDataRes13Bungoma);
		   
	//2. Busia
		   $AllDataRes1Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerBusia= mysqli_num_rows($AllDataRes1Busia);
		   
		   $AllDataRes2Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularBusia= mysqli_num_rows($AllDataRes2Busia);
		   
		   $AllDataRes3Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryBusia= mysqli_num_rows($AllDataRes3Busia);
		   
		   $AllDataRes4Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineBusia= mysqli_num_rows($AllDataRes4Busia);
		   
		   $AllDataRes5Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Eye%'");
		   $totalEyeBusia= mysqli_num_rows($AllDataRes5Busia);
		   
		   $AllDataRes6Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroBusia= mysqli_num_rows($AllDataRes6Busia);
		   
		   $AllDataRes7Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalBusia= mysqli_num_rows($AllDataRes7Busia);
		   
		   $AllDataRes8Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryBusia= mysqli_num_rows($AllDataRes8Busia);
		   
		   $AllDataRes9Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalBusia= mysqli_num_rows($AllDataRes9Busia);
		   
		   $AllDataRes10Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalBusia= mysqli_num_rows($AllDataRes10Busia);
		   
		   $AllDataRes11Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%connective%'");
		   $totalBloodBusia= mysqli_num_rows($AllDataRes11Busia);
		   
		   $AllDataRes12Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalBusia= mysqli_num_rows($AllDataRes12Busia);
		   
		   $AllDataRes13Busia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Busia' AND response.conditions LIKE '%Skin%'");
		   $totalSkinBusia= mysqli_num_rows($AllDataRes13Busia);
		   
	//3. Kakamega
		   $AllDataRes1Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKakamega= mysqli_num_rows($AllDataRes1Kakamega);
		   
		   $AllDataRes2Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKakamega= mysqli_num_rows($AllDataRes2Kakamega);
		   
		   $AllDataRes3Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKakamega= mysqli_num_rows($AllDataRes3Kakamega);
		   
		   $AllDataRes4Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKakamega= mysqli_num_rows($AllDataRes4Kakamega);
		   
		   $AllDataRes5Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKakamega= mysqli_num_rows($AllDataRes5Kakamega);
		   
		   $AllDataRes6Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKakamega= mysqli_num_rows($AllDataRes6Kakamega);
		   
		   $AllDataRes7Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKakamega= mysqli_num_rows($AllDataRes7Kakamega);
		   
		   $AllDataRes8Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKakamega= mysqli_num_rows($AllDataRes8Kakamega);
		   
		   $AllDataRes9Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKakamega= mysqli_num_rows($AllDataRes9Kakamega);
		   
		   $AllDataRes10Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKakamega= mysqli_num_rows($AllDataRes10Kakamega);
		   
		   $AllDataRes11Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%connective%'");
		   $totalBloodKakamega= mysqli_num_rows($AllDataRes11Kakamega);
		   
		   $AllDataRes12Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKakamega= mysqli_num_rows($AllDataRes12Kakamega);
		   
		   $AllDataRes13Kakamega= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kakamega' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKakamega= mysqli_num_rows($AllDataRes13Kakamega);
		   
	//4. Vihiga
		   $AllDataRes1Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerVihiga= mysqli_num_rows($AllDataRes1Vihiga);
		   
		   $AllDataRes2Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularVihiga= mysqli_num_rows($AllDataRes2Vihiga);
		   
		   $AllDataRes3Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryVihiga= mysqli_num_rows($AllDataRes3Vihiga);
		   
		   $AllDataRes4Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineVihiga= mysqli_num_rows($AllDataRes4Vihiga);
		   
		   $AllDataRes5Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Eye%'");
		   $totalEyeVihiga= mysqli_num_rows($AllDataRes5Vihiga);
		   
		   $AllDataRes6Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroVihiga= mysqli_num_rows($AllDataRes6Vihiga);
		   
		   $AllDataRes7Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalVihiga= mysqli_num_rows($AllDataRes7Vihiga);
		   
		   $AllDataRes8Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryVihiga= mysqli_num_rows($AllDataRes8Vihiga);
		   
		   $AllDataRes9Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalVihiga= mysqli_num_rows($AllDataRes9Vihiga);
		   
		   $AllDataRes10Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalVihiga= mysqli_num_rows($AllDataRes10Vihiga);
		   
		   $AllDataRes11Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%connective%'");
		   $totalBloodVihiga= mysqli_num_rows($AllDataRes11Vihiga);
		   
		   $AllDataRes12Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalVihiga= mysqli_num_rows($AllDataRes12Vihiga);
		   
		   $AllDataRes13Vihiga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Vihiga' AND response.conditions LIKE '%Skin%'");
		   $totalSkinVihiga= mysqli_num_rows($AllDataRes13Vihiga);
		   
	//D. Nyanza Region
   //1. Homa Bay
		   $AllDataRes1Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerHoma= mysqli_num_rows($AllDataRes1Homa);
		   
		   $AllDataRes2Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularHoma= mysqli_num_rows($AllDataRes2Homa);
		   
		   $AllDataRes3Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryHoma= mysqli_num_rows($AllDataRes3Homa);
		   
		   $AllDataRes4Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineHoma= mysqli_num_rows($AllDataRes4Homa);
		   
		   $AllDataRes5Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Eye%'");
		   $totalEyeHoma= mysqli_num_rows($AllDataRes5Homa);
		   
		   $AllDataRes6Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroHoma= mysqli_num_rows($AllDataRes6Homa);
		   
		   $AllDataRes7Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalHoma= mysqli_num_rows($AllDataRes7Homa);
		   
		   $AllDataRes8Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryHoma= mysqli_num_rows($AllDataRes8Homa);
		   
		   $AllDataRes9Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalHoma= mysqli_num_rows($AllDataRes9Homa);
		   
		   $AllDataRes10Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalHoma= mysqli_num_rows($AllDataRes10Homa);
		   
		   $AllDataRes11Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%connective%'");
		   $totalBloodHoma= mysqli_num_rows($AllDataRes11Homa);
		   
		   $AllDataRes12Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalHoma= mysqli_num_rows($AllDataRes12Homa);
		   
		   $AllDataRes13Homa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Homa Bay' AND response.conditions LIKE '%Skin%'");
		   $totalSkinHoma= mysqli_num_rows($AllDataRes13Homa);
		   
	//2. Kisii
		   $AllDataRes1Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKisii= mysqli_num_rows($AllDataRes1Kisii);
		   
		   $AllDataRes2Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKisii= mysqli_num_rows($AllDataRes2Kisii);
		   
		   $AllDataRes3Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKisii= mysqli_num_rows($AllDataRes3Kisii);
		   
		   $AllDataRes4Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKisii= mysqli_num_rows($AllDataRes4Kisii);
		   
		   $AllDataRes5Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKisii= mysqli_num_rows($AllDataRes5Kisii);
		   
		   $AllDataRes6Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKisii= mysqli_num_rows($AllDataRes6Kisii);
		   
		   $AllDataRes7Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKisii= mysqli_num_rows($AllDataRes7Kisii);
		   
		   $AllDataRes8Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKisii= mysqli_num_rows($AllDataRes8Kisii);
		   
		   $AllDataRes9Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKisii= mysqli_num_rows($AllDataRes9Kisii);
		   
		   $AllDataRes10Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKisii= mysqli_num_rows($AllDataRes10Kisii);
		   
		   $AllDataRes11Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%connective%'");
		   $totalBloodKisii= mysqli_num_rows($AllDataRes11Kisii);
		   
		   $AllDataRes12Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKisii= mysqli_num_rows($AllDataRes12Kisii);
		   
		   $AllDataRes13Kisii= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisii' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKisii= mysqli_num_rows($AllDataRes13Kisii);
		   
	//3. Kisumu
		   $AllDataRes1Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKisumu= mysqli_num_rows($AllDataRes1Kisumu);
		   
		   $AllDataRes2Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKisumu= mysqli_num_rows($AllDataRes2Kisumu);
		   
		   $AllDataRes3Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKisumu= mysqli_num_rows($AllDataRes3Kisumu);
		   
		   $AllDataRes4Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKisumu= mysqli_num_rows($AllDataRes4Kisumu);
		   
		   $AllDataRes5Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKisumu= mysqli_num_rows($AllDataRes5Kisumu);
		   
		   $AllDataRes6Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKisumu= mysqli_num_rows($AllDataRes6Kisumu);
		   
		   $AllDataRes7Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKisumu= mysqli_num_rows($AllDataRes7Kisumu);
		   
		   $AllDataRes8Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKisumu= mysqli_num_rows($AllDataRes8Kisumu);
		   
		   $AllDataRes9Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKisumu= mysqli_num_rows($AllDataRes9Kisumu);
		   
		   $AllDataRes10Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKisumu= mysqli_num_rows($AllDataRes10Kisumu);
		   
		   $AllDataRes11Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%connective%'");
		   $totalBloodKisumu= mysqli_num_rows($AllDataRes11Kisumu);
		   
		   $AllDataRes12Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKisumu= mysqli_num_rows($AllDataRes12Kisumu);
		   
		   $AllDataRes13Kisumu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kisumu' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKisumu= mysqli_num_rows($AllDataRes13Kisumu);
		   
	//4. Migori
		   $AllDataRes1Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMigori= mysqli_num_rows($AllDataRes1Migori);
		   
		   $AllDataRes2Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMigori= mysqli_num_rows($AllDataRes2Migori);
		   
		   $AllDataRes3Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMigori= mysqli_num_rows($AllDataRes3Migori);
		   
		   $AllDataRes4Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMigori= mysqli_num_rows($AllDataRes4Migori);
		   
		   $AllDataRes5Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMigori= mysqli_num_rows($AllDataRes5Migori);
		   
		   $AllDataRes6Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMigori= mysqli_num_rows($AllDataRes6Migori);
		   
		   $AllDataRes7Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMigori= mysqli_num_rows($AllDataRes7Migori);
		   
		   $AllDataRes8Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMigori= mysqli_num_rows($AllDataRes8Migori);
		   
		   $AllDataRes9Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMigori= mysqli_num_rows($AllDataRes9Migori);
		   
		   $AllDataRes10Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMigori= mysqli_num_rows($AllDataRes10Migori);
		   
		   $AllDataRes11Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%connective%'");
		   $totalBloodMigori= mysqli_num_rows($AllDataRes11Migori);
		   
		   $AllDataRes12Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMigori= mysqli_num_rows($AllDataRes12Migori);
		   
		   $AllDataRes13Migori= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Migori' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMigori= mysqli_num_rows($AllDataRes13Migori);
		   
	//5. Nyamira
		   $AllDataRes1Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerNyamira= mysqli_num_rows($AllDataRes1Nyamira);
		   
		   $AllDataRes2Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularNyamira= mysqli_num_rows($AllDataRes2Nyamira);
		   
		   $AllDataRes3Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryNyamira= mysqli_num_rows($AllDataRes3Nyamira);
		   
		   $AllDataRes4Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineNyamira= mysqli_num_rows($AllDataRes4Nyamira);
		   
		   $AllDataRes5Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Eye%'");
		   $totalEyeNyamira= mysqli_num_rows($AllDataRes5Nyamira);
		   
		   $AllDataRes6Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroNyamira= mysqli_num_rows($AllDataRes6Nyamira);
		   
		   $AllDataRes7Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalNyamira= mysqli_num_rows($AllDataRes7Nyamira);
		   
		   $AllDataRes8Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryNyamira= mysqli_num_rows($AllDataRes8Nyamira);
		   
		   $AllDataRes9Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalNyamira= mysqli_num_rows($AllDataRes9Nyamira);
		   
		   $AllDataRes10Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalNyamira= mysqli_num_rows($AllDataRes10Nyamira);
		   
		   $AllDataRes11Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%connective%'");
		   $totalBloodNyamira= mysqli_num_rows($AllDataRes11Nyamira);
		   
		   $AllDataRes12Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalNyamira= mysqli_num_rows($AllDataRes12Nyamira);
		   
		   $AllDataRes13Nyamira= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyamira' AND response.conditions LIKE '%Skin%'");
		   $totalSkinNyamira= mysqli_num_rows($AllDataRes13Nyamira);
		   
	//6. Siaya
		   $AllDataRes1Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerSiaya= mysqli_num_rows($AllDataRes1Siaya);
		   
		   $AllDataRes2Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularSiaya= mysqli_num_rows($AllDataRes2Siaya);
		   
		   $AllDataRes3Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratorySiaya= mysqli_num_rows($AllDataRes3Siaya);
		   
		   $AllDataRes4Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineSiaya= mysqli_num_rows($AllDataRes4Siaya);
		   
		   $AllDataRes5Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Eye%'");
		   $totalEyeSiaya= mysqli_num_rows($AllDataRes5Siaya);
		   
		   $AllDataRes6Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroSiaya= mysqli_num_rows($AllDataRes6Siaya);
		   
		   $AllDataRes7Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalSiaya= mysqli_num_rows($AllDataRes7Siaya);
		   
		   $AllDataRes8Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinarySiaya= mysqli_num_rows($AllDataRes8Siaya);
		   
		   $AllDataRes9Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalSiaya= mysqli_num_rows($AllDataRes9Siaya);
		   
		   $AllDataRes10Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalSiaya= mysqli_num_rows($AllDataRes10Siaya);
		   
		   $AllDataRes11Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%connective%'");
		   $totalBloodSiaya= mysqli_num_rows($AllDataRes11Siaya);
		   
		   $AllDataRes12Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalSiaya= mysqli_num_rows($AllDataRes12Siaya);
		   
		   $AllDataRes13Siaya= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Siaya' AND response.conditions LIKE '%Skin%'");
		   $totalSkinSiaya= mysqli_num_rows($AllDataRes13Siaya);
		   
	//E. Rift Valley Region
    //1. Baringo
		   $AllDataRes1Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerBaringo= mysqli_num_rows($AllDataRes1Baringo);
		   
		   $AllDataRes2Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularBaringo= mysqli_num_rows($AllDataRes2Baringo);
		   
		   $AllDataRes3Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryBaringo= mysqli_num_rows($AllDataRes3Baringo);
		   
		   $AllDataRes4Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineBaringo= mysqli_num_rows($AllDataRes4Baringo);
		   
		   $AllDataRes5Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Eye%'");
		   $totalEyeBaringo= mysqli_num_rows($AllDataRes5Baringo);
		   
		   $AllDataRes6Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroBaringo= mysqli_num_rows($AllDataRes6Baringo);
		   
		   $AllDataRes7Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalBaringo= mysqli_num_rows($AllDataRes7Baringo);
		   
		   $AllDataRes8Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryBaringo= mysqli_num_rows($AllDataRes8Baringo);
		   
		   $AllDataRes9Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalBaringo= mysqli_num_rows($AllDataRes9Baringo);
		   
		   $AllDataRes10Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalBaringo= mysqli_num_rows($AllDataRes10Baringo);
		   
		   $AllDataRes11Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%connective%'");
		   $totalBloodBaringo= mysqli_num_rows($AllDataRes11Baringo);
		   
		   $AllDataRes12Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalBaringo= mysqli_num_rows($AllDataRes12Baringo);
		   
		   $AllDataRes13Baringo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Baringo' AND response.conditions LIKE '%Skin%'");
		   $totalSkinBaringo= mysqli_num_rows($AllDataRes13Baringo);
		   
	//2. Bomet
		   $AllDataRes1Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerBomet= mysqli_num_rows($AllDataRes1Bomet);
		   
		   $AllDataRes2Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularBomet= mysqli_num_rows($AllDataRes2Bomet);
		   
		   $AllDataRes3Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryBomet= mysqli_num_rows($AllDataRes3Bomet);
		   
		   $AllDataRes4Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineBomet= mysqli_num_rows($AllDataRes4Bomet);
		   
		   $AllDataRes5Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Eye%'");
		   $totalEyeBomet= mysqli_num_rows($AllDataRes5Bomet);
		   
		   $AllDataRes6Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroBomet= mysqli_num_rows($AllDataRes6Bomet);
		   
		   $AllDataRes7Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalBomet= mysqli_num_rows($AllDataRes7Bomet);
		   
		   $AllDataRes8Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryBomet= mysqli_num_rows($AllDataRes8Bomet);
		   
		   $AllDataRes9Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalBomet= mysqli_num_rows($AllDataRes9Bomet);
		   
		   $AllDataRes10Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalBomet= mysqli_num_rows($AllDataRes10Bomet);
		   
		   $AllDataRes11Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%connective%'");
		   $totalBloodBomet= mysqli_num_rows($AllDataRes11Bomet);
		   
		   $AllDataRes12Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalBomet= mysqli_num_rows($AllDataRes12Bomet);
		   
		   $AllDataRes13Bomet= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Bomet' AND response.conditions LIKE '%Skin%'");
		   $totalSkinBomet= mysqli_num_rows($AllDataRes13Bomet);
		   
	//3. Elgeyo/Marakwet
		   $AllDataRes1Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerElgeyo= mysqli_num_rows($AllDataRes1Elgeyo);
		   
		   $AllDataRes2Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularElgeyo= mysqli_num_rows($AllDataRes2Elgeyo);
		   
		   $AllDataRes3Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryElgeyo= mysqli_num_rows($AllDataRes3Elgeyo);
		   
		   $AllDataRes4Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineElgeyo= mysqli_num_rows($AllDataRes4Elgeyo);
		   
		   $AllDataRes5Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Eye%'");
		   $totalEyeElgeyo= mysqli_num_rows($AllDataRes5Elgeyo);
		   
		   $AllDataRes6Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroElgeyo= mysqli_num_rows($AllDataRes6Elgeyo);
		   
		   $AllDataRes7Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalElgeyo= mysqli_num_rows($AllDataRes7Elgeyo);
		   
		   $AllDataRes8Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryElgeyo= mysqli_num_rows($AllDataRes8Elgeyo);
		   
		   $AllDataRes9Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalElgeyo= mysqli_num_rows($AllDataRes9Elgeyo);
		   
		   $AllDataRes10Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalElgeyo= mysqli_num_rows($AllDataRes10Elgeyo);
		   
		   $AllDataRes11Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%connective%'");
		   $totalBloodElgeyo= mysqli_num_rows($AllDataRes11Elgeyo);
		   
		   $AllDataRes12Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalElgeyo= mysqli_num_rows($AllDataRes12Elgeyo);
		   
		   $AllDataRes13Elgeyo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Elgeyo/Marakwet' AND response.conditions LIKE '%Skin%'");
		   $totalSkinElgeyo= mysqli_num_rows($AllDataRes13Elgeyo);
		   
	//4. Kajiado
		   $AllDataRes1Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKajiado= mysqli_num_rows($AllDataRes1Kajiado);
		   
		   $AllDataRes2Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKajiado= mysqli_num_rows($AllDataRes2Kajiado);
		   
		   $AllDataRes3Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKajiado= mysqli_num_rows($AllDataRes3Kajiado);
		   
		   $AllDataRes4Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKajiado= mysqli_num_rows($AllDataRes4Kajiado);
		   
		   $AllDataRes5Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKajiado= mysqli_num_rows($AllDataRes5Kajiado);
		   
		   $AllDataRes6Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKajiado= mysqli_num_rows($AllDataRes6Kajiado);
		   
		   $AllDataRes7Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKajiado= mysqli_num_rows($AllDataRes7Kajiado);
		   
		   $AllDataRes8Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKajiado= mysqli_num_rows($AllDataRes8Kajiado);
		   
		   $AllDataRes9Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKajiado= mysqli_num_rows($AllDataRes9Kajiado);
		   
		   $AllDataRes10Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKajiado= mysqli_num_rows($AllDataRes10Kajiado);
		   
		   $AllDataRes11Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%connective%'");
		   $totalBloodKajiado= mysqli_num_rows($AllDataRes11Kajiado);
		   
		   $AllDataRes12Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKajiado= mysqli_num_rows($AllDataRes12Kajiado);
		   
		   $AllDataRes13Kajiado= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kajiado' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKajiado= mysqli_num_rows($AllDataRes13Kajiado);
		   
	//5. Kericho
		   $AllDataRes1Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKericho= mysqli_num_rows($AllDataRes1Kericho);
		   
		   $AllDataRes2Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKericho= mysqli_num_rows($AllDataRes2Kericho);
		   
		   $AllDataRes3Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKericho= mysqli_num_rows($AllDataRes3Kericho);
		   
		   $AllDataRes4Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKericho= mysqli_num_rows($AllDataRes4Kericho);
		   
		   $AllDataRes5Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKericho= mysqli_num_rows($AllDataRes5Kericho);
		   
		   $AllDataRes6Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKericho= mysqli_num_rows($AllDataRes6Kericho);
		   
		   $AllDataRes7Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKericho= mysqli_num_rows($AllDataRes7Kericho);
		   
		   $AllDataRes8Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKericho= mysqli_num_rows($AllDataRes8Kericho);
		   
		   $AllDataRes9Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKericho= mysqli_num_rows($AllDataRes9Kericho);
		   
		   $AllDataRes10Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKericho= mysqli_num_rows($AllDataRes10Kericho);
		   
		   $AllDataRes11Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%connective%'");
		   $totalBloodKericho= mysqli_num_rows($AllDataRes11Kericho);
		   
		   $AllDataRes12Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKericho= mysqli_num_rows($AllDataRes12Kericho);
		   
		   $AllDataRes13Kericho= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kericho' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKericho= mysqli_num_rows($AllDataRes13Kericho);
		   
	//6. Laikipia
		   $AllDataRes1Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerLaikipia= mysqli_num_rows($AllDataRes1Laikipia);
		   
		   $AllDataRes2Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularLaikipia= mysqli_num_rows($AllDataRes2Laikipia);
		   
		   $AllDataRes3Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryLaikipia= mysqli_num_rows($AllDataRes3Laikipia);
		   
		   $AllDataRes4Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineLaikipia= mysqli_num_rows($AllDataRes4Laikipia);
		   
		   $AllDataRes5Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Eye%'");
		   $totalEyeLaikipia= mysqli_num_rows($AllDataRes5Laikipia);
		   
		   $AllDataRes6Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroLaikipia= mysqli_num_rows($AllDataRes6Laikipia);
		   
		   $AllDataRes7Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalLaikipia= mysqli_num_rows($AllDataRes7Laikipia);
		   
		   $AllDataRes8Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryLaikipia= mysqli_num_rows($AllDataRes8Laikipia);
		   
		   $AllDataRes9Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalLaikipia= mysqli_num_rows($AllDataRes9Laikipia);
		   
		   $AllDataRes10Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalLaikipia= mysqli_num_rows($AllDataRes10Laikipia);
		   
		   $AllDataRes11Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%connective%'");
		   $totalBloodLaikipia= mysqli_num_rows($AllDataRes11Laikipia);
		   
		   $AllDataRes12Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalLaikipia= mysqli_num_rows($AllDataRes12Laikipia);
		   
		   $AllDataRes13Laikipia= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Laikipia' AND response.conditions LIKE '%Skin%'");
		   $totalSkinLaikipia= mysqli_num_rows($AllDataRes13Laikipia);
		   
	//7. Nakuru
		   $AllDataRes1Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerNakuru= mysqli_num_rows($AllDataRes1Nakuru);
		   
		   $AllDataRes2Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularNakuru= mysqli_num_rows($AllDataRes2Nakuru);
		   
		   $AllDataRes3Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryNakuru= mysqli_num_rows($AllDataRes3Nakuru);
		   
		   $AllDataRes4Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineNakuru= mysqli_num_rows($AllDataRes4Nakuru);
		   
		   $AllDataRes5Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Eye%'");
		   $totalEyeNakuru= mysqli_num_rows($AllDataRes5Nakuru);
		   
		   $AllDataRes6Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroNakuru= mysqli_num_rows($AllDataRes6Nakuru);
		   
		   $AllDataRes7Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalNakuru= mysqli_num_rows($AllDataRes7Nakuru);
		   
		   $AllDataRes8Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryNakuru= mysqli_num_rows($AllDataRes8Nakuru);
		   
		   $AllDataRes9Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalNakuru= mysqli_num_rows($AllDataRes9Nakuru);
		   
		   $AllDataRes10Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalNakuru= mysqli_num_rows($AllDataRes10Nakuru);
		   
		   $AllDataRes11Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%connective%'");
		   $totalBloodNakuru= mysqli_num_rows($AllDataRes11Nakuru);
		   
		   $AllDataRes12Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalNakuru= mysqli_num_rows($AllDataRes12Nakuru);
		   
		   $AllDataRes13Nakuru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nakuru' AND response.conditions LIKE '%Skin%'");
		   $totalSkinNakuru= mysqli_num_rows($AllDataRes13Nakuru);
		   
	//8. Nandi
		   $AllDataRes1Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerNandi= mysqli_num_rows($AllDataRes1Nandi);
		   
		   $AllDataRes2Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularNandi= mysqli_num_rows($AllDataRes2Nandi);
		   
		   $AllDataRes3Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryNandi= mysqli_num_rows($AllDataRes3Nandi);
		   
		   $AllDataRes4Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineNandi= mysqli_num_rows($AllDataRes4Nandi);
		   
		   $AllDataRes5Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Eye%'");
		   $totalEyeNandi= mysqli_num_rows($AllDataRes5Nandi);
		   
		   $AllDataRes6Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroNandi= mysqli_num_rows($AllDataRes6Nandi);
		   
		   $AllDataRes7Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalNandi= mysqli_num_rows($AllDataRes7Nandi);
		   
		   $AllDataRes8Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryNandi= mysqli_num_rows($AllDataRes8Nandi);
		   
		   $AllDataRes9Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalNandi= mysqli_num_rows($AllDataRes9Nandi);
		   
		   $AllDataRes10Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalNandi= mysqli_num_rows($AllDataRes10Nandi);
		   
		   $AllDataRes11Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%connective%'");
		   $totalBloodNandi= mysqli_num_rows($AllDataRes11Nandi);
		   
		   $AllDataRes12Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalNandi= mysqli_num_rows($AllDataRes12Nandi);
		   
		   $AllDataRes13Nandi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nandi' AND response.conditions LIKE '%Skin%'");
		   $totalSkinNandi= mysqli_num_rows($AllDataRes13Nandi);
		   
	//9. Narok
		   $AllDataRes1Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerNarok= mysqli_num_rows($AllDataRes1Narok);
		   
		   $AllDataRes2Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularNarok= mysqli_num_rows($AllDataRes2Narok);
		   
		   $AllDataRes3Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryNarok= mysqli_num_rows($AllDataRes3Narok);
		   
		   $AllDataRes4Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineNarok= mysqli_num_rows($AllDataRes4Narok);
		   
		   $AllDataRes5Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Eye%'");
		   $totalEyeNarok= mysqli_num_rows($AllDataRes5Narok);
		   
		   $AllDataRes6Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroNarok= mysqli_num_rows($AllDataRes6Narok);
		   
		   $AllDataRes7Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalNarok= mysqli_num_rows($AllDataRes7Narok);
		   
		   $AllDataRes8Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryNarok= mysqli_num_rows($AllDataRes8Narok);
		   
		   $AllDataRes9Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalNarok= mysqli_num_rows($AllDataRes9Narok);
		   
		   $AllDataRes10Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalNarok= mysqli_num_rows($AllDataRes10Narok);
		   
		   $AllDataRes11Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%connective%'");
		   $totalBloodNarok= mysqli_num_rows($AllDataRes11Narok);
		   
		   $AllDataRes12Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalNarok= mysqli_num_rows($AllDataRes12Narok);
		   
		   $AllDataRes13Narok= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Narok' AND response.conditions LIKE '%Skin%'");
		   $totalSkinNarok= mysqli_num_rows($AllDataRes13Narok);
		   
	//10. Samburu
		   $AllDataRes1Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerSamburu= mysqli_num_rows($AllDataRes1Samburu);
		   
		   $AllDataRes2Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularSamburu= mysqli_num_rows($AllDataRes2Samburu);
		   
		   $AllDataRes3Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratorySamburu= mysqli_num_rows($AllDataRes3Samburu);
		   
		   $AllDataRes4Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineSamburu= mysqli_num_rows($AllDataRes4Samburu);
		   
		   $AllDataRes5Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Eye%'");
		   $totalEyeSamburu= mysqli_num_rows($AllDataRes5Samburu);
		   
		   $AllDataRes6Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroSamburu= mysqli_num_rows($AllDataRes6Samburu);
		   
		   $AllDataRes7Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalSamburu= mysqli_num_rows($AllDataRes7Samburu);
		   
		   $AllDataRes8Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinarySamburu= mysqli_num_rows($AllDataRes8Samburu);
		   
		   $AllDataRes9Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalSamburu= mysqli_num_rows($AllDataRes9Samburu);
		   
		   $AllDataRes10Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalSamburu= mysqli_num_rows($AllDataRes10Samburu);
		   
		   $AllDataRes11Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%connective%'");
		   $totalBloodSamburu= mysqli_num_rows($AllDataRes11Samburu);
		   
		   $AllDataRes12Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalSamburu= mysqli_num_rows($AllDataRes12Samburu);
		   
		   $AllDataRes13Samburu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Samburu' AND response.conditions LIKE '%Skin%'");
		   $totalSkinSamburu= mysqli_num_rows($AllDataRes13Samburu);
		   
	//11. Trans Nzoia
		   $AllDataRes1Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerTrans= mysqli_num_rows($AllDataRes1Trans);
		   
		   $AllDataRes2Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularTrans= mysqli_num_rows($AllDataRes2Trans);
		   
		   $AllDataRes3Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryTrans= mysqli_num_rows($AllDataRes3Trans);
		   
		   $AllDataRes4Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineTrans= mysqli_num_rows($AllDataRes4Trans);
		   
		   $AllDataRes5Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Eye%'");
		   $totalEyeTrans= mysqli_num_rows($AllDataRes5Trans);
		   
		   $AllDataRes6Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroTrans= mysqli_num_rows($AllDataRes6Trans);
		   
		   $AllDataRes7Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalTrans= mysqli_num_rows($AllDataRes7Trans);
		   
		   $AllDataRes8Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryTrans= mysqli_num_rows($AllDataRes8Trans);
		   
		   $AllDataRes9Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalTrans= mysqli_num_rows($AllDataRes9Trans);
		   
		   $AllDataRes10Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalTrans= mysqli_num_rows($AllDataRes10Trans);
		   
		   $AllDataRes11Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%connective%'");
		   $totalBloodTrans= mysqli_num_rows($AllDataRes11Trans);
		   
		   $AllDataRes12Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalTrans= mysqli_num_rows($AllDataRes12Trans);
		   
		   $AllDataRes13Trans= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Trans Nzoia' AND response.conditions LIKE '%Skin%'");
		   $totalSkinTrans= mysqli_num_rows($AllDataRes13Trans);
		   
	//12. Turkana
		   $AllDataRes1Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerTurkana= mysqli_num_rows($AllDataRes1Turkana);
		   
		   $AllDataRes2Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularTurkana= mysqli_num_rows($AllDataRes2Turkana);
		   
		   $AllDataRes3Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryTurkana= mysqli_num_rows($AllDataRes3Turkana);
		   
		   $AllDataRes4Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineTurkana= mysqli_num_rows($AllDataRes4Turkana);
		   
		   $AllDataRes5Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Eye%'");
		   $totalEyeTurkana= mysqli_num_rows($AllDataRes5Turkana);
		   
		   $AllDataRes6Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroTurkana= mysqli_num_rows($AllDataRes6Turkana);
		   
		   $AllDataRes7Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalTurkana= mysqli_num_rows($AllDataRes7Turkana);
		   
		   $AllDataRes8Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryTurkana= mysqli_num_rows($AllDataRes8Turkana);
		   
		   $AllDataRes9Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalTurkana= mysqli_num_rows($AllDataRes9Turkana);
		   
		   $AllDataRes10Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalTurkana= mysqli_num_rows($AllDataRes10Turkana);
		   
		   $AllDataRes11Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%connective%'");
		   $totalBloodTurkana= mysqli_num_rows($AllDataRes11Turkana);
		   
		   $AllDataRes12Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalTurkana= mysqli_num_rows($AllDataRes12Turkana);
		   
		   $AllDataRes13Turkana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Turkana' AND response.conditions LIKE '%Skin%'");
		   $totalSkinTurkana= mysqli_num_rows($AllDataRes13Turkana);
		   
	//13. Uasin Gishu
		   $AllDataRes1Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerUasin= mysqli_num_rows($AllDataRes1Uasin);
		   
		   $AllDataRes2Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularUasin= mysqli_num_rows($AllDataRes2Uasin);
		   
		   $AllDataRes3Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryUasin= mysqli_num_rows($AllDataRes3Uasin);
		   
		   $AllDataRes4Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineUasin= mysqli_num_rows($AllDataRes4Uasin);
		   
		   $AllDataRes5Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Eye%'");
		   $totalEyeUasin= mysqli_num_rows($AllDataRes5Uasin);
		   
		   $AllDataRes6Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroUasin= mysqli_num_rows($AllDataRes6Uasin);
		   
		   $AllDataRes7Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalUasin= mysqli_num_rows($AllDataRes7Uasin);
		   
		   $AllDataRes8Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryUasin= mysqli_num_rows($AllDataRes8Uasin);
		   
		   $AllDataRes9Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalUasin= mysqli_num_rows($AllDataRes9Uasin);
		   
		   $AllDataRes10Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalUasin= mysqli_num_rows($AllDataRes10Uasin);
		   
		   $AllDataRes11Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%connective%'");
		   $totalBloodUasin= mysqli_num_rows($AllDataRes11Uasin);
		   
		   $AllDataRes12Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalUasin= mysqli_num_rows($AllDataRes12Uasin);
		   
		   $AllDataRes13Uasin= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Uasin Gishu' AND response.conditions LIKE '%Skin%'");
		   $totalSkinUasin= mysqli_num_rows($AllDataRes13Uasin);
		   
	//14. West Pokot
		   $AllDataRes1Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerPokot= mysqli_num_rows($AllDataRes1Pokot);
		   
		   $AllDataRes2Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularPokot= mysqli_num_rows($AllDataRes2Pokot);
		   
		   $AllDataRes3Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryPokot= mysqli_num_rows($AllDataRes3Pokot);
		   
		   $AllDataRes4Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrinePokot= mysqli_num_rows($AllDataRes4Pokot);
		   
		   $AllDataRes5Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Eye%'");
		   $totalEyePokot= mysqli_num_rows($AllDataRes5Pokot);
		   
		   $AllDataRes6Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroPokot= mysqli_num_rows($AllDataRes6Pokot);
		   
		   $AllDataRes7Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalPokot= mysqli_num_rows($AllDataRes7Pokot);
		   
		   $AllDataRes8Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryPokot= mysqli_num_rows($AllDataRes8Pokot);
		   
		   $AllDataRes9Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalPokot= mysqli_num_rows($AllDataRes9Pokot);
		   
		   $AllDataRes10Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalPokot= mysqli_num_rows($AllDataRes10Pokot);
		   
		   $AllDataRes11Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%connective%'");
		   $totalBloodPokot= mysqli_num_rows($AllDataRes11Pokot);
		   
		   $AllDataRes12Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalPokot= mysqli_num_rows($AllDataRes12Pokot);
		   
		   $AllDataRes13Pokot= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'West Pokot' AND response.conditions LIKE '%Skin%'");
		   $totalSkinPokot= mysqli_num_rows($AllDataRes13Pokot);
		   
	//F. North Eastern Region
    //1. Garissa
		   $AllDataRes1Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerGarissa= mysqli_num_rows($AllDataRes1Garissa);
		   
		   $AllDataRes2Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularGarissa= mysqli_num_rows($AllDataRes2Garissa);
		   
		   $AllDataRes3Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryGarissa= mysqli_num_rows($AllDataRes3Garissa);
		   
		   $AllDataRes4Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineGarissa= mysqli_num_rows($AllDataRes4Garissa);
		   
		   $AllDataRes5Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Eye%'");
		   $totalEyeGarissa= mysqli_num_rows($AllDataRes5Garissa);
		   
		   $AllDataRes6Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroGarissa= mysqli_num_rows($AllDataRes6Garissa);
		   
		   $AllDataRes7Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalGarissa= mysqli_num_rows($AllDataRes7Garissa);
		   
		   $AllDataRes8Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryGarissa= mysqli_num_rows($AllDataRes8Garissa);
		   
		   $AllDataRes9Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalGarissa= mysqli_num_rows($AllDataRes9Garissa);
		   
		   $AllDataRes10Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalGarissa= mysqli_num_rows($AllDataRes10Garissa);
		   
		   $AllDataRes11Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%connective%'");
		   $totalBloodGarissa= mysqli_num_rows($AllDataRes11Garissa);
		   
		   $AllDataRes12Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalGarissa= mysqli_num_rows($AllDataRes12Garissa);
		   
		   $AllDataRes13Garissa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Garissa' AND response.conditions LIKE '%Skin%'");
		   $totalSkinGarissa= mysqli_num_rows($AllDataRes13Garissa);
		   
	//2. Mandera
		   $AllDataRes1Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMandera= mysqli_num_rows($AllDataRes1Mandera);
		   
		   $AllDataRes2Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMandera= mysqli_num_rows($AllDataRes2Mandera);
		   
		   $AllDataRes3Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMandera= mysqli_num_rows($AllDataRes3Mandera);
		   
		   $AllDataRes4Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMandera= mysqli_num_rows($AllDataRes4Mandera);
		   
		   $AllDataRes5Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMandera= mysqli_num_rows($AllDataRes5Mandera);
		   
		   $AllDataRes6Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMandera= mysqli_num_rows($AllDataRes6Mandera);
		   
		   $AllDataRes7Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMandera= mysqli_num_rows($AllDataRes7Mandera);
		   
		   $AllDataRes8Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMandera= mysqli_num_rows($AllDataRes8Mandera);
		   
		   $AllDataRes9Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMandera= mysqli_num_rows($AllDataRes9Mandera);
		   
		   $AllDataRes10Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMandera= mysqli_num_rows($AllDataRes10Mandera);
		   
		   $AllDataRes11Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%connective%'");
		   $totalBloodMandera= mysqli_num_rows($AllDataRes11Mandera);
		   
		   $AllDataRes12Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMandera= mysqli_num_rows($AllDataRes12Mandera);
		   
		   $AllDataRes13Mandera= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mandera' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMandera= mysqli_num_rows($AllDataRes13Mandera);
		   
	//3. Wajir
		   $AllDataRes1Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerWajir= mysqli_num_rows($AllDataRes1Wajir);
		   
		   $AllDataRes2Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularWajir= mysqli_num_rows($AllDataRes2Wajir);
		   
		   $AllDataRes3Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryWajir= mysqli_num_rows($AllDataRes3Wajir);
		   
		   $AllDataRes4Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineWajir= mysqli_num_rows($AllDataRes4Wajir);
		   
		   $AllDataRes5Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Eye%'");
		   $totalEyeWajir= mysqli_num_rows($AllDataRes5Wajir);
		   
		   $AllDataRes6Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroWajir= mysqli_num_rows($AllDataRes6Wajir);
		   
		   $AllDataRes7Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalWajir= mysqli_num_rows($AllDataRes7Wajir);
		   
		   $AllDataRes8Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryWajir= mysqli_num_rows($AllDataRes8Wajir);
		   
		   $AllDataRes9Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalWajir= mysqli_num_rows($AllDataRes9Wajir);
		   
		   $AllDataRes10Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalWajir= mysqli_num_rows($AllDataRes10Wajir);
		   
		   $AllDataRes11Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%connective%'");
		   $totalBloodWajir= mysqli_num_rows($AllDataRes11Wajir);
		   
		   $AllDataRes12Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalWajir= mysqli_num_rows($AllDataRes12Wajir);
		   
		   $AllDataRes13Wajir= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Wajir' AND response.conditions LIKE '%Skin%'");
		   $totalSkinWajir= mysqli_num_rows($AllDataRes13Wajir);
		   
	//G. Coast Region
    //1. Kilifi
		   $AllDataRes1Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKilifi= mysqli_num_rows($AllDataRes1Kilifi);
		   
		   $AllDataRes2Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKilifi= mysqli_num_rows($AllDataRes2Kilifi);
		   
		   $AllDataRes3Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKilifi= mysqli_num_rows($AllDataRes3Kilifi);
		   
		   $AllDataRes4Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKilifi= mysqli_num_rows($AllDataRes4Kilifi);
		   
		   $AllDataRes5Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKilifi= mysqli_num_rows($AllDataRes5Kilifi);
		   
		   $AllDataRes6Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKilifi= mysqli_num_rows($AllDataRes6Kilifi);
		   
		   $AllDataRes7Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKilifi= mysqli_num_rows($AllDataRes7Kilifi);
		   
		   $AllDataRes8Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKilifi= mysqli_num_rows($AllDataRes8Kilifi);
		   
		   $AllDataRes9Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKilifi= mysqli_num_rows($AllDataRes9Kilifi);
		   
		   $AllDataRes10Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKilifi= mysqli_num_rows($AllDataRes10Kilifi);
		   
		   $AllDataRes11Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%connective%'");
		   $totalBloodKilifi= mysqli_num_rows($AllDataRes11Kilifi);
		   
		   $AllDataRes12Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKilifi= mysqli_num_rows($AllDataRes12Kilifi);
		   
		   $AllDataRes13Kilifi= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kilifi' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKilifi= mysqli_num_rows($AllDataRes13Kilifi);
		   
	//2. Kwale
		   $AllDataRes1Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerKwale= mysqli_num_rows($AllDataRes1Kwale);
		   
		   $AllDataRes2Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularKwale= mysqli_num_rows($AllDataRes2Kwale);
		   
		   $AllDataRes3Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryKwale= mysqli_num_rows($AllDataRes3Kwale);
		   
		   $AllDataRes4Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineKwale= mysqli_num_rows($AllDataRes4Kwale);
		   
		   $AllDataRes5Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Eye%'");
		   $totalEyeKwale= mysqli_num_rows($AllDataRes5Kwale);
		   
		   $AllDataRes6Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroKwale= mysqli_num_rows($AllDataRes6Kwale);
		   
		   $AllDataRes7Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalKwale= mysqli_num_rows($AllDataRes7Kwale);
		   
		   $AllDataRes8Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryKwale= mysqli_num_rows($AllDataRes8Kwale);
		   
		   $AllDataRes9Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalKwale= mysqli_num_rows($AllDataRes9Kwale);
		   
		   $AllDataRes10Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalKwale= mysqli_num_rows($AllDataRes10Kwale);
		   
		   $AllDataRes11Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%connective%'");
		   $totalBloodKwale= mysqli_num_rows($AllDataRes11Kwale);
		   
		   $AllDataRes12Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalKwale= mysqli_num_rows($AllDataRes12Kwale);
		   
		   $AllDataRes13Kwale= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kwale' AND response.conditions LIKE '%Skin%'");
		   $totalSkinKwale= mysqli_num_rows($AllDataRes13Kwale);
		   
	//3. Lamu
		   $AllDataRes1Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerLamu= mysqli_num_rows($AllDataRes1Lamu);
		   
		   $AllDataRes2Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularLamu= mysqli_num_rows($AllDataRes2Lamu);
		   
		   $AllDataRes3Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryLamu= mysqli_num_rows($AllDataRes3Lamu);
		   
		   $AllDataRes4Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineLamu= mysqli_num_rows($AllDataRes4Lamu);
		   
		   $AllDataRes5Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Eye%'");
		   $totalEyeLamu= mysqli_num_rows($AllDataRes5Lamu);
		   
		   $AllDataRes6Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroLamu= mysqli_num_rows($AllDataRes6Lamu);
		   
		   $AllDataRes7Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalLamu= mysqli_num_rows($AllDataRes7Lamu);
		   
		   $AllDataRes8Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryLamu= mysqli_num_rows($AllDataRes8Lamu);
		   
		   $AllDataRes9Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalLamu= mysqli_num_rows($AllDataRes9Lamu);
		   
		   $AllDataRes10Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalLamu= mysqli_num_rows($AllDataRes10Lamu);
		   
		   $AllDataRes11Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%connective%'");
		   $totalBloodLamu= mysqli_num_rows($AllDataRes11Lamu);
		   
		   $AllDataRes12Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalLamu= mysqli_num_rows($AllDataRes12Lamu);
		   
		   $AllDataRes13Lamu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Lamu' AND response.conditions LIKE '%Skin%'");
		   $totalSkinLamu= mysqli_num_rows($AllDataRes13Lamu);
		   
	//4. Mombasa
		   $AllDataRes1Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerMombasa= mysqli_num_rows($AllDataRes1Mombasa);
		   
		   $AllDataRes2Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularMombasa= mysqli_num_rows($AllDataRes2Mombasa);
		   
		   $AllDataRes3Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryMombasa= mysqli_num_rows($AllDataRes3Mombasa);
		   
		   $AllDataRes4Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineMombasa= mysqli_num_rows($AllDataRes4Mombasa);
		   
		   $AllDataRes5Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Eye%'");
		   $totalEyeMombasa= mysqli_num_rows($AllDataRes5Mombasa);
		   
		   $AllDataRes6Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroMombasa= mysqli_num_rows($AllDataRes6Mombasa);
		   
		   $AllDataRes7Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalMombasa= mysqli_num_rows($AllDataRes7Mombasa);
		   
		   $AllDataRes8Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryMombasa= mysqli_num_rows($AllDataRes8Mombasa);
		   
		   $AllDataRes9Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalMombasa= mysqli_num_rows($AllDataRes9Mombasa);
		   
		   $AllDataRes10Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalMombasa= mysqli_num_rows($AllDataRes10Mombasa);
		   
		   $AllDataRes11Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%connective%'");
		   $totalBloodMombasa= mysqli_num_rows($AllDataRes11Mombasa);
		   
		   $AllDataRes12Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalMombasa= mysqli_num_rows($AllDataRes12Mombasa);
		   
		   $AllDataRes13Mombasa= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Mombasa' AND response.conditions LIKE '%Skin%'");
		   $totalSkinMombasa= mysqli_num_rows($AllDataRes13Mombasa);
		   
	//5. Taita/Taveta
		   $AllDataRes1Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerTaita= mysqli_num_rows($AllDataRes1Taita);
		   
		   $AllDataRes2Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularTaita= mysqli_num_rows($AllDataRes2Taita);
		   
		   $AllDataRes3Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryTaita= mysqli_num_rows($AllDataRes3Taita);
		   
		   $AllDataRes4Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineTaita= mysqli_num_rows($AllDataRes4Taita);
		   
		   $AllDataRes5Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Eye%'");
		   $totalEyeTaita= mysqli_num_rows($AllDataRes5Taita);
		   
		   $AllDataRes6Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroTaita= mysqli_num_rows($AllDataRes6Taita);
		   
		   $AllDataRes7Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalTaita= mysqli_num_rows($AllDataRes7Taita);
		   
		   $AllDataRes8Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryTaita= mysqli_num_rows($AllDataRes8Taita);
		   
		   $AllDataRes9Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalTaita= mysqli_num_rows($AllDataRes9Taita);
		   
		   $AllDataRes10Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalTaita= mysqli_num_rows($AllDataRes10Taita);
		   
		   $AllDataRes11Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%connective%'");
		   $totalBloodTaita= mysqli_num_rows($AllDataRes11Taita);
		   
		   $AllDataRes12Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalTaita= mysqli_num_rows($AllDataRes12Taita);
		   
		   $AllDataRes13Taita= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Taita/Taveta' AND response.conditions LIKE '%Skin%'");
		   $totalSkinTaita= mysqli_num_rows($AllDataRes13Taita);
		   
	//6. Tana River
		   $AllDataRes1Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Cancer%'");
		   $totalCancerTana= mysqli_num_rows($AllDataRes1Tana);
		   
		   $AllDataRes2Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Cardiovascular%'");
		   $totalCardiovascularTana= mysqli_num_rows($AllDataRes2Tana);
		   
		   $AllDataRes3Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Respiratory%'");
		   $totalRespiratoryTana= mysqli_num_rows($AllDataRes3Tana);
		   
		   $AllDataRes4Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Endocrine%'");
		   $totalEndocrineTana= mysqli_num_rows($AllDataRes4Tana);
		   
		   $AllDataRes5Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Eye%'");
		   $totalEyeTana= mysqli_num_rows($AllDataRes5Tana);
		   
		   $AllDataRes6Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Gastro-intestinal%'");
		   $totalGastroTana= mysqli_num_rows($AllDataRes6Tana);
		   
		   $AllDataRes7Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Gynaecological%'");
		   $totalGynaecologicalTana= mysqli_num_rows($AllDataRes7Tana);
		   
		   $AllDataRes8Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Genitourinary%'");
		   $totalGenitourinaryTana= mysqli_num_rows($AllDataRes8Tana);
		   
		   $AllDataRes9Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Musculoskeletal%'");
		   $totalMusculoskeletalTana= mysqli_num_rows($AllDataRes9Tana);
		   
		   $AllDataRes10Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Neurological%'");
		   $totalNeurologicalTana= mysqli_num_rows($AllDataRes10Tana);
		   
		   $AllDataRes11Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%connective%'");
		   $totalBloodTana= mysqli_num_rows($AllDataRes11Tana);
		   
		   $AllDataRes12Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Congenital%'");
		   $totalCongenitalTana= mysqli_num_rows($AllDataRes12Tana);
		   
		   $AllDataRes13Tana= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tana River' AND response.conditions LIKE '%Skin%'");
		   $totalSkinTana= mysqli_num_rows($AllDataRes13Tana);
?>

