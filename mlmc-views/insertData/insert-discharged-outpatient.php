<?php
  require_once 'connection.php';

  date_default_timezone_set("Asia/Singapore");
  $billingid =  rand (11111,99999);
  $areceivableid =  rand (11111,99999);
  $at = $_GET['at'];
  $admissionid = $_GET['admissionid'];
  // $opdroomno = $_GET['opdroomno'];
  $totalfee = $_GET['totalfee'];
  $hmoprovider = isset($_GET['hmo']) ? $_GET['hmo'] : '';
  $re = $_GET['re'];
  $datetime = date("Y-m-d h:i A");


  if($hmoprovider != ''){
  $query= "INSERT into billing_opd(BillingOpdID,AdmissionID,AccountReceiveID,TotalBill,Status) VALUES ('$billingid','$admissionid','$areceivableid',0,'Paid')";
  mysqli_query($conn,$query);  

  $query2= "INSERT into accounts_receivable(AccountReceiveID,Provider,Amount,DateTimePosted,Remarks) VALUES ('$areceivableid','$hmoprovider','$totalfee','$datetime','Pending')";
  mysqli_query($conn,$query2);  

  }else{
  $query= "INSERT into billing_opd(BillingOpdID,AdmissionID,TotalBill,Status) VALUES ('$billingid','$admissionid','$totalfee','Paid')";
  mysqli_query($conn,$query);  
  }

  $querydischarge = "INSERT INTO patients_archive(ArchiveID,FirstName,MiddleName,LastName,Province,City,Brgy,CompleteAddress,latcoor,longcoor,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,Citizenship,MedicalID)
  SELECT a.AdmissionID,a.FirstName,a.MiddleName,a.LastName,a.Province,a.City,a.Brgy,a.CompleteAddress,a.latcoor,a.longcoor,a.Gender,a.Age,a.CivilStatus,a.Birthdate,a.Contact,a.Occupation,a.Citizenship,a.MedicalID
  FROM patients a
  WHERE a.AdmissionID = '$admissionid'";

  mysqli_query($conn,$querydischarge);  



  if($re == 'move'){
  require('../vendor/autoload.php');

  $options = array(
      'cluster' => 'ap1',
      'encrypted' => true
    );

    $pusher = new Pusher\Pusher(
      'c23d5c3be92c6ab27b7a',
      '296fc518f7ee23f7ee56',
      '468021',
      $options
    );

    if(isset($_GET['name']))
    {
      $name = $_GET['name'];
    }
    else
    {
      $name = "Client";
    }

  $data['message'] = 'Patient '.$admissionid.' will be transferred to emergency in a moment';
  $data['transfer'] = $admissionid;
  $pusher->trigger('my-channel-emergency', 'my-event-emergency', $data);

  $query = "UPDATE patients SET AdmissionType = 'Transfering' WHERE AdmissionID = '$admissionid'";
  mysqli_query($conn,$query);  

  }else{
    
  $querydelete = "DELETE FROM patients WHERE AdmissionID = '$admissionid'";
  mysqli_query($conn,$querydelete);  

  }


