<?php

require_once 'connection.php';
$accid = $_GET['accid'];
$sel = mysqli_query($con,"SELECT * FROM lab_staff WHERE LaboratoryStaffID='$accid'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['LaboratoryStaffID'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "Email"=>$row['Email']);
}

echo json_encode($data);
?>

									