<?php
    require_once 'connection.php';

    $id = $_GET['id'];

    $sel = mysqli_query($conn,"SELECT * FROM diagnosis JOIN medical_details,attending_physicians,physicians WHERE diagnosis.AdmissionID = '$id' AND diagnosis.MedicalID = medical_details.MedicalID AND diagnosis.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID");
    $data = array();
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "AdmissionID"=>$row['AdmissionID'],
            "Findings"=>$row['Findings'],
            "AttendingID"=>$row['AttendingID'],
            "DateDiagnosed"=>$row['DateDiagnosed'],
            "TimeDiagnosed"=>$row['TimeDiagnosed'],
            "PhysicianLastname"=>$row['LastName'],
            "PhysicianFirstname"=>$row['FirstName'],
            "PhysicianMiddlename"=>$row['MiddleName']);
    }

    echo json_encode($data);
?>

									