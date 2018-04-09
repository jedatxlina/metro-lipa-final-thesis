<?php
require_once 'connection.php';

$id = $_GET['id'];
$Fee = $_GET['fee'];

$query= "UPDATE attending_physicians SET Rate = '$Fee' WHERE AttendingID = '$id'";

mysqli_query($conn,$query);  
?>
