<?php
require_once 'connection.php';


$vitalsid = rand(111111, 999999);
$medicationid = rand(111111, 999999);
$diagnosisid = rand(111111, 999999);
$medicalid = $_GET['medid'];
$admissionid = $_GET['admissionid'];
$conditions = $_GET['conditions'];
$surgery = $_GET['surgery'];
$bp = $_GET['bp'];
$pr = $_GET['pr'];
$rr = $_GET['rr'];
$temp = $_GET['temp'];
$medications = $_GET['medications'];
$weight = $_GET['weight'];
$height = $_GET['height'];
$diagnosis = $_GET['diagnosis'];
$administered = $_GET['administered'];
$admitting = $_GET['admitting'];
$classification = $_GET['classification'];

$query = "INSERT into medical_details(MedicalID,AdmissionID,AdmittingID,VitalsID,MedicationID,DiagnosisID,Conditions,CurrentMedication,PreviousSurgeries,Weight,Height) 
VALUES('$medicalid','$admissionid','$admitting','$vitalsid','$medicationid','$diagnosisid','$conditions','$medications','$surgery','$weight','$height')";

mysqli_query($con,$query);  

$query = "INSERT into vitals(VitalsID,AdmissionID,BP,PR,RR,Temperature,DateTimeChecked) 
VALUES('$vitalsid','$admissionid','$bp','$pr','$rr','$temp',NOW())";

mysqli_query($con,$query);

// session_start();
// $_SESSION['data'] = $admissionid;
// include 'qr-generator/index.php';
?>