<?php
require_once 'connection.php';


$id = $_GET['id'];
$lastname = $_GET['Lastname'];
$firstname = $_GET['Firstname'];
$middlename = $_GET['Middlename'];
$birthdate = $_GET['Birthdate'];
$address = $_GET['Address']; 
$fee = $_GET['ProfessionalFee']; 

$query= "UPDATE physicians SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', 
Birthdate = '$birthdate', Address = '$address', ProfessionalFee = '$fee' WHERE AccountID = '$id'";

mysqli_query($con,$query);  

