<?php

    require_once 'connection.php';

    date_default_timezone_set("Asia/Singapore");

    $attendingid = rand(111111, 999999);
    $nurseryid = rand(111111, 999999);
    $medicationid = rand(111111, 999999);
    $vitalsid = rand(111111, 999999);
    $diagnosisid = rand(111111, 999999);
    $durationid = rand(111111, 999999);

    $medicalid = $_GET['medicalid'];
    $babyadmission = $_GET['babyadmission'];
    $admissionid = $_GET['admissionid'];
    $lastname = $_GET['lastname'];
    $middlename = $_GET['middlename'];
    $firstname = $_GET['firstname'];
    $babygender = $_GET['babygender'];
    $citizenship = $_GET['citizenship'];
    $bloodtype = $_GET['bloodtype'];
    $delivery = $_GET['delivery'];
    $weight = $_GET['weight'];
    $attending = $_GET['attending'];
    $status = 'Single';
    
    $date = date("Y-m-d");

    $time = date("h:i A");
    $datetime = date("Y-m-d h:i A");

    $sel = mysqli_query($conn,"SELECT Province,City,Brgy,CompleteAddress FROM patients WHERE AdmissionID = '$admissionid'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $province = $row['Province'];
        $city = $row['City'];
        $brgy = $row['Brgy'];
        $address = $row['CompleteAddress'];
    }

    


    $query = "INSERT into patients(AdmissionID,AdmissionDate,AdmissionTime,FirstName,MiddleName,LastName,Admission,AdmissionType,Province,City,Brgy,CompleteAddress,Gender,Age,CivilStatus,Birthdate,Occupation,Citizenship,MedicalID) 
    VALUES('$babyadmission','$date','$time','$firstname','$middlename','$lastname','New Patient','Inpatient','$province','$city','$brgy','$address','$babygender','0','Single','$date','Unemployed','$citizenship','$medicalid')";

    mysqli_query($conn,$query);  

    $query = "INSERT into medical_details(MedicalID,AdmissionID,AttendingID,ArrivalDate,ArrivalTime,BedID,VitalsID,MedicationID,Weight) 
    VALUES('$medicalid','$babyadmission','$attendingid','$date','$time','Infant','$vitalsid','$medicationid','$weight')";

    mysqli_query($conn,$query);  

    $query = "INSERT into nursery(NurseryID,AdmissionID,BloodType,DeliveryType,Weight,MedicalID) 
    VALUES('$babyadmission','$admissionid','$bloodtype','$delivery','$weight','$medicalid')";

    mysqli_query($conn,$query);  

    
    $query = "INSERT into attending_physicians(AttendingID,PhysicianID,AdmissionID,DiagnosisID) 
    VALUES('$attendingid','$attending','$babyadmission','$diagnosisid')";

    mysqli_query($conn,$query);  

    $sel5 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID = '$babyadmissionid'");

    while ($row = mysqli_fetch_assoc($sel5)) {
        $adno = $row['AdmissionNo'];
    }

    $query = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
    VALUES('$durationid','$babyadmission','$adno','$datetime','0000-00-00 00:00:00','Infant','0000')";

    mysqli_query($conn,$query); 
    
    header( "location: insert-baby-room.php?id=".$babyadmission);
