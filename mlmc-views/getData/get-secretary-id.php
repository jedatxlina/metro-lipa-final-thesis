<?php

require_once 'connection.php';
$accid = $_GET['accid'];
$sel = mysqli_query($con,"SELECT * FROM secretary WHERE SecretaryID='$accid'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "AccountID"=>$row['SecretaryID'],
        "LastName"=>$row['LastName'],
        "FirstName"=>$row['FirstName'],
        "Gender"=>$row['Gender'],
        "MiddleName"=>$row['MiddleName'],
        "Address"=>$row['Address'],
        "Birthdate"=>$row['Birthdate'],
        "Email"=>$row['Email']);
}

echo json_encode($data);
?>

									