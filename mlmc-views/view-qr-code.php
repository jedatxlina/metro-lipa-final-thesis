
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

    $sel = mysqli_query($conn,"SELECT patients.*,medical_details.QR_Path FROM patients JOIN medical_details WHERE patients.AdmissionID = '$id' AND patients.MedicalID = medical_details.MedicalID");
    while ($row = mysqli_fetch_assoc($sel)) {
        $fullname = $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'];
        $gender = $row['Gender'];
        $address = $row['CompleteAddress'];
        $birthdate = $row['Birthdate'];
        $contact = $row['Contact'];
        $admissiontype = $row['AdmissionType'];
        $qr_path = $row['QR_Path'];
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
      

 
        </head>
        <div class="container-fluid">
        <br>
        <img src='.$qr_path.'>
        <br>
        <img src='.$qr_path.'>
        <br>
        <img src='.$qr_path.'>
        <br>
        <img src='.$qr_path.'>
        <br>
        ';
        
    $dompdf->loadHtml($html);   

    // (Optional) Setup the paper size and orientation

    $dompdf->setPaper(array(0, 0, 500, 200), 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("WaiverReport",array("Attachment"=>0));

    ?>