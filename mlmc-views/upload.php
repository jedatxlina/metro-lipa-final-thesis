<?php
require_once 'getData/connection.php';
$at = $_POST['at'];

switch ($at[0]) {
    case '1':
        $sel = mysqli_query($conn,"SELECT pathPhoto FROM admin WHERE AdminID = '$at'");
        while ($row = mysqli_fetch_assoc($sel)) {
            $pathPhoto = $row['pathPhoto'];
        }
        break;

    case '2':
        $sel = mysqli_query($conn,"SELECT pathPhoto FROM admission_staffs WHERE AdmissionStaffID = '$at'");
        while ($row = mysqli_fetch_assoc($sel)) {
            $pathPhoto = $row['pathPhoto'];
        }
        break;

    case '3':
        $sel = mysqli_query($conn,"SELECT pathPhoto FROM nurses WHERE NurseID = '$at'");
        while ($row = mysqli_fetch_assoc($sel)) {
            $pathPhoto = $row['pathPhoto'];
        }
        break;


    case '4':
        $sel = mysqli_query($conn,"SELECT pathPhoto FROM physicians WHERE PhysicianID = '$at'");
        while ($row = mysqli_fetch_assoc($sel)) {
            $pathPhoto = $row['pathPhoto'];
        }
        break;

    case '7':
        $sel = mysqli_query($conn,"SELECT pathPhoto FROM secretary WHERE SecretaryID = '$at'");
        while ($row = mysqli_fetch_assoc($sel)) {
            $pathPhoto = $row['pathPhoto'];
        }
        break;        
         
    
    default:
        # code...
        break;
}


    if(isset($_FILES['photo'])){
        $file = $_FILES['photo'];

        //FILE PROPERTIES
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        //PARSE FILE EXTENSIONS
        $file_ext = explode('.',$file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('jpg','jpeg','png');

        if(in_array($file_ext,$allowed)){
            if($file_error === 0){
                if($file_size <= 5242880){

                    $file_name_new = uniqid($at, false) . '.' . $file_ext;
                    $file_destionation = 'uploads/' . $file_name_new;

                    if(move_uploaded_file($file_tmp,$file_destionation)){

                        switch ($at[0]) {
                            case '1':
                                $query = "UPDATE admin SET pathPhoto = '$file_destionation' WHERE AdminID='$at'";
                                mysqli_query($conn,$query); 
                                break;

                            case '2':
                                $query = "UPDATE admission_staffs SET pathPhoto = '$file_destionation' WHERE AdmissionStaffID='$at'";
                                mysqli_query($conn,$query); 
                                break;

                            case '3':
                                $query = "UPDATE nurses SET pathPhoto = '$file_destionation' WHERE NurseID='$at'";
                                mysqli_query($conn,$query); 
                                break;

                            case '4':
                                $query = "UPDATE physicians SET pathPhoto = '$file_destionation' WHERE PhysicianID='$at'";
                                mysqli_query($conn,$query); 
                                break;

                             case '7':
                                $query = "UPDATE secretary SET pathPhoto = '$file_destionation' WHERE SecretaryID='$at'";
                                mysqli_query($conn,$query); 
                                break;
                            
                            default:
                                break;
                        }
                        
                    }
                }
            }
        }
    }

    header("Location:user-profile.php?at=$at");

    



