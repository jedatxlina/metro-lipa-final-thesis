<?php

require_once 'connection.php';

$at = $_GET['at'];
$id = $_GET['id'];
$orderid = $_GET['orderid'];

$sel = mysqli_query($con,"SELECT a.SecretaryID,a.PhysicianID,b.PhysicianID,b.AdmissionID,b.AttendingID,c.*, CONCAT(d.Firstname, ' ' ,d.MiddleName, ' ', d.LastName) AS Pname,e.PhysicianID, CONCAT(e.Firstname, ' ' ,e.MiddleName, ' ', e.LastName) AS Dname,f.AdmissionID, GROUP_CONCAT(f.Findings SEPARATOR ', ') AS Findings FROM secretary a, attending_physicians b, orders c, patients d, physicians e, diagnosis f WHERE a.SecretaryID = '$at' AND a.PhysicianID = b.PhysicianID AND c.PhysicianID = b.PhysicianID AND b.AdmissionID = c.AdmissionID AND c.Status = 'Pending' AND d.AdmissionID = b.AdmissionID AND b.PhysicianID = e.PhysicianID AND c.OrderID = '$orderid' AND f.AdmissionID ='$id'");


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
            "Pname"=>$row['Pname'],
            "Dname"=>$row['Dname'],
            "Findings"=>$row['Findings']);
    }


    echo json_encode($data);

									