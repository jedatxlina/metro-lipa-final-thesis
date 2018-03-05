<?php   
    require_once '../insertData/connection.php';

    $medid = $_GET['medid'];
    $data = $_GET['admissionid'];

    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    

    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    $errorCorrectionLevel = 'H';

    $matrixPointSize = 5;

    
    $filename = $PNG_TEMP_DIR.$data.'.png';
    QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 

    $qrpath = "qr-generator/temp/" . "$data" . ".png" ;

    $query = "UPDATE medical_details SET QR_Path = '$qrpath' WHERE MedicalID = '$medid'";

    mysqli_query($con,$query);

?>