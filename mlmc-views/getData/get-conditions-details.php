<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT DiseaseID,Disease FROM philhealth UNION SELECT ConditionID as DiseaseID,Conditions as Disease FROM conditions GROUP BY Disease");
$data = array();


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"ConditionID"=>$row['DiseaseID'],
    	"Conditions"=>$row['Disease']);
}
echo json_encode($data);
