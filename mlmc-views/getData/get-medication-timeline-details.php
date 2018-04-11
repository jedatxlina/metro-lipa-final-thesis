<?php

require_once 'connection.php';

$id = $_GET['id'];

$sel = mysqli_query($conn,"SELECT *,pharmaceuticals.MedicineName FROM medication_timeline JOIN pharmaceuticals WHERE AdmissionID = '$id' AND pharmaceuticals.MedicineID = medication_timeline.MedicineID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "MedTimelineID"=>$row['MedTimelineID'],
        "MedicationID"=>$row['MedicationID'],        
        "AdmissionID"=>$row['AdmissionID'],
        "MedicineID"=>$row['MedicineID'],
        "NurseID"=>$row['NurseID'],
        "DateIntake"=>$row['DateIntake'],
        "TimeIntake"=>$row['TimeIntake'],
        "NextTimeIntake"=>$row['NextTimeIntake'],
        "MedicineName"=>$row['MedicineName']);
}
echo json_encode($data);
?>

									