<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT PhysicianID, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM physicians");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['PhysicianID'],
        "Fullname"=>$row['Fullname']);
}

echo json_encode($data);
?>

									