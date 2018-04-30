<?php
    require_once 'connection.php';

    $medtimelineid = rand (11111,99999);

    $at = $_GET['at'];
    $admissionid = $_GET['id'];
    $medid = $_GET['medid'];

    date_default_timezone_set("Asia/Singapore");
    $date = date("Y-m-d");
    $time = date("h:i A");

               
    $medid = explode(',',$medid);

    foreach($medid AS $medid){

        $sel = mysqli_query($conn,"SELECT medication.*,dosing_time.DosingID,dosing_time.TimeInterval FROM medication JOIN dosing_time WHERE medication.ID = '$medid' AND medication.AdmissionID = '$admissionid' AND medication.DosingID = dosing_time.DosingID");

        while($row = mysqli_fetch_assoc($sel))
        {
            $medicationid=$row['MedicationID'];
            $medicinename = $row['MedicineName'];
            $qnty =  intval($row['Quantity']);
            $dsg = $row['Dosage'];
            $quantityOnhand =  intval($row['QuantityOnHand']);
            $dateadministered = $row['DateAdministered'];
            $timeadminitered = $row['TimeAdministered'];
            $datestart = $row['DateStart'];
            $timestart = $row['TimeStart'];
            $timeinterval = $row['TimeInterval'];
        }

        if($datestart == '' && $timestart == ''){
        
            $query= "UPDATE medication SET DateStart = '$date', TimeStart = '$time' WHERE AdmissionID = '$admissionid' AND ID = '$medid'";

            mysqli_query($conn,$query);    

        }

        $query= "UPDATE medication SET QuantityOnHand = QuantityOnHand - 1 WHERE AdmissionID = '$admissionid' AND ID = '$medid'";

        mysqli_query($conn,$query); 


        $nextintake = date("h:i A", strtotime("+{$timeinterval} hours"));

        $query1= "INSERT into medication_timeline(MedTimelineID,MedicationID,AdmissionID,MedicineName,NurseID,DateIntake,TimeIntake,NextTimeIntake) 
        VALUES ('$medtimelineid','$medicationid','$admissionid','$medicinename','$at','$date','$time','$nextintake')";


        mysqli_query($conn,$query1);  

        $department = 'Pharmacy';
        $billid =  rand (111111,999999);

        $sel = mysqli_query($conn,"SELECT Price FROM pharmaceuticals WHERE MedicineName = '$medicinename' AND Unit = '$dsg' ");
        
        $price = '';
        
        while($row = mysqli_fetch_assoc($sel))
        {
            $price = $row['Price'];
        }
        
        $sel2 = mysqli_query($conn,"SELECT beds.Percent
        FROM beds 
        JOIN patients
        JOIN medical_details
        WHERE patients.MedicalID = medical_details.MedicalID AND medical_details.BedID = beds.BedID AND patients.AdmissionID = '$admissionid'");
        while($row = mysqli_fetch_assoc($sel2))
        {
            $percent = $row['Percent'];
        }
        $price = $price * $percent;
        
        $sel3 = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE admissionID = '$admissionid'");
        
        while($row = mysqli_fetch_assoc($sel3))
        {
            $medicalid = $row['MedicalID'];
        }
        
        $sel4 = mysqli_query($conn,"SELECT medical_details.BedID FROM medical_details JOIN patients WhERE medical_details.MedicalID = patients.MedicalID AND patients.AdmissionID = '$admissionid'");
        
        while($row = mysqli_fetch_assoc($sel4))
        {
            $bedid = $row['BedID'];
        }
        $med = $medicinename . ' ' . $dsg;
        $billquery = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill,Status,MedicalID,BedID) 
        VALUES('$billid','$admissionid','$department','$medicationid','$med','$price','Unpaid','$medicalid','$bedid')";
        mysqli_query($conn,$billquery);  
    }


    header("Location:../nurse-patient.php?at=$at");
?>

