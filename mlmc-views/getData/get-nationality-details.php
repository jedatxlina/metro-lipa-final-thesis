<?php

require_once 'connection.php';


$sel = mysqli_query($conn,"SELECT * FROM countries");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
        "id"=>$row['id'],
        "code"=>$row['code'],
        "country"=>$row['country'],
        "nationality"=>$row['national']);
}

echo json_encode($data);

									