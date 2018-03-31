<?php
require_once 'connection.php';

$id = $_GET['id'];
$accesstype = $_GET['atype'];

switch ($accesstype) {
	case '2':
	$query= "SELECT * FROM admission_staffs JOIN user_account WHERE admission_staffs.AdmissionStaffID = '$id' AND user_account.AccountID = '$id' ";
	break;

   case '3':
	$query= "SELECT * FROM nurses JOIN user_account WHERE nurses.NurseID = '$id' AND user_account.AccountID = '$id' ";
	break;

   case '4':
   $query = "SELECT * FROM physicians JOIN user_account WHERE physicians.PhysicianID = '$id' AND user_account.AccountID = '$id'";
	break;

   case '5':
	$query= "SELECT * FROM pharmacy_staff JOIN user_account WHERE pharmacy_staff.PharmacyID = '$id' AND user_account.AccountID = '$id' ";
	break;

   case '6':
	$query= "SELECT * FROM billing_staff JOIN user_account WHERE billing_staff.BillingStaffID = '$id' AND user_account.AccountID = '$id' ";
	break;

	case '7':
	$query= "SELECT * FROM secretary JOIN user_account WHERE secretary.SecretaryID = '$id' AND user_account.AccountID = '$id' ";
	break;

	case '8':
	$query= "SELECT * FROM lab_staff JOIN user_account WHERE lab_staff.LaboratoryStaffID = '$id' AND user_account.AccountID = '$id' ";
	break;

   default:
	break;

}

$sel = mysqli_query($con,$query);
$data = array();

	if ($accesstype == 4)
	{
		while ($row = mysqli_fetch_array($sel)) {
			$data[] = array(
				"Lastname"=>$row['LastName'],
				"Firstname"=>$row['FirstName'],
				"Middlename"=>$row['MiddleName'],
				"Gender"=>$row['Gender'],
				"Address"=>$row['Address'],
				"Contact"=>$row['Contact'],
				"Birthdate"=>$row['Birthdate'],
				"ProfessionalFee"=>$row['ProfessionalFee'],
				"Specialization"=>$row['Specialization'],
				"AccessType"=>$row['AccessType'],
				"Passwordd"=>$row['Passwordd'],
				"Email"=>$row['Email'],
				"pathPhoto"=>$row['pathPhoto']);
		}
	}
	 else 
	 {
	 	while ($row = mysqli_fetch_array($sel)) {
	 		$data[] = array(
	 			"Lastname"=>$row['LastName'],
	 			"Firstname"=>$row['FirstName'],
	 			"Middlename"=>$row['MiddleName'],
				"Gender"=>$row['Gender'],
	 			"Address"=>$row['Address'],
	 			"Birthdate"=>$row['Birthdate'],
	 			"AccessType"=>$row['AccessType'],
	 			"Passwordd"=>$row['Passwordd'],
				"Email"=>$row['Email'],
				"pathPhoto"=>$row['pathPhoto']);
	 	}
	 }
echo json_encode($data);
?>

									