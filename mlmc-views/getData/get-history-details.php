<?php
require_once 'connection.php';

$id =  isset($_GET['id']) ? $_GET['id'] : '';

$query2 = mysqli_query($conn,"SELECT patients_archive.*,CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ',physicians.LastName) as dfullname,medical_details.QR_Path FROM patients_archive JOIN medical_details,attending_physicians,physicians WHERE ArchiveID = '$id' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID GROUP BY medical_details.AttendingID ORDER by ArchiveNo desc");


$data = array();

while ($row = mysqli_fetch_array($query2)) {
    $data[] = array(
		"ArchiveNo"=>$row['ArchiveNo'],
		"ArchiveID"=>$row['ArchiveID'],
		"AdmissionDate"=>$row['AdmissionDate'],
		"AdmissionTime"=>$row['AdmissionTime'],
    	"Firstname"=>$row['FirstName'],
    	"Middlename"=>$row['MiddleName'],
		"Lastname"=>$row['LastName'],
		"Admission"=>$row['Admission'],
		"AdmissionType"=>$row['AdmissionType'],
    	"Birthdate"=>$row['Birthdate'],
    	"Contact"=>$row['Contact'],
		"Province"=>$row['Province'],
		"City"=>$row['City'],
		"CompleteAddress"=>$row['CompleteAddress'],
		"CivilStatus"=>$row['CivilStatus'],
    	"Gender"=>$row['Gender'],
		"Age"=>$row['Age'],
		"Occupation"=>$row['Occupation'],
		"Citizenship"=>$row['Citizenship'],
		"MedicalID"=>$row['MedicalID'],
		"PhysicianFullname"=>$row['dfullname'],
		"QRpath"=>$row['QR_Path']);
}
echo json_encode($data);
?>

									