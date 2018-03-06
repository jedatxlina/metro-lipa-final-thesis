<?php
require_once 'connection.php';

$id = $_GET['id'];

if($id[0] != '7'){
	$sel = mysqli_query($con,"SELECT * FROM patients WHERE AdmissionType = 'Outpatient'");
}else{
	$sel = mysqli_query($con,"SELECT a.SecretaryID,b.*,c.*,d.* FROM secretary a, attending_physicians b, medical_details c, patients d WHERE a.SecretaryID = '$id' AND a.PhysicianID = b.PhysicianID AND c.AttendingID = b.AttendingID AND d.MedicalID = c.MedicalID AND d.AdmissionType = 'Outpatient'");
}

$data = array();

while ($row = mysqli_fetch_array($sel)) {
	if($id[0] != '7'){
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
	}else{
		$data[] = array(
			"PhysicianID"=>$row['PhysicianID'],
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
    
}

echo json_encode($data);
?>

									