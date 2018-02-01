<?php
require_once 'connection.php';

$specializationid = $_GET['specializationid'];
$specialization = $_GET['specialization'];

$query= "INSERT into specialization(SpecializationID,SpecializationName) VALUES ('$specializationid','$specialization')";

mysqli_query($con,$query);  
?>
