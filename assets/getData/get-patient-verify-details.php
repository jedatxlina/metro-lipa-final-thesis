<?php
require_once '../connection.php';

$firstname = $_GET['Firstname'];
$lastname = $_GET['Lastname'];
$middlename = $_GET['Middlename'];
// $birthdate = $_GET['Birthdate'];
// $dt   = new DateTime();
// $date = $dt->createFromFormat('m/d/Y', $birthdate);
// $new =  $date->format('Y-m-d');


$sel = mysqli_query($con,"select * from patient_records where FirstName = '$firstname' and LastName = '$lastname' and MiddleName = '$middlename'");

$num_rows = mysqli_num_rows($sel);

if($num_rows > 0)
{
    $data = 1;
}else{
    $data = 0;
}
echo json_encode($data);
?>

									