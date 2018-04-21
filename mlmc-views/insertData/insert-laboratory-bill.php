<?php
require_once 'connection.php';


$billid =  rand (11111,99999);
$admissionid =  $_GET['admissionid']; 
$laboratoryid = $_GET['laboratoryid']; 
$des =  $_GET['description'];
$department = 'Laboratory';

$sel = mysqli_query($conn,"SELECT Rate FROM laboratories WHERE LaboratoryID = '$laboratoryid' ");

$rate = '';

while($row = mysqli_fetch_assoc($sel))
{
    $rate = $row['Rate'];
}

$sel2 = mysqli_query($conn,"SELECT beds.Percent
FROM beds 
JOIN patients
JOIN medical_details
WHERE patients.MedicalID = medical_details.MedicalID AND medical_details.BedID = beds.BedID AND patients.AdmissionID = 2017340646");

$percent = '';


while($row = mysqli_fetch_assoc($sel2))
{
    $percent = $row['Percent'];
}
$rate = $rate * $percent;

$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill) 
VALUES('$billid','$admissionid','$department','$laboratoryid','$des','$rate')";
mysqli_query($conn,$query);  
?>
