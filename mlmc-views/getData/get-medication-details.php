<?php
require_once 'connection.php';

if(isset($_GET['medicationid']) && isset($_GET['admissionid'])) {
    $medicationid = $_GET['medicationid'];
    $admissionid = $_GET['admissionid'];
    $sel = mysqli_query($con,"SELECT * FROM medication JOIN pharmaceuticals WHERE medication.MedicationID = '$medicationid' AND pharmaceuticals.MedicineID = medication.MedicineID ");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "MedicineID"=>$row['MedicineID'],
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianID"=>$row['PhysicianID'],
            "Dosage"=>$row['Dosage'],
            "Quantity"=>$row['Quantity'],
            "DateStart"=>$row['DateStart'],
            "TimeStart"=>$row['TimeStart'],
            "MedicineName"=>$row['MedicineName'],
            "Unit"=>$row['Unit'],
            "Price"=>$row['Price']);
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sel = mysqli_query($con,"SELECT * FROM medication JOIN pharmaceuticals WHERE medication.AdmissionID = '$id' AND pharmaceuticals.MedicineID = medication.MedicineID ");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "MedicineID"=>$row['MedicineID'],
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianID"=>$row['PhysicianID'],
            "Dosage"=>$row['Dosage'],
            "Quantity"=>$row['Quantity'],
            "DateStart"=>$row['DateStart'],
            "TimeStart"=>$row['TimeStart'],
            "MedicineName"=>$row['MedicineName'],
            "Unit"=>$row['Unit'],
            "Price"=>$row['Price']);
    }
}




echo json_encode($data);

									