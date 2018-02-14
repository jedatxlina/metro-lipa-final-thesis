<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($con,"select * from user_account WHERE AccountID = '$id'");
$data = array();


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AccountID"=>$row['AccountID'],
    	"AccessType"=>$row['AccessType'],
		"Password"=>$row['Passwordd'],
		"Email"=>$row['Email']);
}
echo json_encode($data);
?>