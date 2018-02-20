<?php
require_once 'connection.php';

$id = $_GET['id'];

$sel = mysqli_query($con,"SELECT * FROM physicians JOIN user_account WHERE physicians.PhysicianID = '$id' AND user_account.AccountID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"PhysicianID"=>$row['PhysicianID'],
		"AccountID"=>$row['AccountID'],
		"Lastname"=>$row['LastName'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
		"Address"=>$row['Address'],
		"Birthdate"=>$row['Birthdate'],
		"ProfessionalFee"=>$row['ProfessionalFee'],
		"Specialization"=>$row['Specialization'],
    	"AccessType"=>$row['AccessType'],
		"Passwordd"=>$row['Passwordd'],
		"Email"=>$row['Email']);
}
echo json_encode($data);
?>

									