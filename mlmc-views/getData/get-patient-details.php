<?php
require_once 'connection.php';

$id = $_GET['id'];
$sel = mysqli_query($con,"SELECT * FROM patients WHERE AdmissionID = '$id' ");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"AdmissionID"=>$row['AdmissionID'],
		"AdmissionNo"=>$row['AdmissionNo'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
    	"Lastname"=>$row['LastName'],
    	"Birthdate"=>$row['Birthdate'],
    	"Contact"=>$row['Contact'],
		"Province"=>$row['Province'],
		"City"=>$row['City'],
		"Civilstatus"=>$row['CivilStatus'],
    	"Gender"=>$row['Gender'],
    	"Age"=>$row['Age']);
}
echo json_encode($data);
?>

									