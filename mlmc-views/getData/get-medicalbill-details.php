<?php

require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.PhysicianID, c.LastName,c.FirstName,c.MiddleName,c.ProfessionalFee FROM attending_physicians a, medical_details b, physicians c WHERE a.AdmissionID='$id' AND b.AdmissionID ='$id' AND c.PhysicianID = a.PhysicianID");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "PhysicianID"=>$row['PhysicianID'],
    "Lastname"=>$row['LastName'],
    "Firstname"=>$row['FirstName'],
    "Middlename"=>$row['MiddleName'],
    "ProfessionalFee"=>$row['ProfessionalFee']);
}
echo json_encode($data);
?>

									