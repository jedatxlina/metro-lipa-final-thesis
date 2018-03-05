<?php

require_once 'connection.php';
$at = $_GET['at'];
$id = $_GET['id'];

$sel = mysqli_query($con,"SELECT a.AdmissionID,b.*,c.*,d.*,e.* FROM patients a, medical_details b, diagnosis c,attending_physicians d,physicians e WHERE a.AdmissionID = '$id' AND b.AdmissionID = a.AdmissionID AND c.DiagnosisID = b.DiagnosisID AND d.AttendingID = c.AttendingID AND e.PhysicianID = d.PhysicianID");

    $data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "AdmissionID"=>$row['AdmissionID'], 
            "DiagnosisID"=>$row['DiagnosisID'],
            "AttendingID"=>$row['AttendingID'],
            "Findings"=>$row['Findings'],
            "DateDiagnosed"=>$row['DateDiagnosed'],
            "TimeDiagnosed"=>$row['TimeDiagnosed'],
            "MedicationID"=>$row['MedicationID'],
            "Lname"=>$row['LastName'],
            "Fname"=>$row['FirstName'],
            "Mname"=>$row['MiddleName']);
    }
    echo json_encode($data);


?>

									