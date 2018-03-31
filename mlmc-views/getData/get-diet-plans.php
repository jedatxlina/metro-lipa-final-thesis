<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM `diet_list`");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "DietID"=>$row['DietID'],
        "DietOrder"=>$row['DietOrder']);
}

echo json_encode($data);
?>

									