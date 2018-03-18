<?php

require_once 'connection.php';

$at = $_GET['at'];
$id = $_GET['id'];
$orderid = $_GET['orderid'];

$sel = mysqli_query($con,"SELECT * FROM Medication WHERE AdmissionID = '$id");

    $data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "AdmissionID"=>$row['AdmissionID'], 
            "DiagnosisID"=>$row['DiagnosisID'],
            "AttendingID"=>$row['AttendingID'],
            "Findings"=>$row['Findings'],
            "DateDiagnosed"=>$row['DateDiagnosed'],
            "TimeDiagnosed"=>$row['TimeDiagnosed'],
            "MedicationID"=>$row['MedicationID'],
            "Lname"=>$row['LastName'],
            "Fname"=>$row['FirstName'],
            "Mname"=>$row['MiddleName']);
    }
    echo json_encode($data);


?>

									