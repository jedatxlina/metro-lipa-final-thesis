<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT PhysicianID, Specialization, CONCAT( FirstName, ' ', MiddleName , ' ' ,LastName) AS Fullname FROM physicians");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "PhysicianID"=>$row['PhysicianID'],
        "Specialization"=>$row['Specialization'],
        "Fullname"=>$row['Fullname']);
}

echo json_encode($data);
?>

									