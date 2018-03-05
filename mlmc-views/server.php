<?php
// If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
// 	die();
// }
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

  if(isset($_GET['name']))
  {
    $name = $_GET['name'];
  }
  else
  {
    $name = "Client";
  }

$data['message'] = 'Hello '.$name;
$pusher->trigger('my-channel', 'my-event', $data);
?>