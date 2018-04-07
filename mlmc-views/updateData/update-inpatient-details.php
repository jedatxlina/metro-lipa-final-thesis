<?php
    require_once 'connection.php';

    $id =  $_GET['AdmissionID'];
    $bedid = $_GET['BedID']; 
    $dietplan = $_GET['Dietplan'];
    $dietremarks =  isset($_GET['Dietremarks']) ? $_GET['Dietremarks'] : '';

    $sql = "UPDATE patients SET AdmissionType='Pending' WHERE AdmissionID='$id'";

    mysqli_query($conn,$sql);  

    $sql2 = "UPDATE beds SET Status='Occupied' WHERE BedID='$bedid'";

    mysqli_query($conn,$sql2); 

    $sql3 = "UPDATE medical_details SET BedID='$bedid' WHERE AdmissionID='$id'";

    mysqli_query($conn,$sql3); 
    
    $query = mysqli_query($conn,"SELECT MedicalID FROM medical_details WHERE AdmissionID ='$id'");    
    while ($row = mysqli_fetch_assoc($query)) {
        $medid = $row['MedicalID'];
    }

    $sql4 = "INSERT INTO patient_diet(MedicalID,AdmissionID,Diet,DietRemarks) VALUES('$medid','$id','$dietplan','$dietremarks')";
    mysqli_query($conn,$sql4); 
?>
