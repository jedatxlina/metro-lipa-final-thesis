<?php
require_once 'connection.php';

$id =  $_GET['AdmissionID'];
$bedid = $_GET['BedID']; 

$sql = "UPDATE patients SET AdmissionType='Pending' WHERE AdmissionID='$id'";

mysqli_query($conn,$sql);  

$sql2 = "UPDATE beds SET Status='Occupied' WHERE BedID='$bedid'";

mysqli_query($conn,$sql2); 

$sql3 = "UPDATE medical_details SET BedID='$bedid' WHERE AdmissionID='$id'";

mysqli_query($conn,$sql3); 
 
?>
