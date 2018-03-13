<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT * FROM dosing_time");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "DosingID"=>$row['DosingID'],
        "Intake"=>$row['Intake'],
        "Interval"=>$row['TimeInterval']);
}
echo json_encode($data);

									