<?php

require_once 'connection.php';

$sel = mysqli_query($con,"SELECT *, CONCAT(patients.FirstName, ', ' ,patients.MiddleName, ' ',patients.LastName) AS Fullname, CONCAT(pharmaceuticals.MedicineName, ' ' , pharmaceuticals.Unit) AS Medicine FROM medicine_req JOIN pharmaceuticals JOIN patients WHERE medicine_req.MedicineID = pharmaceuticals.MedicineID AND patients.AdmissionID = medicine_req.AdmissionID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "FullName"=>$row['Fullname'],
        "MedRequestID"=>$row['MedRequestID'],        
        "Medicine"=>$row['Medicine'],
        "Status"=>$row['Status'],
        "Quantity"=>$row['Quantity'];
}
echo json_encode($data);
?>

									