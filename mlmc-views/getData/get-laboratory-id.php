<?php

require_once 'connection.php';

$id= $_GET['id'];
$sel = mysqli_query($con,"SELECT * FROM laboratories WHERE LaboratoryID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "LaboratoryID"=>$row['LaboratoryID'],
        "Description"=>$row['Description'],
        "Rate"=>$row['Rate']);
}
echo json_encode($data);


?>

									