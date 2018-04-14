<?php
    require_once 'insertData/connection.php';

    $at = $_GET['at'];
    $medicationid= $_GET['id'];
    $admissionid = $_GET['admissionid'];

    // $qnty = explode(',',$_GET['quantity']);
    // $dosage = explode(',',$_GET['dosage']);
    // $medid  = explode(',',$_GET['medid']);

    $intake =  explode(',',$_GET['intake']);
    $qntyintake =  explode(',',$_GET['qntyintake']);
    $notes  = explode(',',$_GET['notes']);

    $param = isset($_GET['param']) ? $_GET['param'] : '';
    
    // $days = [];
    // $interval =isset($_GET['intakeinterval']) ? explode(',',$_GET['intakeinterval']) : '';

    $cnt = count($intake);
    


    for($x = 0;$x < $cnt; $x++){

            // $sel =  mysqli_query($conn,"SELECT MedicineID,Unit FROM pharmaceuticals WHERE MedicineName = '$intake[$x]'");
            // while($row = mysqli_fetch_assoc($sel))
            // {
            //    $medicineid = $row['MedicineID'];
            //    $dosage = $row['Unit'];
            // }
          
            // $sel2 = mysqli_query($conn,"SELECT * FROM medication WHERE MedicationID = '$medicationid' AND MedicineID = '$medicineid'");
            // while($row = mysqli_fetch_assoc($sel2))
            // {
            //    $chk = $row['MedicationID'];
            // }

            // $query = "UPDATE medication SET Quantity = '$medicineid' WHERE MedicationID = 324943 AND MedicineID = 227411"; 
            // mysqli_query($conn,$query);  

            $search = mysqli_query($conn,"SELECT MedicineName,Unit FROM pharmaceuticals WHERE MedicineName = '$intake[$x]'");
            while($row = mysqli_fetch_assoc($result))
            {
                $unit = $row['Unit'];
            }
            $row_cnt = $search->num_rows;

            if($row_cnt >= 1){
                $query = "UPDATE medication SET Quantity = '$qntyintake[$x]', Dosage = '$unit', Notes = '$notes[$x]' WHERE MedicationID = '$medicationid' AND MedicineName = '$intake[$x]'"; 
                mysqli_query($conn,$query);  
            }else{
                $query = "UPDATE medication SET Quantity = '$qntyintake[$x]', Notes = '$notes[$x]' WHERE MedicationID = '$medicationid' AND MedicineName = '$intake[$x]'"; 
                mysqli_query($conn,$query);  
            }
      
         
            // if($interval == ''){
            
                // $query = "UPDATE medication SET Quantity = '$qnty[$x]', Dosage = '$dosage[$x]', Notes = '$notes[$x]' WHERE AdmissionID = '$admmissionid' AND MedicineID = '$medid[$x]'"; 
                // mysqli_query($conn,$query);  
                
            //     $query2 = "UPDATE medication_history SET Quantity = '$qntyintake[$x]' WHERE AdmissionID = '$admmissionid'"; 
            //     mysqli_query($conn,$query2);  
            // }else{

            // $days[$x] = $qnty[$x] * $interval[$x];
            // // $qnty[$x] *= $interval[$x];

            // $query = "UPDATE medication SET Quantity = '$qnty[$x]', Dosage = '$dosage[$x]', Notes = '$notes[$x]', DosingID = '$interval[$x]', Days = '$days[$x]' WHERE AdmissionID = '$admmissionid' AND MedicineID = '$medid[$x]'";
            // mysqli_query($conn,$query);  
            // $query2 = "UPDATE medication_history SET Quantity = '$qntyintake[$x]' WHERE AdmissionID = '$admmissionid'"; 
            // mysqli_query($conn,$query2);  

            // }

    } 

    if($param != ''){

        switch ($param) {
            case 'Emergency':
                header("Location:emergency.php?at=$at");
                break;
                
            default:
                require('vendor/autoload.php');

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

                header("Location:outpatient.php?at=$at");
                break;
        }
    }
    else{

        require('vendor/autoload.php');

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
        $pusher->trigger('my-channel-inpatient', 'my-event-inpatient', $data);
        $pusher->trigger('my-channel', 'my-event', $data);

        header("Location:physician.php?at=$at");

}



