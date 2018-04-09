<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT DISTINCT(Conditions) as conditions, count(Conditions) as cnt FROM medical_conditions GROUP BY Conditions ");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "Conditions"=>$row['conditions'],
        "cnt"=>$row['cnt']);
}
echo json_encode($data);

									