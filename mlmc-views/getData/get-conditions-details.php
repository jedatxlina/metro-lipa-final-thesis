<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM philhealth");
$data = array();


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"ConditionID"=>$row['DiseaseID'],
    	"Conditions"=>$row['Disease']);
}
echo json_encode($data);
