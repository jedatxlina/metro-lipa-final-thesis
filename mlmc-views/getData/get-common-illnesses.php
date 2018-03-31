<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT a.*,b.*,c.* FROM patients a,diagnosis b, conditions c WHERE c.Conditions = b.Findings AND b.AdmissionID = a.AdmissionID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AdmissionID"=>$row['AdmissionID'],
        "Address"=>$row['CompleteAddress'],
        "Condition"=>$row['Conditions'],
        "latcoor"=>$row['latcoor'],
        "longcoor"=>$row['longcoor']);
}
echo json_encode($data);

									