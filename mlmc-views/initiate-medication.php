<?php
require_once 'insertData/connection.php';
$at = $_GET['at'];
$id= $_GET['id'];

$qnty = explode(',',$_GET['quantity']);
$dosage = explode(',',$_GET['dosage']);
$medid  = explode(',',$_GET['medid']);
$param = $_GET['param'];
$type = $_GET['type'];
$cnt = count($medid);

for($x = 0; $x < $cnt ; $x ++){
    $query = "UPDATE medication SET Quantity = '$qnty[$x]' , Dosage = '$dosage[$x]' WHERE MedicationID ='$id' AND MedicineID = '$medid[$x]'";
    mysqli_query($con,$query);
}

$query1 = "UPDATE  medical_details SET class = '$type' WHERE MedicationID = '$id'";
mysqli_query($con,$query1);

switch ($param) {
    case 'Emergency':
        header("Location:emergency.php?at=$at");
        break;
    

    default:
        header("Location:outpatient.php?at=$at");
        break;
}
