<?php
require_once 'connection.php';

if(isset($_GET['medicationid']) && isset($_GET['admissionid'])) {
    $medicationid = $_GET['medicationid'];
    $admissionid = $_GET['admissionid'];
    $sel = mysqli_query($conn,"SELECT a.MedicineID,a.MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.MedicationID = '$medicationid' AND a.MedicineID = b.MedicineID");
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
    $sel = mysqli_query($conn,"SELECT a.MedicineID, a.MedicineName,b.*,c.DosingID,c.Intake FROM pharmaceuticals a, medication b,dosing_time c WHERE b.AdmissionID = '$id' AND b.MedicineID = a.MedicineID AND b.DosingID != 0 AND c.DosingID = b.DosingID");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
            $data[] = array(
            "ID"=>$row['ID'],
            "MedicationID"=>$row['MedicationID'],
            "AdmissionID"=>$row['AdmissionID'],
            "MedicineID"=>$row['MedicineID'],
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianID"=>$row['PhysicianID'],
            "Dosage"=>$row['Dosage'],
            "Quantity"=>$row['Quantity'],
            "DateStart"=>$row['DateStart'],
            "TimeStart"=>$row['TimeStart'],
            "MedicineName"=>$row['MedicineName'],
            "Intake"=>$row['Intake']);
    }
}

if(isset($_GET['medid']) && isset($_GET['id'])) {
    $medicineid = $_GET['medid'];
    $admissionid = $_GET['id'];
    $sel = mysqli_query($conn,"SELECT a.MedicineID,a.MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.AdmissionID = '$admissionid' AND b.ID =  '$medicineid' AND a.MedicineID = b.MedicineID");
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
            "DosingID"=>$row['DosingID'],
            "Notes"=>$row['Notes']);
    }
}


echo json_encode($data);

									