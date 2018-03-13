<?php
require_once 'connection.php';

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$at = $_GET['at'];
$admissionid = $_GET['id'];
$medreqid = rand(111111, 999999);

$sel = mysqli_query($con,"SELECT MedicineID FROM medication WHERE AdmissionID = '$admissionid'");


while($row = mysqli_fetch_assoc($sel)){
    $medicineid = $row['MedicineID'];

    $query2 = "INSERT into medicine_req(MedRequestID,MedicineID,AdmissionID,Status,DateRequested,TimeRequested) VALUES
    ('$medreqid','$medicineid','$admissionid','Pending','$date','$time')";
    
    mysqli_query($con,$query2);  

    $medreqid = rand(111111, 999999);
}


