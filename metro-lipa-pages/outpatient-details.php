<?php
require_once '../assets/connection.php';
mysql_select_db("metro_lipa_db", $con);


$patientid = $_POST['patientid'];
$arrivaldatetime = $_POST['arrivaldatetime'];
$arrivaldatetime = str_replace(' - ',' ',$arrivaldatetime);
$type = $_POST['patienttype'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];
$birthdate = str_replace(' - ',' ',$birthdate);
$birthplace = $_POST['birthplace'];
$gender = $_POST['gender'];
$civilstatus = $_POST['civilstatus'];
$nationality = $_POST['nationality'];
$citizenship = $_POST['citizenship'];
$bloodtype = $_POST['bloodtype'];
$religion = $_POST['religion'];
$occupation = $_POST['occupation'];


	$sql= "INSERT into patients(PatientID,Type,AdmissionDateTime,Fname,Mname,Lname,Gender,Birthdate,Address,CivilStatus,BirthPlace,Citizenship,Nationality,Religion,Bloodtype,Occupation) VALUES ('$patientid','$type','$arrivaldatetime','$firstname','$middlename','$lastname','$gender','$birthdate','$address','$civilstatus','$birthplace','$citizenship','$nationality','$religion','$bloodtype','$occupation')";

if(!mysql_query($sql,$con))
{
die('Error: ' . mysql_error());
}             

mysql_close($con);

header('Location:outpatient.php');
?>
