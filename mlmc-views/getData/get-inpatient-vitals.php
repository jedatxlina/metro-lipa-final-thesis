<?php

require_once '../mlmc-views/getData/connection.php';
$id = $_GET['id'];
$sel = mysqli_query($conn,"select * from patients where AdmissionID = '$id'");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $AdID = $row['AdmissionID'];
    $Fname = $row['FirstName'];
    $Mname = $row['MiddleName'];
	$Lname = $row['LastName'];
}
?>

									