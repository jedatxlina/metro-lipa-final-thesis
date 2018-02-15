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
$age = $_GET['age'];
$status = $_GET['status'];
$date = $_GET['birthdate'];
$birthdate = date("Y/m/d", strtotime($date));
$contact = $_GET['contact'];
$class = $_GET['classification'];
$occupation = $_GET['occupation'];
$medicalid = $_GET['medicalid'];

$admissiondatetime = date("Y/m/d h:i:sa");

$sel = mysqli_query($con,"SELECT * FROM patients_archive WHERE FirstName='$firstname' AND MiddleName='$middlename' AND LastName = '$lastname' AND Birthdate='$date'");
$rows = mysqli_num_rows($sel);
if($rows >= 1){
    $admission = 'Old Patient';
}else{
    $admission = 'New Patient';
}


$query = "INSERT into patients(AdmissionID,AdmissionDateTime,AdmissionType,FirstName,MiddleName,LastName,Admission,Province,City,CompleteAddress,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,MedicalID) 
VALUES('$admissionid','$admissiondatetime','$admissiontype','$firstname','$middlename','$lastname','$admission','$province','$city','$address','$gender','$age','$status','$birthdate','$contact','$occupation','$medicalid')";

mysqli_query($con,$query);  

?>
