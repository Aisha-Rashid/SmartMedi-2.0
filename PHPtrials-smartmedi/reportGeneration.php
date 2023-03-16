<?php

$hospitalQuery = "SELECT * FROM `hospitals`";
$hospitalRes = mysqli_query($db, $hospitalQuery);

$doctorQuery = "SELECT * FROM `doctors` ORDER BY hospital";
$doctorRes = mysqli_query($db, $doctorQuery);





?>