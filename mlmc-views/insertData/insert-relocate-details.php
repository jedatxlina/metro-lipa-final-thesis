<?php
require_once 'connection.php';

$relocateid = rand(111111, 999999);
$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT a.ArrivalDateTime,b.MedicalID,b.BedID FROM patients a, medical_details b WHERE a.AdmissionID='$id' AND b.AdmissionID ='$id'");

while ($row = $query->fetch_assoc()) {
    $arrivaldatetime = $row['ArrivalDateTime'];
    $medicalid = $row['MedicalID'];
    $bedid = $row['BedID'];
}

$query2 = mysqli_query($conn,"INSERT into relocate(RelocateID,AdmissionID,MedicalID,BedID,DateAdmitted) VALUES ('$relocateid','$id','$medicalid','$bedid','$arrivaldatetime')");

header("Location:../patient-relocate-confirm.php?id=$relocateid");
?>
