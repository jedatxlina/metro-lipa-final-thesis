<?php
require_once 'connection.php';

$id = $_GET['id'];
$Fee = $_GET['fee'];

$query= "UPDATE accounts_receivable SET Amount = '$Fee', Remarks = 'Posted' WHERE AccountReceiveID = '$id'";

mysqli_query($conn,$query);  
?>
