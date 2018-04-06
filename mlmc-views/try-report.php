<?php 
require 'getData/connection.php';
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$param = isset($_GET['param']) ? $_GET['param'] : '';
$id = $_GET['at'];

$result = mysqli_query($conn,"SELECT a.SecretaryID,b.*,c.*,d.* FROM secretary a, attending_physicians b, medical_details c, patients d WHERE a.SecretaryID = '$id' AND a.PhysicianID = b.PhysicianID AND c.AttendingID = b.AttendingID AND d.MedicalID = c.MedicalID AND d.AdmissionType = 'Outpatient' AND (d.AdmissionID LIKE '%$param%' OR d.AdmissionNo LIKE '%$param%' OR d.AdmissionDate LIKE '%$param%' OR d.AdmissionTime LIKE '%$param%' OR d.FirstName OR '%$param%' OR d.MiddleName OR '%$param%' OR d.LastName LIKE '%$param%' OR d.Admission LIKE '%$param%' OR d.AdmissionType LIKE '%$param%' OR d.Gender LIKE '%$param%')");

// $html =  '<table>
// <tr>
//   <td>Date</td><td>Name</td><td>Name</td><td>Name</td>
// </tr>';

// // Query from mysql 
// if (mysqli_num_rows($result) > 0) {
//   while ($row = mysqli_fetch_assoc($result)) {
//    $AdmissionID = $row['AdmissionID'];
//    $Fname = $row['FirstName'];
//    $Mname = $row['MiddleName'];
//    $Lname = $row['LastName'];

//    $html .= '<tr>
//     <td>'. $AdmissionID  . '</td>
//    </tr>';
//   }
// }

// $html .= '</table>';

$html = '
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    h4 {
        font-family: arial, sans-serif;
    }
    </style>
    
   
    <head> 

    <img src="assets/img/report-header.jpg">
    <h4><center>List of Outpatient Patients</center></h4>
    </head>
    <hr>
    <div class="container-fluid">
    
        <table>
        <tr>
            <th>Admission ID</th>
            <th>Full name</th>
            <th>Admission</th>
            <th>Admission Type</th>
        </tr>';

        // Query from mysql 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
     $admissionid = $row['AdmissionID'];
     $fullname = $row['LastName'] .', '. $row['FirstName'] .' '.  $row['MiddleName'];
     $admission = $row['Admission'];
     $admissiontype = $row['AdmissionType'];
  
     $html .= '<tr>
      <td> ' . $admissionid . ' </td><td>' . $fullname . '</td><td>' . $admission . '</td><td>' . $admissiontype . '</td>
     </tr>';
    }
  }

 
$html .= '</table>

    </div>
    ';




$dompdf->loadHtml($html);   

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("codexworld",array("Attachment"=>0));

?>