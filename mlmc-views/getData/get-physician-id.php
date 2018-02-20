<?php

require_once 'connection.php';
$accid = $_GET['accid'];
$sel = mysqli_query($con,"SELECT * FROM physicians WHERE PhysicianID='$accid'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "PhysicianID"=>$row['PhysicianID'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "Specialization"=>$row['Specialization'],
        "ProfessionalFee"=>$row['ProfessionalFee'],
        "Email"=>$row['Email']);
}

echo json_encode($data);
?>

									