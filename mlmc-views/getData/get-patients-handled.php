<?php

require_once 'connection.php';
$at = $_GET['at'];

$sel = mysqli_query($conn,"SELECT * FROM patients_archive JOIN attending_physicians WHERE attending_physicians.PhysicianID = '$at' AND attending_physicians.AdmissionID = patients_archive.ArchiveID GROUP BY patients_archive.ArchiveID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"ArchiveNo"=>$row['ArchiveNo'],
		"ArchiveID"=>$row['ArchiveID'],
		"AdmissionDate"=>$row['AdmissionDate'],
		"AdmissionTime"=>$row['AdmissionTime'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
		"Lastname"=>$row['LastName'],
		"Admission"=>$row['Admission'],
		"AdmissionType"=>$row['AdmissionType'],	
    	"Birthdate"=>$row['Birthdate'],
    	"Contact"=>$row['Contact'],
		"Province"=>$row['Province'],
		"City"=>$row['City'],
		"CompleteAddress"=>$row['CompleteAddress'],
		"CivilStatus"=>$row['CivilStatus'],
    	"Gender"=>$row['Gender'],
		"Age"=>$row['Age'],
		"Occupation"=>$row['Occupation'],
		"Citizenship"=>$row['Citizenship']);
}

echo json_encode($data);
?>

									