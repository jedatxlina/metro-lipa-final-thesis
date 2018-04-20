<?php

date_default_timezone_set("Asia/Singapore");
// $datee = date("Y-m-d");
// $timee = '2:00 AM';

// $timeadministered = '12:15 AM'; 

// $time1  = date_create($timeadministered);
// $time 	= date_create(); 

// $diff  	= date_diff( $time1, $time );

// $yearrdiff = $diff->y;
// $monthdiff = $diff->m;

// $hours = $diff->h;
// $minutes = $diff->i;
 
// echo $hours;
// echo '<br>';
// echo $minutes;

// echo 'The difference is ';
// echo  $diff->y . ' years, ';
// echo  $diff->m . ' months, ';
// echo  $diff->d . ' days, ';
// echo  $diff->h . ' hours, ';
// echo  $diff->i . ' minutes, ';
// echo '<br><br><br>';
// echo $timee;
// $new_time = date("h:i A", strtotime("-{$hours} hours"));
// echo '<br>';
// echo $new_time;


//   require __DIR__ . '/vendor/autoload.php';

//   $options = array(
//     'cluster' => 'ap1',
//     'encrypted' => true
//   );
//   $pusher = new Pusher\Pusher(
//     'c23d5c3be92c6ab27b7a',
//     '296fc518f7ee23f7ee56',
//     '468021',
//     $options
//   );

//   $data['message'] = 'hello world';
//   $pusher->trigger('my-channel', 'my-event', $data);
$fullname = 'ead';

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
