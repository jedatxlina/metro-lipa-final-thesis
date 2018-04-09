<?php

    require_once 'connection.php';
    date_default_timezone_set("Asia/Singapore");
    $date = date("Y-m-d");
    $time = date("h:i A");  
    $datetime = date("Y-m-d h:i A");

    $at = $_GET['at'];
    $admissionid = $_GET['id'];
    
    $chk = 0; 

    $sel = mysqli_query($conn,"SELECT MedicineID,AdmissionID, DateRequested,TimeRequested FROM medicine_req WHERE AdmissionID = '$admissionid'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $daterequested = $row['DateRequested'];
        if($date == $daterequested){
            $chk = 1;
        }else{
            $chk = 0;
        }
    }

    echo json_encode($chk);
?>

									