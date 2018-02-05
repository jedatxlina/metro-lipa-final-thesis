<?php
//setting header to json
//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'metro_lipa_db');
// //get connection
$id = $_GET["id"];
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT BloodPressure, RespiRate, Temperature, PulseRate, DateTaken FROM patient_vitals WHERE PatientID='$id'");
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