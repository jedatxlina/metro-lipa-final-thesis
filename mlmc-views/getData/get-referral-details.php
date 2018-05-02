<?php

require_once 'connection.php';

$at = $_GET['at'];

$sel = mysqli_query($conn,"SELECT physicians.*,CONCAT (patients.FirstName, ' ',patients.MiddleName, ' ',patients.LastName) AS PatientName,referrals.* FROM referrals JOIN physicians,patients WHERE ReferredTo = '$at' AND physicians.PhysicianID = referrals.ReferredBy AND patients.AdmissionID = referrals.AdmissionID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "ID"=>$row['ID'],
        "PatientName"=>$row['PatientName'],
        "AdmissionID"=>$row['AdmissionID'],
        "ReferredTo"=>$row['ReferredTo'],
        "ReferredBy"=>$row['ReferredBy'],
        "firstname"=>$row['FirstName'],
        "middlename"=>$row['MiddleName'],
        "lastname"=>$row['LastName']);
}

echo json_encode($data);

?>

									