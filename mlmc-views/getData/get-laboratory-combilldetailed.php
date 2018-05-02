<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT SUM(TotalBill) AS TotalBill,BillDes, COUNT(*) AS qty FROM billing c, patients a WHERE c.AdmissionID ='$id' AND c.Department = 'Laboratory' AND a.MedicalID = c.MedicalID GROUP BY BillDes");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Rate"=>$row['TotalBill'],
    "qty"=>$row['qty'],
    "Price"=>$row['TotalBill'],
    "Description"=>$row['BillDes']);
}
echo json_encode($data);
?>