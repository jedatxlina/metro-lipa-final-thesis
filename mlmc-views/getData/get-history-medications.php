<?php
require_once 'connection.php';

$archiveno =  isset($_GET['archiveno']) ? $_GET['archiveno'] : '';

$query2 = mysqli_query($conn,"SELECT patients_archive.*,CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ',physicians.LastName) as dfullname,medical_details.*,medication.* FROM patients_archive JOIN medical_details,attending_physicians,physicians,medication WHERE ArchiveNo= '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND medical_details.MedicationID = medication.MedicationID");	

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
		"MedicineName"=>$row['MedicineName'],
		"Quantity"=>$row['Quantity'],
		"DateAdministered"=>$row['DateAdministered'],
		"TimeAdministered"=>$row['TimeAdministered'],
		"Dosage"=>$row['Dosage'],
		"Notes"=>$row['Notes']);
}
echo json_encode($data);
?>

									