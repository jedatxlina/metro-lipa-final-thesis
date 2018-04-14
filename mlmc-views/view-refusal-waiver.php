
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
    $id = $_GET['admissionid'];
    $date = date("Y-m-d");
    $time = date("h:i A");

    switch ($at[0]) {
        case '7':
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM secretary WHERE SecretaryID ='$at'");

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
    }

    $html = '
        <link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
        <style>
        @page {
            margin-top: 5em;
            margin-left: 5em;
        }
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
        <h4><center>Refusal Of Treatment Waiver</center></h4>
        </head>
        <div class="container-fluid">
        <br>
        It is the policy of <b>Metro Lipa Medical Center</b> to give our patients enough information about the purpose,
        importance, benefits, risks and possible costs associated with proposed tests, referrals or treatments, to
        enable patients and their families to make informed decisions about their health. <br><br>
        However, patients have the right to seek a second opinion or refuse recommended medical advice or
        treatment. If you choose to refuse the recommended medical advice or treatment of our medical
        practitioners, we are required to record your decision. <br><br>
        Please consider carefully:<br>
        <ul style="list-style-type:square">
            <li>Why do you want to refuse treatment against advice? Discuss this with your medical practitioner.</li>
            <li>Is there a particular concern that can be addressed that will make you feel more comfortable or come to
            a compromise with your medical practitioner’s advice?</li>
            <li>If you decide to refuse treatment, your medical practitioner will discuss with you any signs of
            deterioration to look for, what to do and when to return to the practice or seek medical advice.</li>
            <li>You may also be given prescribed medications, prescriptions and/or a treatment plan.
            Please complete all parts of this form before you leave the medical practice</li>
        </ul>
        <br>
       <center><b> Please complete all parts of this form before you leave the medical practice </b></center>
        <br>
       <table>
       <tr>
           <th colspan="2">Patient name: <small>  '.$fullname.' </small></th>
       </tr>
       <tr>
           <th>Date: <small>  '.$date.' </small></th>
           <th>Time: <small>  '.$time.' </small></th>
       </tr>
       <tr>
            <th  colspan="2">Address: <small>  '.$address.' </small></th>
        </tr>
        <tr>
            <th>Date of Birth: <small>  '.$birthdate.' </small></th>
            <th>Contact: <small>  '.$contact.' </small></th>
        </tr>
        <tr>
            <th colspan="2" style="background-color: #B2B2B2;"> </th>
        </tr>
        <tr>
            <td colspan="2">
                <ul style="list-style-type:square">
                    <li> I declare that I am refusing the advised treatment of name.</li>
                    <li> I understand that the consequences of failing to follow the medical advice given to me might result
                    in significant disability or even death.</li>
                    <li> I understand I can change my mind at any time and return for treatment</li>
                </ul>

            </td>
        </tr>
        <tr>
            <th colspan="2" style="background-color: #B2B2B2;"> </th>
        </tr>
        <tr>
            <th colspan="2">Patient signiture:</th>
        </tr>
        <tr>
            <th colspan="2">Witness: <small>  '.$genfullname.' </small></th>
        </tr>
        <tr>
            <th>Date: <small>  '.$date.' </small></th>
            <th>Time: <small>  '.$time.' </small></th>
        </tr>
       ';
        
    $dompdf->loadHtml($html);   

    // (Optional) Setup the paper size and orientation

    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("WaiverReport",array("Attachment"=>0));

    ?>