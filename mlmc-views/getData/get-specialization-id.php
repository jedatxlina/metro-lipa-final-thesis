<?php

require_once 'connection.php';

$id= $_GET['id'];
$sel = mysqli_query($conn,"SELECT * FROM specialization WHERE SpecializationID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "SpecializationID"=>$row['SpecializationID'],
        "SpecializationName"=>$row['SpecializationName']);
}
echo json_encode($data);


?>

									