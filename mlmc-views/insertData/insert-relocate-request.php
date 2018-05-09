<?php
    require_once 'connection.php';
    
    $transrequestid =  rand(111111, 999999); 
    $id = $_GET['AdmissionID'];
    $bedid = $_GET['BedID'];
    $request = $_GET['SpecialRequest'];

    $sel = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE AdmissionID = '$id'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $medicalid = $row['MedicalID'];
    }

    mysqli_query($conn,$query);  
    
    $query = "INSERT into relocate_req(TransRequestID,AdmissionID,MedicalID,BedID,SpecialRequest) 
    VALUES('$transrequestid','$id','$medicalid','$bedid','$request')";
    
    mysqli_query($conn,$query);
    
?>
