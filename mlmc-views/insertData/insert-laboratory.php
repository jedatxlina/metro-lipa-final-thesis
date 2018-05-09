<?php
require_once 'connection.php';

$laboratoryid = $_GET['laboratoryid'];
$description = $_GET['description'];
$rate = $_GET['rate'];
$type = $_GET['type'];

$query= "INSERT into laboratories(LaboratoryID,Description,Rate,Type) VALUES ('$laboratoryid','$description','$rate','$type')";

mysqli_query($conn,$query);  
?>
