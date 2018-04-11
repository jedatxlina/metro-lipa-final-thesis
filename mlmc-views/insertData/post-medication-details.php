<?php
    require_once 'connection.php';

    $medtimelineid = rand (11111,99999);

    $at = $_GET['at'];
    $admissionid = $_GET['id'];
    $medid = $_GET['medicationid'];

    date_default_timezone_set("Asia/Singapore");
    $date = date("Y-m-d");
    $time = date("h:i A");

    $sel = mysqli_query($conn,"SELECT b.*,c.DosingID,c.TimeInterval FROM medication b, dosing_time c WHERE b.AdmissionID = '$admissionid' AND b.DosingID = c.DosingID AND b.MedicationID = '$medid'");

    while($row = mysqli_fetch_assoc($sel))
    {
        $medicationid=$row['MedicationID'];
        $medicineid = $row['MedicineID'];
        $qnty =  intval($row['Quantity']);
        $dateadministered = $row['DateAdministered'];
        $timeadminitered = $row['TimeAdministered'];
        $datestart = $row['DateStart'];
        $timestart = $row['TimeStart'];
        $timeinterval = $row['TimeInterval'];
    }

    if($datestart == '' && $timestart == ''){
    
        $query= "UPDATE medication SET DateStart = '$date', TimeStart = '$time' WHERE AdmissionID = '$admissionid' AND ID = '$medid'";

        mysqli_query($conn,$query);    

    }

    $query= "UPDATE medication SET Quantity = Quantity - 1 WHERE AdmissionID = '$admissionid' AND ID = '$medid'";

    mysqli_query($conn,$query); 


    $nextintake = date("h:i A", strtotime("+{$timeinterval} hours"));

    $query1= "INSERT into medication_timeline(MedTimelineID,MedicationID,AdmissionID,MedicineID,NurseID,DateIntake,TimeIntake,NextTimeIntake) 
    VALUES ('$medtimelineid','$medicationid','$admissionid','$medicineid','$at','$date','$time','$nextintake')";


    mysqli_query($conn,$query1);  

    header("Location:../nurse-patient.php?at=$at");
?>

