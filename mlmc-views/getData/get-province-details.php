<?php

require_once 'connection.php';
header('Content-type: application/json');
$sel = mysqli_query($con,"SELECT * FROM provinces");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "id"=>$row['id'],
        "provname"=>$row['name']);
}
echo json_encode($data);
?>

									