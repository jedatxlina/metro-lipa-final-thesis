<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT medication.Quantity, pharmaceuticals.Price FROM medication INNER JOIN pharmaceuticals ON medication.MedicineID=pharmaceuticals.MedicineID WHERE medication.AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "totalbill"=>$row['Quantity']*$row['Price'],
    "price"=>$row['Price']);
}
$total = 0;
foreach($data as $cd) {
    $total = $total + $cd['totalbill'];
}
$data2[] = array(
    "totalbill"=>$total);
echo json_encode($data2);
?>

									