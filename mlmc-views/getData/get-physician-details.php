<?php

require_once 'connection.php';

$at =  isset($_GET['at']) ? $_GET['at'] : '';
$admissionid =  isset($_GET['admissionid']) ? $_GET['admissionid'] : '';

$data = array();

if($at == '' && $admissionid == ''){
    $sel = mysqli_query($conn,"SELECT PhysicianID, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM physicians");
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "PhysicianID"=>$row['PhysicianID'],
            "Fullname"=>$row['Fullname']);
    }
}else{
    $sel = mysqli_query($conn,"SELECT * FROM physicians JOIN attending_physicians WHERE attending_physicians.AdmissionID = '$admissionid' AND attending_physicians.PhysicianID = physicians.PhysicianID");
    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array(
            "PhysicianID"=>$row['PhysicianID'],
            "Lastname"=>$row['LastName'],
            "Firstname"=>$row['FirstName'],
            "Middlename"=>$row['MiddleName'],
            "Address"=>$row['Address'],
            "Rate"=>$row['Rate'],
            "Fee"=>$row['ProfessionalFee']);
    }
}


echo json_encode($data);
?>

									