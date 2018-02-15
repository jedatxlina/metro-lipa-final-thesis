<?php
require_once 'connection.php';


$id = $_GET['id'];
$lastname = $_GET['Lastname'];
$firstname = $_GET['Firstname'];
$middlename = $_GET['Middlename'];
$birthdate = $_GET['Birthdate'];
$gender = $_GET['Gender']; 
$province = $_GET['Province'];
$city = $_GET['City'];
$address = $_GET['Address'];
$age = $_GET['Age'];
$civilstatus = $_GET['CivilStatus'];
$contact = $_GET['Contact'];
$occupation = $_GET['Occupation'];
$religion = $_GET['Religion'];
$citizenship = $_GET['Citizenship'];

$query= "UPDATE patients SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', 
Birthdate = '$birthdate', Gender = '$gender', Province = '$province', City = '$city', CompleteAddress = '$address',
Age = '$age', CivilStatus = '$civilstatus', Contact = '$contact', Occupation = '$occupation', Religion = '$religion',
Citizenship = '$citizenship' WHERE AdmissionID = '$id'";

mysqli_query($con,$query);  

