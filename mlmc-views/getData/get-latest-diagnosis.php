<?php

require_once 'connection.php';

$admissionid= $_GET['admissionid'];

$sel = mysqli_query($conn,"SELECT diagnosis.*,physicians.FirstName,physicians.MiddleName,physicians.LastName FROM diagnosis JOIN attending_physicians,physicians WHERE diagnosis.AdmissionID = '$admissionid' AND diagnosis.AttendingID = attending_physicians.AttendingID AND diagnosis.DiagnosisID = attending_physicians.DiagnosisID AND attending_physicians.PhysicianID = physicians.PhysicianID ORDER BY diagnosis.ID DESC LIMIT 1");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "ID"=>$row['ID'],
        "DiagnosisID"=>$row['DiagnosisID'],
        "Findings"=>$row['Findings'],
        "DateDiagnosed"=>$row['DateDiagnosed'],
        "TimeDiagnosed"=>$row['TimeDiagnosed'],
        "PhysicianFirstname"=>$row['FirstName'],
        "PhysicianMiddlename"=>$row['MiddleName'],
        "PhysicianLastname"=>$row['LastName'] );
}
echo json_encode($data);

?>

									