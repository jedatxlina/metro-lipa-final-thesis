<?php
require_once 'connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$admissionid = addslashes($request->admissionid);
$patientname = addslashes($request->patientname);
$bloodpressure = addslashes($request->bloodpressure);
$temperature = addslashes($request->temperature);
$respiratoryrate = addslashes($request->respiratoryrate);
$pulserate = addslashes($request->pulserate);

$query = "INSERT into patient_vitals(PatientID,PatientName,BloodPressure,RespiRate,Temperature,PulseRate,DateTaken) 
VALUES('$admissionid','$patientname','$bloodpressure','$respiratoryrate','$temperature','$pulserate',NOW())";

mysqli_query($con,$query);  

?>
