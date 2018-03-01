<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Metro Lipa Medical Center Patient Management System</title>
  <?php include 'css/css.html'; ?>
  <script src="mlmc-views/components/angular.min.js"></script>
	<script src="mlmc-views/assets/js/mask.js"></script>
</head>

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
            <input type="text"  required autocomplete="off" ng-model="user" ui-mask="9-99999"  ui-mask-placeholder ui-mask-placeholder-char="_"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off"   ng-model="pass" required>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button class="button button-block" name="login"  ng-click="Submit()" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>

</body>
</html>
