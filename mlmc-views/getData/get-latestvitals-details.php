<?php

require_once 'connection.php';

$id= $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM vitals WHERE AdmissionID='$id' ORDER BY ID DESC LIMIT 1");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "ID"=>$row['ID'],
        "VitalsID"=>$row['VitalsID'],
        "BP"=>$row['BP'],
        "BPD"=>$row['BPD'],
        "PR"=>$row['PR'],
        "RR"=>$row['RR'],
        "Temperature"=>$row['Temperature'],
        "DateTimeChecked"=>$row['DateTimeChecked']);
}
echo json_encode($data);

?>

									