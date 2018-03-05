<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($con,"SELECT SUM(TotalBill) FROM billing WHERE AdmissionID = '$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "totalbill"=>$row['SUM(TotalBill)']);
}
echo json_encode($data);
?>

									