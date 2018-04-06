<?php
require_once 'connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT laboratories.Rate, laboratories.Description FROM laboratory_req INNER JOIN laboratories ON laboratories.LaboratoryID=laboratory_req.LaboratoryID WHERE laboratory_req.AdmissionID='$id' AND laboratory_req.Status='Cleared'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    "Rate"=>$row['Rate'],
    "Price"=>$row['Rate'],
    "Description"=>$row['Description']);
}
echo json_encode($data);
?>