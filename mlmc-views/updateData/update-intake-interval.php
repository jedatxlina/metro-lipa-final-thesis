<?php
require_once 'connection.php';

$at = $_GET['at'];
$id = $_GET['id'];
$medid = $_GET['medid'];
$interval = $_GET['interval'];

$query = "UPDATE medication SET Intake = '$interval' WHERE AdmissionID = '$id' AND MedicineID = '$medid'";

mysqli_query($conn,$query);  

header("Location: ../nurse-patient.php?at=$at");
