<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM conditions");
$data = array();


while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
    	"ConditionID"=>$row['ConditionID'],
    	"Conditions"=>$row['Conditions']);
}
echo json_encode($data);
