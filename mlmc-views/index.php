<?php include 'admin-header.php'?>

<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active"><a href="#" ng-click="reSubmit()">Dashboard</a></li>
</ol>
<br><br>
<div class="container-fluid">
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

</div>

<script>
        var app = angular.module('myApp', []);
        app.controller('userCtrl', function($scope, $http) {
			
			$scope.param = "<?php echo $_GET['at'];?>";
			switch ($scope.param) {
				case '1':
					$scope.Administrator = true;
					break;
				
				case '2':
					$scope.Admission = true;
					break;
				
				case '3':
					$scope.Nurse = true;
					break;
				
				case '4':
					$scope.Physician = true;
					break;
				
				case '5':
					$scope.Pharmacy = true;
					break;

				case '6':
					$scope.Billing = true;
					break;
			
				default:
					break;
			}

			$http({
                method: 'GET',
                 url: 'getData/get-emergency-details.php'
            }).then(function(response) {
                $scope.count = Object.keys(response.data).length;
            });

			$scope.buttonDisable = function() { 
			  if($scope.param == '1')
			  return true;
			}
	
			$scope.getPage = function(check){
			
				switch (check) {
					case 'Dashboard':
							window.location.href = 'index.php?at=' + $scope.param;
							break;
					case 'Emergency':
							window.location.href = 'emergency.php?at=' + $scope.param;
							break;
					case 'Outpatient':
							window.location.href = 'outpatient.php?at=' + $scope.param;
							break;
					case 'Inpatient':
							window.location.href = 'inpatient.php?at=' + $scope.param;
							break;
							
					case 'Confined':
							window.location.href = 'nurse-patient.php?at=' + $scope.param;
							break;
					
					case 'Physician':
							window.location.href = 'physician.php?at=' + $scope.param;
							break;
					
					case 'Pharmacy':
							window.location.href = 'medicine-requisition.php?at=' + $scope.param;
							break;
					
					case 'Billing':
							window.location.href = 'billing.php?at=' + $scope.param;
							break;

					case 'Cashier':
							window.location.href = 'cashier.php?at=' + $scope.param;
							break;
					
					case 'Accounts':
							window.location.href = 'user.php?at=' + $scope.param;
							break;

					case 'Bed':
							window.location.href = 'bed.php?at=' + $scope.param;
							break;

					case 'Specialization':
							window.location.href = 'specialization.php?at=' + $scope.param;
							break;
					
					case 'Laboratory':
							window.location.href = 'laboratory.php?at=' + $scope.param;
							break;
					
					default:
						break;
				}
			}

		});
</script>
<?php include 'footer.php'?>
