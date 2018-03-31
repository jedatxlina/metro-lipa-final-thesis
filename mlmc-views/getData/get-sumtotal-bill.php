<?php
require_once 'connection.php';
$yearage = '0';
$id = $_GET['id'];
$sel = mysqli_query($conn,"SELECT a.BedID,a.ArrivalDate ,b.Rate,c.Quantity,d.Price FROM duration a, beds b, medication c, pharmaceuticals d WHERE b.BedID = a.BedID AND c.MedicineID = d.MedicineID AND a.AdmissionID = '$id' AND c.AdmissionID = '$id'
");
$data = array();
$date = date("Y-m-d");
while ($row = mysqli_fetch_array($sel)) {
    $parameterage  = date_create($row['ArrivalDate']);
    $currentdatetime 	= date_create(); // Current time and date
    $getage =  date_diff( $parameterage, $currentdatetime );
    $yearage = $getage->d;
    if($yearage = 1)
        $yearage=1;
    $data[] = array(
    "Rate"=>$row['Rate'],
    "BedID"=>$row['BedID'],
    "qty"=>$row['Quantity']*$row['Price']+$row['Quantity']*$row['Price']+$row['Rate']*$yearage);
}
echo json_encode($data);
?>

									