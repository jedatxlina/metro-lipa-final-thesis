<?php
require_once 'connection.php';
$medtimelineid = rand (11111,99999);

$at = $_GET['at'];
$admissionid = $_GET['id'];
$medicationid = $_GET['medicationid'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");

$sel = mysqli_query($con,"SELECT b.*,c.DosingID,c.TimeInterval FROM medication b, dosing_time c WHERE b.AdmissionID = '$admissionid' AND b.DosingID = c.DosingID AND b.MedicationID = '$medicationid'");

while($row = mysqli_fetch_assoc($sel))
{
    $medicineid = $row['MedicineID'];
    $dateadministered = $row['DateAdministered'];
    $timeadminitered = $row['TimeAdministered'];
    $datestart = $row['DateStart'];
    $timestart = $row['TimeStart'];
    $timeinterval = $row['TimeInterval'];
}

if($datestart == '' && $timestart == ''){
  
$query= "UPDATE medication SET DateStart = '$date', TimeStart = '$time' WHERE MedicationID = '$medicationid'";

mysqli_query($con,$query);    
}

$nextintake = date("h:i A", strtotime("+{$timeinterval} hours"));

$query1= "INSERT into medication_timeline(MedTimelineID,MedicationID,AdmissionID,MedicineID,NurseID,DateIntake,TimeIntake,NextTimeIntake) 
VALUES ('$medtimelineid','$medicationid','$admissionid','$medicineid','$at','$date','$time','$nextintake')";


mysqli_query($con,$query1);  

header("Location:../nurse-patient.php?at=$at");

