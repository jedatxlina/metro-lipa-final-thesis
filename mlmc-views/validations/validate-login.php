<?php
require_once 'connection.php';

$id = $_GET['id'];
$pass =  $_GET['pass'];

$sel = mysqli_query($con,"SELECT AccessType FROM user_account WHERE AccountID='$id' AND Passwordd='$pass' LIMIT 1");

while($result = $sel->fetch_array()){
    $data = $result['AccessType'];
}
if(empty($data)){
$check = 0;
echo json_encode($check);
}else{
echo json_encode($data);
}
?>