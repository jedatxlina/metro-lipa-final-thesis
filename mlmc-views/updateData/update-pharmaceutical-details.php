<?php
require_once '../connection.php';



$pharmaid = $_GET['pharmaid'];
$pharmatype = $_GET['pharmatype'];
$pharmaname = $_GET['pharmaname'];
$unit = $_GET['unit']);
$price =$_GET['price'];

$query= "UPDATE pharmaceuticals SET PharmaType = '$pharmatype', PharmaName = '$pharmaname', Unit = '$unit', Price = '$price' WHERE PharmaID = '$pharmaid'";

mysqli_query($con,$query);  
?>
