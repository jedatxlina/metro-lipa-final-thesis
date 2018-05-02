<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'metro_lipa_db');

require_once 'connection.php';
$id = $_GET["id"];
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sel2 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel2)) {
    $adno = $row['AdmissionNo'];
}
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT BP, BPD, PR, RR, Temperature, DateTimeChecked FROM vitals WHERE AdmissionID='$id' AND AdmissionNo = '$adno' ORDER BY DateTimeChecked ASC");
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