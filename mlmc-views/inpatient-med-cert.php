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
    $date = date("m-d-Y");
    $id = $_GET['admissionid'];

    
    $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM admin WHERE AdminID ='$at'");

    while ($row = mysqli_fetch_assoc($sel)) {
        $genfullname = $row['Fullname'];
    }

    $getdiag = mysqli_query($conn,"SELECT diagnosis.Findings FROM patients JOIN medical_details,attending_physicians,diagnosis WHERE patients.AdmissionID = '$id' AND patients.MedicalID = medical_details.MedicalID AND medical_details.AttendingID = attending_physicians.AttendingID AND attending_physicians.DiagnosisID = diagnosis.DiagnosisID");

    while ($row = mysqli_fetch_assoc($getdiag)) {
        $findings = $row['Findings'];
    }

     if(isset($_GET['searchparam'])){
         $searchparam = $_GET['searchparam'];
         $query = mysqli_query($conn,"SELECT PhysicianID, Specialization, CONCAT( FirstName, ' ', MiddleName , ' ' ,LastName) AS FullName FROM physicians");
     }else{
         $query = mysqli_query($conn,"SELECT PhysicianID, Specialization, CONCAT( FirstName, ' ', MiddleName , ' ' ,LastName) AS FullName FROM physicians");
     }



     switch ($at[0]) {
        case '3':
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM nurses WHERE NurseID='$at'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $genfullname = $row['Fullname'];
        }
        break;
        
        default:
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM admission_staffs WHERE AdmissionStaffID ='$at'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $genfullname = $row['Fullname'];
        }
        break;
    }


     $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM patients WHERE AdmissionID ='$id'");
     while ($row = mysqli_fetch_assoc($sel)) {
         $fullname = $row['Fullname'];
         $gender = $row['Gender'];
         $address = $row['CompleteAddress'];
         $birthdate = $row['Birthdate'];
         $contact = $row['Contact'];
         $admissiontype = $row['AdmissionType'];
         $admissiondate = $row['AdmissionDate'];
         $admissiontime = $row['AdmissionTime'];
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
    <h2><center>MEDICAL CERTIFICATE</center></h2>
    </head>
    <P><b>TO WHOM IT MAY CONCERN:</b>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    This is to certify that according to his/her case records in this hospital,  
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <u> '. $fullname .' </u>, of
    <u>' . $address .'   </u>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    is/was hospitalized in this institution from <u>'.$admissiondate.' '.$admissiontime .'</u> to <u>'.$datetime.'</u>
    
    <br><br>

    <b>DIAGNOSIS:</b>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br><h3><u><b>'.$findings.'</b></u></h3>

    <br><br><br>
    

    <br><br><br><br><br>
    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    This certification is issued upon request of the patient/patients relative for whatever 
    <br>
    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    purpose/s he/she may deem proper, except for medico-legal purposes.
    
    <br><br>
    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Issued this '. $date .' at  Barangay Marawoy, Lipa City, Batangas
    <br><br>
    <b>RECOMMENDATIONS</b>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Fit to work / Return on school on __________________________
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Advise rest for _______days, follow up on __________________
    <br><br>
    <center>
    __________________________________________  
    <br>
                Attending Physician
           

    <br><br>
    __________________________________________         
    <br>
                Processed by                                  
    </center>
    </p>
    <div class="container-fluid">
    <br>
      
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