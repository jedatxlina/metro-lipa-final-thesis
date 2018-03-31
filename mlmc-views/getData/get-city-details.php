<?php

require_once 'connection.php';

$id= $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM refcitymun WHERE provCode = '$id'");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
        "id"=>$row['citymunCode'],
        "city"=>$row['citymunDesc'],
        "provid"=>$row['provCode']);
}
header('Content-type: application/json');
echo json_encode($data);
?>

									