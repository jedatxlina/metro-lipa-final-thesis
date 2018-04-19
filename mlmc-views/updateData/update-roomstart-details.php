<?php
require_once 'connection.php';
$admissno =  $_GET['admissno']; 
$id =  $_GET['id']; 
$bedno = $_GET['bedno'];
$date = date("Y-m-d h:i:sa");
$billid2 =  rand (11111,99999);
$query5 = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
VALUES('$billid2','$id','$admissno','$date','','$bedno','0000')";
mysqli_query($conn,$query5);
?>
