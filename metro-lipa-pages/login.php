<!DOCTYPE html>
<html lang="en" ng-app="demo">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Lipa Medical Center - Patient Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="../assets/js/angular.min.js"></script>
    <script src="../assets/js/mask.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div class="container" ng-controller="myCtrl">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                       <center> <h3 class="panel-title">Log in</h3></center>
                    </div>
                    <div class="panel-body">
                     
                        <form>
                        <div class="form-group">
                            <label for="login-form-username">Account ID:</label>
                                <input type="text" class="form-control" ng-model="phonenumber" ui-mask="9-99999"  ui-mask-placeholder ui-mask-placeholder-char=" "/>
                        </div>

                        <div class="form-group">
                            <label for="login-form-username">Password:</label>
                                <input type='password' name="Password" ng-model="Password" class="form-control" required>
                                        <!-- <span style="color:red">
                                            <span ng-show="myForm.Password.$touched && myForm.Password.$invalid">Password is required.</span>
                                        </span> -->
                        </div>
                    
                                    
                                    <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                    </div>
                                    
                                    <div class="col_full nobottommargin">
                                        
                                        <button type="submit" class="btn btn-lg btn-default btn-block" ng-click="Submit()">Submit</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/dist/js/sb-admin-2.js"></script>

    <script>
    var app = angular.module('demo', ['ui.mask']);

    app.controller('myCtrl', function($scope, $window, $http) {
         $scope.Submit = function(){
        
                   window.location.href='index.php';
                };
        });
    </script>

</body>

</html>
