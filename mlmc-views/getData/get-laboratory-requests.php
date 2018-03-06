<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM laboratory_req JOIN laboratories JOIN patients WHERE laboratory_req.LaboratoryID = laboratories.LaboratoryID AND laboratory_req.AdmissionID = patients.AdmissionID AND Status = 'Pending' ");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "RequestID"=>$row['RequestID'],
        "LaboratoryID"=>$row['LaboratoryID'],
        "Fullname"=>$row['Fullname'],
        "Description"=>$row['Description'],
        "AdmissionID"=>$row['AdmissionID'],
        "Status"=>$row['Status'],
        "Rate"=>$row['Rate']);
}
echo json_encode($data);
?>

									