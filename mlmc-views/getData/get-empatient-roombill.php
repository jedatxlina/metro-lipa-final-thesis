<?php
require_once 'connection.php';
$yearage = '0';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT * FROM billing_em WHERE BillDes = 'Emergency Room Fee' AND AdmissionID = '$id'");
$data = array();
$date = date("Y-m-d");
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "EmRoomBill"=>$row['TotalBill']);
}
echo json_encode($data);
?>

									