<?php
require_once 'connection.php';


$accountid = $_GET['accountid'];
$accesstype = $_GET['accesstype'];
$password = $_GET['password'];
$email = $_GET['email'];

$query= "INSERT into user_account(AccountID,AccessType,Passwordd,Email) VALUES ('$accountid','$accesstype','$password','$email')";

mysqli_query($con,$query);  
?>
