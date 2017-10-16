<?php


$num = $_POST['accnum'];
$type = $_POST['access'];
$user = $_POST['username'];
$pass = $_POST['password'];

	$con = mysql_connect("localhost","root");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("metro_lipa_db", $con);


	$sql= "INSERT into user_account(AccountID,AccessType,Username,Password) VALUES ('$num','$type','$user','$pass')";

     if(!mysql_query($sql,$con))
     {
         die('Error: ' . mysql_error());
      }               
mysql_close($con);

header('Location:users.php');
?>
