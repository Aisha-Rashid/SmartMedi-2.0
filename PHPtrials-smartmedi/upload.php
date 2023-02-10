<?php

include('server.php');

//if (isset($_SESSION['IDNo'])) :


		//$unique = $_SESSION['IDNo'];

  if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
	$unique = $_SESSION['IDNo'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($file_ext, $allowed)) {
      if($file_error === 0) {
        if($file_size <= 5000000) {
          $file_name_new = uniqid('', true) . '.' . $file_ext;
          $file_destination = 'files/' . $file_name_new;

          if(move_uploaded_file($file_tmp, $file_destination)) {
            echo 'Image uploaded successfully';
			
			$conn = mysqli_connect('localhost','root','','phptrials-smartmedi');
			
			
			$sql = "update patients set pic='$file' WHERE IDNo='$unique'";
			
			if($conn->query($sql) === TRUE){
			// Display a success message
				echo 'File uploaded successfully';
			} else {
				// Display an error message
				echo 'Error: No file was uploaded';
				die(mysqli_error($conn));
			}
		  }
          }
        }
      }
    }
 //endif 
?>