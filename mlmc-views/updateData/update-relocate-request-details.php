<?php
require_once 'connection.php';

$transid = $_GET['transid'];

$query = "DELETE FROM relocate_req WHERE TransRequestID = '$transid'";

mysqli_query($conn,$query);  

?>
