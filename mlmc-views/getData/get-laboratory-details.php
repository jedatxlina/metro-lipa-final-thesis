<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM laboratories");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "LaboratoryID"=>$row['LaboratoryID'],
        "Description"=>$row['Description'],
        "Rate"=>$row['Rate'],
        "Type"=>$row['Type']);
}
echo json_encode($data);
?>

									