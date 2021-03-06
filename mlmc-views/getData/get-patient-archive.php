<?php
require_once 'connection.php';

$id =  isset($_GET['id']) ? $_GET['id'] : '';

if($id == ''){
	$sel = mysqli_query($conn,"SELECT * FROM patients_archive GROUP BY ArchiveID");
}else{
	$sel = mysqli_query($conn,"SELECT * FROM patients_archive WHERE ArchiveID = '$id' GROUP BY ArchiveID");
}

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

									