<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT * FROM pharmaceuticals");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "PharmaID"=>$row['PharmaID'],
        "PharmaType"=>$row['PharmaType'],
        "PharmaName"=>$row['PharmaName'],
        "Unit"=>$row['Unit'],
        "Price"=>$row['Price']);
}
echo json_encode($data);
?>

									