<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM patients  WHERE AdmissionType = 'Nursery'");
    
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
		"Lastname"=>$row['LastName'],
		"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
    	"Birthdate"=>$row['Birthdate']);
}

echo json_encode($data);
?>

									