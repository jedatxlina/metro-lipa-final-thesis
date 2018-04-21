<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT medication.MedicineName, medication.Dosage, medication.MedicationID,medicine_req.MedRequestID, medicine_req.Status, medication.Quantity, CONCAT(patients.FirstName, ', ' ,patients.MiddleName, ' ',patients.LastName) AS Fullname, CONCAT(pharmaceuticals.MedicineName, ' ' , pharmaceuticals.Unit) AS Medicine FROM medicine_req JOIN pharmaceuticals JOIN patients JOIN medication JOIN medical_details WHERE medicine_req.MedicineID = pharmaceuticals.MedicineID AND patients.AdmissionID = medicine_req.AdmissionID AND medical_details.MedicationID = medication.MedicationID AND patients.MedicalID = medical_details.MedicalID AND (medicine_req.Status = 'Ready' OR medicine_req.Status = 'Pending')");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        
        "Fullname"=>$row['Fullname'],
        "MedicineName"=>$row['MedicineName'],
        "Dosage"=>$row['Dosage'],
        "MedRequestID"=>$row['MedRequestID'],        
        "Medicine"=>$row['Medicine'],
        "Status"=>$row['Status'],
        "MedicationID"=>$row['MedicationID'],
        "Quantity"=>$row['Quantity']);
}
echo json_encode($data);
?>

									