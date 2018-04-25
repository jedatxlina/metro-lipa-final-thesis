
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

    $queryfind = mysqli_query($conn,"SELECT * FROM patients WHERE AdmissionID = '$id'");

    while ($row = mysqli_fetch_assoc($queryfind)) {
        $firstname = $row['FirstName'];
        $middlename = $row['MiddleName'];
        $lastname = $row['LastName'];
        $age = $row['Age'];
        $gender = $row['Gender'];
        $admissiondate = $row['AdmissionDate'];
        $admissiontime = $row['AdmissionTime'];
    }

    $patientfullname = $firstname . ' ' . $middlename . ' ' . $lastname;
 
  
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
            background-color: #FFFFFF;
        }

        tr:nth-child(odd) {
            background-color: #FFFFFF;
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
        <h4><center>Prescription Report</center></h4>
        </head>
        <div class="container-fluid">
        <br>
                <div>  
                
                
                    <div style="float: right; text-align: right;">Patient ID: <span> '.$id.' </span> <br>
                    Admission Date & Time: <span>  '. $admissiondate . ' ' . $admissiontime .'  </span>
                    </div>
                    <div>Patient name: <span> '. $patientfullname .'  </span> </div>   

                    
                    <div>Age:  <span>  '.$age.' </span> </div>
                    <div class="pull-left">Gender:  <span>  '.$gender.'  </span> </div>

                </div>

                <br><br>
                <center><h5>Diagnosis Report</h5></center>
            
                <table>
                <tr>
                    <th>Attending Doctor</th>
                    <th>Date & Time Diagnosed</th>
                    <th>Findings</th>
                </tr>';

                $diagnosis = mysqli_query($conn,"SELECT CONCAT(physicians.Firstname, ' ' ,physicians.MiddleName, ' ', physicians.LastName) AS Dname,diagnosis.* FROM patients JOIN diagnosis,attending_physicians,physicians WHERE patients.AdmissionID = '$id' AND patients.MedicalID = diagnosis.MedicalID AND attending_physicians.AttendingID = diagnosis.AttendingID AND attending_physicians.PhysicianID = physicians.PhysicianID");

                while ($row = mysqli_fetch_assoc($diagnosis)) {
                    $physician = $row['Dname'];
                    $datediagnosed = $row['DateDiagnosed'];
                    $timediagnosed = $row['TimeDiagnosed'];
                    $findings = $row['Findings'];
               
                    $html .= '<tr>
                     <td> ' . $physician . ' </td><td>' . $datediagnosed . ' ' . $timediagnosed . '</td><td>' . $findings . '</td></tr>';
                   }

                $html .= '
                </table>
                <br>
                <center><h5>Medicine Prescriptions</h5></center>
                <table>
                <tr>
                    <th>Medicine </th>
                    <th>Quantity</th>
                    <th>Date & Time Administered</th>
                    <th>Intake</th>
                    <th>Notes</th>
                  
                </tr>';

                $medications = mysqli_query($conn,"SELECT medication.*,dosing_time.Intake FROM medication JOIN medical_details,patients,dosing_time WHERE patients.AdmissionID = '$id' and patients.MedicalID = medical_details.MedicalID AND medical_details.MedicationID = medication.MedicationID AND medication.DosingID = dosing_time.DosingID");
     
                while ($row = mysqli_fetch_assoc($medications)) {
                    $medicinename = $row['MedicineName'];
                    $dosage = $row['Dosage'];
                    $quantity = $row['Quantity'];
                    $dateadministered = $row['DateAdministered'];
                    $timeadministered = $row['TimeAdministered'];
                    $notes = $row['Notes'];
                    $intake = $row['Intake'];
               
                    $html .= '<tr>
                     <td> ' . $medicinename . ' ' .  $dosage . ' </td><td>' . $quantity . '</td><td>' . $dateadministered . ' ' .   $timeadministered . '</td><td>' . $intake . '</td><td>' . $notes . '</td></tr>';
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
    $dompdf->stream("PrescriptionReport",array("Attachment"=>0));

    ?>