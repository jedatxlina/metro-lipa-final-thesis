<?php

include "qr-generator/qrlib.php";

$backColor = 0xFFFF00;
$foreColor = 0xFF00FF;

QRcode::png("2014160661",'L',8,8);

?>