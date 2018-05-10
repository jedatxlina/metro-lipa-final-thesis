<?php

	include('patientArchiveCsv/upload-philhealth-adjustments.php');

	$csv = new csv();

    // if(isset($_POST['submit']) && isset($_POST['at']))
    // {

    // $at = $_POST['at'];
    if(!empty($_FILES)){
        $csv->import($_FILES['file']['tmp_name']); 
    }
    
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

    $data['message'] = "Success!";
    $data['message1'] = "Successfully Imported CSV File!" ;
    $pusher->trigger('my-channel-others', 'my-event-others', $data);

    //  header("Location: migrate.php?at=".$at);
    // }

?>