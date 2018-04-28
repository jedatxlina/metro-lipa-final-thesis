<?php

require_once 'connection.php';
$id=$_GET['id'];
$sel = mysqli_query($conn,"SELECT a.Findings, b.Discount AS Disease_Discount, b.PFDiscount AS Professional_DIscount FROM diagnosis a, philhealth b, patients c WHERE a.Findings = b.Disease AND a.AdmissionID = '$id' AND c.MedicalID = a.MedicalID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "DDiscount"=>$row['Disease_Discount'],
        "PFDiscount"=>$row['Professional_DIscount'],
        "FindingsName"=>$row['Findings'],
        "Total"=>$row['Disease_Discount']+$row['Professional_DIscount']);
}
echo json_encode($data);
?>

									