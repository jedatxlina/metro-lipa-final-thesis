<?php

require_once 'getData/connection.php';
$at = $_GET['at'];
$id = $_GET['id'];
$bill = $_GET['bill'];

$sel = mysqli_query($conn,"SELECT * FROM patients WHERE AdmissionID = '$id'");



while ($row = mysqli_fetch_assoc($sel)) {
    $firstname = $row['FirstName'];
    $middlename = $row['MiddleName'];
    $lastname = $row['LastName'];
    $contact = $row['Contact'];
}

$contact = '+63'.$contact;

$postsms = file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=renzmarinez&key=2E94CE76-C77A-6ED8-97B9-A6E93DC86678&to='.$contact.'&message=Hi+' .  $firstname .',+this+is+to+inform+you+that+your+current+total+bill+is+P' . $bill .'+If+you+want+a+copy+of+your+bill+breakdown,+please+proceed+to+the+billing+station.+Thank+you');


header("Location:view-patient-bill.php?at=$at&id=$id");
?>