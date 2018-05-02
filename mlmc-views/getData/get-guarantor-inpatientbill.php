<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel2 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel2)) {
    $adno = $row['AdmissionNo'];
}
$sel = mysqli_query($conn,"SELECT * FROM accounts_receivable WHERE AdmissionID='$id' AND Remarks = 'Posted' AND AdmissionNo = '$adno'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Provider"=>$row['Provider'],
    "Status"=>$row['Remarks'],
    "Dposted"=>$row['DateTimePosted'],
    "AccountID"=>$row['AccountReceiveID'],
    "Amount"=>$row['Amount'],
    "ContNo"=>$row['ControlNo']);
}
echo json_encode($data);
?>