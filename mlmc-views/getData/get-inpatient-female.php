<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"select * from patients where Gender = 'Female' AND (AdmissionType = 'Inpatient' OR AdmissionType ='Emergency')");

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
		"Admission"=>$row['Admission'],
		"AdmissionType"=>$row['AdmissionType'],
    	"Gender"=>$row['Gender'],
        "Province"=>$row['Province'],
        "City"=>$row['City'],
        "CivilStatus"=>$row['CivilStatus'],
        "Birthdate"=>$row['Birthdate'],
        "Contact"=>$row['Contact']);
}

echo json_encode($data);
?>

									