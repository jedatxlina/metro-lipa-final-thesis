<?php
require_once 'connection.php';

$sel = mysqli_query($con,"select * from patients where AdmissionType = 'Outpatient'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
    	"AdmissionNo"=>$row['AdmissionNo'],
    	"AdmissionDateTime"=>$row['AdmissionDateTime'],
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

									