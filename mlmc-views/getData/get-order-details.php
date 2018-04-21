<?php

require_once 'connection.php';

$id =  isset($_GET['id']) ? $_GET['id'] : '';

if($id != ''){
    $query = "SELECT a.SecretaryID,a.PhysicianID,b.PhysicianID,b.AdmissionID,c.*, CONCAT(d.Firstname, ' ' ,d.MiddleName, ' ', d.LastName) AS Pname,e.PhysicianID, CONCAT(e.Firstname, ' ' ,e.MiddleName, ' ', e.LastName) AS Dname FROM secretary a, attending_physicians b, orders c, patients d, physicians e WHERE a.SecretaryID = '$id' AND a.PhysicianID = b.PhysicianID AND c.PhysicianID = b.PhysicianID AND b.AdmissionID = c.AdmissionID AND c.Status = 'Pending' AND d.AdmissionID = b.AdmissionID AND b.PhysicianID = e.PhysicianID AND d.AdmissionType = 'Outpatient'";
}else{
    $query = "SELECT orders.*,CONCAT(patients.Firstname, ' ' ,patients.MiddleName, ' ', patients.LastName) AS Pname,CONCAT(physicians.Firstname, ' ' ,physicians.MiddleName, ' ', physicians.LastName) AS Dname FROM orders JOIN patients,physicians WHERE patients.MedicalID = orders.MedicalID AND orders.PhysicianID = physicians.PhysicianID";
}
$sel = mysqli_query($conn,$query);

$data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "OrderID"=>$row['OrderID'], 
            "Pname"=>$row['Dname'],
            "Dname"=>$row['Pname'],
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

									