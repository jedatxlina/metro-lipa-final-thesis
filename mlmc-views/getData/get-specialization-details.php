<?php

require_once '../connection.php';

$sel = mysqli_query($con,"SELECT * FROM specialization");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "SpecializationID"=>$row['SpecializationID'],
        "SpecializationName"=>$row['SpecializationName']);
}
header('Content-type: application/json');
echo json_encode($data);
?>

									