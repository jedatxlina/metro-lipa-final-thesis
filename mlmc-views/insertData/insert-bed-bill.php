<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissionid =  $_GET['admissionid'];  
$department =  $_GET['department'];  
$total =  $_GET['total'];
$des =  $_GET['description'];

$item = '123123123';

$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill, Stauts) 
VALUES('$billid','$admissionid','$department','$item','$des','$total','Unpaid')";
mysqli_query($conn,$query);  
?>
