<?php

require_once 'connection.php';

$id= $_GET['id'];
$sel = mysqli_query($conn,"SELECT patient_diet.Diet, patient_diet.DietRemarks, CONCAT(patients.FirstName, ' ',patients.MiddleName, ' ', patients.LastName) AS Fullname FROM patient_diet JOIN patients WHERE patient_diet.AdmissionID = '$id' AND patients.AdmissionID = '$id'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "Diet"=>$row['Diet'],
        "Fullname"=>$row['Fullname'],
        "DietRemarks"=>$row['DietRemarks']);
}
echo json_encode($data);


?>

									