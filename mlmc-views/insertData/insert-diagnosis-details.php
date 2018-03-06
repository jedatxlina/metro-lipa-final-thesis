<?php 
require_once 'connection.php';
$orderid =  rand(111111, 999999);     
$diagnosisid =  rand(111111, 999999);
$medicationid = rand(111111,999999);
$laboratoryid =  rand(111111, 999999);
$pharmaid  =  rand(111111, 999999);
$laborderid =  rand(111111, 999999);     


$at = $_GET['at'];
$admissionid = $_GET['id'];
$diagnosis = $_GET['diagnosis'];
$order = $_GET['order'];
$labs = isset($_GET['lab']) ? $_GET['lab'] : '';
$meds = $_GET['meds'];



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
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status) 
                VALUES('$laboratoryid','$value','$admissionid','Pending')";
    
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
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status) 
                VALUES('$laboratoryid','$value','$admissionid','Pending')";
    
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

            $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status) 
            VALUES('$laboratoryid','$value','$admissionid','Pending')";

            mysqli_query($con,$query2);

            $laborderid =  rand(111111, 999999); 
        }
    }
}else{
    $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
    VALUES('$orderid','$admissionid','$at','$order','0','$date','$time','Pending')";

    mysqli_query($con,$query);

    $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status) 
    VALUES('$laboratoryid','$value','$admissionid','Pending')";

    mysqli_query($con,$query2);

    $laborderid =  rand(111111, 999999); 
}
    
if(preg_match("/[A-z]/i", $meds)){
        
    $meds = explode(',',$meds);

    foreach($meds AS $value){
        
        if(is_numeric($value)){

            $query = "INSERT into diagnosis(DiagnosisID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,MedicationID) 
                    VALUES('$diagnosisid','$at','$diagnosis','$date','$time','$medicationid')";
            
            mysqli_query($con,$query);  

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($con,$query);   
        }
        else{
            $value  = ucwords(strtolower($value));

            $query= "INSERT into pharmaceuticals(MedicineID,MedicineName) VALUES ('$pharmaid','$value')";
            mysqli_query($con,$query);

            $query = "INSERT into diagnosis(DiagnosisID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,MedicationID) 
                    VALUES('$diagnosisid','$at','$diagnosis','$date','$time','$pharmaid')";
            
            mysqli_query($con,$query);  

            $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($con,$query);

            $diagnosisid =  rand(111111, 999999);
            $pharmaid =  rand(111111, 999999);          
        }

    }
}
else{
    $meds = explode(',',$meds);

    foreach($meds AS $value) {

        $query = "INSERT into diagnosis(DiagnosisID,AttendingID,Findings,DateDiagnosed,TimeDiagnosed,MedicationID) 
                    VALUES('$diagnosisid','$at','$diagnosis','$date','$time','$medicationid')";
            
            mysqli_query($con,$query);  

        $query = "INSERT into medication(MedicationID,AdmissionID,MedicineID,DateAdministered,TimeAdministered,PhysicianID) 
                    VALUES('$medicationid','$admissionid','$value','$date','$time','$at')";

            mysqli_query($con,$query);

            $diagnosisid =  rand(111111, 999999);          
    }
}
    
    require('../vendor/autoload.php');

    $options = array(
        'cluster' => 'ap1',
        'encrypted' => true
      );
    
      $pusher = new Pusher\Pusher(
        'c23d5c3be92c6ab27b7a',
        '296fc518f7ee23f7ee56',
        '468021',
        $options
      );
    
    $data['message'] = $at . " posted a patient order.";
    $pusher->trigger('my-channel', 'my-event', $data);

header("Location:../post-medication.php?at=$at&medicationid=$medicationid&admissionid=$admissionid");

