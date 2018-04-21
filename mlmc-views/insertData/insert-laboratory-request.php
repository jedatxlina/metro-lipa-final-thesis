<?php 
require_once 'connection.php';

$laborderid =  rand(111111, 999999);     
$orderid =  rand(111111, 999999);     

$at = $_GET['at'];
$admissionid = $_GET['id'];
$labs = $_GET['lab'];
$request = $_GET['request'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$sel = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE AdmissionID = '$admissionid'");

while ($row = mysqli_fetch_assoc($sel)) {
    $medicalid = $row['MedicalID'];
}

if($labs != ''){
    if(preg_match("/[A-z]/i", $labs)){
        
        $labs = explode(',',$labs);

        foreach($labs AS $value){
            
            if(is_numeric($value)){

                $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$medicalid','$admissionid','$at','$request','$value','$date','$time','Pending')";
    
                mysqli_query($conn,$query);

                $orderid =  rand(111111, 999999);     
                
                $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
                VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
    
                mysqli_query($conn,$query2);

                $laborderid =  rand(111111, 999999);     
            }
            else{
                // $value  = ucwords(strtolower($value));

                // $query= "INSERT into laboratories(LaboratoryID,Description) VALUES ('$laboratoryid','$value')";
                // mysqli_query($conn,$query);

                // $query = "INSERT into orders(OrderID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                // VALUES('$orderid','$admissionid','$at','$request','$value','$date','$time','Pending')";
    
                // mysqli_query($conn,$query);

                // $laboratoryid =  rand(111111, 999999);     
                
                // $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
                // VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";
                
                // mysqli_query($conn,$query2);

                // $laborderid =  rand(111111, 999999); 
            }

        }
    }
    else{
        $labs = explode(',',$labs);

        foreach($labs AS $value) {

            $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
                VALUES('$orderid','$medicalid','$admissionid','$at','$request','$value','$date','$time','Pending')";
    
            mysqli_query($conn,$query);

            $orderid =  rand(111111, 999999);   

            $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
            VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";

            mysqli_query($conn,$query2);

            $laborderid =  rand(111111, 999999); 
        }
    }
}else{
    $query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,LaboratoryID,DateOrder,TimeOrder,Status) 
    VALUES('$orderid','$medicalid','$admissionid','$at','$request','$value','$date','$time','Pending')";

    mysqli_query($conn,$query);

    $orderid =  rand(111111, 999999);     
    
    $query2 = "INSERT into laboratory_req(RequestID,LaboratoryID,AdmissionID,Status,DateRequest,TimeRequest) 
    VALUES('$laborderid','$value','$admissionid','Pending','$date','$time')";

    mysqli_query($conn,$query2);

    $laborderid =  rand(111111, 999999);    
}

header("Location:../physician.php?at=$at");