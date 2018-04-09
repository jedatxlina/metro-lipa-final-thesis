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
foreach($variable as $key => $val) {
    if($key == 0){
        $sys = $val;
    }else{
        $dia = $val;
    }
}
$query = "INSERT into vitals(VitalsID,AdmissionID,AccountID,BP,BPD,PR,RR,Temperature,DateTimeChecked) 
VALUES('$vitalsid','$id','$at','$sys','$dia','$pr','$rr','$temp',NOW())";

mysqli_query($conn,$query);
?>
