<?php
require_once 'connection.php';


$billid =  rand (111111,999999);
$admissionid =  $_GET['admissionid']; 
$laboratoryid = $_GET['laboratoryid']; 
$des =  $_GET['description'];
$department = 'Laboratory';
$percent = '';
$medicalid = '';
$bedid = '';

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
<<<<<<< HEAD
WHERE patients.MedicalID = medical_details.MedicalID AND medical_details.BedID = beds.BedID AND patients.AdmissionID = 2017340646");

$percent = '';


=======
WHERE patients.MedicalID = medical_details.MedicalID AND medical_details.BedID = beds.BedID AND patients.AdmissionID = '$admissionid'");
>>>>>>> master
while($row = mysqli_fetch_assoc($sel2))
{
    $percent = $row['Percent'];
}
$rate = $rate * $percent;

<<<<<<< HEAD
$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill) 
VALUES('$billid','$admissionid','$department','$laboratoryid','$des','$rate')";
=======
$sel3 = mysqli_query($conn,"SELECT MedicalID FROM patients WHERE admissionID = '$admissionid'");

while($row = mysqli_fetch_assoc($sel3))
{
    $medicalid = $row['MedicalID'];
}

$sel4 = mysqli_query($conn,"SELECT medical_details.BedID FROM medical_details JOIN patients WhERE medical_details.MedicalID = patients.MedicalID AND patients.AdmissionID = '$admissionid'");

while($row = mysqli_fetch_assoc($sel4))
{
    $bedid = $row['BedID'];
}

$query = "INSERT into billing(BillID,AdmissionID,Department,ItemID,BillDes,TotalBill,MedicalID,BedID) 
VALUES('$billid','$admissionid','$department','$laboratoryid','$des','$rate','$medicalid','$bedid')";
>>>>>>> master
mysqli_query($conn,$query);  
?>
