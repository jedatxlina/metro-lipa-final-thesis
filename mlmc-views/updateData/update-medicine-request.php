<?php
require_once 'connection.php';


$requestid = $_GET['requestid'];
$status = $_GET['status'];
if ($status == 'Ready')
$status = 'Claimed';
else if ($status == 'Pending')
$status = 'Ready';
$query= "UPDATE medicine_req SET Status = '$status' WHERE MedRequestID = '$requestid'";

mysqli_query($conn,$query);  
?>
