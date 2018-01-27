
<?php
$dte  = '1/31/2018';
$dt   = new DateTime();
$date = $dt->createFromFormat('m/d/Y', $dte);
echo $date->format('Y-m-d');
?>