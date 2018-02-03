<?php
require_once 'connection.php';

$id = $_GET['id'];
$RoomType = $_GET['RoomType'];
$rate = $_GET['rate'];
$floor = $_GET['floor'];
$room = $_GET['room'];

$query= "UPDATE beds SET RoomType = '$RoomType', Rate = '$rate', Floor = '$floor', Room = '$room' WHERE Room = '$room'";

mysqli_query($con,$query);  
?>
