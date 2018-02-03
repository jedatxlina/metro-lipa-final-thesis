<?php
require_once 'connection.php';

$user = $_GET['user'];
$pass =  $_GET['pass'];

$sel = mysqli_query($con,"SELECT * FROM user_account WHERE AccountID='$user' && Passwordd='$pass'");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AccountID"=>$row['AccountID'],
    	"AccessType"=>$row['AccessType'],
    	"Password"=>$row['Passwordd']);
}

echo json_encode($data);
?>