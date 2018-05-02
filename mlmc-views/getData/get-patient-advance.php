<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel2 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel2)) {
    $adno = $row['AdmissionNo'];
}
$sel = mysqli_query($conn,"SELECT * FROM adv_payment WHERE AdmissionID='$id' AND AdmissionNo = '$adno'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Amount"=>$row['Amount']);
}
echo json_encode($data);
?>