<?php
require_once 'connection.php';


$requestid = $_GET['requestid'];
$interpret = $_GET['interpret'];

date_default_timezone_set("Asia/Singapore");
$date = date("Y-m-d");
$time = date("h:i A");  

$query= "UPDATE laboratory_req SET Status = 'Cleared', DateCleared = '$date', TimeCleared = '$time', Result = '$interpret' WHERE RequestID = '$requestid'";

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



$data['message'] = "Laboratory Notification!";
$data['message1'] = "Laboratory Request Cleared, ID:  " . $requestid ;
$pusher->trigger('my-channel-laboratory', 'my-event-laboratory', $data);
?>
