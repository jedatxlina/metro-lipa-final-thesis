<?php
require_once 'connection.php';

$accountid = $_GET['accountid'];
$accesstype = $_GET['accesstype'];
$password = $_GET['password'];
$email = $_GET['email'];

$query= "UPDATE user_account SET AccountID = '$accountid' , AccessType = '$accesstype', Passwordd = '$password' , Email = '$email' WHERE AccountID = '$accountid'";

mysqli_query($con,$query);  
?>


