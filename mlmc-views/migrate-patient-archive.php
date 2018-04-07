<?php

	include('patientArchiveCsv/upload-patient-csv.php');

	$csv = new csv();

    if(isset($_POST['submit']) && isset($_POST['at']))
    {

    $at = $_POST['at'];
    
    $csv->import($_FILES['file']['tmp_name'],$at); 
    
     header("Location: migrate.php?at=".$at);
    }

?>