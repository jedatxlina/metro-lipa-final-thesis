<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"select CONCAT(FirstName, ' ',MiddleName, ' ',LastName) as Fullname, medical_details.BedID,patients.Gender,medical_details.ArrivalDate,medical_details.ArrivalTime,medical_details.Weight,patients.AdmissionID,patients.MedicalID from patients JOIN medical_details where AdmissionType = 'Inpatient' AND medical_details.BedID = 'Infant' AND patients.AdmissionID = medical_details.AdmissionID GROUP BY patients.AdmissionID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"Fullname"=>$row['Fullname'],
		"AdmissionID"=>$row['AdmissionID'],
		"MedicalID"=>$row['MedicalID'],
		"BedID"=>$row['BedID'],
		"ArrivalDate"=>$row['ArrivalDate'],
		"ArrivalTime"=>$row['ArrivalTime'],
		"Weight"=>$row['Weight'],
		"Gender"=>$row['Gender']);
}

echo json_encode($data);
?>

									