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

$at = $_GET['at'];
$id = $_GET['id'];
$orderid = $_GET['orderid'];
$date = date("Y-m-d");

$result = mysqli_query($con,"SELECT a.SecretaryID,a.PhysicianID,b.PhysicianID,b.AdmissionID,b.AttendingID,c.*,d.Gender,d.AdmissionType, CONCAT(d.Firstname, ' ' ,d.MiddleName, ' ', d.LastName) AS Pname,e.PhysicianID, CONCAT(e.Firstname, ' ' ,e.MiddleName, ' ', e.LastName) AS Dname,f.AdmissionID, GROUP_CONCAT(f.Findings SEPARATOR ', ') AS Findings FROM secretary a, attending_physicians b, orders c, patients d, physicians e, diagnosis f WHERE a.SecretaryID = '$at' AND a.PhysicianID = b.PhysicianID AND c.PhysicianID = b.PhysicianID AND b.AdmissionID = c.AdmissionID AND c.Status = 'Pending' AND d.AdmissionID = b.AdmissionID AND b.PhysicianID = e.PhysicianID AND c.OrderID = '$orderid' AND f.AdmissionID ='$id'");

while ($row = mysqli_fetch_assoc($result)) {   
    $admissionid = $row['AdmissionID'];
    $pname = $row['Pname'];
    $gender = $row['Gender'];
    $admissiontype = $row['AdmissionType'];
    $dname = $row['Dname'];
    $findings = $row['Findings'];   
    $task = $row['Task'];
}

$sel = mysqli_query($con,"SELECT a.MedicineID, a.MedicineName,b.*,c.DosingID,c.Intake FROM pharmaceuticals a, medication b,dosing_time c WHERE b.AdmissionID = '$id' AND b.MedicineID = a.MedicineID AND b.DosingID != 0 AND c.DosingID = b.DosingID");



$html = '
    <link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
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
    <h4><center>Diagnosis Report</center></h4>
    </head>
    <div class="container-fluid">
    <br>
        <form class="grid-form">  
            <fieldset>
                <div data-row-span="4">
                        <div data-field-span="1">
                            <label>Patient ID</label>
                            '.$admissionid.'
                        </div>
                        <div data-field-span="1">
                            <label>Patient Name</label>
                            '.$pname.'
                        </div>
                        <div data-field-span="1">
                            <label>Gender</label>
                            '.$gender.'
                        </div>
                        <div data-field-span="1">
                        <label>Admission Type</label>
                            '.$admissiontype.'
                        </div>
                    </div>
                <div data-row-span="3">
                        <div data-field-span="1">
                            <label>Physician Name</label>
                            '.$dname.'
                        </div>
                        <div data-field-span="1">
                            <label>Order ID</label>
                            '.$orderid.'
                        </div>
                        <div data-field-span="1">
                            <label>Date</label>
                            '.$date.'
                        </div>
                </div>
                <div data-row-span="3">
                    <div data-field-span="2">
                    <label>Findings</label>
                    '.$findings.'
                    </div>
                    <div data-field-span="2">
                        <label>Order/Task</label>
                        '.$task.'
                    </div>
                </div>
            </fieldset>  
            <h5>Administered Medications:</h5>
          
            <table>
            <tr>
                <th>Medicine</th>
                <th>Interval</th>
                <th>Quantity</th>
            </tr>';
    
        while ($row = mysqli_fetch_assoc($sel)) {
         $medicinename = $row['MedicineName'];
         $intake = $row['Intake'];
         $quantity = $row['Quantity'];
      
         $html .= '<tr>
          <td> ' . $medicinename . ' </td><td>' . $intake . '</td><td>' . $quantity . '</td></tr>';
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