<?php
require_once 'connection.php';

$at = $_GET['at'];

$accountid = $conn->escape_string($_GET['accountid']);
$accesstype = $conn->escape_string($_GET['accesstype']);
$password = $conn->escape_string(password_hash($_GET['password'], PASSWORD_BCRYPT));
$email = $_GET['email'];

$physician = isset($_GET['physician']) ? $_GET['physician'] : '';

$hash = $conn->escape_string( md5( rand(0,1000) ) );

$query= "INSERT into user_account(AccountID,AccessType,Passwordd,hash,Email) VALUES ('$accountid','$accesstype','$password','$hash','$email')";

mysqli_query($conn,$query);  

header("Location: ../user.php?at=$at");
?>
