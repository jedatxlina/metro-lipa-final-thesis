<?php
require_once 'connection.php';

$id = $_GET['id'];
$specialization = $_GET['specialization'];

$query= "UPDATE specialization SET SpecializationName = '$specialization' WHERE SpecializationID = '$id'";

mysqli_query($conn,$query);  
?>
