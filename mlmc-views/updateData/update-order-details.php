<?php
require_once 'connection.php';

$id = $_GET['id'];

$query= "UPDATE orders SET Status = 'Accepted' WHERE OrderID = '$id'";

mysqli_query($conn,$query);  
?>
