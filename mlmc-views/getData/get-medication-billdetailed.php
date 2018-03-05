<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($con,"SELECT medication.Quantity, pharmaceuticals.Price, pharmaceuticals.MedicineName FROM medication INNER JOIN pharmaceuticals ON medication.MedicineID=pharmaceuticals.MedicineID WHERE medication.AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "mediname"=>$row['MedicineName'],
    "quantity"=>$row['Quantity'],
    "totalbill"=>$row['Quantity']*$row['Price'],
    "price"=>$row['Price']);
}
echo json_encode($data);
?>

									