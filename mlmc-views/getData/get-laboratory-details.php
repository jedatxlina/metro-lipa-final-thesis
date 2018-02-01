<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT * FROM laboratories");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "LaboratoryID"=>$row['LaboratoryID'],
        "Description"=>$row['Description'],
        "Rate"=>$row['Rate']);
}
echo json_encode($data);
?>

									