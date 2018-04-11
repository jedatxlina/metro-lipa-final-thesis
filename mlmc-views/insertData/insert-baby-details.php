<?php

    require_once 'connection.php';

    date_default_timezone_set("Asia/Singapore");

    $babyadmission = $_GET['babyadmission'];
    $admissionnid = $_GET['admissionid'];
    $lastname = $_GET['lastname'];
    $middlename = $_GET['middlename'];
    $firstname = $_GET['firstname'];
    $citizenship = $_GET['citizenship'];
    $bloodtype = $_GET['bloodtype'];
    $delivery = $_GET['delivery'];
    $weight = $_GET['weight'];
    $attendingid = $_GET['attending'];

    $date = date("Y-m-d");

    $time = date("h:i A");

    $query = "INSERT into nursery(NurseryID,AdmissionID,LastName,FirstName,MiddleName,Birthdate,Birthtime,Citizenship,BloodType,DeliveryType,Weight,AttendingID) 
    VALUES('$babyadmission','$admissionnid','$lastname','$firstname','$middlename','$date','$time','$citizenship','$bloodtype','$delivery','$weight','$attendingid')";

    mysqli_query($conn,$query);  

