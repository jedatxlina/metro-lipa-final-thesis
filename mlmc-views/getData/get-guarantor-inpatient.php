<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT * FROM accounts_receivable WHERE AdmissionID='$id' AND Remarks = 'Pending'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Provider"=>$row['Provider'],
    "Status"=>$row['Remarks'],
    "Dposted"=>$row['DateTimePosted'],
    "AccountID"=>$row['AccountReceiveID'],
    "ContNo"=>$row['ControlNo']);
}
echo json_encode($data);
?>