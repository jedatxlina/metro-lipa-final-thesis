<?php 
require_once 'connection.php';
$newconditionid =  rand(111111, 999999);     
$conditionid =  rand(111111, 999999);
$newpharmaid =  rand(111111, 999999);
$newadministeredid =  rand(111111, 999999);

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

$sel = mysqli_query($con,"SELECT MedicineName FROM pharmaceuticals");

$listmedicinesdb = array();

while($row = mysqli_fetch_assoc($sel))
{
    $listmedicinesdb[] = $row['MedicineName'];
}

    if(preg_match("/[A-z]/i", $medication)){
        
        $medication = explode(',',$medication);

        foreach($medication AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
    
                mysqli_query($con,$query);

            }
            else{
                $value  = ucwords(strtolower($value));

                $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$newpharmaid','$value')";
                mysqli_query($con,$query);

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$newpharmaid','$date','$time','$physicianid')";
    
                mysqli_query($con,$query);

                $newpharmaid =  rand(111111, 999999);          
            }

        }

    }
    else{
        
        $medication = explode(',',$_GET['medication']);

        foreach($medication AS $value) {

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
        
            mysqli_query($con,$query);
        }

    }

    if(preg_match("/[A-z]/i", $administered)){

        $administered = explode(',',$administered);

        foreach($administered AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
    
                mysqli_query($con,$query);

            }
            else{
                $value  = ucwords(strtolower($value));

                $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$newadministeredid','$value')";
                mysqli_query($con,$query);

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$newadministeredid','$date','$time','$physicianid')";
    
                mysqli_query($con,$query);

                $newadministeredid =  rand(111111, 999999);          
            }

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

        $condition = explode(',',$condition);
     
        foreach($condition AS $value){
            
            if(is_numeric($value)){

                $query= "INSERT into medical_conditions(MedicalConditionID,ConditionID) VALUES ('$conditionid','$value')";

                mysqli_query($con,$query);

            }
            else{
                
                $value  = ucwords(strtolower($value));

                $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$newconditionid','$value')";
                mysqli_query($con,$query);

                
                $query= "INSERT into medical_conditions(MedicalConditionID,ConditionID) VALUES ('$conditionid','$newconditionid')";

                mysqli_query($con,$query);

                $newconditionid =  rand(111111, 999999);          
            }

        }

        $query= "UPDATE medication SET MedicalConditionID ='$conditionid' WHERE AdmissionID='$admissionid'";
        mysqli_query($con,$query);

    }else{

    
        $condition = explode(',',$_GET['condition']);

        foreach($condition AS $value) {
            
            $query= "INSERT into medical_conditions(MedicalConditionID,ConditionID) VALUES ('$conditionid','$value')";
            mysqli_query($con,$query);
        
        }

        $query= "UPDATE medication SET MedicalConditionID ='$conditionid' WHERE AdmissionID='$admissionid'";
        mysqli_query($con,$query);
    }

    
header("Location:../add-patient-final.php?at=$at&medicationid=$medicationid&admissionid=$admissionid&param=$param");

