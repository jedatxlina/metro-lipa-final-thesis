<?php

require_once 'connection.php';

$at = $_GET['at'];
$id = $_GET['id'];

$sel = mysqli_query($con,"SELECT a.SecretaryID,a.PhysicianID,b.*,c.*,d.* FROM secretary a, attending_physicians b, orders c,physicians d WHERE a.SecretaryID = '$at' AND a.PhysicianID = b.PhysicianID AND c.PhysicianID = b.PhysicianID AND c.AdmissionID =  '$id' AND b.PhysicianID = d.PhysicianID");

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
            "Status"=>$row['Status'],
            "Lname"=>$row['LastName'],
            "Fname"=>$row['FirstName'],
            "Mname"=>$row['MiddleName']);
    }
    echo json_encode($data);


?>

									