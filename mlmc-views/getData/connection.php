<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "metro_lipa_db"; 

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>