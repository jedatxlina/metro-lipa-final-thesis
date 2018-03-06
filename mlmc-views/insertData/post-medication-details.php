<?php
require_once 'connection.php';
$medtimelineid = rand (11111,99999);
$at = $_GET['at'];
$admissionid = $_GET['id'];
$medicationid = $_GET['medicationid'];
$medicineid = $_GET['medid'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");

$query= "INSERT into medication_timeline(MedTimelineID,MedicationID,AdmissionID,MedicineID,NurseID,DateIntake,TimeIntake) 
VALUES ('$medtimelineid','$medicationid','$admissionid','$medicineid','$at','$date','$time')";


mysqli_query($con,$query);  

header("Location:../nurse-patient.php?at=$at");

