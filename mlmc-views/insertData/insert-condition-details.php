<?php

require_once 'connection.php';

$at = $_GET['at'];
$param = $_GET['param'];
$condition = $_GET['condition'];
$admissionid = $_GET['admissionid'];
$newconditionid =  rand(111111, 999999);     

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  



if(preg_match("/[A-z]/i", $condition)){  

$condition = explode(',',$condition);

foreach($condition AS $value){
    
    if(is_numeric($value)){

    }
    else{
        
        $value  = ucwords(strtolower($value));

        $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$newconditionid','$value')";
        mysqli_query($con,$query);
     
    }

}


}else{

    
}


header("Location:../outpatient.php?at=$at");
