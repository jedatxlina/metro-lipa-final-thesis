<?php
require_once 'connection.php';


$vitalsid = rand(111111, 999999);
$medicationid = rand(111111, 999999);
$diagnosisid = rand(111111, 999999);
$attendingid = rand(111111, 999999);
$medicalid = $_GET['medid'];
$admissionid = $_GET['admissionid'];
$conditions = explode(',',$_GET['conditions']);
$surgery = $_GET['surgery'];
$bp = $_GET['bp'];
$pr = $_GET['pr'];
$rr = $_GET['rr'];
$temp = $_GET['temp'];
$medications = explode(',',$_GET['medications']);
$weight = $_GET['weight'];  
$height = $_GET['height'];
$diagnosis = $_GET['diagnosis'];
$administered = explode(',',$_GET['administered']);
$attendingphysicianid = $_GET['attending'];
$classification = $_GET['classification'];
$discount = '0.00';

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");

$query = "INSERT into medical_details(MedicalID,AdmissionID,AttendingID,ArrivalDate,ArrivalTime,VitalsID,MedicationID,DiagnosisID,PreviousSurgeries,Weight,Height,Class) 
VALUES('$medicalid','$admissionid','$attendingid','$date','$time','$vitalsid','$medicationid','$diagnosisid','$surgery','$weight','$height','$classification')";

mysqli_query($con,$query);  

$query = "INSERT into vitals(VitalsID,AdmissionID,BP,PR,RR,Temperature,DateChecked,TimeChecked) 
VALUES('$vitalsid','$admissionid','$bp','$pr','$rr','$temp','$date','$time')";

mysqli_query($con,$query);

$query = "INSERT into attending_physicians(AttendingID,PhysicianID,AdmissionID,DiagnosisID,Discount) 
VALUES('$attendingid','$attendingphysicianid','$admissionid','$diagnosisid','$discount')";

mysqli_query($con,$query);

$query = "INSERT into diagnosis(DiagnosisID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,MedicationID) 
VALUES('$diagnosisid','$attendingid','$diagnosis','$date','$time','$medicationid')";

mysqli_query($con,$query);


foreach($administered AS $value) {

$query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered) 
VALUES('123123','$admissionid','$value','$date','$time')";
mysqli_query($con,$query);

}

?>
