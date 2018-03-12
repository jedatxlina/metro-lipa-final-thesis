<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT a.*,b.*,c.* FROM patients a,medical_conditions b, conditions c WHERE a.AdmissionID = b.AdmissionID AND c.ConditionID = b.ConditionID");

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

									