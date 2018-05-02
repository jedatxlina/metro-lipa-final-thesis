<?php
require_once 'connection.php';

$admissionid = $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM billing JOIN patients WHERE patients.AdmissionID = '$admissionid' AND patients.AdmissionID = billing.AdmissionID AND patients.MedicalID = billing.MedicalID AND billing.Department = 'Inpatient'");

$data = array();

while ($row = mysqli_fetch_assoc($sel)) {

    $data[] = array(
        "firstname"=>$row['FirstName'],
        "middlename"=>$row['MiddleName'],
        "lastname"=>$row['LastName'],
        "billid"=>$row['BillID'],
        "department"=>$row['Department'],
        "totalbill"=>$row['TotalBill'],
        "status"=>$row['Status']);
}

echo json_encode($data);
?>

									