<?php
    require_once 'insertData/connection.php';

    $at = $_GET['at'];
    $medicationid= $_GET['id'];
    $admissionid = $_GET['admissionid'];

    $intake =  explode(',',$_GET['intake']);
    $qntyintake =  explode(',',$_GET['qntyintake']);
    $notes  = explode(',',$_GET['notes']);
    $param = isset($_GET['param']) ? $_GET['param'] : '';
    $cnt = count($intake);

    // $days = [];
    $interval =isset($_GET['intakeinterval']) ? explode(',',$_GET['intakeinterval']) : '';

   
    $medicalid =   isset($_GET['medicalid']) ? explode(',',$_GET['medicalid']) : '';
    $dosage =   isset($_GET['dosage']) ? explode(',',$_GET['dosage']) : '';


    for($x = 0;$x < $cnt; $x++){

            $query = "UPDATE pharmaceuticals SET Unit = '$dosage[$x]' WHERE MedicineName = '$intake[$x]'"; 
            mysqli_query($conn,$query);  

            $search = mysqli_query($conn,"SELECT MedicineName,Unit FROM pharmaceuticals WHERE MedicineName = '$intake[$x]'");
                
            while($row = mysqli_fetch_assoc($search))
            {
                $unit = $row['Unit'];
            }

            $row_cnt = $search->num_rows;

            if($interval == ''){


                if($row_cnt >= 1){
                    $query = "UPDATE medication SET Quantity = '$qntyintake[$x]', Dosage = '$unit', Notes = '$notes[$x]' WHERE MedicationID = '$medicationid' AND MedicineName = '$intake[$x]'"; 
                    mysqli_query($conn,$query);  
                }else{
                    $query = "UPDATE medication SET Quantity = '$qntyintake[$x]', Notes = '$notes[$x]' WHERE MedicationID = '$medicationid' AND MedicineName = '$intake[$x]'"; 
                    mysqli_query($conn,$query);  
                }

                $department = 'Pharmacy';
                $billid =  rand (111111,999999);
            
                $sel = mysqli_query($conn,"SELECT Price FROM pharmaceuticals WHERE MedicineName = '$intake[$x]' AND Unit = '$unit' ");
                
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
                
                for ($i=0; $i < $qntyintake[$x]; $i++) { 
            
                    $billquery = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill,Status,MedicalID,BedID) 
                    VALUES('$billid','$admissionid','$department','$medicationid','$intake[$x]' ,'$price','Unpaid','$medicalid','$bedid')";
                    mysqli_query($conn,$billquery);  
                
                    $billid =  rand (111111,999999);
            
                }

            }else{
                    
                if($row_cnt >= 1){
                    $query = "UPDATE medication SET Quantity = '$qntyintake[$x]', Dosage = '$unit', Notes = '$notes[$x]', DosingID = '$interval[$x]' WHERE MedicationID = '$medicationid' AND MedicineName = '$intake[$x]'"; 
                    mysqli_query($conn,$query);  
                }else{
                    $query = "UPDATE medication SET Quantity = '$qntyintake[$x]', Notes = '$notes[$x]', DosingID = '$interval[$x]' WHERE MedicationID = '$medicationid' AND MedicineName = '$intake[$x]'"; 
                    mysqli_query($conn,$query);  
                }

            }
    } 

    if($param != ''){

        switch ($param) {
            case 'Emergency':
                header("Location:emergency.php?at=$at");
                break;
                
            case 'Outpatient':
                require __DIR__ . '/vendor/autoload.php';

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
                
                $data['message'] = "Dr. " . $fullname . " posted a patient order.";
                $pusher->trigger('my-channel-outpatient', 'my-event-outpatient', $data);

                header("Location:physician.php?at=$at");
                break;

            default:
                    break;
        }
    }
    else{

        switch ($at[0]) {
            case '3':
                header("Location:nurse-patient.php?at=$at");
                break;
            
            default:
                // require __DIR__ . '/vendor/autoload.php';

                // $options = array(
                //     'cluster' => 'ap1',
                //     'encrypted' => true
                // );
                
                // $pusher = new Pusher\Pusher(
                //     'c23d5c3be92c6ab27b7a',
                //     '296fc518f7ee23f7ee56',
                //     '468021',
                //     $options
                // );
                
                // $data['message'] = "Dr. " . $fullname . " posted a patient order.";
                // $pusher->trigger('my-channel-inpatient', 'my-event-inpatient', $data);
                // $pusher->trigger('my-channel', 'my-event', $data);
        
                header("Location:physician.php?at=$at");
                break;
        }

        

}



