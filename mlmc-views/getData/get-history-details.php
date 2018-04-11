<?php
require_once 'connection.php';

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM patients WHERE AdmissionID = '$id' LIMIT 1");

while ($row = mysqli_fetch_assoc($query)) {
    $firstname = $row['FirstName'];
    $middlename = $row['MiddleName'];
    $lastname = $row['LastName'];
    $birthdate = $row['Birthdate'];
}

$query2 = mysqli_query($conn,"SELECT * FROM patients_archive WHERE patients_archive.FirstName = '$firstname' AND patients_archive.MiddleName ='$middlename' AND patients_archive.LastName='$lastname' ");

$data = array();

while ($row = mysqli_fetch_array($query2)) {
    $data[] = array(
		"ArchiveNo"=>$row['ArchiveNo'],
		"ArchiveID"=>$row['ArchiveID'],
		"AdmissionDate"=>$row['AdmissionDate'],
		"AdmissionTime"=>$row['AdmissionTime'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
		"Lastname"=>$row['LastName'],
    	"Birthdate"=>$row['Birthdate'],
    	"Contact"=>$row['Contact'],
		"Province"=>$row['Province'],
		"City"=>$row['City'],
		"CompleteAddress"=>$row['CompleteAddress'],
		"CivilStatus"=>$row['CivilStatus'],
    	"Gender"=>$row['Gender'],
		"Age"=>$row['Age'],
		"Occupation"=>$row['Occupation'],
		"Citizenship"=>$row['Citizenship'],
        "MedicalID"=>$row['MedicalID']);
}
echo json_encode($data);
?>

									