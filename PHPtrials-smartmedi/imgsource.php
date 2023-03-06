<?php 
// include database connection 
$conn=new PDO('mysql:host=localhost; dbname=phptrials-smartmedi', 'root', '') or die(mysqli_error($conn));
extract($_REQUEST);
 
// select the image 
$query = "select * from patients WHERE IDNo ='$image'"; 
$stmt = $con->prepare( $query );
 
// bind the id of the image you want to select
$stmt->bindParam($image, $_GET['IDNo']);
$stmt->execute();
 
// to verify if a record is found
$num = $stmt->rowCount();
 
if( $num ){
    // if found
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // specify header with content type,
    // you can do header("Content-type: image/jpg"); for jpg,
    // header("Content-type: image/gif"); for gif, etc.
    header("Content-type: image/png");
    
    //display the image data
    print $row['pic'];
    exit;
}else{
    //if no image found with the given id,
    //load/query your default image here
}
?>