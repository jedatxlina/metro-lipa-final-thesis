<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM specialization");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "SpecializationID"=>$row['SpecializationID'],
        "SpecializationName"=>$row['SpecializationName']);
}

echo json_encode($data);
?>

									