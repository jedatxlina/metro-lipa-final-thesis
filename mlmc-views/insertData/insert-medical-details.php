<?php
require_once 'connection.php';


$vitalsid =  $_GET['vitalsid'];  
$medicationid =  $_GET['medicationid'];  
$attendingid =  $_GET['attendingid'];  
$admissionid =  $_GET['admissionid'];  
$diagnosisid =  $_GET['diagnosisid'];  
$medicalid = $_GET['medid'];
$condition = $_GET['condition'];

$surgery = $_GET['surgery'];

$variable = json_decode($_GET['bp'], true);
$cnt = count($variable);

foreach($variable as $key => $val) {
    if($key == 0){
        $sys = $val;
    }else{
        $dia = $val;
    }
}

$pr = $_GET['pr'];
$rr = $_GET['rr'];
$temp = $_GET['temp'];

$weight = $_GET['weight'];  
$height = $_GET['height'];
$diagnosis = $_GET['diagnosis'];

$attendingphysicianid = $_GET['attending'];
$discount = '0.00';

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");
$datetime = date("Y-m-d h:i A");

$query = "INSERT into medical_details(MedicalID,AdmissionID,AttendingID,ArrivalDate,ArrivalTime,VitalsID,MedicationID,PreviousSurgeries,Weight,Height) 
VALUES('$medicalid','$admissionid','$attendingid','$date','$time','$vitalsid','$medicationid','$surgery','$weight','$height')";

mysqli_query($conn,$query);  

$query = "INSERT into vitals(VitalsID,AdmissionID,BP,BPD,PR,RR,Temperature,DateTimeChecked) 
VALUES('$vitalsid','$admissionid','$sys','$dia','$pr','$rr','$temp','$datetime')";

mysqli_query($conn,$query);

$query = "INSERT into attending_physicians(AttendingID,PhysicianID,AdmissionID,DiagnosisID,Discount) 
VALUES('$attendingid','$attendingphysicianid','$admissionid','$diagnosisid','$discount')";

mysqli_query($conn,$query);

$query = "INSERT into medical_conditions(MedicalID,Conditions) 
VALUES('$medicalid','$condition')";

mysqli_query($conn,$query);


