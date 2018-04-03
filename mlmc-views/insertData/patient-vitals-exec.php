<?php
require_once 'connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$id =  rand (11111,99999);
$admissionid = addslashes($request->admissionid);
$nurid = addslashes($request->nurid);
$patientname = addslashes($request->patientname);
$bloodpressure = addslashes($request->bloodpressure);
$bloodpressuredia = addslashes($request->bloodpressuredia);
$temperature = addslashes($request->temperature);
$respiratoryrate = addslashes($request->respiratoryrate);
$pulserate = addslashes($request->pulserate);

$query = "INSERT into vitals(VitalsID,AdmissionID,UserID,BP,BPD,PR,RR,Temperature,DateTimeChecked) 
VALUES('$id','$admissionid','$nurid','$bloodpressure','$bloodpressuredia','$pulserate','$respiratoryrate','$temperature',NOW())";

mysqli_query($conn,$query);
?>
