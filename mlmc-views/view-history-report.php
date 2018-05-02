
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
            case '2':
            $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM admission_staffs WHERE AdmissionStaffID ='$at'");

            while ($row = mysqli_fetch_assoc($sel)) {
                $genfullname = $row['Fullname'];
            }
            break;

            case '4':
            $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM physicians WHERE PhysicianID ='$at'");

            while ($row = mysqli_fetch_assoc($sel)) {
                $genfullname = $row['Fullname'];
            }
            break;
            
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
    
    $query = mysqli_query($conn,"SELECT *,CONCAT(patients.Firstname, ' ' ,patients.MiddleName, ' ',patients.LastName) AS Fullname,CONCAT(physicians.Firstname, ' ' ,physicians.MiddleName, ' ',physicians.LastName) AS pfullname FROM patients JOIN attending_physicians,physicians WHERE patients.AdmissionID = '$id' AND attending_physicians.AdmissionID = '$id' AND attending_physicians.PhysicianID = physicians.PhysicianID");
    while ($row = mysqli_fetch_assoc($query)) {
     $fullname = $row['Fullname'];
     $gender = $row['Gender'];
     $admissiontype = $row['AdmissionType'];
     $pfullname = $row['pfullname'];
       
    }

    $sel = mysqli_query($conn,"SELECT *,patients_archive.AdmissionDate as archivedate, patients_archive.AdmissionTime as archivetime,patients_archive.AdmissionType as archivetype FROM `patients` JOIN patients_archive WHERE patients.AdmissionID = '$id' AND patients.FirstName = patients_archive.FirstName AND patients.MiddleName = patients_archive.MiddleName AND patients.LastName = patients_archive.LastName");


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
        <h4><center>Medical History Report</center></h4>
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
                        '.$pfullname.'
                        
                    </div>
                    <div data-field-span="1">
                        <label>Date</label>
                        '.$datetime.'
                    </div>
                    <div data-field-span="1">
                    </div>
            </div>
        </fieldset>  
    </form>
            <br>Medical History Goes Below:<br><br>
                <table>
                <tr>
                    <th>Admission ID</th>
                    <th>Admission Date</th>
                    <th>Admission Time</th>
                    <th>Admission Type</th>
                </tr>';
        
            while ($row = mysqli_fetch_assoc($sel)) {
             $ArchiveID = $row['ArchiveID'];
             $archivedate = $row['archivedate'];
             $archivetime = $row['archivetime'];
             $archivetype = $row['archivetype'];
        
             $html .= '<tr>
              <td> ' . $ArchiveID . ' </td><td>' . $archivedate . '</td><td>' . $archivetime . '</td><td>'. $archivetype . '</td></tr>';
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