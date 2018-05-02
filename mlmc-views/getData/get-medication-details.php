<?php
require_once 'connection.php';


if(isset($_GET['admissionid'])) {
    $admissionid = $_GET['admissionid'];
    $sel = mysqli_query($conn,"SELECT CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ', physicians.LastName) as dfullname ,patients.AdmissionID,medical_details.MedicalID,medical_details.MedicationID,medication.* FROM medical_details JOIN medication,patients,physicians WHERE patients.AdmissionID = '$admissionid' AND patients.MedicalID = medical_details.MedicalID AND medical_details.MedicationID = medication.MedicationID AND medication.PhysicianID = physicians.PhysicianID");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "ID"=>$row['ID'],
            "MedicineName"=>$row['MedicineName'],
            "Quantity"=>$row['Quantity'],
            "QuantityOnHand"=>$row['QuantityOnHand'],
            "Dosage"=>$row['Dosage'],
            "Fullname"=>$row['dfullname'],
            "DosingID"=>$row['DosingID']);
    }
}

if(isset($_GET['medicationid']) && isset($_GET['medicalid'])) {
    $medicationid = $_GET['medicationid'];
    $medicalid = $_GET['medicalid'];
    $sel = mysqli_query($conn,"SELECT medical_details.MedicationID, medication.*,pharmaceuticals.MedicineID,pharmaceuticals.MedicineName,pharmaceuticals.Unit FROM medical_details JOIN medication,pharmaceuticals WHERE medical_details.MedicalID = '$medicalid' AND medical_details.MedicationID = '$medicationid' AND medical_details.MedicationID = medication.MedicationID AND medication.MedicineName = pharmaceuticals.MedicineName AND medication.Quantity = '0'");
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

echo json_encode($data);

									