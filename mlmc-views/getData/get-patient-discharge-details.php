<?php
require_once 'connection.php';

$admissionid = $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM billing JOIN patients WHERE billing.AdmissionID = '$admissionid' AND patients.AdmissionID = '$admissionid'");

$data = array();

while ($row = mysqli_fetch_assoc($sel)) {

    $data[] = array(
        "firstname"=>$row['FirstName'],
        "middlename"=>$row['MiddleName'],
        "lastname"=>$row['LastName'],
        "billid"=>$row['BillID'],
        "totalbill"=>$row['TotalBill'],
        "status"=>$row['Status']);
}

echo json_encode($data);
?>

									