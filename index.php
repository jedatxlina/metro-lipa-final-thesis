
<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Metro Lipa Medical Center Patient Management Systemmmmm  </title>

  <?php include 'css/css.html'; ?>  
<!--   
  <link type='text/css' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>
  <link type="text/css" href="mlmc-views/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/css/styles.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/plugins/codeprettifier/prettify.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">

  <link type="text/css" href="mlmc-views/assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">

  <link type="text/css" href="mlmc-views/assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/plugins/switchery/switchery.css" rel="stylesheet">
  <link type="text/css" href="mlmc-views/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
 -->

  <script src="mlmc-views/components/angular.min.js"></script>
	<script src="mlmc-views/assets/js/mask.js"></script>

</head>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in
      
        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
    
  <div class="form"  ng-app="myApp" ng-controller="userCtrl">
  <center> <img src="img/header-logo.png" alt=""> </center>
  <br><br>
      <!-- <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul> -->
      
      <div class="tab-content">

         <div id="login">   
          <!-- <h1>Welcome Back!</h1>
           -->
          <form action="index.php" method="post" autocomplete="off">
          
              <div class="field-wrap">
              <label>
                Account ID<span class="req">*</span>
              </label>
              <input type="text"  required autocomplete="off" name='id'/>
            </div>
            
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" required autocomplete="off" name='pass' >
            </div>
            
            <p class="forgot"><a href="forgot.php">Forgot Password??</a></p>
            
            <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
       

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <!-- <script type="text/javascript" src="mlmc-views/assets/js/bootstrap.min.js"></script> 						 -->
</body>
</html>
