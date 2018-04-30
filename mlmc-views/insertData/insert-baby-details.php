<?php

    require_once 'connection.php';

    date_default_timezone_set("Asia/Singapore");

    $attendingid = rand(111111, 999999);
    $nurseryid = rand(111111, 999999);
    $medicationid = rand(111111, 999999);
    $vitalsid = rand(111111, 999999);

    $medicalid = $_GET['medicalid'];
    $babyadmission = $_GET['babyadmission'];
    $admissionid = $_GET['admissionid'];
    $lastname = $_GET['lastname'];
    $middlename = $_GET['middlename'];
    $firstname = $_GET['firstname'];
    $citizenship = $_GET['citizenship'];
    $bloodtype = $_GET['bloodtype'];
    $delivery = $_GET['delivery'];
    $weight = $_GET['weight'];
    $attending = $_GET['attending'];

    $date = date("Y-m-d");

    $time = date("h:i A");

    $sel = mysqli_query($conn,"SELECT Province,City,Brgy,CompleteAddress FROM patients WHERE AdmissionID = '$admissionid'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $province = $row['Province'];
        $city = $row['City'];
        $brgy = $row['Brgy'];
        $address = $row['CompleteAddress'];
    }


    $query = "INSERT into patients(AdmissionID,AdmissionDate,AdmissionTime,AdmissionType,FirstName,MiddleName,LastName,Admission,Province,City,Brgy,CompleteAddress,Birthdate,Citizenship,MedicalID) 
    VALUES('$babyadmission','$date','$time','Inpatient','$firstname','$middlename','$lastname','New Patient','$province','$city','$brgy','$address','$date','$citizenship','$medicalid')";

    mysqli_query($conn,$query);  

    $query = "INSERT into medical_details(MedicalID,AdmissionID,AttendingID,ArrivalDate,ArrivalTime,BedID,VitalsID,MedicationID,Weight) 
    VALUES('$medicalid','$babyadmission','$attendingid','$date','$time','Infant','$vitalsid','$medicationid','$weight')";

    mysqli_query($conn,$query);  

    $query = "INSERT into nursery(NurseryID,AdmissionID,BloodType,DeliveryType,Weight,AttendingID) 
    VALUES('$babyadmission','$admissionnid','$bloodtype','$delivery','$weight','$attendingid')";

    mysqli_query($conn,$query);  

