<?php

require_once 'connection.php';

$newhmo = $_GET['hmo'];

$query = "INSERT into refhmo(Provider) 
VALUES('$newhmo')";

mysqli_query($conn,$query);  
    

?>
