<?php


$at = $_GET['at'];
$id = $_GET['id'];
$bill = $_GET['bill'];

$postsms = file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=jedatxlina&key=xxxx&to=09175768818&message=helloworld');
