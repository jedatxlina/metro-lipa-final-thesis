<?php
require_once 'connection.php';

$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT attending_physicians.*,medical_details.MedicalID,patients.* FROM attending_physicians JOIN medical_details,patients WHERE attending_physicians.PhysicianID = '$id' AND attending_physicians.AttendingID = medical_details.AttendingID AND medical_details.MedicalID = patients.MedicalID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"AdmissionID"=>$row['AdmissionID'],
		"Lastname"=>$row['LastName'],
		"Firstname"=>$row['FirstName'],
		"Middlename"=>$row['MiddleName'],
		"Gender"=>$row['Gender'],
		"Age"=>$row['Age'],
		"Admission"=>$row['Admission'],
		"AdmissionType"=>$row['AdmissionType'],
		"MedicalID"=>$row['MedicalID']);
}
echo json_encode($data);
?>

									