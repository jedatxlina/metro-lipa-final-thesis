<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT physicians.LastName, physicians.PhysicianID, physicians.FirstName, physicians.MiddleName, attending_physicians.Rate,attending_physicians.AttendingID,physicians.Specialization 
FROM attending_physicians
JOIN physicians ON attending_physicians.PhysicianID = physicians.PhysicianID
JOIN medical_details
JOIN patients
WHERE patients.medicalID = medical_details.MedicalID AND patients.AdmissionID = '$id' AND attending_physicians.AttendingID = medical_details.AttendingID
 ");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "FullName"=>$row['FirstName']. ' ' .$row['MiddleName'] . ' ' . $row['LastName'],
    "SP"=>$row['Specialization'],
    "AttID"=>$row['AttendingID'],
    "PID"=>$row['PhysicianID']);
}
echo json_encode($data);
?>