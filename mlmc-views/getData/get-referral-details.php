<?php

require_once 'connection.php';

$at = $_GET['at'];

$sel = mysqli_query($conn,"SELECT * FROM referrals JOIN physicians WHERE ReferredTo = '$at' AND physicians.PhysicianID = referrals.ReferredBy");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "ID"=>$row['ID'],
        "AdmissionID"=>$row['AdmissionID'],
        "ReferredTo"=>$row['ReferredTo'],
        "ReferredBy"=>$row['ReferredBy'],
        "firstname"=>$row['FirstName'],
        "middlename"=>$row['MiddleName'],
        "lastname"=>$row['LastName']);
}

echo json_encode($data);

?>

									