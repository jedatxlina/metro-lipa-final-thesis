

<?php
require_once 'connection.php';

$sel = mysqli_query($con,"SELECT vitals.AdmissionID, vitals.BP , vitals.BPD , vitals.PR , vitals.RR , vitals.Temperature , vitals.DateTimeChecked , CONCAT(patients.Firstname, ' ' ,patients.MiddleName, ' ', patients.LastName) AS Fullname , medical_details.BedID 
FROM vitals , patients , medical_details 
WHERE vitals.AdmissionID = patients.AdmissionID AND medical_details.AdmissionID = patients.AdmissionID AND patients.AdmissionType = 'Inpatient' AND vitals.Temperature < 38 AND (vitals.BP > 140 OR vitals.BPD > 90) ORDER BY vitals.VitalsID DESC LIMIT 1");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		"AdmissionID"=>$row['AdmissionID'],
		"BP"=>$row['BP'],
		"BPD"=>$row['BPD'],
		"PR"=>$row['PR'],
		"RR"=>$row['RR'],
    	"Temperature"=>$row['Temperature'],
        "DateTimeChecked"=>$row['DateTimeChecked'],
        "BedID"=>$row['BedID'],
		"Fullname"=>$row['Fullname']);
}
echo json_encode($data);
?>

									