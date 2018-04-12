<?php
require_once 'connection.php';

$suppid =  rand (11111,99999);
$admissionid =  $_GET['id'];  
$suppname =  $_GET['supplyname'];  
$qty =  $_GET['qty'];
$query = "INSERT into supply_used(SupplyID,AdmissionID,SupplyName,Quantity) 
VALUES('$suppid','$admissionid','$suppname','$qty')";
mysqli_query($conn,$query);  
?>
