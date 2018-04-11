<?php
require_once 'connection.php';


$id = $_GET['id'];
$diet = $_GET['diet'];
$dir = $_GET['remarks'];

$query= "UPDATE patient_diet SET Diet = '$diet', Dietremarks = '$dir' WHERE AdmissionID = '$id'";

mysqli_query($conn,$query);  
?>
