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
$query = "INSERT into vitals(VitalsID,AdmissionID,AccountID,BP,BPD,PR,RR,Temperature,DateTimeChecked) 
VALUES('$vitalsid','$id','$at','$sys','$dia','$pr','$rr','$temp','$datetime')";

mysqli_query($conn,$query);
?>
