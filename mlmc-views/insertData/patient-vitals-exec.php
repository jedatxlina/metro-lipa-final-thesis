<?php
require_once 'connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$admissionid = addslashes($request->admissionid);
$patientname = addslashes($request->patientname);
$bloodpressure = addslashes($request->bloodpressure);
$bloodpressuredia = addslashes($request->bloodpressuredia);
$temperature = addslashes($request->temperature);
$respiratoryrate = addslashes($request->respiratoryrate);
$pulserate = addslashes($request->pulserate);

$query = "INSERT into vitals(VitalsID,AdmissionID,BP,BPD,PR,RR,Temperature,DateTimeChecked) 
VALUES('588895','$admissionid','$bloodpressure','$bloodpressuredia','$pulserate','$respiratoryrate','$temperature',NOW())";

mysqli_query($conn,$query);  

?>
