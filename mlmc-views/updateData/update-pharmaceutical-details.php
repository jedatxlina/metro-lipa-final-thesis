<?php
require_once 'connection.php';

$pharmaid = $_GET['pharmaid'];
$pharmaname = $_GET['pharmaname'];
$unit = $_GET['unit'];
$price =$_GET['price'];

$query = "UPDATE pharmaceuticals SET MedicineID = '$pharmaid' , MedicineName = '$pharmaname' , Unit = '$unit' , Price = '$price' WHERE MedicineID = '$pharmaid'";

mysqli_query($con,$query);  
?>
