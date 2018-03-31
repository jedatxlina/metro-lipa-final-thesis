<?php
require_once 'connection.php';

$at = $_GET['id'];
$admissionid = $_GET['admissionid'];

$sel = mysqli_query($conn,"SELECT a.SecretaryID,b.*,c.*,d.* FROM secretary a, attending_physicians b, medical_details c, patients d WHERE a.SecretaryID = '$at' AND a.PhysicianID = b.PhysicianID AND c.AttendingID = b.AttendingID AND d.MedicalID = c.MedicalID AND d.AdmissionType = 'Outpatient' AND d.AdmissionID = '$admissionid'");


$data = array();

while ($row = mysqli_fetch_array($sel)) {

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

echo json_encode($data);
?>

									