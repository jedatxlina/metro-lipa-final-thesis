<?php
require_once 'connection.php';

$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT attending_physicians.*, patients.* FROM attending_physicians JOIN patients USING(AdmissionID) WHERE PhysicianID = '$id'");

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
		"AdmissionType"=>$row['AdmissionType']);
}
echo json_encode($data);
?>

									