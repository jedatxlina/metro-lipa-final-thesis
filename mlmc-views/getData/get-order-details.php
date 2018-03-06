<?php

require_once 'connection.php';

$id = $_GET['id'];

$sel = mysqli_query($con,"SELECT a.SecretaryID,a.PhysicianID,b.*,c.* FROM secretary a, attending_physicians b, orders c WHERE a.SecretaryID = '$id' AND a.PhysicianID = b.PhysicianID AND c.PhysicianID = b.PhysicianID AND b.AdmissionID = c.AdmissionID AND c.Status = 'Pending'");

$data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "OrderID"=>$row['OrderID'], 
            "AdmissionID"=>$row['AdmissionID'],
            "PhysicianID"=>$row['PhysicianID'],
            "Task"=>$row['Task'],
            "LaboratoryID"=>$row['LaboratoryID'],
            "DateOrder"=>$row['DateOrder'],
            "TimeOrder"=>$row['TimeOrder'],
            "Status"=>$row['Status']);
    }
    echo json_encode($data);


?>

									