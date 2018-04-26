<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissionid =  $_GET['id'];  
$total =  $_GET['total'];

$item = '123123123';

$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill,Status) 
VALUES('$billid','$admissionid','Inpatient','1000','Inpatient Bill','$total','Paid')";
mysqli_query($conn,$query);  
?>
