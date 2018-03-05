<?php
require_once 'connection.php';

date_default_timezone_set("Asia/Singapore");

$babyadmission = $_GET['babyadmission'];
$admissionnid = $_GET['admissionid'];
$lastname = $_GET['lastname'];
$middlename = $_GET['middlename'];
$firstname = $_GET['firstname'];
$birthdate = $_GET['birthdate'];
$birthtime = $_GET['birthtime'];
$citizenship = $_GET['citizenship'];
$bloodtype = $_GET['bloodtype'];
$delivery = $_GET['delivery'];
$birthdate = date("Y-m-d", strtotime($birthdate));



$query = "INSERT into nursery(NurseryID,AdmissionID,LastName,FirstName,MiddleName,Birthdate,Birthtime,Citizenship,BloodType,DeliveryType) 
VALUES('$babyadmission','$admissionnid','$lastname','$firstname','$middlename','$birthdate','$birthtime','$citizenship','$bloodtype','$delivery')";

mysqli_query($con,$query);  

