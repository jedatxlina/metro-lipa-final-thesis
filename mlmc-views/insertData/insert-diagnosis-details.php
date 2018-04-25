<?php 
require_once 'connection.php';

$diagnosisid = rand(111111,999999);
$orderid =  rand(111111, 999999);     
$conditionid = rand(111111,999999);

$laboratoryid =  rand(111111, 999999);
$pharmaid  =  rand(111111, 999999);
$laborderid =  rand(111111, 999999);     
$newmedicineid = rand(111111, 999999);

$at = $_GET['at'];
$admissionid = $_GET['id'];
$medicalid = $_GET['medicalid'];
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

$sel = mysqli_query($conn,"SELECT MedicationID FROM medical_details JOIN patients WHERE patients.AdmissionID= '$admissionid' AND patients.MedicalID = medical_details.MedicalID");

while ($row = mysqli_fetch_assoc($sel)) {
    $medicationid = $row['MedicationID'];
   
}

if($labs != ''){
    if(preg_match("/[A-z]/i", $labs)){
        
        $labs = explode(',',$labs);

        foreach($labs AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$medicalid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
                mysqli_query($conn,$query);

                $orderid =  rand(111111, 999999);  
                
                if($appointment != ''){

                    $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest,MedicalID) 
                    VALUES('$laborderid','$value','$admissionid','Pending','$date','$time','$medicalid')";
        
                    mysqli_query($conn,$query2);
    
                    $laborderid =  rand(111111, 999999);     
                }
                
               
            }
            else{
                $value  = ucwords(strtolower($value));

                if($appointment != ''){
                    $query= "INSERT into laboratories(LaboratoryID,Description) VALUES ('$laboratoryid','$value')";
                    mysqli_query($conn,$query);

                    $laboratoryid =  rand(111111, 999999);  

                    $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest,MedicalID) 
                    VALUES('$laborderid','$value','$admissionid','Pending','$date','$time','$medicalid')";
                    mysqli_query($conn,$query2);

                    $laborderid =  rand(111111, 999999); 
                }


                $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$medicalid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
                mysqli_query($conn,$query);
               
            }

        }
    }else{
        $labs = explode(',',$labs);

        foreach($labs AS $value) {

            $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$medicalid','$admissionid','$at','$order','$value','$date','$time','Pending')";
    
            mysqli_query($conn,$query);

            $orderid =  rand(111111, 999999);  
            
            
            if($appointment != ''){
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest,MedicalID) 
                VALUES('$laborderid','$value','$admissionid','Pending','$date','$time','$medicalid')";

                mysqli_query($conn,$query2);

                $laborderid =  rand(111111, 999999); 
            }
        }
    }
}else{
    $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,DateOrder,TimeOrder,Status) 
    VALUES('$orderid','$medicalid','$admissionid','$at','$order','$date','$time','Pending')";

    mysqli_query($conn,$query);

    $orderid =  rand(111111, 999999);  
}
    
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
                    VALUES('$medicationid','$admissionid','$val','$date','$time','$valunit','$at')";

            mysqli_query($conn,$query);   

        }
        else{

            $value  = ucwords(strtolower($value));

            $query = "INSERT into pharmaceuticals(MedicineID,MedicineName) 
                    VALUES('$newmedicineid','$value')";

            mysqli_query($conn,$query);
            
            $newmedicineid = rand(111111, 999999);

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineName,DateAdministered,TimeAdministered,PhysicianID) 
            VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

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
                    VALUES('$medicationid','$admissionid','$val','$date','$time','$valunit','$at')";

        mysqli_query($conn,$query);
    }
}

if(preg_match("/[A-z]/i", $diagnosis)){
        
    $diagnosis = explode(',',$diagnosis);

    foreach($diagnosis AS $value){
        
        if(is_numeric($value)){
            
            $sel = mysqli_query($conn,"SELECT * FROM (SELECT DiseaseID,Disease FROM philhealth UNION SELECT ConditionID as DiseaseID,Conditions as Disease FROM conditions GROUP BY Disease) as tbldiagnosis WHERE DiseaseID ='$value' ");

            while ($row = mysqli_fetch_assoc($sel)) {
                $val = $row['Disease'];
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
                VALUES('$diagnosisid','$medicalid','$admissionid','$attendingid','$value','$date','$time','$appointment')";
            }else{
                $query = "INSERT into diagnosis(DiagnosisID,MedicalID,AdmissionID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed) 
                VALUES('$diagnosisid','$medicalid',s'$admissionid','$attendingid','$value','$date','$time')";
            }

            mysqli_query($conn,$query);  


        }

    }
}else{
    $diagnosis = explode(',',$diagnosis);

    foreach($diagnosis AS $value) {
         
        $sel = mysqli_query($conn,"SELECT * FROM (SELECT DiseaseID,Disease FROM philhealth UNION SELECT ConditionID as DiseaseID,Conditions as Disease FROM conditions GROUP BY Disease) as tbldiagnosis WHERE DiseaseID ='$value' ");

        while ($row = mysqli_fetch_assoc($sel)) {
            $val = $row['Disease'];
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

$query= "UPDATE medical_details SET MedicationID = '$medicationid' WHERE AdmissionID = '$admissionid' AND MedicalID = '$medicalid'";

mysqli_query($conn,$query);  

header("Location:../post-diagnosis.php?at=$at&medicationid=$medicationid&id=$admissionid&medicalid=$medicalid");

