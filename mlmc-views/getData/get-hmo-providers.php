<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM refhmo");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"ID"=>$row['ID'],
    	"Provider"=>$row['Provider']);
}

echo json_encode($data);

									