<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT physicians.LastName, physicians.FirstName, physicians.MiddleName, attending_physicians.Rate, attending_physicians.Discount FROM attending_physicians INNER JOIN physicians ON attending_physicians.PhysicianID=physicians.PhysicianID WHERE attending_physicians.AdmissionID='$id'");
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