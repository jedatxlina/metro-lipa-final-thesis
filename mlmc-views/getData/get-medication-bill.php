<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($con,"SELECT SUM(medication.Quantity), pharmaceuticals.* FROM medication INNER JOIN pharmaceuticals ON medication.MedicineID=pharmaceuticals.MedicineID WHERE medication.AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "totalbill"=>$row['SUM(medication.Quantity)'],
    "price"=>$row['Price']);
}
echo json_encode($data);
?>

									