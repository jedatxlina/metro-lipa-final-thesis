<?php
require_once '../connection.php';

$sel = mysqli_query($con,"select * from user_account");
$data = array();


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AccountID"=>$row['AccountID'],
    	"AccessType"=>$row['AccessType'],
    	"Password"=>$row['Passwordd']);
}
echo json_encode($data);
?>