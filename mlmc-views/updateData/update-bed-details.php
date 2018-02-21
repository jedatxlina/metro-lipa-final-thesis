<?php
require_once 'connection.php';

$id = $_GET['id'];
$Status = $_GET['status'];

$query= "UPDATE beds SET Status = '$Status' WHERE BedID = '$id'";

mysqli_query($con,$query);  
?>
