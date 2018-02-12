<?php
require_once 'connection.php';

// $postdata = file_get_contents("php://input");
// $request = json_decode($postdata);

// $admissionid = addslashes($request->admissionid);
// // $admissiondatetime = date('Y-m-d h:i:s');
// // $firstname = addslashes($request->firstname);
// // $middlename = addslashes($request->middlename);
// // $lastname = addslashes($request->lastname);
// $admissiontype = addslashes($request->admissiontype);
// $gender = addslashes($request->gender);
// $province = addslashes($request->province);
// $city = addslashes($request->city);
// $age = addslashes($request->age);
// $civilstatus = addslashes($request->civilstatus); 
// $birthdate = addslashes($request->birthdate); 
// $contact = addslashes($request->contact);

$admissionid = $_GET['admissionid'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$lastname = $_GET['lastname'];
$admissiontype = $_GET['admissiontype'];
$province = $_GET['province'];
$city = $_GET['city'];
$gender = $_GET['gender'];
$age = $_GET['age'];
$status = $_GET['status'];
$date = $_GET['birthdate'];
$contact = $_GET['contact'];
$class = $_GET['classification'];
$occupation = $_GET['occupation'];
$medicalid = $_GET['medicalid'];

// $sel = mysqli_query($con,"select * from patient_archive where FirstName = '$firstname' and MiddleName = '$middlename' and LastName = '$lastname' and Gender = '$gender'");
// $counter = 0;
// while ($row = mysqli_fetch_array($sel)) {
//     $counter++;
// }
// if($counter > 0){
//     $admission = 'Old Patient';
// }else{
//     $admission = 'New Patient';
// }
$admission = 'New Patient';
// $query = "INSERT into patients(AdmissionID,AdmissionDateTime,FirstName,MiddleName,LastName,Admission,AdmissionType,Gender,Province,City,Age,CivilStatus,Birthdate,Contact) 
// VALUES('$admissionid',NOW(),'$firstname','$middlename','$lastname','$admission','$admissiontype','$gender','$province','$city','$age','$civilstatus','$birthdate','$contact')";

$query = "INSERT into patients(AdmissionID,AdmissionDateTime,AdmissionType,FirstName,MiddleName,LastName,Admission,Province,City,Gender,Age,CivilStatus,Birthdate,Contact,Class,Occupation,MedicalID) 
VALUES('$admissionid',NOW(),'$admissiontype','$firstname','$middlename','$lastname','$admission','$province','$city','$gender','$age','$status','$date','$contact','$class','$occupation','$medicalid')";

mysqli_query($con,$query);  



// session_start();
// $_SESSION['data'] = $admissionid;
// include 'qr-generator/index.php';
?>
