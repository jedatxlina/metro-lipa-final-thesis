<?php
    require_once 'connection.php';

    $id = $_GET['id'];

    $sel = mysqli_query($conn,"SELECT * FROM diagnosis JOIN patients,attending_physicians,physicians,medical_details WHERE patients.AdmissionID = '$id' AND patients.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND diagnosis.MedicalID = medical_details.MedicalID");
   
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

									