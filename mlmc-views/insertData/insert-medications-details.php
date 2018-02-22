<?php 
require_once 'connection.php';
$conditionid =  rand(111111, 999999);
$pharmaid =  rand(111111, 999999);
$administeredid =  rand(111111, 999999);

$at = $_GET['at'];
$param = $_GET['param'];
$medicationid = $_GET['medicationid'];
$admissionid = $_GET['admissionid'];
$physicianid = $_GET['physicianid'];


$condition = $_GET['condition'];
$medication = $_GET['medication'];
$administered = $_GET['administered'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  




    if(preg_match("/[A-z]/i", $medication)){
        $medication = ucwords(strtolower($medication));
        $medication = explode(',',$medication);

        foreach($medication AS $value){
            $val = ucwords(strtolower($value));

            $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$pharmaid','$val')";
            mysqli_query($con,$query);

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$pharmaid','$date','$time','$physicianid')";

            mysqli_query($con,$query);

            $pharmaid =  rand(111111, 999999);          

        }
    }else{
        $medication = explode(',',$_GET['medication']);
        foreach($medication AS $value) {

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
        
            mysqli_query($con,$query);
        
        }
    }

    if(preg_match("/[A-z]/i", $administered)){
        
        $administered = ucwords(strtolower($administered));
        $administered = explode(',',$administered);
       
        foreach($administered AS $value){
            $val = ucwords(strtolower($value));

            $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$administeredid','$val')";
            mysqli_query($con,$query);

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$administeredid','$date','$time','$physicianid')";

            mysqli_query($con,$query);

            $administeredid =  rand(111111, 999999);          

        }

    }else{
        $administered = explode(',',$_GET['administered']);
        foreach($administered AS $value) {

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
        
            mysqli_query($con,$query);
        
        }
    }

    if(preg_match("/[A-z]/i", $condition)){
        $condition = ucwords(strtolower($condition));
        $condition = explode(',',$condition);

        // $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$conditionid','$condition')";
        // mysqli_query($con,$query);

        foreach($condition AS $value){
            $val = ucwords(strtolower($value));

            $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$conditionid','$val')";
            mysqli_query($con,$query);

            $query= "UPDATE medication SET ConditionID ='$conditionid' WHERE AdmissionID='$admissionid'";
            mysqli_query($con,$query);

            $conditionid =  rand(111111, 999999);          

        }
    }else{
        $condition= explode(',',$_GET['condition']);
        foreach($condition AS $value) {

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
        
            mysqli_query($con,$query);
        
        }
    }

    
header("Location:../add-patient-final.php?at=$at&medicationid=$medicationid&admissionid=$admissionid&param=$param");

