<?php
require_once 'connection.php';

$id =  $_GET['id'];

$sql = "UPDATE patients SET AdmissionType='Inpatient' WHERE AdmissionID='$id'";

mysqli_query($conn,$sql);  

$query = "UPDATE patients SET ArrivalDateTime = NOW() WHERE AdmissionID ='$id'";

mysqli_query($conn,$query);
 
?>
