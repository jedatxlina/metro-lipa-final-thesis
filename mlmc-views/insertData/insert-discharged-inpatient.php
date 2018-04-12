<?php
    require_once 'connection.php';

    date_default_timezone_set("Asia/Singapore");

    $id = $_GET['id'];


    $query = "INSERT INTO patients_archive(ArchiveID,AdmissionDate,AdmissionTime,FirstName,MiddleName,LastName,Admission,AdmissionType,Province,City,Brgy,CompleteAddress,latcoor,longcoor,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,Citizenship,MedicalID)
    SELECT a.AdmissionID,a.AdmissionDate,a.AdmissionTime,a.FirstName,a.MiddleName,a.LastName,a.Admission,a.AdmissionType,a.Province,a.City,a.Brgy,a.CompleteAddress,a.latcoor,a.longcoor,a.Gender,a.Age,a.CivilStatus,a.Birthdate,a.Contact,a.Occupation,a.Citizenship,a.MedicalID
    FROM patients a
    WHERE a.AdmissionID = '$id'";

    
    mysqli_query($conn,$query);

    $query2 = "DELETE FROM patients WHERE AdmissionID = '$id'";

    mysqli_query($conn,$query2);

    
    $sel = mysqli_query($conn,"SELECT BedID FROM medical_details WHERE AdmissionID = '$id'");
    while ($row = mysqli_fetch_assoc($sel)) {
        $bedid = $row['BedID'];
    }

    $query3 = "DELETE FROM patients WHERE AdmissionID = '$id'";

    mysqli_query($conn,$query2);

    $query4 = "UPDATE beds SET Status = 'Unavailable' WHERE BedID = '$bedid'";

    mysqli_query($conn,$query4);  


    require('../vendor/autoload.php');
            
    $options = array(
        'cluster' => 'ap1',
        'encrypted' => true
    );

    $pusher = new Pusher\Pusher(
        'c23d5c3be92c6ab27b7a',
        '296fc518f7ee23f7ee56',
        '468021',       
        $options
    );

    $data['message'] = "Successfully Discharged!";
    $pusher->trigger('my-channel-discharge', 'my-event-discharge', $data);







