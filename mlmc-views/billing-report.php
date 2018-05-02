<?php 
require 'getData/connection.php';
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';

date_default_timezone_set("Asia/Singapore");
Dompdf\Autoloader::register();
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$param = isset($_GET['param']) ? $_GET['param'] : '';
$id = $_GET['at'];
$yearage = '0';
$adid = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.* ,b.Rate,b.RoomType FROM duration a, beds b, patients c WHERE b.BedID = a.BedID AND a.AdmissionID = '$adid' AND a.AdmissionNo = c.AdmissionNo");
$patd = mysqli_query($conn,"SELECT * FROM patients WHERE AdmissionID = '$adid'");
$sel5 = mysqli_query($conn,"SELECT SUM(TotalBill) AS TotalBill,BillDes, COUNT(*) AS qty, c.BedID FROM billing c, patients a WHERE c.AdmissionID ='$adid' AND c.Department = 'Supplies' AND a.MedicalID = c.MedicalID GROUP BY BedID");
// $sel6 = mysqli_query($conn,"SELECT * FROM adv_payment WHERE AdmissionID = '$adid'");
$sel4 = mysqli_query($conn,"SELECT a.*,d.LastName, d.FirstName, d.MiddleName FROM attending_physicians a, patients b, medical_details c, physicians d WHERE b.AdmissionID = '$adid' AND b.MedicalID = c.MedicalID AND c.AttendingID = a.AttendingID AND a.PhysicianID = d.PhysicianID");
$sel3 = mysqli_query($conn,"SELECT SUM(TotalBill) AS TotalBill,BillDes, COUNT(*) AS qty, c.BedID FROM billing c, patients a WHERE c.AdmissionID ='$adid' AND c.Department = 'Laboratory' AND a.MedicalID = c.MedicalID GROUP BY BedID");
$sel2 = mysqli_query($conn,"SELECT SUM(TotalBill) AS TotalBill,BillDes, COUNT(*) AS qty, c.BedID FROM billing c, patients a WHERE c.AdmissionID ='$adid' AND c.Department = 'Pharmacy' AND a.MedicalID = c.MedicalID GROUP BY BedID");
$data = array();
$date = date("Y-m-d");
$name = '';
$AdID ='';
$gender = '';
$type ='';
$phyname ='';
$date= date("Y/m/d");
while ($row = mysqli_fetch_array($patd)) {
    $name = $row['FirstName']. ' ' .$row['MiddleName']. ' '.$row['LastName'];
    $AdID =$row['AdmissionID'];
    $gender = $row['Gender'];
    $type =$row['AdmissionType'];
}
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
</head>
<div class="container-fluid">
    <br>
    <div class="row" style="padding: 0">
        <div class="col-md-12">
                <div style="float: right">
                    <label>Patient ID:'.$AdID.'</label><br>
                    <label>Gender:'.$gender.' </label><br>
                    <label>Date Issued:'.$date.' </label>
                </div>
                <div>
                    <label>Patient Name:'.$name.'</label>
                </div>
                <div>
                    <label>Admission Type:'.$type.' </label>
                </div>
        </div>
    </div>
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
    if($row['DischargeDate'] == '0000-00-00 00:00:00')
        $currentdatetime 	= date_create(date("Y-m-d h:i:sa"));
    else
        $currentdatetime 	= date_create($row['DischargeDate']); // Current time and date
    $getage =  date_diff( $parameterage, $currentdatetime );
    $yearage = $getage->d;
    if($yearage <= 1)
        $yearage=1;
    $html .= '<tbody><tr>
      <td> ' . $row['BedID'] . ' </td><td>' . $row['ArrivalDate'] . '</td><td>' . $currentdatetime->format('Y-m-d h:i:sa') . '</td><td>' . $yearage . '</td><td class="text-right">'. $row['Rate'] * $yearage .'</td>
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
                                <th>Bed ID</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>';
                        
while ($row = mysqli_fetch_array($sel2)) {
    $html .= '<tbody><tr>
      <td>' . $row['BillDes'] . '</td><td>' . $row['qty'] . '</td><td>' . $row['BedID'] . '</td><td class="text-right">'. number_format($row['TotalBill']) .'</td>
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
                                <th>Quantity</th>
                                <th>Bed ID</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>';
                        
while ($row = mysqli_fetch_array($sel3)) {
    $html .= '<tbody><tr>
      <td>' . $row['BillDes'] . '</td><td>' . $row['qty'] . '</td><td>' . $row['BedID'] . '</td><td>' . number_format($row['TotalBill']) . '</td>
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
        <h3 class="text-primary text-center" style="font-weight: small;">Doctors Bill</h3>
    </div>
    <div class="row mb-xl">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-hover m-n">
                        <thead>
                            <tr>
                                <th>Doctors Name</th>
                                <th>Discounted Fee</th>
                                <th class="text-right">Total Fee</th>
                            </tr>
                        </thead>';
// while ($row = mysqli_fetch_array($sel4)) {
//     $html .= '<tbody><tr>
//       <td>Dr. ' . $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] . '</td><td>' . number_format($row['Discount']) . '</td><td>' . number_format($row['Rate']) . '</td>
//      </tr>';
//     }
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
        <h3 class="text-primary text-center" style="font-weight: small;">Supplies Bill</h3>
    </div>
    <div class="row mb-xl">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-hover m-n">
                        <thead>
                            <tr>
                                <th>Supply Name</th>
                                <th>Quantity</th>
                                <th class="text-right">Total Bill</th>
                            </tr>
                        </thead>';
while ($row = mysqli_fetch_array($sel5)) {
    $html .= '<tbody><tr>
      <td>' . $row['BillDes'] . '</td><td>' . $row['qty'] . '</td><td>' . $row['TotalBill'] . '</td></tr>';
    }
                        $html .= '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="col-md-6">
            <div class="pull-left">
                <h3 class="text-muted">Info</h3>
                <ul class="text-left list-unstyled">
                    <li><strong>Date:</strong> Today</li>
                    <li><strong>Due:</strong> 19/05/2015</li>';
                        
                    // while ($row = mysqli_fetch_array($sel6)) {
                    //     $html .= '
                    //     <li><strong>Advance Payment:</strong>'.$row['Amount'].'</li>';
                    //     }
                                            $html .= '
                </ul>
            </div>
        </div>
        <div class="col-md-6" style="float:right">
            <div class="pull-left">
                <h3 class="text-muted">SUB TOTAL:'.$_GET['subtotal'].'</h3>
                <h3 class="text-muted">DISCOUNT:'.$_GET['totald'].'</h3>
                <h2 class="text-muted">'.$_GET['subtotal2'].'</h2>
            </div>
        </div>
    </div>
    <div style="A_CSS_ATTRIBUTE:all;position: fixed;bottom: 50px; left: 10px; ">
    <b>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</b>
    This is the discharge Stub Please Cut it and show the security on Your way Out. Thank You.
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