<?php

require_once 'connection.php';
header('Content-type: application/json');
$sel = mysqli_query($con,"SELECT * FROM refprovince");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "id"=>$row['provCode'],
        "provname"=>$row['provDesc']);
}
echo json_encode($data);
?>

									