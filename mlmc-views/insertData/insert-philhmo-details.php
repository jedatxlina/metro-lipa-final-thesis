
<?php
    require_once 'connection.php';
    date_default_timezone_set("Asia/Singapore");

    $randstring = rand(111111, 999999);
    $randstring2 = rand(111111, 999999);

    $at = $_GET['at'];
    $id = $_GET['id'];

    $philhealth = isset($_GET['philhealth']) ? $_GET['philhealth'] : '';
    $hmo = isset($_GET['hmo']) ? $_GET['hmo'] : '';
    $hmoprovider = isset($_GET['hmoprovider']) ? $_GET['hmoprovider'] : '';

    $datetime = date("Y-m-d h:i A");
    $sel2 = mysqli_query($conn,"SELECT AdmissionNo FROM patients WHERE AdmissionID='$id'");
    $data = array();
    while ($row = mysqli_fetch_array($sel2)) {
        $adno = $row['AdmissionNo'];
    }

    if($hmo == 'Pending'){
        
        $query = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,Remarks,AdmissionNo) 
        VALUES('$randstring','$id','$hmoprovider','Pending','$adno')";

        mysqli_query($conn,$query); 

    }else{

        $query = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,Remarks,AdmissionNo) 
        VALUES('$randstring','$id','HMO','Not Applicable','$adno')";

        mysqli_query($conn,$query); 

    }

    if($philhealth == 'Pending'){
        
        $query = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,Remarks,AdmissionNo) 
        VALUES('$randstring2','$id','Philhealth','Pending','$adno')";

        mysqli_query($conn,$query); 

    }else{

        $query = "INSERT into accounts_receivable(AccountReceiveID,AdmissionID,Provider,Remarks,AdmissionNo) 
        VALUES('$randstring2','$id','Philhealth','Not Applicable','$adno')";

        mysqli_query($conn,$query); 

    }
?>
