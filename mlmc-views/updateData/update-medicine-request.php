<?php
require_once 'connection.php';


$medid = $_GET['medid'];
$qty = $_GET['quantity'];
$dosage = $_GET['dosage'];
$medname = $_GET['medname'];
$requestid = $_GET['requestid'];
$status = $_GET['status'];

$status = 'Claimed';
$query= "UPDATE medicine_req SET Status = '$status' WHERE MedRequestID = '$requestid'";


mysqli_query($conn,$query);  

$query2 =  "UPDATE medication SET QuantityOnHand = '$qty' WHERE MedicationID = '$medid' AND MedicineName = '$medname' AND Dosage = '$dosage'";
mysqli_query($conn,$query2);  
?>
