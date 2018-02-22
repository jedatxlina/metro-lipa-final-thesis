<?php
require_once 'insertData/connection.php';
$at = $_GET['at'];
$id= $_GET['id'];

$qnty = explode(',',$_GET['quantity']);
$dosage = explode(',',$_GET['dosage']);
$medid  = explode(',',$_GET['medid']);
$notes  = explode(',',$_GET['notes']);

$param = $_GET['param'];
$cnt = count($medid);

for($x = 0; $x < $cnt ; $x ++){
    $query = "UPDATE medication SET Quantity = '$qnty[$x]', Dosage = '$dosage[$x]', Notes = '$notes[$x]' WHERE MedicationID ='$id' AND MedicineID = '$medid[$x]'";
    mysqli_query($con,$query);
} 



switch ($param) {
    case 'Emergency':
        header("Location:emergency.php?at=$at");
        break;
    

    default:
        header("Location:outpatient.php?at=$at");
        break;
}
