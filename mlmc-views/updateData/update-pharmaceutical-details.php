<?php
require_once 'connection.php';

$pharmaid = $_GET['pharmaid'];
$pharmaname = $_GET['pharmaname'];
$unit = $_GET['unit'];
$price =$_GET['price'];
$quantity = $_GET['quantity'];
$reorder = $_GET['reorder'];

$query = "UPDATE pharmaceuticals SET MedicineID = '$pharmaid' , MedicineName = '$pharmaname' , Unit = '$unit' , Price = '$price', Quantity = '$quantity' , ReOrder = '$reorder' WHERE MedicineID = '$pharmaid'";

mysqli_query($con,$query);  
?>
