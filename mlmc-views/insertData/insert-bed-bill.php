<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissno =  $_GET['admissno']; 
$admissionid =  $_GET['admissionid']; 
$total =  $_GET['total'];
$date = date("Y-m-d h:i:sa");

$query2 = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
VALUES('$billid','$admissionid','$admissno','$date','0000/00/00 00:00:00','ER','$total')";
mysqli_query($conn,$query2);  
?>
