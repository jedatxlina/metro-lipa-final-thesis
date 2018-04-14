<?php

require_once 'connection.php';

if(isset($_GET['id'])){
$id =  $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM patients_archive  WHERE ArchiveID = '$id' ");

}else{

$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$lastname = $_GET['lastname'];

$date = $_GET['birthdate'];

$birthdate = date("Y-m-d", strtotime($date));

$sel = mysqli_query($conn,"SELECT * FROM patients_archive  WHERE (FirstName LIKE '%$firstname%' OR MiddleName LIKE '%$middlename%' OR LastName LIKE '%$lastname%') ORDER BY ArchiveNo DESC LIMIT 1");

}

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "ArchiveID"=>$row['ArchiveID'],
        "Firstname"=>$row['FirstName'],
        "Middlename"=>$row['MiddleName'],
        "Lastname"=>$row['LastName'],
        "Province"=>$row['Province'],
        "City"=>$row['City'],
        "CompleteAddress"=>$row['CompleteAddress'],
        "Gender"=>$row['Gender'],
        "Age"=>$row['Age'],
        "Status"=>$row['CivilStatus'],
        "Birthdate"=>$row['Birthdate'],
        "Contact"=>$row['Contact'],
        "Occupation"=>$row['Occupation'],
        "Nationality"=>$row['Citizenship']);
}
echo json_encode($data);

									