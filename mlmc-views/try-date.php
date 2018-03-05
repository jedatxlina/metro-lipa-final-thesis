<?php

date_default_timezone_set("Asia/Singapore");

$timeadministered = '06:14 PM';
$time1  = date_create($timeadministered);
$time 	= date_create(); // Current time and date

$diff  	= date_diff( $time1, $time );
$yearrdiff = $diff->y;
$monthdiff = $diff->m;


echo 'The difference is ';
echo  $diff->y . ' years, ';
echo  $diff->m . ' months, ';
echo  $diff->d . ' days, ';
echo  $diff->h . ' hours, ';
echo  $diff->i . ' minutes, ';
