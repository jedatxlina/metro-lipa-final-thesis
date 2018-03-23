<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissionid =  $_GET['admissionid']; 
$medicineid = $_GET['medicineid']; 
$desc =  $_GET['medicinename'];
$department = 'Pharmacy';

$sel = mysqli_query($con,"SELECT Price FROM Pharmaceuticals WHERE MedicineID = '$medicineid' ");

$rate = '';

while($row = mysqli_fetch_assoc($sel))
{
    $rate = $row['Price'];
}

$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill) 
VALUES('$billid','$admissionid','$department','$medicineid','$des','$rate')";
mysqli_query($con,$query);  
?>
