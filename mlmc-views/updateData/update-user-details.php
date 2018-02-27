<?php
require_once 'connection.php';

$accountid = $_GET['accountid'];
$accesstype = $_GET['accesstype'];
$password = $_GET['password'];
$email = $_GET['email'];

$query= "UPDATE user_account SET AccountID = '$accountid' , AccessType = '$accesstype', Passwordd = '$password' , Email = '$email' WHERE AccountID = '$accountid'";

mysqli_query($con,$query);  

switch ($accesstype) {
    case '2':
        $query= "UPDATE admission_staffs SET Email = '$email' WHERE AdmissionStaffID = '$accountid'";
        break;

    case '3':
        $query= "UPDATE nurses SET Email = '$email' WHERE NurseID = '$accountid'";
        break;

    case '4':
        $query= "UPDATE physicians SET Email = '$email' WHERE PhysicianID = '$accountid'";
        break;
    
    case '5':
        $query= "UPDATE pharmacy_staff SET Email = '$email' WHERE PharmacyID = '$accountid'";
        break;
    
    case '6':
        $query= "UPDATE billing_staff SET Email = '$email' WHERE BillingStaffID = '$accountid'";
        break;

    case '7':
        $query= "UPDATE secretary SET Email = '$email' WHERE SecretaryID = '$accountid'";
        break; 
        
    default:
        break;
}
mysqli_query($con,$query);  

?>


