<?php

require_once 'connection.php';

$id= $_GET['id'];
$sel = mysqli_query($con,"SELECT * FROM beds WHERE BedID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "BedID"=>$row['BedID'],
        "RoomType"=>$row['RoomType'],
        "Rate"=>$row['Rate'],
        "Floor"=>$row['Floor'],
        "Room"=>$row['Room'],
        "Status"=>$row['Status']);
}
header('Content-type: application/json');
echo json_encode($data);


?>

									