<?php
require_once 'connection.php';

$suppid =  rand (11111,99999);
$billid =  rand (11111,99999);
$admissionid =  $_GET['id'];  
$department = 'Supplies';
$percent = '';
$medicalid = '';
$bedid = '';
$suppname =  $_GET['supplyname'];  
$qty =  $_GET['qty'];
$query = "INSERT into supply_used(SupplyID,AdmissionID,SupplyName,Quantity) 
VALUES('$suppid','$admissionid','$suppname','$qty')";
mysqli_query($conn,$query);
$sel = mysqli_query($conn,"SELECT Price FROM supplies WHERE SuppliesName = '$suppname' ");
$rate = '';
while($row = mysqli_fetch_assoc($sel))
{
    $rate = $row['Price'];
}
$sel2 = mysqli_query($conn,"SELECT beds.Percent
FROM beds 
JOIN patients
JOIN medical_details
WHERE patients.MedicalID = medical_details.MedicalID AND medical_details.BedID = beds.BedID AND patients.AdmissionID = '$admissionid'");
while($row = mysqli_fetch_assoc($sel2))
{
    $percent = $row['Percent'];
}
$rate = $rate * $percent;

$sel3 = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE admissionID = '$admissionid'");

while($row = mysqli_fetch_assoc($sel3))
{
    $medicalid = $row['MedicalID'];
}

$sel4 = mysqli_query($conn,"SELECT medical_details.BedID FROM medical_details JOIN patients WhERE medical_details.MedicalID = patients.MedicalID AND patients.AdmissionID = '$admissionid'");

while($row = mysqli_fetch_assoc($sel4))
{
    $bedid = $row['BedID'];
}
$rate2 = $rate * $qty;
$query2 = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill,Status,MedicalID,BedID) 
VALUES('$billid','$admissionid','$department','$suppid','$suppname','$rate2','Unpaid','$medicalid','$bedid')";
mysqli_query($conn,$query2);  
?>
