<?php
require_once 'connection.php';
$yearage = '0';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.* ,b.Rate,b.RoomType FROM duration a, beds b WHERE b.BedID = a.BedID AND a.AdmissionID = '$id'");
$data = array();
$date = date("Y-m-d");
while ($row = mysqli_fetch_array($sel)) {
    $parameterage  = date_create($row['ArrivalDate']);
    if($row['DischargeDate'] == '0000-00-00 00:00:00')
        $currentdatetime 	= date_create();
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
    "DischargeDate"=>$row['DischargeDate'],
    "RoomType"=>$row['RoomType'],
    "BedID"=>$row['BedID'],
    "Duration"=>$yearage);
}
echo json_encode($data);
?>

									