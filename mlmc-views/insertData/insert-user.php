<?php
require_once 'connection.php';


$accountid = $_GET['accountid'];
$accesstype = $_GET['accesstype'];
$password = $_GET['password'];
$email = $_GET['email'];

$query= "INSERT into user_account(AccountID,AccessType,Passwordd,Email) VALUES ('$accountid','$accesstype','$password','$email')";

mysqli_query($con,$query);  

switch ($accesstype) {
    case '2':
        $query= "INSERT into admission_staffs(AdmissionStaffID) VALUES ('$accountid')";
        break;

    case '3':
        $query= "INSERT into nurses(NurseID) VALUES ('$accountid')";
        break;

    case '4':
        $query= "INSERT into physicians(PhysicianID) VALUES ('$accountid')";
        break;
    
    case '5':
        $query= "INSERT into pharmacy_staff(PharmacyID) VALUES ('$accountid')";
        break;
    
    case '6':
        $query= "INSERT into billing_staff(BillingStaffID) VALUES ('$accountid')";
        break;
    
    default:
        break;
}
mysqli_query($con,$query);  
?>
