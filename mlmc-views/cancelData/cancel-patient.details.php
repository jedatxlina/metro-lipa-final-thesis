<?php

require_once '../inserData/connection.php';

$id= $_GET['id'];

$sel = mysqli_query($conn,"DELETE FROM `patients` WHERE AdmissionID = '$id'");

?>

									