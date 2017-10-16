<?php  
 require_once '../assets/connection.php';
 mysql_select_db("metro_lipa_db", $con);

$accountid = $_POST['accid'];
$acctype = $_POST['accesstype'];
$username = $_POST['username'];
$password = $_POST['password'];

 $result = mysql_query("UPDATE user_account SET AccountID = '$accountid' , AccessType = '$acctype' , Username = '$username', Password = '$password' WHERE AccountID = '$accountid'")                          or die("SELECT Error: ".mysql_error());

 header("Location:users.php");
?>