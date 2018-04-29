<?php 
require_once 'connection.php';
$orderid =  rand(111111, 999999);  
$newmedicineid = rand(111111, 999999);
$at = $_GET['at'];
$nurseat = $_GET['nurseat'];
$admissionid = $_GET['id'];
$medicalid = $_GET['medicalid'];
$meds = $_GET['meds'];
$medorder = $_GET['medorder'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$sel = mysqli_query($conn,"SELECT MedicationID FROM medical_details JOIN patients WHERE patients.AdmissionID= '$admissionid' AND patients.MedicalID = medical_details.MedicalID");

while ($row = mysqli_fetch_assoc($sel)) {
    $medicationid = $row['MedicationID'];
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

$query = "INSERT into orders(OrderID,MedicalID,AdmissionID,PhysicianID,Task,DateOrder,TimeOrder,Status,NurseID) 
    VALUES('$orderid','$medicalid','$admissionid','$at','$medorder','$date','$time','Pending','$nurseat')";

mysqli_query($conn,$query);



header("Location:../post-medication-nurse.php?at=$nurseat&medicationid=$medicationid&id=$admissionid&medicalid=$medicalid&phyat=$at");

