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
$rate =  isset($_GET['rate']) ? $_GET['rate'] : '';

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$sel = mysqli_query($conn,"SELECT MedicalID FROM medical_details WHERE AdmissionID ='$admissionid'");

while ($row = mysqli_fetch_assoc($sel)) {
    $medicalid = $row['MedicalID'];
}

if($labs != ''){
    if(preg_match("/[A-z]/i", $labs)){
        
        $labs = explode(',',$labs);

        foreach($labs AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
                mysqli_query($conn,$query);

                $orderid =  rand(111111, 999999);     
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
                VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
    
                mysqli_query($conn,$query2);

                $laborderid =  rand(111111, 999999);     
            }
            else{
                $value  = ucwords(strtolower($value));

                $query= "INSERT into laboratories(LaboratoryID,Description) VALUES ('$laboratoryid','$value')";
                mysqli_query($conn,$query);

                $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
                mysqli_query($conn,$query);

                $laboratoryid =  rand(111111, 999999);     
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
                VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
                
                mysqli_query($conn,$query2);

                $laborderid =  rand(111111, 999999); 
            }

        }
    }
    else{
        $labs = explode(',',$labs);

        foreach($labs AS $value) {

            $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
            mysqli_query($conn,$query);

            $orderid =  rand(111111, 999999);   

            $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
            VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";

            mysqli_query($conn,$query2);

            $laborderid =  rand(111111, 999999); 
        }
    }
}else{
    $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
    VALUES('$orderid','$admissionid','$at','$order','0','$date','$time','Pending')";

    mysqli_query($conn,$query);

    $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
            VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
            
    mysqli_query($conn,$query2);

    $laborderid =  rand(111111, 999999); 
}
    
if(preg_match("/[A-z]/i", $meds)){
        
    $meds = explode(',',$meds);

    foreach($meds AS $value){
        
        if(is_numeric($value)){

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($conn,$query);   

        }
        else{
            $value  = ucwords(strtolower($value));

            $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$pharmaid','$value')";
            mysqli_query($conn,$query);

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($conn,$query);

            $pharmaid =  rand(111111, 999999);          
        }

    }
}
else{
    $meds = explode(',',$meds);

    foreach($meds AS $value) {

        $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

        mysqli_query($conn,$query);
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
            
            if(isset($appointment)){
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,NextDateAppointment) 
                VALUES('$diagnosisid','$medicalid','$admissionid','$attendingid','$val','$date','$time','$appointment')";
            }else{
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$medicalid','$admissionid','$attendingid','$val','$date','$time')";
            }
    
            mysqli_query($conn,$query);  



        }
        else{
            $value  = ucwords(strtolower($value));

            $query= "INSERT into conditions(ConditionID,Conditions) VALUES ('$conditionid','$value')";
            
            mysqli_query($conn,$query);

            $conditionid =  rand(111111, 999999);          

            if(isset($appointment)){
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,NextDateAppointment) 
                VALUES('$diagnosisid','$medicalid','$admissionid','$attendingid','$val','$date','$time','$appointment')";
            }else{
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$medicalid',s'$admissionid','$attendingid','$val','$date','$time')";
            }

            mysqli_query($conn,$query);  


        }

    }
}else{
    $diagnosis = explode(',',$diagnosis);

    foreach($diagnosis AS $value) {

        $sel = mysqli_query($conn,"SELECT Conditions FROM conditions WHERE ConditionID='$value'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $val = $row['Conditions'];
        }

        if(isset($appointment)){
            $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,NextDateAppointment) 
             VALUES('$diagnosisid','$medicalid','$admissionid','$attendingid','$val','$date','$time','$appointment')";
        }else{
            $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
            VALUES('$diagnosisid','$medicalid','$admissionid','$attendingid','$val','$date','$time')";
        }

        mysqli_query($conn,$query);  

    }
}
if($rate != ''){
    $fee = $rate;
}else{
    $sel = mysqli_query($conn,"SELECT ProfessionalFee FROM physicians WHERE PhysicianID='$at'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $fee = $row['ProfessionalFee'];
    }
}



$query= "UPDATE attending_physicians SET DiagnosisID = '$diagnosisid', Rate='$fee' WHERE AdmissionID = '$admissionid' AND AttendingID ='$attendingid' ";

mysqli_query($conn,$query);  

header("Location:../post-diagnosis.php?at=$at&medicationid=$medicationid&id=$admissionid");

