<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT medication_history.Quantity,pharmaceuticals.Unit,pharmaceuticals.Price,pharmaceuticals.MedicineID, pharmaceuticals.MedicineName FROM medication_history INNER JOIN pharmaceuticals ON medication_history.MedicineName=pharmaceuticals.MedicineName WHERE medication_history.AdmissionID='$id' AND medication_history.Dosage = pharmaceuticals.Unit");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "mediname"=>$row['MedicineName'],
    "Dosage"=>$row['Unit'],
    "quantity"=>$row['Quantity'],
    "totalbill"=>$row['Quantity']*$row['Price'],
    "price"=>$row['Price']);
}
echo json_encode($data);
?>