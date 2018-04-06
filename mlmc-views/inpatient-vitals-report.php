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

    $sel = mysqli_query($conn,"SELECT * FROM patients JOIN medical_details WHERE patients.AdmissionID = '$id' AND medical_details.AdmissionID = '$id'");
    while ($row = mysqli_fetch_assoc($sel)) {
                $admissionid=$row['AdmissionID'];
                $admissionno=$row['AdmissionNo'];
                $admissiondate=$row['AdmissionDate'];
                $admissiontime=$row['AdmissionTime'];
                $attending=$row['AttendingID'];
                $firstname=$row['FirstName'];
                $middlename=$row['MiddleName'];
                $lastname=$row['LastName'];
                $gender = $row['Gender'];
                $admission=$row['Admission'];
                $admissiontype=$row['AdmissionType'];
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
        <h4><center>Vitals Report</center></h4>
        </head>
        <div class="container-fluid">
            <br>
            <form class="grid-form">  
                <fieldset>
                    <div data-row-span="4">
                            <div data-field-span="1">
                                <label>Patient ID</label>
                                '.$admissionid. '
                            </div>
                            <div data-field-span="1">
                                <label>Patient Name</label>
                                '.$firstname. ' ' . $middlename . ' ' . $lastname . '
                            </div>
                            <div data-field-span="1">
                                <label>Gender</label>
                                '.$gender. '
                            </div>
                            <div data-field-span="1">
                            <label>Admission Type</label>
                            '.$admissiontype. '
                            </div>
                        </div>
                </fieldset>  
               
               
            </form>
        </div>

         ';

        $dompdf->loadHtml($html);   

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream("VitalsReport",array("Attachment"=>0));

    ?>

   


   