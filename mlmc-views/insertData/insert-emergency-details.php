<?php
require_once 'connection.php';


$admissionid = $_GET['admissionid'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$lastname = $_GET['lastname'];
$admissiontype = $_GET['admissiontype'];
$province = $_GET['province'];
$city = $_GET['city'];
$gender = $_GET['gender'];
$age = $_GET['age'];
$status = $_GET['status'];
$date = $_GET['birthdate'];
$contact = $_GET['contact'];
$class = $_GET['classification'];
$occupation = $_GET['occupation'];
$medicalid = $_GET['medicalid'];

$admission = 'New Patient';

$query = "INSERT into patients(AdmissionID,AdmissionDateTime,AdmissionType,FirstName,MiddleName,LastName,Admission,Province,City,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,MedicalID) 
VALUES('$admissionid',NOW(),'$admissiontype','$firstname','$middlename','$lastname','$admission','$province','$city','$gender','$age','$status','$date','$contact','$occupation','$medicalid')";

mysqli_query($con,$query);  

?>
