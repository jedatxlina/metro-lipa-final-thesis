<?php
    require_once 'connection.php';

    $id = $_GET['id'];

    $sel = mysqli_query($conn,"SELECT diagnosis.*, CONCAT(physicians.Firstname, ' ' ,physicians.MiddleName, ' ', physicians.LastName) AS PhysicianFullname FROM diagnosis JOIN patients,attending_physicians,physicians WHERE patients.AdmissionID = '$id' AND patients.MedicalID = diagnosis.MedicalID AND diagnosis.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND attending_physicians.DiagnosisID = diagnosis.DiagnosisID");
   
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "AdmissionID"=>$row['AdmissionID'],
            "Findings"=>$row['Findings'],
            "AttendingID"=>$row['AttendingID'],
            "DateDiagnosed"=>$row['DateDiagnosed'],
            "TimeDiagnosed"=>$row['TimeDiagnosed'],
            "PhysicianFullname"=>$row['PhysicianFullname']);
    }

    echo json_encode($data);
?>

									