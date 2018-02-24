<?php

require_once 'connection.php';

$id = $_GET['id'];

$sel = mysqli_query($con,"SELECT a.PhysicianID,CONCAT(a.LastName, ', ' ,a.FirstName, ' ',a.MiddleName) AS Fullname, b.SecretaryID, b.PhysicianID FROM physicians a, secretary b WHERE a.PhysicianID = b.PhysicianID AND b.SecretaryID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "PhysicianID"=>$row['PhysicianID'],
        "Fullname"=>$row['Fullname']);
}

echo json_encode($data);
?>

									