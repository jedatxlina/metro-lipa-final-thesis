<?php
require_once 'connection.php';

$relocateid = rand(111111, 999999);
$id = $_GET['id'];
$date = date("Y/m/d");
$relobed = $_GET['relobed'];

$query = mysqli_query($conn,"SELECT a.ArrivalDate,b.MedicalID,b.BedID FROM duration a, medical_details b WHERE a.AdmissionID='$id' AND b.AdmissionID ='$id'");

while ($row = $query->fetch_assoc()) {
    $arrivaldatetime = $row['ArrivalDate'];
    $medicalid = $row['MedicalID'];
    $bedid = $row['BedID'];
}

$query2 = mysqli_query($conn,"INSERT into relocate(RelocateID,AdmissionID,MedicalID,BedID,DateAdmitted,DateRelocated) VALUES ('$relocateid','$id','$medicalid','$bedid','$arrivaldatetime','$date')");
$query3 = mysqli_query($conn,"INSERT into duration(DurationID,AdmissionID,ArrivalDate,DischargeDate,BedID,TotalBill) VALUES ('$relocateid','$id','$date','0000-00-00 00:00:00','$relobed','0')");
$query4 = mysqli_query($conn,"UPDATE duration SET DischargeDate = '$date' WHERE BedID = '$bedid'");

header("Location:../patient-relocate-confirm.php?id=$relocateid");
?>
