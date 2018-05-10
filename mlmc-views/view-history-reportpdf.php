
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
    $archiveno = $_GET['id'];

    $datetime = date("Y-m-d h:i A");


    $sel = mysqli_query($conn,"SELECT patients_archive.*,CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ',physicians.LastName) as dfullname,medical_details.*,diagnosis.* FROM patients_archive JOIN medical_details,attending_physicians,physicians,diagnosis WHERE patients_archive.ArchiveNo= '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND attending_physicians.DiagnosisID = diagnosis.DiagnosisID");

    while ($row = mysqli_fetch_array($sel)) {
        $archiveid = $row['ArchiveID'];
        $pfullname = $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'];
        $admissiondate = $row['AdmissionDate'];
        $admissiontime = $row['AdmissionTime'];
        $age = $row['Age'];
        $gender = $row['Gender'];
        $birthdate = $row['Birthdate'];
        $address = $row['CompleteAddress'];
    }

    $html = '
        <link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
        
        <style>
        body{
            font-family: "Source Sans Pro", "Segoe UI", "Droid Sans", Tahoma, Arial, sans-serif;
        }
            
        
        table {
            font-family: "Source Sans Pro", "Segoe UI", "Droid Sans", Tahoma, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color: white;
            background-color: #B43439;
        }

        tr:nth-child(even) {
            background-color: #E8E8E8;
        }

        tr:nth-child(odd) {
            background-color: #E8E8E8;
        }

        h4 {
            font-family: arial, sans-serif;
        }
         
        div.pull-right{
           float: right;
        }

        div.pull-left{
            float: left; 
        }

        span{
            font-family: arial, sans-serif;
        }
        </style>
        
    
        <head> 
        <style>
        #footer { position: fixed; center: 0px; bottom: -150px; right: 0px; height: 150px; background-color: #F4F4F4; }
        #footer .page:after { content: counter(page, upper-roman); }
        </style>

        <img src="assets/img/report-header.jpg">
        <h4><center>Medical History     Report</center></h4>
        </head>
        <div class="container-fluid">
        <br>
                <div>  
                
                    <div style="float: right; text-align: right;">Patient ID: <span> '. $archiveid .' </span> <br>
                    History No: <span> ' . $archiveno . ' </span> <br>
                    Admission Date & Time: <span> ' . $admissiondate . ' ' . $admissiontime .  ' </span>
                    </div>
                    <div>Patient name: <span> '. $pfullname .' </span> </div>   

                    
                    <div>Age:  <span>   '. $age .'  </span> </div>
                    <div class="pull-left">Gender:  <span>  '. $gender .'  </span> </div>

                </div>

                <br><br>
                <center><h5>Diagnosis Report</h5></center>
            
                <table>
                <tr>
                    <th>Attending Doctor</th>
                    <th>Date & Time Diagnosed</th>
                    <th>Findings</th>
                </tr>';
               
                $queryfindings = mysqli_query($conn,"SELECT patients_archive.*,CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ',physicians.LastName) as dfullname,medical_details.*,diagnosis.* FROM patients_archive JOIN medical_details,attending_physicians,physicians,diagnosis WHERE patients_archive.ArchiveNo = '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND attending_physicians.DiagnosisID = diagnosis.DiagnosisID");	

                while ($row = mysqli_fetch_assoc($queryfindings)) {
                    $dfullname = $row['dfullname'];
                    $diagnosis = $row['Findings'];
                    $datediagnosed = $row['DateDiagnosed'];
                    $timediagnosed = $row['TimeDiagnosed'];
               
                    $html .= '<tr><td> ' . $dfullname . ' </td><td>' . $datediagnosed . ' ' . $timediagnosed . '</td><td>' . $diagnosis . '</td></tr>';
                   }

                   $html .= '
                   </table>
                   <br>
                   <center><h5>Laboratory Report</h5></center>
                   <table>
                   <tr>
                       <th>Description</th>
                       <th>Date & Time Cleared</th>
                       <th>Result</th>
                     
                   </tr>';
              
                $querylaboratory = mysqli_query($conn,"SELECT laboratory_req.*,laboratories.Description FROM patients_archive JOIN medical_details,laboratory_req,laboratories WHERE patients_archive.ArchiveNo = '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.MedicalID = laboratory_req.MedicalID AND laboratory_req.LaboratoryID = laboratories.LaboratoryID");	

                while($row = mysqli_fetch_assoc($querylaboratory)) {

                    $description = $row['Description'];
                    $datetimeclearead = $row['DateCleared'];
                    $timecleared =  $row['TimeCleared'];
                    $result = $row['Result'];
                
                    $html .= '<tr><td> ' . $description . ' </td><td>' . $datetimeclearead . ' ' . $timecleared . '</td><td>' . $result . '</td></tr>';
                    
                }


                $html .= '
                </table>
                <br>
                <center><h5>Medications Report</h5></center>
                <table>
                <tr>
                    <th>Medicine Name</th>
                    <th>Dosage</th>
                    <th>Quantity</th>
                    <th>Date & Time Administered</th>
                    <th>Notes</th>
                  
                </tr>';

                $querymedications = mysqli_query($conn,"SELECT patients_archive.*,CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ',physicians.LastName) as dfullname,medical_details.*,medication.* FROM patients_archive JOIN medical_details,attending_physicians,physicians,medication WHERE patients_archive.ArchiveNo = '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND medical_details.MedicationID = medication.MedicationID");	

                while ($row = mysqli_fetch_assoc($querymedications)) {
                    $dfullname = $row['dfullname'];
                    $medname = $row['MedicineName'];
                    $dosage = $row['Dosage'];
                    $quantity = $row['Quantity'];
                    $dateadministered = $row['DateAdministered'];
                    $timeadministered = $row['TimeAdministered'];
                    $notes = $row['Notes'];
               
                    $html .= '<tr><td> ' . $medname . ' </td><td>' . $dosage . '</td><td>' . $quantity . '</td><td>' . $dateadministered . ' ' . $timeadministered . '</td><td>' . $notes . '</td></tr>';
                   }

                   
                   $html .= '
                   </table>
                   <br>
                   <center><h5>Vitals Report</h5></center>
                   <table>
                   <tr>
                       <th>Nurse ID</th>
                       <th>Blood Pressure</th>
                       <th>Pulse Rate</th>
                       <th>Respiratory Rate</th>
                       <th>Temperature</th>
                       <th>Date & Time Checked</th>
                   </tr>';

                   $queryvitals = mysqli_query($conn,"SELECT patients_archive.*,CONCAT(physicians.FirstName,' ',physicians.MiddleName,' ',physicians.LastName) as dfullname,medical_details.*,vitals.* FROM patients_archive JOIN medical_details,attending_physicians,physicians,vitals WHERE patients_archive.ArchiveNo= '$archiveno' AND patients_archive.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID AND medical_details.VitalsID = vitals.VitalsID");	

                   while ($row = mysqli_fetch_assoc($queryvitals)) {
                        $dfullname = $row['dfullname'];
                        $accountid  = $row['AccountID'];
                        $bp = $row['BP'] . '/' . $row['BPD'];
                        $pr = $row['PR'];
                        $rr = $row['RR'];
                        $temp = $row['Temperature'];
                        $datetimechecked = $row['DateTimeChecked'];
                  
                       $html .= '<tr><td> ' . $accountid . ' </td><td>' . $bp . '</td><td>' . $pr . '</td><td>' . $rr . '</td><td>' . $temp . '</td><td>' . $datetimechecked . '</td></tr>';
                      }
        
    $dompdf->loadHtml($html);   

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("HistoryReport",array("Attachment"=>0));

    ?>