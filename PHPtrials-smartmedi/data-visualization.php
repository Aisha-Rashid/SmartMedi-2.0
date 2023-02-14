<?php
//Patient vs gender pie chart
   $AllDataRes1 = mysqli_query($db, "select * from patients where gender = 'Female'");
   $totalFemales = mysqli_num_rows($AllDataRes1);
   
   $AllDataRes2 = mysqli_query($db, "select * from patients where gender = 'Male'");
   $totalMales = mysqli_num_rows($AllDataRes2);
   
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
   
   
   //Hospitals per county Bar graph
   $nairobi_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county='Nairobi City'");
   $total_nairobi_hosp = mysqli_num_rows($nairobi_hosp_query);
   
   $central_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Nyandarua', 'Nyeri', 'Kirinyaga', 'Murang''a', 'Kiambu')");
   $total_central_hosp = mysqli_num_rows($central_hosp_query);
   
   $eastern_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Marsabit', 'Isiolo', 'Meru', 'Tharaka-Nithi', 'Embu', 'Kitui', 'Machakos', 'Makueni')");
   $total_eastern_hosp = mysqli_num_rows($eastern_hosp_query);
   
   $western_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Kakamega', 'Vihiga', 'Busia', 'Bungoma')");
   $total_western_hosp = mysqli_num_rows($western_hosp_query);
   
   $nyanza_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Kisumu', 'Siaya', 'Homa Bay', 'Migori', 'Nyamira', 'Kisii')");
   $total_nyanza_hosp = mysqli_num_rows($nyanza_hosp_query);
   
   $rift_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Turkana', 'West Pokot', 'Samburu', 'Trans Nzoia', 'Uasin Gishu', 'Elgeyo/Marakwet', 'Nandi',
   'Baringo', 'Laikipia', 'Nakuru', 'Narok', 'Kajiado', 'Kericho', 'Bomet')");
   $total_rift_hosp = mysqli_num_rows($rift_hosp_query);
   
   $northern_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Garissa', 'Wajir', 'Mandera')");
   $total_northern_hosp = mysqli_num_rows($northern_hosp_query);
   
   $coast_hosp_query = mysqli_query($db, "SELECT hospitalname FROM hospitals WHERE county IN ('Mombasa', 'Kwale', 'Kilifi', 'Tana River', 'Lamu', 'Taita/Taveta')");
   $total_coast_hosp = mysqli_num_rows($coast_hosp_query);
   
   
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
		   
		   $AllDataRes13Kiambu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kiambu'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Kiri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kirinyaga'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Muranga= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Murang''a'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Nyan= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyandarua'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Nyeri= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Nyeri'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Embu= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Embu'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Isiolo= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Isiolo'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Kitui= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Kitui'AND response.conditions LIKE '%Skin%'");
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
		   
		   $AllDataRes13Machakos= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Machakos'AND response.conditions LIKE '%Skin%'");
		   $totalSkinMachakos= mysqli_num_rows($AllDataRes13Machakos);
		   
	//4. Makueni
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
		   
		   $AllDataRes13Makueni= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Makueni'AND response.conditions LIKE '%Skin%'");
		   $totalSkinMakueni= mysqli_num_rows($AllDataRes13Makueni);
		   
	//5. Marsabit
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
		   
		   $AllDataRes13Marsabit= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Marsabit'AND response.conditions LIKE '%Skin%'");
		   $totalSkinMarsabit= mysqli_num_rows($AllDataRes13Marsabit);
		   
	//6. Meru
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
		   
		   $AllDataRes13Meru= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Meru'AND response.conditions LIKE '%Skin%'");
		   $totalSkinMeru= mysqli_num_rows($AllDataRes13Meru);
		   
	//7. Tharaka-Nithi
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
		   
		   $AllDataRes13Tharaka= mysqli_query($db, "SELECT patients.IDNo, patients.county, response.IDNo, response.conditions FROM `patients`,`response`  WHERE patients.IDNo=response.IDNo AND patients.county = 'Tharaka-Nithi'AND response.conditions LIKE '%Skin%'");
		   $totalSkinTharaka= mysqli_num_rows($AllDataRes13Tharaka);
?>

