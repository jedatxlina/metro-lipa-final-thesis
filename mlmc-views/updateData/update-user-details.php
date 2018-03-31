<?php
require_once 'connection.php';

$account = isset($_GET['at']) ? $_GET['at'] : '';

$accountid = $_GET['accountid'];
$password = $con->escape_string(password_hash($_GET['password'], PASSWORD_BCRYPT));
$email = $_GET['email'];

$query= "UPDATE user_account SET AccountID = '$accountid' , AccessType = '$accountid[0]', Passwordd = '$password' , Email = '$email' WHERE AccountID = '$accountid'";

mysqli_query($conn,$query);  

switch ($accountid[0]) {
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
    
    case '8':
        $query= "UPDATE lab_staff SET Email = '$email' WHERE LaboratorySTaffID = '$accountid'";
        break; 
    
    default:
        break;
}
mysqli_query($conn,$query);  
if(isset($_GET['at'])){
    header("Location: ../user.php?at=$account");
}else{
    header("Location: ../user-profile.php?at=$accountid");
}

?>


