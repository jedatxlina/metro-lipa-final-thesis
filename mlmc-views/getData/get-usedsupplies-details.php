<?php

require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.SupplyName, SUM(a.Quantity) AS total, b.Price FROM supply_used a, supplies b WHERE AdmissionID='$id' AND a.SupplyName = b.SuppliesName GROUP BY SupplyName");

$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "SupplyName"=>$row['SupplyName'],
        "total" =>$row['total'],
        "price" => $row['Price'],
        "totalbill" => $row['Price']*$row['total']);
}
echo json_encode($data);
?>

									