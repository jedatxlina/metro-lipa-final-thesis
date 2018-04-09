<?php
    require_once 'insertData/connection.php';
    $at = $_GET['at'];
    $id= $_GET['id'];
    $admmissionid = $_GET['admissionid'];

    $qnty = explode(',',$_GET['quantity']);
    $dosage = explode(',',$_GET['dosage']);
    $medid  = explode(',',$_GET['medid']);
    $notes  = explode(',',$_GET['notes']);
    // $intake =  explode(',',$_GET['intake']);
     $qntyintake =  explode(',',$_GET['qntyintake']);

    $days = [];

    $interval =isset($_GET['intakeinterval']) ? explode(',',$_GET['intakeinterval']) : '';

    $param = isset($_GET['param']) ? $_GET['param'] : '';

    $cnt = count($medid);

    $result = mysqli_query($conn,"SELECT CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM physicians WHERE PhysicianID = '$at'");
    while($row = mysqli_fetch_assoc($result))
    {
        $fullname = $row['Fullname'];
    }

    for($x = 0; $x < $cnt ; $x ++){
        if($interval == ''){
        
            $query = "UPDATE medication SET Quantity = '$qnty[$x]', Dosage = '$dosage[$x]', Notes = '$notes[$x]' WHERE AdmissionID = '$admmissionid' AND MedicineID = '$medid[$x]'"; 
            mysqli_query($conn,$query);  
            
            $query2 = "UPDATE medication_history SET Quantity = '$qntyintake[$x]' WHERE AdmissionID = '$admmissionid'"; 
            mysqli_query($conn,$query2);  
        }else{

        $days[$x] = $qnty[$x] * $interval[$x];
        // $qnty[$x] *= $interval[$x];

        $query = "UPDATE medication SET Quantity = '$qnty[$x]', Dosage = '$dosage[$x]', Notes = '$notes[$x]', DosingID = '$interval[$x]', Days = '$days[$x]' WHERE AdmissionID = '$admmissionid' AND MedicineID = '$medid[$x]'";
        mysqli_query($conn,$query);  
        $query2 = "UPDATE medication_history SET Quantity = '$qntyintake[$x]' WHERE AdmissionID = '$admmissionid'"; 
        mysqli_query($conn,$query2);  
        }

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



