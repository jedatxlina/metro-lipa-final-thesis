<?php
require_once 'connection.php';
date_default_timezone_set('Asia/Singapore');
$id = $_GET["id"];
$bed;
$admissno;
$sel = mysqli_query($conn,"SELECT a.AdmissionNo, b.BedID FROM patients a, medical_details b WHERE a.AdmissionType = 'Inpatient' AND b.AdmissionID = '$id' AND a.AdmissionID = '$id' AND a.MedicalID = b.MedicalID");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $bed = $row['BedID'];
    $admissno = $row['AdmissionNo'];
}
$billid2 =  rand (11111,99999);
$date = date("Y-m-d h:i:sa");
$query5 = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
VALUES('$billid2','$id','$admissno','$date','0000-00-00 00:00:00','$bedno','0000')";
mysqli_query($conn,$query5);
?>
