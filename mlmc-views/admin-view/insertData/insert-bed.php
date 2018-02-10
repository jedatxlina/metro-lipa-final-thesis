<?php
require_once 'connection.php';



$RoomType = $_GET['RoomType'];
$rate = $_GET['rate'];
$floor = $_GET['floor'];
$room = $_GET['room'];

if ($RoomType == 'Single Deluxe')
{ 
    $bedid = $room; 
    $query= "INSERT into beds(BedID,RoomType,Rate,Floor,Room,Status) VALUES ('$bedid','$RoomType','$rate','$floor','$room','Available')";
    mysqli_query($con,$query); 
}
else if ($RoomType == 'Two-Bedded')
{ 
    for ($i=1;$i<=2;$i++)
    {
        $bedid = $room."-".$i; 
        $query= "INSERT into beds(BedID,RoomType,Rate,Floor,Room,Status) VALUES ('$bedid','$RoomType','$rate','$floor','$room','Available')";
        mysqli_query($con,$query); 
    }
}
else if ($RoomType == 'Four-Bedded')
{ 
    for ($i=1;$i<=4;$i++)
    {
        $bedid = $room.'-'.$i; 
        $query= "INSERT into beds(BedID,RoomType,Rate,Floor,Room,Status) VALUES ('$bedid','$RoomType','$rate','$floor','$room','Available')";
        mysqli_query($con,$query); 
    }
}
else if ($RoomType == 'Ward')
{ 
    for ($i=1;$i<=8;$i++)
    {
        $bedid = $room.'-'.$i; 
        $query= "INSERT into beds(BedID,RoomType,Rate,Floor,Room,Status) VALUES ('$bedid','$RoomType','$rate','$floor','$room','Available')";
        mysqli_query($con,$query); 
    }
}


?>
