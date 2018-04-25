<?php
require_once 'connection.php';

$id = $_GET['id'];

$query= "UPDATE patients SET AdmissionType = 'Emergency' WHERE AdmissionID = '$id'";

mysqli_query($conn,$query);  

$sel = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE AdmissionID = '$id'");


while ($row = mysqli_fetch_assoc($sel)) {
    $medicalid = $row['MedicalID'];
}

$query= "UPDATE medical_details SET BedID = 'ER' WHERE MedicalID = '$medicalid'";

mysqli_query($conn,$query);  
?>
