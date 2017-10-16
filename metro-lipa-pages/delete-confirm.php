<?php  
 require_once '../assets/connection.php';
 mysql_select_db("metro_lipa_db", $con);

$accountid = $_POST['accid'];
$username = $_POST['username'];

 $result = mysql_query("DELETE FROM user_account WHERE AccountID = '$accountid' and Username = '$username'") or die("SELECT Error: ".mysql_error());

 header("Location:users.php");
?>