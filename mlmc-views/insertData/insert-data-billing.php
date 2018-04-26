<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissionid =  $_GET['id'];  
$total =  $_GET['total'];
$medid;
$bedid;
$item = '123123123';
$sel = mysqli_query($conn,"SELECT a.MedicalID, b. BedID, a.AdmissionType FROM patients a, medical_details b WHERE a.AdmissionID = '$admissionid' AND a.MedicalID = b.MedicalID");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $medid = $row['MedicalID'];
    $bedid = $row['BedID'];
    $desc = $row['AdmissionType'];
}
$description = $desc.' Bill';
$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill, Status, MedicalID, BedID) 
VALUES('$billid','$admissionid','Inpatient','1000','$description','$total','Paid','$medid','$bedid')";
mysqli_query($conn,$query);  
?>
