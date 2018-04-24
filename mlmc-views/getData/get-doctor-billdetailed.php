<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.*,d.LastName, d.FirstName, d.MiddleName FROM attending_physicians a, patients b, medical_details c, physicians d WHERE b.AdmissionID = '$id' AND b.MedicalID = c.MedicalID AND c.AttendingID = a.AttendingID AND a.PhysicianID = d.PhysicianID");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Lname"=>$row['LastName'],
    "Fname"=>$row['FirstName'],
    "Pfee"=>$row['Rate'],
    "Discount"=>$row['Discount'],
    "Mname"=>$row['MiddleName']);
}
echo json_encode($data);
?>