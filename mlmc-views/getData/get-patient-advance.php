<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT * FROM adv_payment WHERE AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Amount"=>$row['Amount']);
}
echo json_encode($data);
?>