<?php

require_once 'connection.php';

$id =  isset($_GET['id']) ? $_GET['id'] : '';

if($id != ''){
    $query = "SELECT a.SecretaryID,a.PhysicianID,b.*,c.* FROM secretary a, attending_physicians b, orders c WHERE a.SecretaryID = '$id' AND a.PhysicianID = b.PhysicianID AND c.PhysicianID = b.PhysicianID AND b.AdmissionID = c.AdmissionID AND c.Status = 'Pending'";
}else{
    $query = "SELECT * FROM orders JOIN patients WHERE patients.AdmissionID = orders.AdmissionID AND orders.Status = 'Pending'";
}
$sel = mysqli_query($con,$query);

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

									