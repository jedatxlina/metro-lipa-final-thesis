<?php
require_once 'connection.php';

$suppid = $_GET['supplyid'];
$price =$_GET['price'];

$query = "UPDATE supplies SET Price = '$price' WHERE SuppliesID = '$suppid'";

mysqli_query($conn,$query);  
?>
