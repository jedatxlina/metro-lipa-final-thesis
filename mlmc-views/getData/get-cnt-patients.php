<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT DISTINCT(SELECT COUNT(AdmissionType) FROM patients WHERE AdmissionType = 'Emergency') as emergency, (SELECT COUNT(AdmissionType) FROM patients WHERE AdmissionType = 'Outpatient') as outpatient, (SELECT COUNT(AdmissionType) FROM patients WHERE AdmissionType = 'Inpatient') as inpatient, (SELECT COUNT(ArchiveNo) FROM patients_archive) as archive FROM patients");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "emergency"=>$row['emergency'],
        "outpatient"=>$row['outpatient'],
        "inpatient"=>$row['inpatient'],
        "archive"=>$row['archive']);
}
echo json_encode($data);

									