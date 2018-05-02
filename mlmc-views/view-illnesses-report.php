
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
   
    $search =  isset($_GET['param']) ? $_GET['param'] : '';
  
    $datetime = date("Y-m-d h:i A");

 

    if($search != ''){
        if($search == 'current'){
            $filter = 'current';
        }else{
            $param =  explode(' - ',$search); 
            $cnt = count($param);
            for($x = 0; $x < $cnt; $x++){
                if($x == 0){
                    $start = $param[$x];
                }else{
                    $end = $param[$x];
                }
            }
            
            $start = date("Y-m-d", strtotime($start));
            $end = date("Y-m-d", strtotime($end));
    
            $filter = $start . ' - ' . $end;    
        }
       
    }else{
        $filter = 'None';
    }
    

    switch ($at[0]) {
        case '7':
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM secretary WHERE SecretaryID ='$at'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $genfullname = $row['Fullname'];
        }
        break;
        
        default:
        $sel = mysqli_query($conn,"SELECT *, CONCAT(Firstname, ' ' ,MiddleName, ' ', LastName) AS Fullname FROM admin WHERE AdminID ='$at'");

        while ($row = mysqli_fetch_assoc($sel)) {
            $genfullname = $row['Fullname'];
        }
        break;
    }
    // SELECT DISTINCT(Findings) as findings, count(Findings) as cnt FROM diagnosis WHERE DateDiagnosed BETWEEN '2018-04-26' AND '2018-04-30' GROUP BY Findings
    
    switch ($filter) {
        case 'None':
        $query2 = mysqli_query($conn,"SELECT CONCAT(patients_archive.Firstname, ' ' ,patients_archive.MiddleName, ' ', patients_archive.LastName) AS Patient,patients_archive.CompleteAddress, patients_archive.ArchiveID,patients_archive.MedicalID, diagnosis.Findings, diagnosis.DateDiagnosed,diagnosis.TimeDiagnosed FROM patients_archive JOIN diagnosis WHERE patients_archive.MedicalID = diagnosis.MedicalID");
        $query3 = mysqli_query($conn,"SELECT DISTINCT(Findings) as findings, count(Findings) as cnt FROM diagnosis GROUP BY Findings");
        break;

        case 'current':
        
        $query2 = mysqli_query($conn,"SELECT CONCAT(patients_archive.Firstname, ' ' ,patients_archive.MiddleName, ' ', patients_archive.LastName) AS Patient,patients_archive.CompleteAddress, patients_archive.ArchiveID,patients_archive.MedicalID, diagnosis.Findings, diagnosis.DateDiagnosed,diagnosis.TimeDiagnosed FROM patients_archive JOIN diagnosis WHERE YEARWEEK(`DateDiagnosed`, 0) = YEARWEEK(CURDATE(), 0) AND patients_archive.MedicalID = diagnosis.MedicalID");
        $query3 = mysqli_query($conn,"SELECT DISTINCT(diagnosis.Findings) as findings, count(diagnosis.Findings) as cnt FROM diagnosis JOIN patients_archive WHERE YEARWEEK(`DateDiagnosed`, 0) = YEARWEEK(CURDATE(), 0) AND patients_archive.MedicalID = diagnosis.MedicalID GROUP BY diagnosis.Findings");
        break;
        break;
        
        default:
            $query2 = mysqli_query($conn,"SELECT CONCAT(patients_archive.Firstname, ' ' ,patients_archive.MiddleName, ' ', patients_archive.LastName) AS Patient,patients_archive.CompleteAddress, patients_archive.ArchiveID,patients_archive.MedicalID, diagnosis.Findings, diagnosis.DateDiagnosed,diagnosis.TimeDiagnosed FROM patients_archive JOIN diagnosis WHERE diagnosis.DateDiagnosed BETWEEN '$start' AND '$end' AND patients_archive.MedicalID = diagnosis.MedicalID");
            $query3 = mysqli_query($conn,"SELECT DISTINCT(Findings) as findings, count(Findings) as cnt FROM diagnosis JOIN patients_archive WHERE DateDiagnosed BETWEEN '$start' AND '$end' AND patients_archive.MedicalID = diagnosis.MedicalID GROUP BY Findings");
            break;
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

    h4,h5 {
        font-family: arial, sans-serif;
    }
    </style>
    

    <head> 
    <style>
    #footer { position: fixed; center: 0px; bottom: -150px; right: 0px; height: 150px; background-color: #F4F4F4; }
    #footer .page:after { content: counter(page, upper-roman); }
    </style>

    <img src="assets/img/report-header.jpg">    
    <h4><center>Common Illnesses Report</center></h4>
    <h5><center>Date Filter: '.$filter.'</center></h5>
    </head>
    <div class="container-fluid">
    <table>
    <tr>
        <th>Illness</th>
        <th>Count</th>
    </tr>';

    while ($row = mysqli_fetch_assoc($query3)) {
        $findings = $row['findings'];
        $cnt = $row['cnt'];    
   
        $html .= '<tr>
         <td> ' . $findings . ' </td><td>' . $cnt . '</td></tr>';
       }
   


    $html .= '</table><br><br><br>
      
            <table>
            <tr>
                <th>Patient Name</th>
                <th>Complete Address</th>
                <th>Conditions</th>
            </tr>';
    
        while ($row = mysqli_fetch_assoc($query2)) {
         $admissionid = $row['Patient'];
         $complete = $row['CompleteAddress'];
         $conditions = $row['Findings'];
    
         $html .= '<tr>
          <td> ' . $admissionid . ' </td><td>' . $complete . '</td><td>' . $conditions . '</td></tr>';
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
    $dompdf->stream("IllnessesReport",array("Attachment"=>0));

    ?>