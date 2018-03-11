<?php

require_once 'connection.php';
$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM billing_staff");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['BillingStaffID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Billing Staff',
        "Email"=>$row['Email']);
}

$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM lab_staff");


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['LaboratoryStaffID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Laboratory Staff',
        "Email"=>$row['Email']);
}

$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM physicians");


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['PhysicianID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Physician',
        "Email"=>$row['Email']);
}

$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM nurses");


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['NurseID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Nurse',
        "Email"=>$row['Email']);
}


$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM secretary");


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['SecretaryID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Secretary',
        "Email"=>$row['Email']);
}

$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM pharmacy_staff");


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['PharmacyStaffID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Pharmacy',
        "Email"=>$row['Email']);
}

$sel = mysqli_query($con,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM admission_staffs");


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['AdmissionStaffID'],
        "Fullname"=>$row['Fullname'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "AccessType"=>'Admission Staff',
        "Email"=>$row['Email']);
}

echo json_encode($data);
?>

											