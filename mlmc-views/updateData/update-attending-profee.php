<?php
require_once 'connection.php';

$id = $_GET['id'];
$Fee = $_GET['fee'];
$phyid = $_GET['phyid'];
$query= "UPDATE attending_physicians SET Rate = '$Fee' WHERE AttendingID = '$phyid' AND PhysicianID = '$id'";

mysqli_query($conn,$query);  
?>
