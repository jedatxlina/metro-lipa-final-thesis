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
$yearage = '0';
$adid = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.* ,b.Rate,b.RoomType FROM duration a, beds b WHERE b.BedID = a.BedID AND a.AdmissionID = '$adid'");
$patd = mysqli_query($conn,"SELECT * FROM patients WHERE AdmissionID = '$adid'");
$sel2 = mysqli_query($conn,"SELECT medication.Quantity,pharmaceuticals.Unit,pharmaceuticals.Price,pharmaceuticals.MedicineID, pharmaceuticals.MedicineName FROM medication INNER JOIN pharmaceuticals ON medication.MedicineID=pharmaceuticals.MedicineID WHERE medication.AdmissionID='$adid'");
$data = array();
$date = date("Y-m-d");

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
    
 
<link type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600" rel="stylesheet">
<link type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">      
<link type="text/css" href="assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">             

<link type="text/css" href="assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                
<link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">   
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
<style>
#footer { position: fixed; center: 0px; bottom: -150px; right: 0px; height: 150px; background-color: #F4F4F4; }
#footer .page:after { content: counter(page, upper-roman); }
</style>

<img src="assets/img/report-header.jpg">
<h4><center>Summary of Bill </center></h4>
</head><div class="container-fluid">
    <br>
    <form class="grid-form">  
        <fieldset><div data-row-span="4">
            <div data-field-span="1">
                <label>Patient ID: </label>
            </div>
            <div data-field-span="1">
                <label>Patient Name: </label>
            </div>
            <div data-field-span="1">
                <label>Gender:  </label>
            </div>
            <div data-field-span="1">
            <label>Admission Type: </label>
            </div>
        </div>
    <div data-row-span="2">
            <div data-field-span="1">
                <label>Physician Name: </label>
            </div>
            <div data-field-span="1">
                <label>Date Issued: </label>
            </div>
    </div>
        </fieldset>  
    </form>
</div> 
<div class="row mb-xl">
    <div class="col-md-12">
        <h2 class="text-primary text-center" style="font-weight: small;">Summary of Bill</h2>
        <h3 class="text-primary text-center" style="font-weight: small;">Room Bill</h3>
    </div>
    <div class="row mb-xl">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-hover m-n">
                        <thead>
                            <tr>
                                <th>Room #</th>
                                <th>Arrival Date</th>
                                <th>Discharged Date</th>
                                <th>Duration of Stay</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>';
                        
while ($row = mysqli_fetch_array($sel)) {
    $parameterage  = date_create($row['ArrivalDate']);
    $currentdatetime 	= date_create(); // Current time and date
    $getage =  date_diff( $parameterage, $currentdatetime );
    $yearage = $getage->d;
    if($yearage <= 1)
        $yearage=1;
    $html .= '<tbody><tr>
      <td> ' . $row['BedID'] . ' </td><td>' . $row['ArrivalDate'] . '</td><td>' . $date . '</td><td>' . $yearage . '</td><td class="text-right">'. $row['Rate']*$yearage .'</td>
     </tr>';
    }
                        $html .= '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-xl">
    <div class="col-md-12">
        <h3 class="text-primary text-center" style="font-weight: small;">Medicine Bill</h3>
    </div>
    <div class="row mb-xl">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-hover m-n">
                        <thead>
                            <tr>
                                <th>Medicines</th>
                                <th>Quantity</th>
                                <th>Unit Cost</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>';
                        
while ($row = mysqli_fetch_array($sel2)) {
    $html .= '<tbody><tr>
      <td>' . $row['MedicineName'] . '</td><td>' . $row['Quantity'] . '</td><td>' . $row['Price'] . '</td><td class="text-right">'. $row['Quantity']*$row['Price'] .'</td>
     </tr>';
    }
                        $html .= '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-xl">
    <div class="col-md-12">
        <h3 class="text-primary text-center" style="font-weight: small;">Laboratory Bill</h3>
    </div>
    <div class="row mb-xl">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-hover m-n">
                        <thead>
                            <tr>
                                <th>Descriptions</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>';
                        
while ($row = mysqli_fetch_array($sel2)) {
    $html .= '<tbody><tr>
      <td>' . $row['MedicineName'] . '</td><td>' . $row['Quantity'] . '</td><td>' . $row['Price'] . '</td><td class="text-right">'. $row['Quantity']*$row['Price'] .'</td>
     </tr>';
    }
                        $html .= '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
            <div class="pull-left">
                <h3 class="text-muted">Info</h3>
                <ul class="text-left list-unstyled">
                    <li><strong>Date:</strong> Today</li>
                    <li><strong>Due:</strong> 19/05/2015</li>
                    <li><strong>Advance Payment:</strong> **</li>
                </ul>
            </div>
        </div>
    </div>';




$dompdf->loadHtml($html);   

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("codexworld",array("Attachment"=>0));

?>