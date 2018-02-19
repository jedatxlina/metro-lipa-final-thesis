<?php
require_once 'connection.php';

$pharmaid = $_GET['pharmaid'];
$pharmaname = $_GET['pharmaname'];
$unit = $_GET['unit'];
$price = $_GET['price'];

$query= "INSERT into pharmaceuticals(MedicineID,MedicineName,Unit,Price) 
VALUES ('$pharmaid','$pharmaname','$unit','$price')";

mysqli_query($con,$query);  
?>
