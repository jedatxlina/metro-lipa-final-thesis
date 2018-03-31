<?php
require_once 'connection.php';

$id = $_GET["id"];
$bed;
$sel = mysqli_query($conn,"SELECT b.BedID FROM patients a, medical_details b WHERE a.AdmissionType = 'Pending' AND b.AdmissionID = '$id'");
$data = array();
while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
		$bed = $row['BedID']);
}
$billid =  rand (11111,99999);
$date = date("Y-m-d");
$query = "INSERT into duration(DurationID,AdmissionID,ArrivalDate,DischargeDate,BedID,TotalBill) 
VALUES('$billid','$id','$date','0000-00-00','$bed','0000')";
mysqli_query($conn,$query);  
?>
