<?php
require_once 'connection.php';

$duration = rand(111111, 999999);
$id = $_GET['id'];
$query2 = mysqli_query($conn,"INSERT into relocate(RelocateID,AdmissionID,MedicalID,BedID,DateAdmitted) VALUES ('$relocateid','$id','$medicalid','$bedid','$arrivaldatetime')");

header("Location:../patient-relocate-confirm.php?id=$relocateid");
?>
