<?php

    require_once 'connection.php';

    $at = $_GET['at'];
    $id = $_GET['id'];

    $randstring = rand(111111, 999999);
    $randstring2 = rand(111111, 999999);
    
    $sel = mysqli_query($conn,"SELECT referrals.AdmissionID,medical_details.AttendingID FROM referrals JOIN medical_details,patients WHERE referrals.ID = '$id' AND patients.AdmissionID = referrals.AdmissionID AND patients.MedicalID = medical_details.MedicalID");

    while ($row = mysqli_fetch_assoc($sel)) {
        $admissionid = $row['AdmissionID'];
        $attendingid = $row['AttendingID'];
    }


    $query = "DELETE FROM referrals WHERE ID = '$id'";

    mysqli_query($conn,$query);  

    $query2 = "INSERT into attending_physicians(AttendingID,PhysicianID,AdmissionID,DiagnosisID) VALUES('$attendingid','$at','$admissionid','$randstring2')";

    mysqli_query($conn,$query2);  
?>
