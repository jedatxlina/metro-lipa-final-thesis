<?php
require 'db.php';
date_default_timezone_set("Asia/Singapore");
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}

else {
   $_SESSION['trial'] = 'trial';
    // Makes it easier to read
    $id = $_SESSION['id'];
    $accesstype = $_SESSION['accesstype'];
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];
    $logsid =  rand(111111, 999999);
    $datetime = date("Y-m-d h:i A");

    $query = "INSERT INTO user_logs VALUES ('$logsid','$id','$datetime','0')";

    $conn->query($query);

    if ($accesstype == 1)
    $user = ' Administrator';
    else if ($accesstype == 2)
    $user = ' Admission Staff';
    else if ($accesstype == 3)
    $user = ' Nurse';
    else if ($accesstype == 4)
    $user = ' Physician';
    else if ($accesstype == 5)
    $user = ' Pharmacy';
    else if ($accesstype == 6)
    $user = ' Billing';
    else if ($accesstype == 7)
    $user = ' Secretary';
    else if ($accesstype == 8)
    $user = ' Laboratory Staff';
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $id?></title>
  <?php include 'css/css.html'; ?>

  <script src="mlmc-views/components/angular.min.js"></script>
</head>

<body>
  <div class="form" ng-app="myApp" ng-controller="userCtrl">

          <h1>Welcome!</h1>
  
          
          <h2><?php echo $id . '<br>' . '<p>Access Type:' . $user;?></h2>
          <p><?= $email ?></p>
          <div text-align="center" ng-show="accesstype != 3">
                                    <!-- <h2>Floor <form method="post"></h2>
                                    <br>
                                    <p> -->
                                    
                                    <!-- <select ng-model="selectfloor" />
                                      <option value="3" selected>3rd</option>
                                      <option value="3">3rd</option>
                                      <option value="4">4th</option>
                                    </select> -->
                                    <!-- </p> -->
                                    </form>
          </div>

          <a ng-click="continue()"><button class="button button-block" name="logout"/>Continue</button></a>
          <!-- id="dashboard" -->
    </div>
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

 <script>
        var fetch = angular.module('myApp', []);


        fetch.controller('userCtrl', ['$scope', '$http', function($scope,$http) {
      
          $scope.continue = function() {
              var id = "<?php echo $id ?>";
           
              window.location.href = 'mlmc-views/index.php?at=' + id;
          }

          
<<<<<<< HEAD
          $http({
                method: 'get',
                url: 'getData/get-promo-details.php'
            }).then(function(response) {
                $scope.users = response.data;
                });
            });
=======
        
>>>>>>> master

            

        }]);
    </script>

</body>
</html>
