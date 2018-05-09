<?php
require_once 'connection.php';
date_default_timezone_set('Asia/Singapore');

$id =  rand (11111,99999);

$admissionid =  $_GET['admissionid'];  
$payment =  $_GET['payment']; 
$ornumber = $_GET['ornumber'];

$date = date("Y-m-d h:i:sa");

$sel = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID = '$admissionid'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $adno = $row['AdmissionNo'];
}

$query = "INSERT into adv_payment(PaymentID,AdmissionID,Amount,Status,DateTimePaid,AdmissionNo,ORnum) 
VALUES('$id','$admissionid','$payment','Paid','$date','$adno','$ornumber')";
mysqli_query($conn,$query);  
?>
