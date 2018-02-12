<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'metro_lipa_db');

$id = $_GET["id"];
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT BP, PR, RR, Temperature, DateTimeChecked FROM vitals WHERE AdmissionID='$id' ORDER BY DateTimeChecked ASC");
//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
//free memory associated with result
$result->close();
//close connection
$mysqli->close();
//now print the data
print json_encode($data);
?>