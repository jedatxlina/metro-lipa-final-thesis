<?php
require_once 'connection.php';

$id=$_GET['id'];

$sel = mysqli_query($conn,"SELECT a.AdmissionID,a.AdmissionNo,a.FirstName, a.MiddleName, a.LastName, b.BedID, b.MedicalID,c.Floor, c.RoomType, c.Room FROM patients a, medical_details b, beds c WHERE a.AdmissionID='$id' AND b.AdmissionID ='$id' AND a.MedicalID = b.MedicalID");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"AdmissionID"=>$row['AdmissionID'],
    	"AdmissionNo"=>$row['AdmissionNo'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
    	"Lastname"=>$row['LastName'],
		"BedID"=>$row['BedID'],
        "Floor"=>$row['Floor'],
        "RoomType"=>$row['RoomType'],
		"Room"=>$row['Room'],
		"MedicalID"=>$row['MedicalID']);
}


echo json_encode($data);
?>

									