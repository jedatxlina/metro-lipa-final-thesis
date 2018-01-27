<?php
require_once '../assets/connection.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$admissionid = addslashes($request->admissionid);
$admissiondatetime = date('Y-m-d h:i:s');
$firstname = addslashes($request->firstname);
$middlename = addslashes($request->middlename);
$lastname = addslashes($request->lastname);
$admissiontype = addslashes($request->admissiontype);
$gender = addslashes($request->gender);
$province = addslashes($request->province);
$city = addslashes($request->city);
$age = addslashes($request->age);
$civilstatus = addslashes($request->civilstatus); 
$birthdate = addslashes($request->birthdate); 
$contact = addslashes($request->contact);

$sel = mysqli_query($con,"select * from patient_records where FirstName = '$firstname' and MiddleName = '$middlename' and LastName = '$lastname' and Gender = '$gender'");
$counter = 0;
while ($row = mysqli_fetch_array($sel)) {
    $counter++;
}
if($counter > 0){
    $admission = 'Old Patient';
}else{
    $admission = 'New Patient';
}

$query = "INSERT into patients(AdmissionID,AdmissionDateTime,FirstName,MiddleName,LastName,Admission,AdmissionType,Gender,Province,City,Age,CivilStatus,Birthdate,Contact) 
VALUES('$admissionid',NOW(),'$firstname','$middlename','$lastname','$admission','$admissiontype','$gender','$province','$city','$age','$civilstatus','$birthdate','$contact')";

mysqli_query($con,$query);  

session_start();
$_SESSION['data'] = $admissionid;
include 'qr-generator/index.php';
?>
