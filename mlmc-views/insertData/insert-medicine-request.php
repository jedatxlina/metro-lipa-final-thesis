<?php
require_once 'connection.php';

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$at = $_GET['at'];
$admissionid = $_GET['id'];
$mednum = $_GET['med'];

$medreqid = rand(111111, 999999);

$sel = mysqli_query($conn,"SELECT MedicineID FROM pharmaceuticals JOIN medication,patients,medical_details WHERE patients.AdmissionID = '$admissionid' AND patients.MedicalID = medical_details.MedicalID AND medical_details.MedicationID = medication.MedicationID AND medication.ID = '$mednum' AND medication.MedicineName = pharmaceuticals.MedicineName AND medication.Dosage = pharmaceuticals.Unit");


while($row = mysqli_fetch_assoc($sel)){
    $medicineid = $row['MedicineID'];

    $query2 = "INSERT into medicine_req(MedRequestID,MedicineID,AdmissionID,Status,DateRequested,TimeRequested) VALUES
    ('$medreqid','$medicineid','$admissionid','Pending','$date','$time')";
    
    mysqli_query($conn,$query2);  

    $medreqid = rand(111111, 999999);
}


header("Location:../nurse-patient.php?at=$at");

