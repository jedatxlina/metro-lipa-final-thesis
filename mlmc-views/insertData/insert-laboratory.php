<?php
require_once 'connection.php';

$laboratoryid = $_GET['laboratoryid'];
$description = $_GET['description'];
$rate = $_GET['rate'];

$query= "INSERT into laboratories(LaboratoryID,Description,Rate) VALUES ('$laboratoryid','$description','$rate')";

mysqli_query($conn,$query);  
?>
