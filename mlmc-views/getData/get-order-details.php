<?php

require_once 'connection.php';

$id =  isset($_GET['id']) ? $_GET['id'] : '';

if($id != ''){
    $query = "SELECT CONCAT(patients.Firstname, ' ' ,patients.MiddleName, ' ', patients.LastName) AS Pname,physicians.PhysicianID, CONCAT(physicians.Firstname, ' ' ,physicians.MiddleName, ' ', physicians.LastName) AS Dname, orders.* FROM orders JOIN patients,secretary,physicians WHERE secretary.SecretaryID = '$id' AND orders.PhysicianID = physicians.PhysicianID AND orders.Status = 'Pending' AND patients.AdmissionID = orders.AdmissionID";
}else{
    $query = "SELECT orders.*,CONCAT(patients.Firstname, ' ' ,patients.MiddleName, ' ', patients.LastName) AS Pname,CONCAT(physicians.Firstname, ' ' ,physicians.MiddleName, ' ', physicians.LastName) AS Dname FROM orders JOIN patients,physicians WHERE patients.MedicalID = orders.MedicalID AND orders.PhysicianID = physicians.PhysicianID AND orders.Status = 'Pending'";
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

									