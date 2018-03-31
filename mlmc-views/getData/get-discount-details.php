<?php

require_once 'connection.php';
$data = '';
$sel = mysqli_query($conn,"SELECT Discount FROM discounts WHERE DiscDesc = 'Senior Citizen'");
    
while ($row = mysqli_fetch_assoc($sel)) {
    $data = $row['Discount'];
}
   
echo json_encode($data);
?>

									