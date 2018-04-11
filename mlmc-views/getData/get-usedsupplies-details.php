<?php

require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT SupplyName, SUM(Quantity) AS total FROM supply_used GROUP BY SupplyName WHERE AdmissionID='$id'");

$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "SupplyName"=>$row['SupplyName'],
        "total" =>$row['total']);
}
echo json_encode($data);
?>

									