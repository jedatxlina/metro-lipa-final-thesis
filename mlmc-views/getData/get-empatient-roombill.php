<?php
require_once 'connection.php';
$yearage = '0';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.* FROM duration a, patients b WHERE a.AdmissionID = '$id' AND b.AdmissionNo = a.AdmissionNo");
$data = array();
$date = date("Y-m-d");
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "EmRoomBill"=>$row['TotalBill'],
    "EmRoom" => 'Emergency Room');
}
echo json_encode($data);
?>

									