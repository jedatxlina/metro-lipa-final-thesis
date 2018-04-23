<?php

require_once 'connection.php';

$at =  isset($_GET['at']) ? $_GET['at'] : '';
$admissionid =  isset($_GET['admissionid']) ? $_GET['admissionid'] : '';

$data = array();

if ($at != '' && $admissionid == '') {
    $sel = mysqli_query($conn,"SELECT PhysicianID, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM physicians WHERE PhysicianID NOT IN ('$at')");
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "PhysicianID"=>$row['PhysicianID'],
            "Fullname"=>$row['Fullname']);
    }
}       

if($at == '' && $admissionid == ''){
    $sel = mysqli_query($conn,"SELECT PhysicianID, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname, Specialization  FROM physicians");
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "PhysicianID"=>$row['PhysicianID'],
            "Fullname"=>$row['Fullname'],
            "Specialization"=>$row['Specialization']);
    }
}else{
    $sel = mysqli_query($conn,"SELECT * FROM physicians JOIN attending_physicians,medical_details,patients WHERE attending_physicians.PhysicianID = physicians.PhysicianID AND patients.AdmissionID = '$admissionid' AND patients.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID
    ");
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "PhysicianID"=>$row['PhysicianID'],
            "Lastname"=>$row['LastName'],
            "Firstname"=>$row['FirstName'],
            "Middlename"=>$row['MiddleName'],
            "Address"=>$row['Address'],
            "Specialization"=>$row['Specialization'],
            "Rate"=>$row['Rate'],
            "Fee"=>$row['ProfessionalFee']);
    }
}


echo json_encode($data);
?>

									