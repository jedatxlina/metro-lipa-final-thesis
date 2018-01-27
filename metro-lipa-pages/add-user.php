<?php
require_once '../assets/connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$accountid = addslashes($request->accountid);
$accesstype = addslashes($request->accesstype);
$password = addslashes($request->password);

$query= "INSERT into user_account(AccountID,AccessType,Passwordd) VALUES ('$accountid','$accesstype','$password')";

mysqli_query($con,$query);  
?>
