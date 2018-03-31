<?php
require_once 'connection.php';

$admissionid = $_GET['id'];

$sel = mysqli_query($conn,"SELECT GROUP_CONCAT(a.Findings SEPARATOR ', ') AS Findings,c.Description,d.* FROM diagnosis a,laboratory_req b,laboratories c,vitals d WHERE a.AdmissionID = '$admissionid' AND b.AdmissionID = '$admissionid' AND b.Status = 'Cleared' AND b.LaboratoryID = c.LaboratoryID AND d.AdmissionID = '$admissionid'");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
        "Findings"=>$row['Findings'],
        "Desc"=>$row['Description']);
}
echo json_encode($data);
?>

									