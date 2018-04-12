<?php
require_once 'connection.php';


if(isset($_GET['admissionid'])) {
    $admissionid = $_GET['admissionid'];
    $sel = mysqli_query($conn,"SELECT a.MedicineID,a.MedicineName,a.Unit,b.*,c.* FROM pharmaceuticals a,medication b, dosing_time c WHERE b.AdmissionID = '$admissionid' AND a.MedicineID = b.MedicineID AND b.DosingID = c.DosingID");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "ID"=>$row['ID'],
            "MedicationID"=>$row['MedicationID'],
            "MedicineID"=>$row['MedicineID'],
            "MedicineName"=>$row['MedicineName'],
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianID"=>$row['PhysicianID'],
            "Dosage"=>$row['Dosage'],
            "Quantity"=>$row['Quantity'],
            "DateStart"=>$row['DateStart'],
            "TimeStart"=>$row['TimeStart'],
            "Unit"=>$row['Unit'],
            "Intake"=>$row['Intake']);
    }
}

if(isset($_GET['medicationid'])) {
    $medicationid = $_GET['medicationid'];
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
    $sel = mysqli_query($conn,"SELECT *,GROUP_CONCAT(patients.FirstName,' ',patients.MiddleName,' ',patients.LastName) as pfullname,medical_details.BedID FROM medication JOIN pharmaceuticals,patients,dosing_time,physicians,medical_details WHERE medication.AdmissionID = '$id' AND medication.MedicineID = pharmaceuticals.MedicineID AND medication.DosingID = dosing_time.DosingID AND medication.PhysicianID = physicians.PhysicianID AND patients.AdmissionID = 2017825837 AND medical_details.AdmissionID = '$id'");
    $data = array();
        while ($row = mysqli_fetch_array($sel)) {
            $data[] = array(
            "ID"=>$row['MedicationID'],
            "Unit"=>$row['Unit'],
            "MedicineID"=>$row['MedicineID'],
            "MedicineName"=>$row['MedicineName'],
            "Intake"=>$row['Intake'],
            "DateAdministered"=>$row['DateAdministered'],
            "TimeAdministered"=>$row['TimeAdministered'],
            "PhysicianFirstname"=>$row['FirstName'],
            "PhysicianMiddlename"=>$row['MiddleName'],
            "PhysicianLastname"=>$row['LastName'],
            "pfullname"=>$row['pfullname'],
            "bedid"=>$row['BedID']);
    }
}

if(isset($_GET['medid']) && isset($_GET['id'])) {
    $medicineid = $_GET['medid'];
    $admissionid = $_GET['id'];
    $sel = mysqli_query($conn,"SELECT a.MedicineID,a    .MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.AdmissionID = '$admissionid' AND b.ID =  '$medicineid' AND a.MedicineID = b.MedicineID");
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

if(isset($_GET['medicineid']) && isset($_GET['id'])) {
    $medicineid = $_GET['medicineid'];
    $admissionid = $_GET['id'];
    $sel = mysqli_query($conn,"SELECT a.MedicineID,a    .MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.AdmissionID = '$admissionid' AND b.MedicationID =  '$medicineid' AND a.MedicineID = b.MedicineID");
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

if(isset($_GET['orderid'])){
    $orderid = $_GET['orderid'];
    $sel = mysqli_query($conn,"SELECT *,pharmaceuticals.MedicineName FROM `orders`JOIN medication,pharmaceuticals WHERE orders.OrderID = '$orderid' AND medication.AdmissionID = orders.AdmissionID AND medication.MedicineID = pharmaceuticals.MedicineID");
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

									