<?php
require_once 'connection.php';

$sel = mysqli_query($con,"SELECT MedicineID, CONCAT(MedicineName, ' ' ,Unit) AS MedicineName FROM pharmaceuticals");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"MedicineID"=>$row['MedicineID'],
		"MedicineName"=>$row['MedicineName']);
}
echo json_encode($data);
?>

									