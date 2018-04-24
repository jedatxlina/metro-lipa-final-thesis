<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT SUM(TotalBill) AS TotalBill,BillDes, COUNT(*) AS qty,SUM(b.Quantity) AS qty2 FROM billing c, patients a, supply_used b WHERE c.AdmissionID ='$id' AND c.Department = 'Supplies' AND a.MedicalID = c.MedicalID AND c.ItemID = b.SupplyID GROUP BY BillDes");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "suppname"=>$row['BillDes'],
    "totalbill"=>$row['TotalBill'],
    "qty"=>$row['qty'],
    "qty2"=>$row['qty2']);
}
echo json_encode($data);
?>