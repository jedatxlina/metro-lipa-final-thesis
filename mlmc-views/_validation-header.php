<?php 
    switch ($id[1]) {
	case '1':	include 'admin-header.php';
				break;
	
	case '2':	include 'admission-header.php';
				break;	

	case '3':	include 'nurse-header.php';
				break;	

	case '4':	include 'doctor-header.php';
				break;	

	case '5':	include 'pharmacy-header.php';
				break;	
	
	case '6':	include 'billing-header.php';
				break;	

	case '7': 	include 'admission-header';
				break;
	
	default:	header('Location:../index.php?id=error');
				break;
}
?>