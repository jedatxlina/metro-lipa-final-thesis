<?php

require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($con,"SELECT medical_details.*, physicians.* FROM medical_details INNER JOIN physicians ON medical_details.AttendingID=physicians.PhysicianID WHERE medical_details.AdmissionID = '$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "AttendingID"=>$row['AttendingID'],
    "Lastname"=>$row['LastName'],
    "Firstname"=>$row['FirstName'],
    "Middlename"=>$row['MiddleName'],
    "ProfessionalFee"=>$row['ProfessionalFee']);
}
echo json_encode($data);
?>

									