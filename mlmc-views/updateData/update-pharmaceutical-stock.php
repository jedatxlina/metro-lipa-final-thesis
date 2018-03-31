<?php
require_once 'connection.php';

$pharmaid = $_GET['pharmaid'];
$quantity = $_GET['qty'];

$query = "UPDATE pharmaceuticals SET Quantity = Quantity + '$quantity' WHERE MedicineID = '$pharmaid'";

mysqli_query($conn,$query);  
?>
