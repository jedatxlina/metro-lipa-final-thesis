<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT ROUND(AVG(BP)) as systolic,ROUND(AVG(BPD)) as diastolic FROM Vitals");

$data = array();


while ($row = mysqli_fetch_assoc($sel)) {
    $data[] = array(
    	"Systolic"=>$row['systolic'],
    	"Diastolic"=>$row['diastolic']);
}
echo json_encode($data);
?>

									