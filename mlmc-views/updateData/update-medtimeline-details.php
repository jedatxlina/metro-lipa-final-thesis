<?php
require_once 'connection.php';

$timelineid = $_GET['medtimeline'];

$query= "UPDATE medication_timeline SET Status = 0 WHERE MedTimelineID = '$timelineid'";

mysqli_query($conn,$query);  
?>
