<?php
require_once 'connection.php';


$laboratoryid = $_GET['laboratoryid'];
$description = $_GET['description'];
$rate = $_GET['rate'];

$query= "UPDATE laboratories SET Description = '$description', Rate = '$rate' WHERE LaboratoryID = '$laboratoryid'";

mysqli_query($con,$query);  
?>
