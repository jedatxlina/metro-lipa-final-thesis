<?php
require_once 'connection.php';

$specialization = $_GET['specialization'];

$query= "INSERT into specialization(SpecializationName) VALUES ('$specialization')";

mysqli_query($conn,$query);  
?>
