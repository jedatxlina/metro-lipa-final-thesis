<?php
require_once 'connection.php';


$id =  rand (11111,99999);
$admissionid =  $_GET['admissionid'];  
$payment =  $_GET['payment']; 
$date = date("Y-m-d");
$query = "INSERT into advance_payments(PaymentID,AdmissionID,Adv_Payment,DatePaid) 
VALUES('$id','$admissionid','$payment','$date')";
mysqli_query($conn,$query);  
?>
