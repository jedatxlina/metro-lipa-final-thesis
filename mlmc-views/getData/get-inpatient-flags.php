<?php
require_once 'connection.php';


$sel = mysqli_query($con,"SELECT a.AdmissionID, a.AdmissionDateTime, a.FirstName, a.MiddleName, a.LastName, b.MedicalID, b.BedID FROM patients a, medical_details b WHERE a.AdmissionType = 'Pending' AND b.AdmissionID = a.AdmissionID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
		"AdmissionDate"=>$row['AdmissionDate'],
		"AdmissionTime"=>$row['AdmissionTime'],
    	"Fname"=>$row['FirstName'],
    	"Mname"=>$row['MiddleName'],
		"Lname"=>$row['LastName'],
		"MedicalID"=>$row['MedicalID'],
		"BedID"=>$row['BedID']);
}

echo json_encode($data);
?>

									