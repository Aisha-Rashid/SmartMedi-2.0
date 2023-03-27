<?php
if(isset($_POST['view'])){
$con = mysqli_connect('localhost', 'root', '', 'phptrials-smartmedi');
if($_POST['view'] != '')
{
   $update_query = "UPDATE hospitalreg SET status = 1 WHERE status=0";
   mysqli_query($con, $update_query);
}
$query = "SELECT * FROM hospitalreg ";
$result = mysqli_query($con, $query);
$output = "";
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["hospital"].'</strong><br />
  <small><em>'.$row["applied"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
}
$status_query = "SELECT * FROM hospitalreg WHERE status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>