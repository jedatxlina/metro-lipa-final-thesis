<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"select * from user_logs WHERE AccountID = '$id'");
$data = array();


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"DateTimeIn"=>$row['DateTimeIn'],
    	"DateTimeOut"=>$row['DateTimeOut']);
}
echo json_encode($data);
?>