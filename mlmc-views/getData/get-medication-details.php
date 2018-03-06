<?php
require_once 'connection.php';

if(isset($_GET['medicationid']) && isset($_GET['admissionid'])) {
    $medicationid = $_GET['medicationid'];
    $admissionid = $_GET['admissionid'];
    $sel = mysqli_query($con,"SELECT a.MedicineID,a.MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.MedicationID = '$medicationid' AND a.MedicineID = b.MedicineID  ");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "MedicineID"=>$row['MedicineID'],
            "MedicineName"=>$row['MedicineName'],
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianID"=>$row['PhysicianID'],
            "Dosage"=>$row['Dosage'],
            "Quantity"=>$row['Quantity'],
            "DateStart"=>$row['DateStart'],
            "TimeStart"=>$row['TimeStart'],
            "Unit"=>$row['Unit']);
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sel = mysqli_query($con,"SELECT * FROM medication JOIN pharmaceuticals WHERE medication.AdmissionID = '$id' AND pharmaceuticals.MedicineID = medication.MedicineID ");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "MedicationID"=>$row['MedicationID'],
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

if(isset($_GET['medid']) && isset($_GET['id'])) {
    $medicineid = $_GET['medid'];
    $admissionid = $_GET['id'];
    $sel = mysqli_query($con,"SELECT a.MedicineID,a.MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.AdmissionID = '$admissionid' AND b.MedicineID =  '$medicineid' AND a.MedicineID = b.MedicineID  ");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "MedicineID"=>$row['MedicineID'],
            "MedicineName"=>$row['MedicineName'],
            "MedicationID"=>$row['MedicationID'],   
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianID"=>$row['PhysicianID'],
            "Dosage"=>$row['Dosage'],
            "Quantity"=>$row['Quantity'],
            "DateStart"=>$row['DateStart'],
            "TimeStart"=>$row['TimeStart'],
            "Unit"=>$row['Unit'],
            "Intake"=>$row['Intake'],
            "Notes"=>$row['Notes']);
    }
}


echo json_encode($data);

									