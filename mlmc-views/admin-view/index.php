<?php require_once 'admin-header.php';?>

<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active"><a href="#" ng-click="reSubmit()">Dashboard</a></li>
</ol>
<br><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	<div class="row">
		<div class="col-md-3">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-user"></i></div>
				<div class="tile-heading"><span>Emergency Patients</span></div>
				<div class="tile-body"><span>{{count}}</span></div>
				<div class="tile-footer"><span class="text-success">+0.0%</span></div>
			</div>
		</div>
	</div>
	<script>
                var app = angular.module('myApp', []);
                app.controller('userCtrl', function($scope, $http) {
                    
					$http({
                        method: 'GET',
                        url: 'getData/get-emergency-details.php'
                    }).then(function(response) {
                        $scope.count = Object.keys(response.data).length;
			
                    });
				
                });

        </script>
</div>
<?php include 'footer.php'?>