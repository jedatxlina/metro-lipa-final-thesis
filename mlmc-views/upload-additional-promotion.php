<?php
require_once 'getData/connection.php';
$at = $_POST['at'];



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
                    $file_destionation = '../mlmc-site/Knight/web-photo/' . $file_name_new;
                    $db_file_destination = 'web-photo/' . $file_name_new;
                    if(move_uploaded_file($file_tmp,$file_destionation)){

                        $query = "INSERT into website_uploads(PhotoTitle,PhotoDesc,pathPhoto) VALUES('Promo','Promo','$db_file_destination')";
                        mysqli_query($conn,$query); 
                        
                    }
                }
            }
        }
    }

    header("Location:migrate.php?at=$at");

    



