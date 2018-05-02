<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT MedicineID, CONCAT(MedicineName, ' ' ,Unit) AS MedicineName , Price FROM pharmaceuticals WHERE Price > 0");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"MedicineID"=>$row['MedicineID'],
		"Price"=>$row['Price'],
		"MedicineName"=>$row['MedicineName']);
}
echo json_encode($data);
?>

									