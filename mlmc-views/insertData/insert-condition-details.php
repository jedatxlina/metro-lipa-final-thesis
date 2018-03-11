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

        // $query= "INSERT into medical_conditions(MedicalConditionID,ConditionID) VALUES ('$conditionid','$value')";

        // mysqli_query($con,$query);

    }
    else{
        
        $value  = ucwords(strtolower($value));

        $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$newconditionid','$value')";
        mysqli_query($con,$query);

        
        // $query= "INSERT into medical_conditions(MedicalConditionID,ConditionID) VALUES ('$conditionid','$newconditionid')";

        // mysqli_query($con,$query);

        // $newconditionid =  rand(111111, 999999);          
    }

}

// $query= "UPDATE medication SET MedicalConditionID ='$conditionid' WHERE AdmissionID='$admissionid'";
// mysqli_query($con,$query);

}else{

// $condition = explode(',',$_GET['condition']);

// foreach($condition AS $value) {
    
//     $query= "INSERT into medical_conditions(MedicalConditionID,ConditionID) VALUES ('$conditionid','$value')";
//     mysqli_query($con,$query);

// }

// $query= "UPDATE medication SET MedicalConditionID ='$conditionid' WHERE AdmissionID='$admissionid'";
// mysqli_query($con,$query);
}


header("Location:../outpatient.php?at=$at");
