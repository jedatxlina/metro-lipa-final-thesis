<?php 
require_once 'connection.php';
$newconditionid =  rand(111111, 999999);     
$conditionid =  rand(111111, 999999);
$medhistoryid =  rand(111111, 999999);
$newpharmaid =  rand(111111, 999999);
$newadministeredid =  rand(111111, 999999);

$at = $_GET['at'];
$param = $_GET['param'];
$medicationid = $_GET['medicationid'];
$admissionid = $_GET['admissionid'];
$physicianid = $_GET['physicianid'];
$attendingid = $_GET['attendingid'];
$diagnosisid = $_GET['diagnosisid'];
$medid = $_GET['medid'];    

$condition = $_GET['condition'];
$medication = $_GET['medication'];
$diagnosis = $_GET['diagnosis'];
$administered = $_GET['administered'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$sel = mysqli_query($conn,"SELECT MedicineName FROM pharmaceuticals");

    if(preg_match("/[A-z]/i", $condition)){  

        $condition = explode(',',$condition);
     
        foreach($condition AS $value){
            
            if(is_numeric($value)){
                
                $sel = mysqli_query($conn,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

                while ($row = mysqli_fetch_assoc($sel)) {   
                    $val = $row['Conditions'];
                }
                
                $query = "INSERT into medical_conditions(MedicalID,Conditions) 
                VALUES('$medid','$val')";
        
                mysqli_query($conn,$query);  

            }
            else{
                
                $value  = ucwords(strtolower($value));

                $query= "INSERT into Conditions(ConditionID,Conditions) VALUES ('$newconditionid','$value')";
                mysqli_query($conn,$query);

                $newconditionid =  rand(111111, 999999);

                $query = "INSERT into medical_conditions(MedicalID,Conditions) 
                VALUES('$medid','$value')";
        
                mysqli_query($conn,$query);  
            }
        }
    }else{
        $condition = explode(',',$_GET['condition']);
        foreach($condition AS $value) {
            $sel = mysqli_query($conn,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

            while ($row = mysqli_fetch_assoc($sel)) {   
                $val = $row['Conditions'];
            }
            
            $query = "INSERT into medical_conditions(MedicalID,Conditions) 
            VALUES('$medid','$val')";
    
            mysqli_query($conn,$query);  
        }
    }

    if(preg_match("/[A-z]/i", $medication)){
        
        $medication = explode(',',$medication);

        foreach($medication AS $value){
            
            if(is_numeric($value)){

                $sel = mysqli_query($conn,"SELECT MedicineName,Unit FROM pharmaceuticals WHERE MedicineID='$value'");

                while ($row = mysqli_fetch_assoc($sel)) {   
                    $medname = $row['MedicineName'];
                    $meddosage = $row['Unit'];
                }

                $query = "INSERT into medication_history(MedicationHistoryID,AdmissionID,MedicineName,Dosage) 
                VALUES('$medhistoryid','$admissionid','$medname','$meddosage')";
    
                mysqli_query($conn,$query);

                $medhistoryid =  rand(111111, 999999);

            }
            else{
                $value  = ucwords(strtolower($value));

                $query = "INSERT into medication_history(MedicationHistoryID,AdmissionID,MedicineName) 
                VALUES('$medhistoryid','$admissionid','$value')";
    
                mysqli_query($conn,$query);

                $medhistoryid =  rand(111111, 999999);
            }

        }

    }
    else{
        
        $medication = explode(',',$_GET['medication']);

        foreach($medication AS $value) {
        
            $sel = mysqli_query($conn,"SELECT MedicineName,Unit FROM pharmaceuticals WHERE MedicineID='$value'");

            while ($row = mysqli_fetch_assoc($sel)) {   
                $medname = $row['MedicineName'];
                $meddosage = $row['Unit'];
            }

            $query = "INSERT into medication_history(MedicationHistoryID,AdmissionID,MedicineName,Dosage) 
            VALUES('$medhistoryid','$admissionid','$medname','$meddosage')";

            mysqli_query($conn,$query);

            $medhistoryid =  rand(111111, 999999);
        }

    }

    if(preg_match("/[A-z]/i", $diagnosis)){
        
        $diagnosis = explode(',',$diagnosis);

        foreach($diagnosis AS $value){
            
            if(is_numeric($value)){

                $sel = mysqli_query($conn,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

                while ($row = mysqli_fetch_assoc($sel)) {   
                    $val = $row['Conditions'];
                }
                
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$medid','$admissionid','$attendingid','$val','$date','$time')";
        
                mysqli_query($conn,$query);  
            }
            else{
                $value  = ucwords(strtolower($value));

                $query= "INSERT into Conditions(ConditionID,Conditions) VALUES ('$conditionid','$value')";
                mysqli_query($conn,$query);

                $conditionid =  rand(111111, 999999);
                                
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$medid','$admissionid','$attendingid','$value','$date','$time')";
        
                mysqli_query($conn,$query);  
            }

        }

    }
    
    else{
        $diagnosis = explode(',',$diagnosis);

        foreach($diagnosis AS $value) {
        
            $sel = mysqli_query($conn,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

            while ($row = mysqli_fetch_assoc($sel)) {   
                $val = $row['Conditions'];
            }
            
            $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
            VALUES('$diagnosisid','$medid','$admissionid','$attendingid','$val','$date','$time')";
    
            mysqli_query($conn,$query);  
        }
    }

    if(preg_match("/[A-z]/i", $administered)){

        $administered = explode(',',$administered);

        foreach($administered AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";
    
                mysqli_query($conn,$query);
            }
            else{
                $value  = ucwords(strtolower($value));

                $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$newadministeredid','$value')";
                mysqli_query($conn,$query);

                $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                VALUES('$medicationid','$admissionid','$newadministeredid','$date','$time','$physicianid')";
    
                mysqli_query($conn,$query);

                $newadministeredid =  rand(111111, 999999);          
            }

        }

    }else{
        $administered = explode(',',$_GET['administered']);

        foreach($administered AS $value) {
        
            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$value','$date','$time','$physicianid')";

            mysqli_query($conn,$query);
        }
    }

    
header("Location:../add-patient-final.php?at=$at&medicationid=$medicationid&admissionid=$admissionid&param=$param");

