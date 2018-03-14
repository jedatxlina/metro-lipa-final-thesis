<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissionid =  $_GET['admissionid']; 
$laboratoryid = $_GET['laboratoryid']; 
$des =  $_GET['description'];
$department = 'Laboratory';

$sel = mysqli_query($con,"SELECT Rate FROM laboratories WHERE LaboratoryID = '$laboratoryid' ");

$rate = '';

while($row = mysqli_fetch_assoc($sel))
{
    $rate = $row['Rate'];
}

$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill) 
VALUES('$billid','$admissionid','$department','$laboratoryid','$des','$rate')";
mysqli_query($con,$query);  
?>
