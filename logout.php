<?php
require 'db.php';
date_default_timezone_set("Asia/Singapore");
$at =  isset($_GET['at']) ? $_GET['at'] : '';

$datetime = date("Y-m-d h:i A");

$query = "UPDATE user_logs SET DateTimeOut='$datetime' WHERE AccountID='$at' AND DateTimeOut= '0'";

$conn->query($query);
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Metro Lipa Medical Center</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
       
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
