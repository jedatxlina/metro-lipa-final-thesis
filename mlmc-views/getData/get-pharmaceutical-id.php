<?php

require_once 'connection.php';

$id= $_GET['id'];
$sel = mysqli_query($con,"SELECT * FROM pharmaceuticals WHERE PharmaID = '$id'");

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

									