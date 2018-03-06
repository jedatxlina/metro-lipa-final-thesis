<?php
require_once 'connection.php';


$accountid = $_GET['id'];
$lastname = $_GET['Lastname'];
$firstname = $_GET['Firstname'];
$middlename = $_GET['Middlename'];
$gender = $_GET['Gender'];
$birthdate = $_GET['Birthdate'];
$address = $_GET['Address']; 
$fee = $_GET['ProfessionalFee']; 
$contact = $_GET['Contact'];
$email = $_GET['Email'];
$acctype = $_GET['atype'];


$specialization = isset($_GET['Specialization']) ? $_GET['Specialization'] : '';
$assigned = isset($_GET['Assigned']) ? $_GET['Assigned'] : '';

if ($acctype == 2)
{   
    $query= "INSERT into admission_staffs(AdmissionStaffID,LastName,FirstName,MiddleName,Gender,Address,Birthdate,Email) VALUES ('$accountid','$lastname','$firstname','$middlename','$gender','$address','$birthdate','$email')";
}
else if ($acctype == 3)
{
    $query= "INSERT into nurses(NurseID,LastName,FirstName,MiddleName,Gender,Address,Birthdate,Email) VALUES ('$accountid','$lastname','$firstname','$middlename','$gender','$address','$birthdate','$email')";
}
else if ($acctype == 4)
{
    $query= "INSERT into physicians(PhysicianID,LastName,FirstName,MiddleName,Gender,Birthdate,Specialization,Address,Contact,ProfessionalFee,Email) 
    VALUES ('$accountid','$lastname','$firstname','$middlename','$gender','$birthdate','$specialization','$address','$contact','$fee','$email')";
}
else if ($acctype == 5)
{
    $query= "INSERT into pharmacy_staff(PharmacyID,LastName,FirstName,MiddleName,Gender,Address,Birthdate,Email) VALUES ('$accountid','$lastname','$firstname','$middlename','$gender','$address','$birthdate','$email')";
}
else if ($acctype == 6)
{
    $query= "INSERT into billing_staff(BillingStaffID,LastName,FirstName,MiddleName,Gender,Address,Birthdate,Email) VALUES ('$accountid','$lastname','$firstname','$middlename','$gender','$address','$birthdate','$email')";
}
else if ($acctype == 7)
{
    $query= "INSERT into secretary(SecretaryID,LastName,FirstName,MiddleName,Gender,Address,Birthdate,Email,PhysicianID) VALUES ('$accountid','$lastname','$firstname','$middlename','$gender','$address','$birthdate','$email','$assigned')";
}

mysqli_query($con,$query);  
?>
