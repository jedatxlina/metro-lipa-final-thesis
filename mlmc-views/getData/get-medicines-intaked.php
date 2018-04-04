<?php

require_once 'connection.php';

$id = $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM medication_history WHERE AdmissionID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "MedicationHistoryID"=>$row['AdmissionID'],
        "MedicineName"=>$row['MedicineName'],        
        "Quantity"=>$row['Quantity'],
        "Dosage"=>$row['Dosage']);
}
echo json_encode($data);
?>

									