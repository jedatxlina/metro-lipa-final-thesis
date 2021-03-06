<?php 
    require 'getData/connection.php';
    require_once 'dompdf/lib/html5lib/Parser.php';
    require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
    require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
    require_once 'dompdf/src/Autoloader.php';
    Dompdf\Autoloader::register();
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    date_default_timezone_set("Asia/Singapore");
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $at = $_GET['at'];
    $datetime = date("Y-m-d h:i A");

    
    $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM admin WHERE AdminID ='$at'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $genfullname = $row['Fullname'];
    }

     if(isset($_GET['searchparam'])){
         $searchparam = $_GET['searchparam'];
         $query = mysqli_query($conn,"SELECT PhysicianID, Specialization, CONCAT( FirstName, ' ', MiddleName , ' ' ,LastName) AS FullName FROM physicians");
     }else{
         $query = mysqli_query($conn,"SELECT PhysicianID, Specialization, CONCAT( FirstName, ' ', MiddleName , ' ' ,LastName) AS FullName FROM physicians");
     }
    
    $html = '<link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
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
    <h4><center>List of Doctors</center></h4>
    </head>
    <div class="container-fluid">
    <br>
            <table>
            <tr>
                <th>Doctor</th>
                <th>Specialization</th>
            </tr>';
    
         while ($row = mysqli_fetch_assoc($query)) {
         $specialization = $row['Specialization'];
         $Fullname = $row['FullName'];
    
         $html .= '<tr>
          <td> Dr. ' . $Fullname . ' </td><td>' . $specialization . '</td> </tr>';
        }
    
    $html .= '</table>
        </div>
        <div id="footer">
        Generated by:   '.$genfullname.' 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Generated on: '.$datetime.'
        </div>
    ';

    $dompdf->loadHtml($html);   

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("PatientsReport",array("Attachment"=>0));

?>