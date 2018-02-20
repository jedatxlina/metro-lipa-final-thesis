<?php 
require_once 'connection.php';
$at = $_GET['at'];
$param = $_GET['param'];
$medicationid = $_GET['medicationid'];
$admissionid = $_GET['admissionid'];
$physicianid = $_GET['physicianid'];
$administered = explode(',',$_GET['administered']);

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");

foreach($administered AS $value) {

$query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";

mysqli_query($con,$query);
}

header("Location:../add-patient-final.php?at=$at&medicationid=$medicationid&admissionid=$admissionid&param=$param");