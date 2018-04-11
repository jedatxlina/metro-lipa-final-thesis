<?php
require_once 'connection.php';

$sel = mysqli_query($conn,"SELECT * FROM website_uploads");

$data = array();


while ($row = mysqli_fetch_assoc($sel)) {
    $data[] = array(
        "ID"=>$row['ID'],
        "PhotoTitle"=>$row['PhotoTitle'],
        "PhotoDesc"=>$row['PhotoDesc'],
        "pathPhoto"=>$row['pathPhoto']);
}
echo json_encode($data);
?>

									