<?php
require_once 'connection.php';

$at = $_GET['at'];
$id = $_GET['id'];
$physicianid = $_GET['physicianid'];
$newconditionid =  rand(111111, 999999);     

$query = "UPDATE patients SET AdmissionType = 'Emergency' WHERE AdmissionID = '$id'";

mysqli_query($con,$query);  

$sel = mysqli_query($con,"SELECT AttendingID FROM attending_physicians WHERE AdmissionID = '$id' LIMIT 1");

while ($row = mysqli_fetch_assoc($sel)) {
    $attendingid = $row['AttendingID'];
}   

$query = "INSERT into attending_physicians(AttendingID,PhysicianID,AdmissionID) 
VALUES('$attendingid','$physicianid','$id')";

mysqli_query($con,$query);


header("Location:../emergency.php?at=$at");
