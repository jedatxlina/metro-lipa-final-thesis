
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
    $datetime = date("Y-m-d h:i A");
    $cnt = 1;

    switch ($at[0]) {
        case '7':
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM secretary WHERE SecretaryID ='$at'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $genfullname = $row['Fullname'];
        }
        break;
        
        default:
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM nurses WHERE NurseID ='$at'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $genfullname = $row['Fullname'];
        }
        break;
    }

    if(isset($_GET['searchparam'])){
        $search_param = $_GET['searchparam'];
        $result = mysqli_query($conn,"SELECT a.MedicineID, a.MedicineName,b.*,c.DosingID,c.Intake FROM pharmaceuticals a, medication b,dosing_time c WHERE b.AdmissionID = '$id' AND b.MedicineID = a.MedicineID AND b.DosingID != 0 AND c.DosingID = b.DosingID AND (a.MedicineName LIKE '%$search_param%' OR b.Dosage LIKE '%$search_param%')");
    }else{
        $result = mysqli_query($conn,"SELECT a.MedicineID, a.MedicineName,b.*,c.DosingID,c.Intake FROM pharmaceuticals a, medication b,dosing_time c WHERE b.AdmissionID = '$id' AND b.MedicineID = a.MedicineID AND b.DosingID != 0 AND c.DosingID = b.DosingID");
    }

    $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM patients WHERE AdmissionID ='$id'");
    while ($row = mysqli_fetch_assoc($sel)) {
        $fullname = $row['Fullname'];
        $gender = $row['Gender'];
        $admissiontype = $row['AdmissionType'];
    }

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
        <style>
        #footer { position: fixed; center: 0px; bottom: -150px; right: 0px; height: 150px; background-color: #F4F4F4; }
        #footer .page:after { content: counter(page, upper-roman); }
        </style>

        <img src="assets/img/report-header.jpg">
        <h4><center>Medication Report</center></h4>
        </head>
        <div class="container-fluid">
        <br>
            <form class="grid-form">  
                <fieldset>
                    <div data-row-span="4">
                            <div data-field-span="1">
                                <label>Patient ID</label>
                                '.$id.'
                            </div>
                            <div data-field-span="1">
                                <label>Patient Name</label>
                                '.$fullname.'
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
                                
                            </div>
                            <div data-field-span="1">
                                <label>Date</label>
                                '.$datetime.'
                            </div>
                            <div data-field-span="1">
                            </div>
                    </div>
                </fieldset>  
                <h5>Current Medications:</h5>
            
                <table>
                <tr>
                    <th>Medicine Name</th>
                    <th>Dosage</th>
                    <th>Quantity</th>
                </tr>';
        
            while ($row = mysqli_fetch_assoc($result)) {
             $medicinename = $row['MedicineName'];
             $dosage = $row['Dosage'];
             $quantity = $row['Quantity'];
        
             $html .= '<tr>
              <td> ' . $medicinename . ' </td><td>' . $dosage . '</td><td>' . $quantity . '</td></tr>';
            }
        
        
        $html .= '</table>
            </div>
            <div id="footer">
            Generated by:   '.$genfullname.' 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
    $dompdf->stream("MedicationReport",array("Attachment"=>0));

    ?>