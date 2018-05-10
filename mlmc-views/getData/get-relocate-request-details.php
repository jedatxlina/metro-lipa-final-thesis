<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT relocate_req.*,CONCAT(patients.FirstName, ' ',patients.MiddleName, ' ', patients.LastName) AS Fullname,medical_details.BedID as current FROM relocate_req JOIN patients,medical_details WHERE relocate_req.AdmissionID = patients.AdmissionID AND relocate_req.MedicalID = patients.MedicalID AND patients.MedicalID = medical_details.MedicalID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "ID"=>$row['TransRequestID'],
        "Current"=>$row['current'],
        "BedID"=>$row['BedID'],
        "Fullname"=>$row['Fullname'],        
        "SpecialRequest"=>$row['SpecialRequest']);
}
echo json_encode($data);
?>

									