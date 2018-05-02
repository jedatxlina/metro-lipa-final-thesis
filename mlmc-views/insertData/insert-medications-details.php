<?php 
require_once 'connection.php';

$newconditionid =  rand(111111, 999999);     
$conditionid =  rand(111111, 999999);
$newpharmaid =  rand(111111, 999999);
$newadministeredid =  rand(111111, 999999);
$newmedicineid = rand(111111, 999999);

$at = $_GET['at'];
$param = $_GET['param'];
$medicationid = $_GET['medicationid'];
$admissionid = $_GET['admissionid'];
$physicianid = $_GET['physicianid'];
$attendingid = $_GET['attendingid'];


$medid = $_GET['medid'];    


$meds = $_GET['medication'];


date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  



    
    if(preg_match("/[A-z]/i", $meds)){
            
        $meds = explode(',',$meds);

        foreach($meds AS $value){
            
            if(is_numeric($value)){

                $sel = mysqli_query($conn,"SELECT MedicineName,Unit FROM pharmaceuticals WHERE MedicineID = '$value'");

                while ($row = mysqli_fetch_assoc($sel)) {
                    $val = $row['MedicineName'];
                    $valunit = $row['Unit'];
                }

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineName,DateAdministered,TimeAdministered,Dosage,PhysicianID) 
                        VALUES('$medicationid','$admissionid','$val','$date','$time','$valunit','$physicianid')";

                mysqli_query($conn,$query);   

            }
            else{

                $value  = ucwords(strtolower($value));

                $query = "INSERT into pharmaceuticals(MedicineID,MedicineName) 
                        VALUES('$newmedicineid','$value')";

                mysqli_query($conn,$query);
                
                $newmedicineid = rand(111111, 999999);

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineName,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";

                mysqli_query($conn,$query);  
            }

        }
    }
    else{
        $meds = explode(',',$meds);

        foreach($meds AS $value) {

                $sel = mysqli_query($conn,"SELECT MedicineName,Unit FROM pharmaceuticals WHERE MedicineID = '$value'");

                while ($row = mysqli_fetch_assoc($sel)) {
                    $val = $row['MedicineName'];
                    $valunit = $row['Unit'];
                }

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineName,DateAdministered,TimeAdministered,Dosage,PhysicianID) 
                        VALUES('$medicationid','$admissionid','$val','$date','$time','$valunit','$physicianid')";

            mysqli_query($conn,$query);
        }
    }


    
header("Location:../add-patient-final.php?at=$at&medicationid=$medicationid&admissionid=$admissionid&param=$param");

