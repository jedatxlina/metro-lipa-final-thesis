<?php
require_once 'connection.php';

$discount = $_GET['discount'];


$sql = "UPDATE discounts SET Discount='$discount' WHERE DiscDesc='Senior Citizen'";

mysqli_query($conn,$sql);  

?>
