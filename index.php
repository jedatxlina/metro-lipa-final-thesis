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
	<script src="mlmc-views/assets/js/mask.js"></script>
    </head>

    <body class="focused-form animated-content">
<div class="container" id="login-form"  ng-app="myApp" ng-controller="userCtrl">
	<a href="index.php" class="login-logo"><img src="mlmc-views/assets/img/header-logo.png"></a>
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
										<input type="text" class="form-control" ng-model="user" ui-mask="9-99999"  ui-mask-placeholder ui-mask-placeholder-char="_"/>
									</div>
		                        </div>
							</div>

							<div class="form-group mb-md">
		                        <div class="col-xs-12">
		                        	<div class="input-group">
										<span class="input-group-addon">
											<i class="ti ti-key"></i>
										</span>
										<input type="password" class="form-control"  ng-model="pass" placeholder="Password" required>
									</div>
		                        </div>
							</div>

							<div class="form-group mb-n">
								<div class="col-xs-12">
									<a href="forgot-password.php" class="pull-left">Forgot password?</a>
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
        <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="alert alert-dismissable alert-danger">
                <i class="ti ti-close"></i>&nbsp; <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            </div>
        </div> -->
        	<!-- Error modal -->
				<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Error:</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: 60px">
							<strong>Oh snap!</strong> Change a few things up and try submitting again.
							</div>
						</div>
					</div>
				</div>
				

   
<script>
    var app = angular.module('myApp', ['ui.mask']);
        app.controller('userCtrl', function($scope, $http) {

            $scope.user = '';
            $scope.pass = '';

            $scope.Submit = function(){
                if($scope.user === '' && $scope.pass === ''){
					alert('Oh snap! Change a few things up and try submitting again.');
                }else{
                  $http({
                        method: 'GET',
                        url: 'mlmc-views/validations/validate-login.php',
                        params: {id: $scope.user,
                                 pass: $scope.pass}
       	            }).then(function(response) {
                        $scope.param = response.data;
						if($scope.param == 0){
						alert('Oh snap! Change a few things up and try submitting again.');
						}else{
						window.location.href = 'mlmc-views/index.php?id=' + $scope.param.charAt(1);	
						}
		            });
				
                }
			
            
            }
           
                    
    });

</script>
</div>
    

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

</body>
</html>