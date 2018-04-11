<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM supplies");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "SuppliesID"=>$row['SuppliesID'],
        "SuppliesName"=>$row['SuppliesName'],      
        "Price"=>$row['Price']);
}
echo json_encode($data);
?>

									