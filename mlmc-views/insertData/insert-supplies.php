<?php
require_once 'connection.php';

$supplyid = $_GET['supplyid'];
$supplyname = $_GET['supplyname'];
$price = $_GET['price'];

$query= "INSERT into supplies(SuppliesID,SuppliesName,Price) VALUES ('$supplyid','$supplyname','$price')";

mysqli_query($conn,$query);  
?>
