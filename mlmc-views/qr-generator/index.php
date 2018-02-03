<?php   

    // $postdata = file_get_contents("php://input");
    // $request = json_decode($postdata);
    
    // $data = addslashes($request->data);

    $data = $_SESSION['data'];

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
    
    session_destroy();
?>