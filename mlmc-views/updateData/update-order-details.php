<?php
require_once 'connection.php';

$id = $_GET['id'];

$query= "UPDATE orders SET Status = 'Accepted' WHERE AdmissionID = '$id'";

mysqli_query($con,$query);  
?>
