<?php
require_once 'connection.php';

date_default_timezone_set("Asia/Singapore");

$at = $_GET['at'];
$chk = $_GET['chk'];
$admissionid = $_GET['admissionid'];
$admissiontype = $_GET['admissiontype'];
$medicalid = $_GET['medicalid'];
$admission = 'Old Patient';

$date = date("Y-m-d");
$time = date("h:i A");

$sel = mysqli_query($con,"SELECT * FROM patients_archive WHERE ArchiveID = '$chk' LIMIT 1");

while ($row = mysqli_fetch_assoc($sel)) {
    $firstname=$row['FirstName'];
    $middlename=$row['MiddleName'];
    $lastname=$row['LastName'];
    $province=$row['Province'];
    $city=$row['City'];
    $brgy=$row['Brgy'];
    $address=$row['CompleteAddress'];
    $gender=$row['Gender'];
    $age=$row['Age'];
    $status=$row['CivilStatus'];
    $birthdate=$row['Birthdate'];
    $contact=$row['Contact'];
    $occupation=$row['Occupation'];
    $nationality=$row['Citizenship'];
}
$prepAddr = str_replace(' ','+',$address);
$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
$output= json_decode($geocode);
$latcoor = $output->results[0]->geometry->location->lat;
$longcoor = $output->results[0]->geometry->location->lng;

$query = "INSERT into patients(AdmissionID,AdmissionDate,AdmissionTime,AdmissionType,FirstName,MiddleName,LastName,Admission,Province,City,Brgy,CompleteAddress,latcoor,longcoor,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,Citizenship,MedicalID) 
VALUES('$admissionid','$date','$time','$admissiontype','$firstname','$middlename','$lastname','$admission','$province','$city','$brgy','$address','$latcoor','$longcoor','$gender','$exactage','$status','$birthdate','$contact','$occupation','$nationality','$medicalid')";

mysqli_query($con,$query);  

header("Location:../add-patient-next.php?at=$at&id=$admissionid&medid=$medicalid&param=$admissiontype");