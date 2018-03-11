<?php

require_once 'connection.php';

$id= $_GET['id'];

$sel = mysqli_query($con,"SELECT * FROM refbrgy WHERE citymunCode = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
        "id"=>$row['brgyCode'],
        "brgy"=>$row['brgyDesc'],
        "cityid"=>$row['citymunCode']);
}

echo json_encode($data);
?>

									