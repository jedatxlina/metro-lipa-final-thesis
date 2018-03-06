<?php
require_once 'connection.php';

$billingid =  rand (11111,99999);
$at = $_GET['at'];
$admissionid = $_GET['admissionid'];
$opdroomno = $_GET['opdroomno'];
$totalfee = $_GET['totalfee'];

$query= "INSERT into billing_opd(BillingOpdID,AdmissionID,OpdRoom,TotalBill) VALUES ('$billingid','$admissionid','$opdroomno','$totalfee')";

mysqli_query($con,$query);  