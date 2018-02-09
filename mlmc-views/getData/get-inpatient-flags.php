<?php
require_once 'connection.php';

$sel = mysqli_query($con,"SELECT a.AdmissionID, a.AdmissionDateTime, a.FirstName, a.MiddleName, a.LastName, b.MedicalID, b.BedID FROM patients a, medical_details b WHERE a.AdmissionType = 'Pending'");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
    	"AdmissionDateTime"=>$row['AdmissionDateTime'],
    	"Fname"=>$row['FirstName'],
    	"Mname"=>$row['MiddleName'],
		"Lname"=>$row['LastName'],
		"BedID"=>$row['BedID'],
		"MedicalID"=>$row['MedicalID']);
}

echo json_encode($data);
?>

									