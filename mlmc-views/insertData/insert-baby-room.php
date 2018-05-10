<?php

    require_once 'connection.php';

    date_default_timezone_set("Asia/Singapore");
    $durationid = rand(111111, 999999);
    $babyadmission = $_GET['id'];
    $datetime = date("Y-m-d h:i A");

    $sel5 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID = '$babyadmissionid'");

    while ($row = mysqli_fetch_assoc($sel5)) {
        $adno = $row['AdmissionNo'];
    }

    $query = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
    VALUES('$durationid','$babyadmission','$adno','$datetime','0000-00-00 00:00:00','Infant','0000')";

    mysqli_query($conn,$query);
?>
