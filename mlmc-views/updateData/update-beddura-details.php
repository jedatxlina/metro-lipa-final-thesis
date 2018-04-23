<?php
require_once 'connection.php';

date_default_timezone_set('Asia/Singapore');
$billid =  rand (11111,99999);
$admissno =  $_GET['admissno']; 
$id =  $_GET['id']; 
$bedno = $_GET['bedno'];
$date = date("Y-m-d h:i:sa");
$prev = $_GET['Prev'];
$medid = '';
$query2 = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE AdmissionID=$id");
while ($row = mysqli_fetch_array($query2)) {
    $medid = $row['MedicalID'];
    echo $medid;
}
$query3 = "UPDATE medical_details SET BedID = '$bedno' WHERE MedicalID = '$medid'";
$query4 = "UPDATE duration SET DischargeDate = '$date' WHERE AdmissionID=$id AND AdmissionNo=$admissno AND BedID='$prev'";
$billid2 =  rand (11111,99999);
$query5 = "INSERT into duration(DurationID,AdmissionID,AdmissionNo,ArrivalDate,DischargeDate,BedID,TotalBill) 
VALUES('$billid2','$id','$admissno','$date','0000-00-00','$bedno','0000')";
mysqli_query($conn,$query5);  
mysqli_query($conn,$query3);  
mysqli_query($conn,$query4);  
?>
