<?php
require_once 'connection.php';


$id = $_GET['id'];
$lastname = $_GET['Lastname'];
$firstname = $_GET['Firstname'];
$middlename = $_GET['Middlename'];
$gender = $_GET['Gender'];
$birthdate = $_GET['Birthdate'];
$specialization = $_GET['Specialization'];
$address = $_GET['Address']; 
$fee = $_GET['ProfessionalFee']; 
$contact = $_GET['Contact'];

$query= "UPDATE physicians SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender', Birthdate = '$birthdate', Specialization = '$specialization' , Address = '$address', Contact = '$contact' , ProfessionalFee = '$fee' WHERE PhysicianID = '$id'";

mysqli_query($con,$query);  

?>
