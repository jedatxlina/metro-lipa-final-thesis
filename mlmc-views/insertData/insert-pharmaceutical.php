<?php
require_once 'connection.php';

$pharmaid = $_GET['pharmaid'];
$pharmaname = $_GET['pharmaname'];
$unit = $_GET['unit'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$reorder = $_GET['reorder'];

$query= "INSERT into pharmaceuticals(MedicineID,MedicineName,Unit,Price,Quantity,ReOrder) 
VALUES ('$pharmaid','$pharmaname','$unit','$price','$quantity','$reorder')";

mysqli_query($conn,$query);  
?>
