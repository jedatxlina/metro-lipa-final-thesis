<?php

    require_once 'connection.php';

    date_default_timezone_set("Asia/Singapore");

    $sel = mysqli_query($conn,"SELECT * FROM medication_timeline JOIN patients, medical_details WHERE medication_timeline.Status = 1 AND patients.MedicalID = medical_details.MedicalID AND medical_details.MedicationID = medication_timeline.MedicationID");

    $data = array();

    while ($row = mysqli_fetch_array($sel)) {
        
        $medtimelineid = $row['MedTimelineID'];
        $medicationid = $row['MedicationID'];
        $admissionid = $row['AdmissionID'];
        $medicinename = $row['MedicineName'];
        $firstname = $row['FirstName'];
        $middlename = $row['MiddleName'];
        $lastname = $row['LastName'];
        $timeintake = $row['NextTimeIntake'];
        $alert = $row['Alert'];

        $time1  = date_create($timeintake);
        $time 	= date_create(); 
        $diff  	= date_diff($time1,$time);

        $hours = $diff->h;
        $minutes = $diff->i;

        if($hours == 0){
            if($minutes <= 15){

                if($alert == $minutes){

                    if($alert == 0){    
                        $query= "UPDATE medication_timeline SET Status = 0 WHERE MedTimelineID = '$medtimelineid'";
            
                        mysqli_query($conn,$query);  

                    }else{

                        $query= "UPDATE medication_timeline SET Alert = $minutes - 1 WHERE MedTimelineID = '$medtimelineid'";
                        mysqli_query($conn,$query);  
            
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
    
                        $data['message'] = "Medication Warning!";
                        $data['message1'] = "Medication Update for " . $firstname . ' ' . $middlename . ' ' . $lastname;
                        $data['medtimeline'] = $medtimelineid;
                        $data['medname'] = $medicinename;
                        $pusher->trigger('my-channel-inpatient', 'my-event-inpatient', $data);

                    }
                }
            }
        
        
        }
    }

echo json_encode($data);