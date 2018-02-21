<?php include 'admin-header.php'?>

<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active"><a href="#" ng-click="reSubmit()">Dashboard</a></li>
</ol>
<br><br>
<div class="container-fluid"  ng-app="myApp">
	<div class="row">
		<div class="col-md-4">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-user"></i></div>
				<div class="tile-heading"><span>Emergency Patients</span></div>
				<div class="tile-body"><span>{{count}}</span></div>
				<div class="tile-footer"><span class="text-success">+0.0%</span></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-user"></i></div>
				<div class="tile-heading"><span>Outpatient Patients</span></div>
				<div class="tile-body"><span>{{count}}</span></div>
				<div class="tile-footer"><span class="text-success">+0.0%</span></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-user"></i></div>
				<div class="tile-heading"><span>Inpatient Patients</span></div>
				<div class="tile-body"><span>{{count}}</span></div>
				<div class="tile-footer"><span class="text-success">+0.0%</span></div>
			</div>
			</div>

			<form ng-repeat="user in users">
				<input type="hidden" ng-model="$parent.LN" ng-init="$parent.LN=user.LastName" class="form-control">
			</form>
			
		</div>

	</div>
</div>

<script>
        var app = angular.module('myApp', []);
        app.controller('userCtrl', function($scope, $http) {
				$scope.at = "<?php echo $at;?>";

				angular.element(document).ready(function()
				{
					if ($scope.at[0] == 4)
							{
								if ($scope.LN == "")
								{
									window.location.href = 'physician-details.php?at=' + $scope.at;
								}
							}
					
					else
							{
							if ($scope.LN == "")
								{
									window.location.href = 'user-details.php?at=' + $scope.at;
								}
							}
				});


				if ($scope.at[0] == 1)
				{
					$scope.LN = 'admin';
				}
				else if ($scope.at[0] == 2)		
				{
					$http({
							method: 'get',
							params: {accid : $scope.at},
							url: 'getData/get-admissionstaff-id.php'
						}).then(function(response) {		
							$scope.users = response.data;
						});
				}	
				else if ($scope.at[0] == 3)
					{
						$http({
								method: 'get',
								params: {accid : $scope.at},
								url: 'getData/get-nurse-id.php'
							}).then(function(response) {		
								$scope.users = response.data;
							});
					}
				else if ($scope.at[0] == 4)
					{
						$http({
								method: 'get',
								params: {accid : $scope.at},
								url: 'getData/get-physician-id.php'
							}).then(function(response) {		
								$scope.users = response.data;
							});
					}
				else if ($scope.at[0] == 5)
					{
						$http({
								method: 'get',
								params: {accid : $scope.at},
								url: 'getData/get-pharmacystaff-id.php'
							}).then(function(response) {		
								$scope.users = response.data;
							});
					}	
				else if ($scope.at[0] == 6)
					{
						$http({
								method: 'get',
								params: {accid : $scope.at},
								url: 'getData/get-billingstaff-id.php'
							}).then(function(response) {		
								$scope.users = response.data;
							});
					}

			switch ($scope.at.charAt(0)) {
				case '1':
					$scope.User = "Administrator";
					break;
				
				case '2':
					$scope.User = "Admission Staff";
					break;
				
				case '3':
					$scope.User = "Nursing Staff";
					break;
				
				case '4':
					$scope.User = "Physician";
					break;
				
				case '5':
					$scope.User = "Pharmacy Staff";
					break;

				case '6':
					$scope.User = "Billing Staff";
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

			$scope.viewProfile = function() { 
				window.location.href = 'user-profile.php?at=' + $scope.at;
			}
	
			$scope.getPage = function(check){
			
				switch (check) {
					case 'Dashboard':
							window.location.href = 'index.php?at=' + $scope.at;
							break;
					case 'Emergency':
							window.location.href = 'emergency.php?at=' + $scope.at;
							break;
					case 'Outpatient':
							window.location.href = 'outpatient.php?at=' + $scope.at;
							break;
					case 'Inpatient':
							window.location.href = 'inpatient.php?at=' + $scope.at;
							break;
							
					case 'Confined':
							window.location.href = 'nurse-patient.php?at=' + $scope.at;
							break;
					
					case 'Physician':
							window.location.href = 'physician.php?at=' + $scope.at;
							break;
					
					case 'Pharmacy':
							window.location.href = 'medicine-requisition.php?at=' + $scope.at;
							break;
							
					case 'Pharmaceuticals':
                      		window.location.href = 'pharmacy.php?at=' + $scope.at;
                      		break; 
						  					
					case 'Billing':
							window.location.href = 'billing.php?at=' + $scope.at;
							break;

					case 'Cashier':
							window.location.href = 'cashier.php?at=' + $scope.at;
							break;
					
					case 'Accounts':
							window.location.href = 'user.php?at=' + $scope.at;
							break;

					case 'Bed':
							window.location.href = 'bed.php?at=' + $scope.at;
							break;

					case 'Specialization':
							window.location.href = 'specialization.php?at=' + $scope.at;
							break;
					
					case 'Laboratory':
							window.location.href = 'laboratory.php?at=' + $scope.at;
							break;
					
					default:
						break;
				}
			}

		});
</script>
<?php include 'footer.php'?>
