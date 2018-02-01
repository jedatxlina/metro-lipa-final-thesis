<?php
require_once '../connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$id = addslashes($request->AdmissionID);
$bedid = addslashes($request->BedID);

$sql = "UPDATE patients SET BedID='$bedid' , AdmissionType='Inpatient' WHERE AdmissionID='$id'";

mysqli_query($con,$sql);  

$sql2 = "UPDATE beds SET Status='Occupied' WHERE BedID='$bedid'";

mysqli_query($con,$sql2); 

?>
