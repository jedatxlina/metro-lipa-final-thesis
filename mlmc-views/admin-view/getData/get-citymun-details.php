<?php

require_once '../connection.php';

$id= $_GET['id'];

$sel = mysqli_query($con,"SELECT * FROM cities WHERE province_id = '$id'");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
        "id"=>$row['id'],
        "city"=>$row['name'],
        "provid"=>$row['province_id']);
}
header('Content-type: application/json');
echo json_encode($data);
?>

									