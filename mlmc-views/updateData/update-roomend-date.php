<?php
require_once 'connection.php';

$id = $_GET['id'];
$date = date("Y-m-d");

$query= "UPDATE duration SET DischargeDate = '$date' WHERE AdmissionID = '$id'";

mysqli_query($con,$query);  
?>
