<?php
require_once 'connection.php';

$id=$_GET['id'];

$sel = mysqli_query($conn,"SELECT a.RelocateID, a.AdmissionID, a. FROM patients a, medical_details b, beds c WHERE a.AdmissionID='$id' AND b.AdmissionID ='$id' AND c.BedID = b.BedID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
    	"Lastname"=>$row['LastName'],
		"Arrival"=>$row['ArrivalDateTime'],
		"BedID"=>$row['BedID'],
        "Floor"=>$row['Floor'],
        "RoomType"=>$row['RoomType'],
		"Room"=>$row['Room'],
		"MedicalID"=>$row['MedicalID']);
}


echo json_encode($data);
?>

									