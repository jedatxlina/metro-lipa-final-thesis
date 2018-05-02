<?php
require_once 'connection.php';

$vitalsid = $_GET['vitalsid'];
$at = $_GET['taker'];
$pr = $_GET['pr'];
$rr = $_GET['rr'];
$id= $_GET['admissionid'];
$temp = $_GET['temp'];
$variable = json_decode($_GET['bp'], true);
$cnt = count($variable);
$sel2 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID='$id'");
$data = array();
while ($row = mysqli_fetch_array($sel2)) {
    $adno = $row['AdmissionNo'];
}
date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");
$datetime = date("Y-m-d h:i A");

foreach($variable as $key => $val) {
    if($key == 0){
        $sys = $val;
    }else{
        $dia = $val;
    }
}
$query = "INSERT into vitals(VitalsID,AdmissionID,AdmissionNo,AccountID,BP,BPD,PR,RR,Temperature,DateTimeChecked) 
VALUES('$vitalsid','$id','$adno','$at','$sys','$dia','$pr','$rr','$temp','$datetime')";

mysqli_query($conn,$query);
?>
