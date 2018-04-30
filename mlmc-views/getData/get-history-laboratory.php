<?php
require_once 'connection.php';

$archiveno =  isset($_GET['archiveno']) ? $_GET['archiveno'] : '';

$query2 = mysqli_query($conn,"SELECT laboratory_req.*,laboratories.Description FROM patients_archive JOIN medical_details,laboratory_req,laboratories WHERE patients_archive.ArchiveNo = '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.MedicalID = laboratory_req.MedicalID AND laboratory_req.LaboratoryID = laboratories.LaboratoryID");	

$data = array();

while ($row = mysqli_fetch_array($query2)) {
    $data[] = array(
    "Description"=>$row['Description'],
    "DateCleared"=>$row['DateCleared'],
    "TimeCleared"=>$row['TimeCleared'],
    "Result"=>$row['Result']);
}
echo json_encode($data);
?>

									