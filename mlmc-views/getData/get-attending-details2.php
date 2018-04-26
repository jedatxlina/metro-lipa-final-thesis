<?php
require_once 'connection.php';
$id = $_GET['id'];
$phyid = $_GET['attid'];
$sel = mysqli_query($conn,"SELECT physicians.LastName, physicians.PhysicianID, physicians.FirstName, physicians.MiddleName, attending_physicians.AttendingID, attending_physicians.Rate, physicians.Specialization FROM attending_physicians INNER JOIN physicians ON attending_physicians.PhysicianID=physicians.PhysicianID WHERE attending_physicians.AttendingID='$phyid' AND attending_physicians.PhysicianID = '$id'");
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