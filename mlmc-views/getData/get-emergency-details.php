<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"select *,CONCAT(FirstName, ' ',MiddleName, ' ',LastName) as Fullname from patients where AdmissionType = 'Emergency'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
    	"AdmissionNo"=>$row['AdmissionNo'],
		"AdmissionDate"=>$row['AdmissionDate'],
		"AdmissionTime"=>$row['AdmissionTime'],
    	"Fname"=>$row['FirstName'],
    	"Mname"=>$row['MiddleName'],
		"Lname"=>$row['LastName'],
		"Fullname"=>$row['Fullname'],
		"Admission"=>$row['Admission'],
		"AdmissionType"=>$row['AdmissionType'],
    	"Gender"=>$row['Gender'],
        "Province"=>$row['Province'],
        "City"=>$row['City'],
        "CivilStatus"=>$row['CivilStatus'],
        "Birthdate"=>$row['Birthdate'],
		"Contact"=>$row['Contact'],
		"MedicalID"=>$row['MedicalID']);
}

echo json_encode($data);
?>

									