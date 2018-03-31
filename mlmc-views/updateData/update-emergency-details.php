<?php
require_once '../connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$id = addslashes($request->AdmissionID);
$firstname = addslashes($request->FirstName);

$sql = "UPDATE patients SET FirstName='$firstname' WHERE AdmissionID='$id'";

mysqli_query($conn,$sql);  

?>
