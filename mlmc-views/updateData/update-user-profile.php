<?php
require_once 'connection.php';


$id = $_GET['id'];
$lastname = $_GET['Lastname'];
$firstname = $_GET['Firstname'];
$middlename = $_GET['Middlename'];
$gender = $_GET['Gender'];
$birthdate = $_GET['Birthdate'];
$address = $_GET['Address']; 
$fee = $_GET['ProfessionalFee']; 
$contact = $_GET['Contact'];
$email = $_GET['Email'];
$specialization = $_GET['Specialization'];
$acctype = $_GET['atype'];


if ($acctype == 2)
{
    $query= "UPDATE admission_staffs SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender',  Address = '$address' , Birthdate = '$birthdate', Email = '$email' WHERE AdmissionStaffID = '$id'";
}
else if ($acctype == 3)
{
    $query= "UPDATE nurses SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender', Birthdate = '$birthdate', Address = '$address' , Email = '$email' WHERE NurseID = '$id'";
}
else if ($acctype == 4)
{
$query= "UPDATE physicians SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender', Birthdate = '$birthdate', Specialization = '$specialization' , Address = '$address', Contact = '$contact' , ProfessionalFee = '$fee' , Email = '$email' WHERE PhysicianID = '$id'";
}
else if ($acctype == 5)
{
    $query= "UPDATE pharmacy_staff SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender', Birthdate = '$birthdate', Address = '$address' , Email = '$email' WHERE PharmacyID = '$id'";
}
else if ($acctype == 6)
{
    $query= "UPDATE billing_staff SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender', Birthdate = '$birthdate', Address = '$address' , Email = '$email' WHERE BillingStaffID = '$id'";
}
else if ($acctype == 7)
{
    $query= "UPDATE secretary SET LastName = '$lastname', FirstName = '$firstname', MiddleName = '$middlename', Gender = '$gender', Birthdate = '$birthdate', Address = '$address' , Email = '$email' WHERE SecretaryID = '$id'";
}
mysqli_query($con,$query);  
$query2 = "UPDATE user_account SET Email = '$email' WHERE AccountID = '$id' ";
mysqli_query($con,$query2);
?>
