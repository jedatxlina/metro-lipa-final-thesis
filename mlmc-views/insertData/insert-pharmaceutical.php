<?php
require_once 'connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$pharmaid = $_GET['pharmaid'];
$pharmatype = $_GET['pharmatype'];
$pharmaname = $_GET['pharmaname'];
$unit = $_GET['unit'];
$price = $_GET['price'];

$query= "INSERT into pharmaceuticals(PharmaID,PharmaType,PharmaName,Unit,Price) VALUES ('$pharmaid','$pharmatype','$pharmaname','$unit','$price')";

mysqli_query($con,$query);  
?>
