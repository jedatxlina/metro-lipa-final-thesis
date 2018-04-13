<?php
require_once 'connection.php';
    date_default_timezone_set("Asia/Singapore");
    $at = $_GET['at'];
    $medtimeline = $_GET['medtimeline'];
    $randstring =  rand(111111, 999999);     

    $date = date("Y-m-d");
    $time = date("h:i A");

    $query = "UPDATE medication_timeline SET Status = 0 WHERE MedTimelineID = '$medtimeline'";

    mysqli_query($conn,$query);  
    
    $sel = mysqli_query($conn,"SELECT *,medication.MedicationID,dosing_time.TimeInterval FROM medication_timeline JOIN medication, dosing_time WHERE medication_timeline.MedTimelineID = '$medtimeline' AND medication.MedicationID = medication_timeline.MedicationID AND medication.DosingID = dosing_time.DosingID");
 
    while ($row = mysqli_fetch_assoc($sel)) {
   
        $TimelineID=$row['MedTimelineID'];
        $MedicationID=$row['MedicationID'];
        $AdmissionID=$row['AdmissionID'];
        $MedicineID=$row['MedicineID'];
        $NurseID=$row['NurseID'];
        $DateIntake=$row['DateIntake'];
        $TimeIntake=$row['TimeIntake'];
        $NextTimeIntake=$row['NextTimeIntake'];
        $timeinterval = $row['TimeInterval'];

    }

    // $nextintake = date("h:i A", strtotime("+{$timeinterval} hours"));

    // $query1 = "INSERT into medication_timeline(MedTimelineID,MedicationID,AdmissionID,MedicineID,NurseID,DateIntake,TimeIntake,NextTimeIntake,Alert,Status) 
    // VALUES('$randstring','$MedicationID','$AdmissionID','$MedicineID','$at','$date','$NextTimeIntake','$nextintake',0,1)";

    mysqli_query($conn,$query1);  
?>
