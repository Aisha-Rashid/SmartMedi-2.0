<?php

$file = $_FILES['file'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phptrials-smartmedi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert image into database
$sql = "INSERT INTO picture (image) VALUES (?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $file['tmp_name']);
mysqli_stmt_execute($stmt);

// Get the inserted image
$sql = "SELECT image FROM picture ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Return the image path
echo "files/" . $row['image'].base64_encode($row['image']);

mysqli_close($conn);

?>