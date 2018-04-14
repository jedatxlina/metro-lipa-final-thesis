<?php
    require_once 'connection.php';

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $medicationid = isset($_GET['medicationid']) ? $_GET['medicationid'] : '';

    $data = array();

    $sel = mysqli_query($conn,"SELECT * FROM medication WHERE AdmissionID = '$id' AND MedicationID = '$medicationid'");
    
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "ID"=>$row['ID'],
            "MedicationID"=>$row['MedicationID'],        
            "AdmissionID"=>$row['AdmissionID'],
            "MedicineName"=>$row['MedicineName'],
            "Quantity"=>$row['Quantity'],
            "PhysicianID"=>$row['PhysicianID']);
        }

   

    echo json_encode($data);
?>

                                        