
<?php
require_once 'connection.php';
date_default_timezone_set("Asia/Singapore");

$randstring = rand(111111, 999999);
$randstring2 = rand(111111, 999999);

$at = $_GET['at'];
$id = $_GET['id'];
$hmoprovider = isset($_GET['hmoprovider']) ? $_GET['hmoprovider'] : '';
$controlhmo = isset($_GET['controlhmo']) ? $_GET['controlhmo'] : '';
$controlphil = isset($_GET['controlphil']) ? $_GET['controlphil'] : '';

$datetime = date("Y-m-d h:i A");

if ($hmoprovider != '' && $controlphil != '') {

    $query = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,DateTimePosted,ControlNo) 
    VALUES('$randstring','$id','$hmoprovider','$datetime','$controlhmo')";

    mysqli_query($conn,$query);  

    $query2 = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,DateTimePosted,ControlNo) 
    VALUES('$randstring2','$id','Philhealth','$datetime','$controlphil')";

    mysqli_query($conn,$query2);  

}
if($hmoprovider == '' && $controlphil != '') {
    $query2 = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,DateTimePosted,ControlNo) 
    VALUES('$randstring','$id','Philhealth','$datetime','$controlphil')";

    mysqli_query($conn,$query2);  
}

if($hmoprovider != '' && $controlphil == '') {
    $query = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,DateTimePosted,ControlNo) 
    VALUES('$randstring2','$id','$hmoprovider','$datetime','$controlhmo')";

    mysqli_query($conn,$query);  
}
?>
