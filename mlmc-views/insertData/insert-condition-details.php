<?php
    require_once 'connection.php';

    $at = $_GET['at'];
    $param = $_GET['param'];
    $medid = $_GET['medid'];
    $condition = $_GET['condition'];
    $medication = $_GET['medication'];
    $admissionid = $_GET['admissionid'];

    $medhistoryid =  rand(111111, 999999);
    $newconditionid =  rand(111111, 999999);     

    date_default_timezone_set("Asia/Singapore");
    $date = date("Y-m-d");
    $time = date("h:i A");  
    $datetime = date("Y-m-d h:i A");

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


    header("Location:../outpatient.php?at=$at");
