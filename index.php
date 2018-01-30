<!DOCTYPE html>
<html lang="en" class="coming-soon">
<head>
    <meta charset="utf-8">
    <title>Metro Lipa Medical Center Patient Management System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet' type='text/css'>
    <link type="text/css" href="mlmc-views/assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link type="text/css" href="mlmc-views/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="mlmc-views/assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">               <!-- Themify Icons -->
    <link type="text/css" href="mlmc-views/assets/css/styles.css" rel="stylesheet">

    <script src="mlmc-views/components/angular.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    
    </head>

    <body class="focused-form animated-content">
        
<div class="container" id="login-form"  ng-app="myApp" ng-controller="userCtrl">
	<a href="index.html" class="login-logo"><img src="mlmc-views/assets/img/header-logo.png"></a>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Login Form</h2>
					</div>
					<div class="panel-body">
						
						<form action="" class="form-horizontal" id="validate-form">
							<div class="form-group mb-md">
		                        <div class="col-xs-12">
		                        	<div class="input-group">							
										<span class="input-group-addon">
											<i class="ti ti-user"></i>
										</span>
										<input type="text" class="form-control"  ng-model="user"  placeholder="Username" data-parsley-minlength="6" placeholder="At least 6 characters" required>
									</div>
		                        </div>
							</div>

							<div class="form-group mb-md">
		                        <div class="col-xs-12">
		                        	<div class="input-group">
										<span class="input-group-addon">
											<i class="ti ti-key"></i>
										</span>
										<input type="password" class="form-control"  ng-model="pass" id="exampleInputPassword1" placeholder="Password">
									</div>
		                        </div>
							</div>

							<div class="form-group mb-n">
								<div class="col-xs-12">
									<a href="extras-forgotpassword.html" class="pull-left">Forgot password?</a>
									<div class="checkbox-inline icheck pull-right p-n">
										<label for="">
											<input type="checkbox"></input>
											Remember me
										</label>
									</div>
								</div>
							</div>
						
                            </div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary pull-right" ng-click="Submit()">Login</button>
                                </div>
                            </div>
                        </form>
				</div>
			</div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="alert alert-dismissable alert-danger">
                <i class="ti ti-close"></i>&nbsp; <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            </div>
        </div>
</div>

    
    
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="mlmc-views/assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="mlmc-views/assets/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script type="text/javascript" src="mlmc-views/assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script type="text/javascript" src="mlmc-views/assets/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script type="text/javascript" src="mlmc-views/assets/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script type="text/javascript" src="mlmc-views/assets/plugins/velocityjs/velocity.ui.min.js"></script>

<script type="text/javascript" src="mlmc-views/assets/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script type="text/javascript" src="mlmc-views/assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="mlmc-views/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="mlmc-views/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="mlmc-views/assets/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

<script type="text/javascript" src="mlmc-views/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script type="text/javascript" src="mlmc-views/assets/js/application.js"></script>
<script type="text/javascript" src="mlmc-views/assets/demo/demo.js"></script>
<script type="text/javascript" src="mlmc-views/assets/demo/demo-switcher.js"></script>
<script type="text/javascript" src="mlmc-views/assets/demo/demo-alerts.js"></script>
<script type="text/javascript" src="mlmc-views/assets/demo/demo-formvalidation.js"></script>
<!-- End loading site level scripts -->
    <!-- Load page level scripts-->
    
<script>
    var app = angular.module('myApp', []);
        app.controller('userCtrl', function($scope, $http) {

            $scope.Submit = function(){
                    $http({
                        method: 'get',
                        url: 'mlmc-views/validations/validate-login.php',
                        params: {user: $scope.user,
                                 pass: $scope.pass}
       	            }).then(function(response) {
                        $scope.auth = response.data.length;
                      
                        if ($scope.auth ==  0){
                            $('#myModal').modal('show');
                        }else
                        {
                        window.location.href = 'mlmc-views/index.php';
                        }
		            });
            }
           
                    
    });

</script>
    <!-- End loading page level scripts-->
</body>
</html>