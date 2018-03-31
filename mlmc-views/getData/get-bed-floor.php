<?php

require_once 'connection.php';
$floor = $_GET['floor'];

$sel = mysqli_query($conn,"SELECT * FROM beds WHERE Floor = '$floor'");

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
echo json_encode($data);
?>

									