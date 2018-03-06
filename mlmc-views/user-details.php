
<?php include 'admin-header.php' ?>
<style>
    .selected {
        color: #800000;
        background-color: #F5F5F5;
        font-weight: bold;
    }
</style>

<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>User Information</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                           <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Account Details</legend>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label> {{ Label }} </label>
                                                    <div  ng-repeat="user in users">
                                                    <input type="text" ng-model="$parent.accountid" ng-init="$parent.accountid=user.AccountID" disabled >
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label> Email </label>
                                                    <div  ng-repeat="user in users">
                                                    <input type="email" class="form-control" ng-model="$parent.email" ng-init="$parent.email=user.Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label> New Password </label>
                                                    <input type="password" class="form-control" ng-model="pw" >
                                                </div>
                                            </div>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label> Confirm Password </label>
                                                    <input type="password" class="form-control" ng-model="confirmpw" >
                                                </div>
                                            </div>
                                         
                                        </fieldset>
                                        <br>
                                        <span style="color:red" ng-show="pw != confirmpw">Password have to match!</span>
                                        <span style="color:red" ng-show="pw == null">Password is required!</span>
                                        <span style="color:red" ng-show="email.length == 0">Email is required!</span>
                                        <br>
                                        <br>
                                          
                                            <div class="clearfix pt-md">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn-danger btn" ng-click="submitForm()">Confirm</button>
                                                </div>
                                            </div>
                                    </form>


                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>


<!--/ Edit modal -->

<!--/ End Edit modal -->
<!-- / Add Modal -->

<!--/ End Add Modal -->
<!-- Error modal -->

<!--/ Error modal -->
<!-- Edit Error modal -->

<!--/ Edit Error modal -->
</div>
</div>

<script>
    var fetch = angular.module('myApp', ['ui.mask']);


    fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
    $scope.param = "<?php echo $_GET['at'];?>";
    $scope.selectedRow = null;
    $scope.selectedStatus = null;
    $scope.clickedRow = 0;
    $scope.new = {};
    $scope.password = {};
    $scope.confirmpassword = {};

                 if ($scope.param[0] == 2)		
				{
					$http({
							method: 'get',
							params: {accid : $scope.param},
							url: 'getData/get-admissionstaff-id.php'
						}).then(function(response) {	
                            $scope.Label = "Admission Staff ID";	
							$scope.users = response.data;
						});
				}	
				else if ($scope.param[0] == 3)
					{
						$http({
								method: 'get',
								params: {accid : $scope.param},
								url: 'getData/get-nurse-id.php'
							}).then(function(response) {	
                                $scope.Label = "Nurse ID";	
								$scope.users = response.data;
							});
					}
                    else if ($scope.param[0] == 4)
					{
						$http({
								method: 'get',
								params: {accid : $scope.param},
								url: 'getData/get-physician-id.php'
							}).then(function(response) {	
                                $scope.Label = "Physician ID";	
								$scope.users = response.data;
							});
					}
				else if ($scope.param[0] == 5)
					{
						$http({
								method: 'get',
								params: {accid : $scope.param},
								url: 'getData/get-pharmacystaff-id.php'
							}).then(function(response) {
                                $scope.Label = "Pharmacy Staff ID";		
								$scope.users = response.data;
							});
					}	
				else if ($scope.param[0] == 6)
					{
						$http({
								method: 'get',
								params: {accid : $scope.param},
								url: 'getData/get-billingstaff-id.php'
							}).then(function(response) {		
                                $scope.Label = "Billing Staff ID";
								$scope.users = response.data;
							});
					}


    $scope.submitForm = function(){


            if ($scope.pw == $scope.confirmpw && $scope.pw!=null && $scope.confirmpw!=null && $scope.email!=null)
            {
                        $http({
                        method: 'GET',
                        url: 'updateData/update-user-details.php',
                        params: {accesstype: $scope.param[0],
                                accountid: $scope.param,
                                email: $scope.email,
                                password: $scope.pw
                                }
                        }).then(function(response) {
                            if ($scope.param[0] == 3)
                            window.location.href = 'index.php?at=' + $scope.param;
                            else
                            window.location.href = 'user-profile.php?at=' + $scope.param;
                        });
                    
            }
            
 

        }


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


    $scope.goBack = function(){
                        window.history.back();
                    }
                    

    $scope.getPage = function(check) {
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

        case 'Pharmaceuticals':
            window.location.href = 'pharmacy.php?at=' + $scope.param;
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

        case 'LaboratoryDept':
            window.location.href = 'laboratorydept.php?at=' + $scope.at;
            break;

        default:
            break;
    }

    }


    }]);
</script>
</div>
<?php include 'footer.php'?>