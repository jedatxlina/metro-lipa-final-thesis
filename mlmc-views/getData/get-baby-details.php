<?php
require_once 'connection.php';

$sel = mysqli_query($con,"select * from nursery");
    
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"NurseryID"=>$row['NurseryID'],
    	"AdmissionID"=>$row['AdmissionID'],
		"Lastname"=>$row['LastName'],
		"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
    	"Birthdate"=>$row['Birthdate'],
		"Birthtime"=>$row['Birthtime'],
		"Citizenship"=>$row['Citizenship'],
		"Bloodtype"=>$row['BloodType'],
    	"Deliverytype"=>$row['DeliveryType']);
}

echo json_encode($data);
?>

									