<?php
require_once '../connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$id = addslashes($request->id);
$specialization = addslashes($request->specialization);

$query= "UPDATE specialization SET SpecializationName = '$specialization' WHERE SpecializationID = '$id'";

mysqli_query($con,$query);  
?>
