<?php 
require_once 'connection.php';
$diagnosisid = rand(111111,999999);
$orderid =  rand(111111, 999999);     
$conditionid = rand(111111,999999);
$medicationid = rand(111111,999999);
$laboratoryid =  rand(111111, 999999);
$pharmaid  =  rand(111111, 999999);
$laborderid =  rand(111111, 999999);     

$at = $_GET['at'];
$admissionid = $_GET['id'];
 
$attendingid = $_GET['attendingid'];
$diagnosis = $_GET['diagnosis'];
$order = $_GET['order'];
$labs = isset($_GET['lab']) ? $_GET['lab'] : '';
$meds = $_GET['meds'];
$date = isset($_GET['appointment']) ? $_GET['appointment'] : '';
$appointment = date("Y-m-d", strtotime($date));


date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  


if($labs != ''){
    if(preg_match("/[A-z]/i", $labs)){
        
        $labs = explode(',',$labs);

        foreach($labs AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
                mysqli_query($con,$query);

                $orderid =  rand(111111, 999999);     
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
                VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
    
                mysqli_query($con,$query2);

                $laborderid =  rand(111111, 999999);     
            }
            else{
                $value  = ucwords(strtolower($value));

                $query= "INSERT into laboratories(LaboratoryID,Description) VALUES ('$laboratoryid','$value')";
                mysqli_query($con,$query);

                $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
                mysqli_query($con,$query);

                $laboratoryid =  rand(111111, 999999);     
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
                VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
                
                mysqli_query($con,$query2);

                $laborderid =  rand(111111, 999999); 
            }

        }
    }
    else{
        $labs = explode(',',$labs);

        foreach($labs AS $value) {

            $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
            mysqli_query($con,$query);

            $orderid =  rand(111111, 999999);   

            $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
            VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";

            mysqli_query($con,$query2);

            $laborderid =  rand(111111, 999999); 
        }
    }
}else{
    $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
    VALUES('$orderid','$admissionid','$at','$order','0','$date','$time','Pending')";

    mysqli_query($con,$query);

    $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
            VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
            
    mysqli_query($con,$query2);

    $laborderid =  rand(111111, 999999); 
}
    
if(preg_match("/[A-z]/i", $meds)){
        
    $meds = explode(',',$meds);

    foreach($meds AS $value){
        
        if(is_numeric($value)){

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($con,$query);   

        }
        else{
            $value  = ucwords(strtolower($value));

            $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$pharmaid','$value')";
            mysqli_query($con,$query);

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($con,$query);

            $pharmaid =  rand(111111, 999999);          
        }

    }
}
else{
    $meds = explode(',',$meds);

    foreach($meds AS $value) {

        $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

        mysqli_query($con,$query);
    }
}

if(preg_match("/[A-z]/i", $diagnosis)){
        
    $diagnosis = explode(',',$diagnosis);

    foreach($diagnosis AS $value){
        
        if(is_numeric($value)){
            
            $sel = mysqli_query($con,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

            while ($row = mysqli_fetch_assoc($sel)) {
                $val = $row['Conditions'];
            }
            if(isset($appointment)){
                $query = "INSERT into diagnosis(DiagnosisID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,NextDateAppointment) 
                VALUES('$diagnosisid','$admissionid','$attendingid','$val','$date','$time','$appointment')";
            }else{
                $query = "INSERT into diagnosis(DiagnosisID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$admissionid','$attendingid','$val','$date','$time')";
            }
    
            mysqli_query($con,$query);  



        }
        else{
            $value  = ucwords(strtolower($value));

            $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$conditionid','$value')";
            
            mysqli_query($con,$query);

            $conditionid =  rand(111111, 999999);          

            if(isset($appointment)){
                $query = "INSERT into diagnosis(DiagnosisID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,NextDateAppointment) 
                VALUES('$diagnosisid','$admissionid','$attendingid','$val','$date','$time','$appointment')";
            }else{
                $query = "INSERT into diagnosis(DiagnosisID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$admissionid','$attendingid','$val','$date','$time')";
            }

            mysqli_query($con,$query);  


        }

    }
}
else{
    $diagnosis = explode(',',$diagnosis);

    foreach($diagnosis AS $value) {

        $sel = mysqli_query($con,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $val = $row['Conditions'];
        }

        if(isset($appointment)){
            $query = "INSERT into diagnosis(DiagnosisID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,NextDateAppointment) 
             VALUES('$diagnosisid','$admissionid','$attendingid','$val','$date','$time','$appointment')";
        }else{
            $query = "INSERT into diagnosis(DiagnosisID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
            VALUES('$diagnosisid','$admissionid','$attendingid','$val','$date','$time')";
        }

        mysqli_query($con,$query);  

    }
}

header("Location:../post-diagnosis.php?at=$at&medicationid=$medicationid&id=$admissionid");

