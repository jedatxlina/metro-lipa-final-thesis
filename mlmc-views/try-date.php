<?php

date_default_timezone_set("Asia/Singapore");
// $datee = date("Y-m-d");
// $timee = '2:00 AM';

$timeadministered = '1:20 AM'; 

$time1  = date_create($timeadministered);
$time 	= date_create(); 

$diff  	= date_diff( $time1, $time );
$yearrdiff = $diff->y;
$monthdiff = $diff->m;

$hours = $diff->h;
$minutes = $diff->i;
 
echo $hours;
echo '<br>';
echo $minutes;

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