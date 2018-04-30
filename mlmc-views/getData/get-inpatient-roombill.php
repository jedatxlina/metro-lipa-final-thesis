<?php
require_once 'connection.php';

date_default_timezone_set("Asia/Singapore");
$yearage = '0';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.* ,b.Rate,b.RoomType FROM duration a, beds b, patients c WHERE b.BedID = a.BedID AND a.AdmissionID = '$id' AND a.AdmissionNo = c.AdmissionNo AND NOT a.BedID = 'ER'");
$data = array();
$date = date("Y-m-d");
while ($row = mysqli_fetch_array($sel)) {
    $parameterage  = date_create($row['ArrivalDate']);
    if($row['DischargeDate'] == '0000-00-00 00:00:00')
        $currentdatetime 	= date_create(date("Y-m-d h:i:sa"));
    else
        $currentdatetime 	= date_create($row['DischargeDate']); // Current time and date
    $getage =  date_diff( $parameterage, $currentdatetime );
    $yearage = $getage->d;
    if($yearage <= 1)
        $yearage=1;
    $data[] = array(
    "bedbill"=>$row['Rate']*$yearage,
    "Rate"=>$row['Rate'],
    "ArrivalDate"=>$row['ArrivalDate'],
    "DischargeDate"=>$currentdatetime->format("Y-m-d h:i:sa"),
    "RoomType"=>$row['RoomType'],
    "BedID"=>$row['BedID'],
    "Duration"=>$yearage);
}
echo json_encode($data);
?>

									