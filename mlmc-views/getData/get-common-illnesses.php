<?php

require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT DISTINCT(diagnosis.Findings) as findings, count(diagnosis.Findings) as cnt FROM diagnosis JOIN patients_archive WHERE YEARWEEK(`DateDiagnosed`, 0) = YEARWEEK(CURDATE(), 0) AND patients_archive.MedicalID = diagnosis.MedicalID GROUP BY diagnosis.Findings");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "Conditions"=>$row['findings'],
        "cnt"=>$row['cnt']);
}
echo json_encode($data);

									