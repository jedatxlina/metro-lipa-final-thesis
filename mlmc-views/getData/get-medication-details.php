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
            "Fullname"=>$row['dfullname']);
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

// if(isset($_GET['id'])){
//     $id = $_GET['id'];
//     $sel = mysqli_query($conn,"SELECT *,GROUP_CONCAT(patients.FirstName,' ',patients.MiddleName,' ',patients.LastName) as pfullname,medical_details.BedID FROM medication JOIN pharmaceuticals,patients,dosing_time,physicians,medical_details WHERE medication.AdmissionID = '$id' AND medication.MedicineID = pharmaceuticals.MedicineID AND medication.DosingID = dosing_time.DosingID AND medication.PhysicianID = physicians.PhysicianID AND patients.AdmissionID = '$id' AND medical_details.AdmissionID = '$id'");
//     $data = array();
//         while ($row = mysqli_fetch_array($sel)) {
//             $data[] = array(
//             "ID"=>$row['MedicationID'],
//             "Unit"=>$row['Unit'],
//             "MedicineID"=>$row['MedicineID'],
//             "MedicineName"=>$row['MedicineName'],
//             "Intake"=>$row['Intake'],
//             "DateAdministered"=>$row['DateAdministered'],
//             "TimeAdministered"=>$row['TimeAdministered'],
//             "PhysicianFirstname"=>$row['FirstName'],
//             "PhysicianMiddlename"=>$row['MiddleName'],
//             "PhysicianLastname"=>$row['LastName'],
//             "pfullname"=>$row['pfullname'],
//             "bedid"=>$row['BedID']);
//     }
// }

// if(isset($_GET['medid']) && isset($_GET['id'])) {
//     $medicineid = $_GET['medid'];
//     $admissionid = $_GET['id'];
//     $sel = mysqli_query($conn,"SELECT a.MedicineID,a    .MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.AdmissionID = '$admissionid' AND b.ID =  '$medicineid' AND a.MedicineID = b.MedicineID");
//     $data = array();
//     while ($row = mysqli_fetch_array($sel)) {
//         $data[] = array(
//             "MedicineID"=>$row['MedicineID'],
//             "MedicineName"=>$row['MedicineName'],
//             "MedicationID"=>$row['MedicationID'],   
//             "DateAdministered"=>$row['DateAdministered'],
//             "TimeAdministered"=>$row['TimeAdministered'],
//             "PhysicianID"=>$row['PhysicianID'],
//             "Dosage"=>$row['Dosage'],
//             "Quantity"=>$row['Quantity'],
//             "DateStart"=>$row['DateStart'],
//             "TimeStart"=>$row['TimeStart'],
//             "DosingID"=>$row['DosingID'],
//             "Notes"=>$row['Notes']);
//     }
// }

// if(isset($_GET['medicineid']) && isset($_GET['id'])) {
//     $medicineid = $_GET['medicineid'];
//     $admissionid = $_GET['id'];
//     $sel = mysqli_query($conn,"SELECT a.MedicineID,a    .MedicineName,a.Unit,b.* FROM pharmaceuticals a,medication b WHERE b.AdmissionID = '$admissionid' AND b.MedicationID =  '$medicineid' AND a.MedicineID = b.MedicineID");
//     $data = array();
//     while ($row = mysqli_fetch_array($sel)) {
//         $data[] = array(
//             "MedicineID"=>$row['MedicineID'],
//             "MedicineName"=>$row['MedicineName'],
//             "MedicationID"=>$row['MedicationID'],   
//             "DateAdministered"=>$row['DateAdministered'],
//             "TimeAdministered"=>$row['TimeAdministered'],
//             "PhysicianID"=>$row['PhysicianID'],
//             "Dosage"=>$row['Dosage'],
//             "Quantity"=>$row['Quantity'],
//             "DateStart"=>$row['DateStart'],
//             "TimeStart"=>$row['TimeStart'],
//             "DosingID"=>$row['DosingID'],
//             "Notes"=>$row['Notes']);
//     }
// }

// if(isset($_GET['orderid'])){
//     $orderid = $_GET['orderid'];
//     $sel = mysqli_query($conn,"SELECT *,pharmaceuticals.MedicineName FROM `orders`JOIN medication,pharmaceuticals WHERE orders.OrderID = '$orderid' AND medication.AdmissionID = orders.AdmissionID AND medication.MedicineID = pharmaceuticals.MedicineID");
//     $data = array();
//     while ($row = mysqli_fetch_array($sel)) {
//         $data[] = array(
//             "MedicineID"=>$row['MedicineID'],
//             "MedicineName"=>$row['MedicineName'],
//             "MedicationID"=>$row['MedicationID'],   
//             "DateAdministered"=>$row['DateAdministered'],
//             "TimeAdministered"=>$row['TimeAdministered'],
//             "PhysicianID"=>$row['PhysicianID'],
//             "Dosage"=>$row['Dosage'],
//             "Quantity"=>$row['Quantity'],
//             "DateStart"=>$row['DateStart'],
//             "TimeStart"=>$row['TimeStart'],
//             "DosingID"=>$row['DosingID'],
//             "Notes"=>$row['Notes']);
//     }
// }
echo json_encode($data);

									