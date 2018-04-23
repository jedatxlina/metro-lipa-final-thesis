<?php
    require_once 'connection.php';

    $medtimelineid = rand (11111,99999);

    $at = $_GET['at'];
    $admissionid = $_GET['id'];
    $medid = $_GET['medid'];

    date_default_timezone_set("Asia/Singapore");
    $date = date("Y-m-d");
    $time = date("h:i A");

    $sel = mysqli_query($conn,"SELECT medication.*,dosing_time.DosingID,dosing_time.TimeInterval FROM medication JOIN dosing_time WHERE medication.ID = '$medid' AND medication.AdmissionID = '$admissionid' AND medication.DosingID = dosing_time.DosingID");

    while($row = mysqli_fetch_assoc($sel))
    {
        $medicationid=$row['MedicationID'];
        $medicinename = $row['MedicineName'];
        $qnty =  intval($row['Quantity']);
        $quantityOnhand =  intval($row['QuantityOnHand']);
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

    $query= "UPDATE medication SET QuantityOnHand = QuantityOnHand - 1 WHERE AdmissionID = '$admissionid' AND ID = '$medid'";

    mysqli_query($conn,$query); 


    $nextintake = date("h:i A", strtotime("+{$timeinterval} hours"));



    $query1= "INSERT into medication_timeline(MedTimelineID,MedicationID,AdmissionID,MedicineName,NurseID,DateIntake,TimeIntake,NextTimeIntake) 
    VALUES ('$medtimelineid','$medicationid','$admissionid','$medicinename','$at','$date','$time','$nextintake')";


    mysqli_query($conn,$query1);  

    header("Location:../nurse-patient.php?at=$at");
?>

