<?php

    require_once 'connection.php';

    $at = $_GET['at'];
    $id = $_GET['id'];

    $randstring = rand(111111, 999999);

    
    $sel = mysqli_query($conn,"SELECT AdmissionID FROM referrals WHERE ID = '$id'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $admissionid = $row['AdmissionID'];
    }


    $query = "DELETE FROM referrals WHERE ID = '$id'";

    mysqli_query($conn,$query);  

    $query2 = "INSERT into attending_physicians(AttendingID,PhysicianID,AdmissionID) VALUES('$randstring','$at','$admissionid')";

    mysqli_query($conn,$query2);  
?>
