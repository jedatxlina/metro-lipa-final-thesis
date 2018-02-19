<?php
require_once 'connection.php';


$accountid = $_GET['accountid'];
$accesstype = $_GET['accesstype'];
$password = $_GET['password'];
$email = $_GET['email'];

if ($accesstype==4)
{
    $query2= "INSERT into physicians(PhysicianID,AccountID,LastName,FirstName,MiddleName,Gender,Address,Birthdate,Specialization,ProfessionalFee,Email) VALUES ('$accountid','$accountid','','','','','','','','','$email')";
    mysqli_query($con,$query2);  
}

$query= "INSERT into user_account(AccountID,AccessType,Passwordd,Email) VALUES ('$accountid','$accesstype','$password','$email')";

mysqli_query($con,$query);  
?>
