<?php
    require_once 'connection.php';

    $id = $_GET['id'];
    $at = $_GET['at'];
    $physicianid = $_GET['physicianid'];

    $query= "INSERT into referrals(AdmissionID,ReferredTo,ReferredBy) 
    VALUES ('$id','$physicianid','$at')";

    mysqli_query($conn,$query);  
    
?>
