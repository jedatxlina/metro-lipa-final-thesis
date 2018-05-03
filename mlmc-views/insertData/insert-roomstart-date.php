<?php

require_once 'connection.php';

date_default_timezone_set('Asia/Singapore');

$id = $_GET["id"];

$sel = mysqli_query($conn,"SELECT patients.AdmissionNo,medical_details.BedID FROM patients JOIN medical_details WHERE patients.AdmissionType = 'Pending' AND patients.AdmissionID = '$id' AND patients.MedicalID = medical_details.MedicalID");

while ($row = mysqli_fetch_assoc($sel)) {
    $bed = $row['BedID'];
    $admissiono = $row['AdmissionNo'];
}

$billid2 =  rand (11111,99999);

$date = date("Y-m-d h:i:sa");

$query5 = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
VALUES('$billid2','$id','$admissiono','$date','0000-00-00 00:00:00','$bed','0000')";

mysqli_query($conn,$query5);

?>

