<?php 
require 'getData/connection.php';
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$at = $_GET['at'];
$id = $_GET['id'];

$date = date("Y-m-d");
$datetime = date("Y-m-d h:i A");


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
    </head>
    <div class="container-fluid">
        <br>
        <form class="grid-form">  
            <fieldset>
                <div data-row-span="4">
                        <div data-field-span="1">
                            <label>Patient ID</label>
                        </div>
                        <div data-field-span="1">
                            <label>Patient Name</label>
                        </div>
                        <div data-field-span="1">
                            <label>Gender</label>
                        </div>
                        <div data-field-span="1">
                        <label>Admission Type</label>
                        </div>
                    </div>
                <div data-row-span="3">
                        <div data-field-span="1">
                            <label>Physician Name</label>
                        </div>
                        <div data-field-span="1">
                            <label>Order ID</label>
                        </div>
                        <div data-field-span="1">
                            <label>Date</label>
                        </div>
                </div>
                <div data-row-span="3">
                    <div data-field-span="2">
                    <label>Findings</label>
                    </div>
                    <div data-field-span="2">
                        <label>Order/Task</label>
                    </div>
                </div>
            </fieldset>  
        </form>
            
    </div> 
    <div class="row mb-xl">
        <div class="col-md-12">
            <h2 class="text-primary text-center" style="font-weight: small;">Summary of Bill</h2>
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
    </div>
';
    




$dompdf->loadHtml($html);   

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("BillingReport",array("Attachment"=>0));

?>