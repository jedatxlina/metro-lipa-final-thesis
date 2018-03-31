<?php
require_once 'connection.php';


$requestid = $_GET['requestid'];

$query= "UPDATE laboratory_req SET Status = 'Cleared' WHERE RequestID = '$requestid'";

mysqli_query($conn,$query);  
?>
