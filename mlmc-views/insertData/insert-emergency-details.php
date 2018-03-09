<?php
require_once 'connection.php';

date_default_timezone_set("Asia/Singapore");

$admissionid = $_GET['admissionid'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$lastname = $_GET['lastname'];
$admissiontype = $_GET['admissiontype'];
$province = $_GET['province'];
$city = $_GET['city'];
$address = $_GET['address'];
$gender = $_GET['gender'];
// $age = $_GET['age'];
$status = $_GET['status'];
$date = $_GET['birthdate'];
$birthdate = date("Y-m-d", strtotime($date));
$contact = $_GET['contact'];
$occupation = $_GET['occupation'];
$medicalid = $_GET['medicalid'];
$nationality = $_GET['nationality'];

$parameterage  = date_create($birthdate);
$currentdatetime 	= date_create(); // Current time and date

$getage =  date_diff( $parameterage, $currentdatetime );

$yearage = $getage->y;
$monage = $getage->m;

$exactage = $yearage . 'y' . $monage . 'm';

$date = date("Y-m-d");
$time = date("h:i A");

$sel = mysqli_query($con,"SELECT * FROM patients_archive WHERE FirstName='$firstname' AND MiddleName='$middlename' AND LastName = '$lastname' AND Birthdate='$date'");

$rows = mysqli_num_rows($sel);
if($rows >= 1){
    $admission = 'Old Patient';
}else{
    $admission = 'New Patient';
}


$query = "INSERT into patients(AdmissionID,AdmissionDate,AdmissionTime,AdmissionType,FirstName,MiddleName,LastName,Admission,Province,City,CompleteAddress,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,Citizenship,MedicalID) 
VALUES('$admissionid','$date','$time','$admissiontype','$firstname','$middlename','$lastname','$admission','$province','$city','$address','$gender','$exactage','$status','$birthdate','$contact','$occupation','$nationality','$medicalid')";

mysqli_query($con,$query);  

?>
