<?php
extract($_REQUEST);
$conn = mysqli_connect('localhost','root','','phptrials-smartmedi');
if(!$conn){
    die("Cannot connect to the database. Error: ".mysqli_error($conn));
}
//include('signin.php');

$sql=mysqli_query($conn,"select * from fileupload where name='$del'");
$row=mysqli_fetch_array($sql);

unlink("files/$row[name]");

mysqli_query($conn,"delete from fileupload where name='$del'");

header("Location:attachments.php");

?>