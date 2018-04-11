<?php
require_once 'connection.php';


$id =  rand (11111,99999);
$admissionid =  $_GET['admissionid'];  
$payment =  $_GET['payment']; 
$date = date("Y-m-d");
$query = "INSERT into adv_payment(PaymentID,AdmissionID,Amount,Status,DateTimePaid) 
VALUES('$id','$admissionid','$payment','Paid','$date')";
mysqli_query($conn,$query);  
?>
