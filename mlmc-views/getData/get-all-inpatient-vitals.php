

<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT vitals.AdmissionID, vitals.ID, vitals.BP , vitals.BPD , vitals.PR , vitals.RR , vitals.Temperature , vitals.DateTimeChecked , CONCAT(patients.Firstname, ' ' ,patients.MiddleName, ' ', patients.LastName) AS Fullname , medical_details.BedID 
FROM vitals , patients , medical_details 
WHERE vitals.AdmissionID = patients.AdmissionID AND medical_details.AdmissionID = patients.AdmissionID AND patients.AdmissionType = 'Inpatient' AND vitals.ID IN (SELECT MAX(vitals.ID)
    FROM vitals
    GROUP BY vitals.AdmissionID)");

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

									