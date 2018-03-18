<?php 
include 'admin-header.php' ?>
<style>
.selected {
color: #800000;
background-color: #F5F5F5;
font-weight: bold;
}
</style>
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Patients</a></li>
<li class="active"><a href="#">Outpatient</a></li>
</ol>
<div class="clearfix">
        <div class="pull-left">
            &emsp;
            <button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        </div>
</div>
<br>
<div class="container-fluid">
<div data-widget-group="group1">
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-profile">
                    <div class="panel-body" data-ng-repeat="patient in patients">
                        <img ng-src="{{patient.QRpath}}">
                        <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                        <div class="info">{{patient.AdmissionID}}</div>
                    </div>
                    </div><!-- panel -->
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="fa fa-stethoscope"></i>Order Details</a>  
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-8">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-about">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Details</h2>
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">  
                                        <fieldset data-ng-repeat="patient in patients">
                                            <div data-row-span="3">
                                                    <div data-field-span="1">
                                                        <label>Admission ID<br></label>
                                                        <input type="text" ng-model="patient.AdmissionID" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Gender<br></label>
                                                        <input type="text" ng-model="patient.Gender" ng-disabled='true'>
                                                    </div>
                                                </div>
                                            <div data-row-span="4">
                                                    <div data-field-span="1">
                                                        <label>Last Name</label>
                                                        <input type="text" ng-value="patient.Lastname" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>First Name</label>
                                                        <input type="text" ng-value="patient.Firstname" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Middle Name</label>
                                                        <input type="text" ng-value="patient.Middlename" ng-disabled='true'>
                                                    </div>
                                            </div>
                                            <div data-row-span="2">
                                                    <div data-field-span="1">
                                                        <label>Admission Type<br></label>
                                                        <input type="text" ng-model="patient.AdmissionType" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Admission<br></label>
                                                        <input type="text" ng-model="patient.Admission" ng-disabled='true'>
                                                    </div>
                                            </div>
                                        </fieldset>  
                                        <br>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Order Details</h2> 	<a class="pull-right"ng-click="viewReport()">Print Report &nbsp;<i class="ti ti-printer"></i></a>
                                    <!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div> -->
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">  
                                        <fieldset data-ng-repeat="order in orders">
                                            <div data-row-span="3">
                                                    <div data-field-span="1">
                                                        <label>Order ID<br></label>
                                                        <input type="text" ng-model="order.OrderID" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Physician Name<br></label>
                                                        <input type="text" ng-model="order.Dname" ng-disabled='true'>
                                                    </div>
                                                </div>
                                            <div data-row-span="4">
                                                    <div data-field-span="1">
                                                        <label>Findings </label>
                                                        <textarea autogrow ng-model="order.Find" ng-disabled='true'></textarea>
                                                    </div>
                                            </div>
                                        </fieldset>  
                                        <fieldset data-ng-repeat='medication in medications'>
                                            <div data-row-span="4">
                                                    <div data-field-span="1">
                                                        <label>Medicine NAme<br></label>
                                                        <input type="text" ng-model="medication.MedicineName + ' ' + medication.Dosage " ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                            <label>Interval<br></label>
                                                            <input type="text" ng-model="medication.Intake" ng-disabled='true'>
                                                        </div>
                                                    <div data-field-span="1">
                                                        <label>Quantity<br></label>
                                                        <input type="text" ng-model="medication.Quantity" ng-disabled='true'>
                                                    </div>
                                             </div>
                                             <div>
                                             <div data-row-span="2">
                                             
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                    </div><!-- .tab-content -->
                </div><!-- col-sm-8 -->
            </div>
        </div>
	
<script>
   var fetch = angular.module('myApp', ['angular-autogrow']);

   fetch.controller('userCtrl', ['$scope', '$http','$interval','$window', function($scope, $http,$interval,$window) {   
		$scope.at = "<?php echo $_GET['at'];?>";
        $scope.orderid = "<?php echo $_GET['orderid'];?>";
        $scope.id =  "<?php echo $_GET['id'];?>";

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
				
				case '7':
					$scope.User = "Secretary";
					break;
			
				default:
					break;
			}

		$http({
			method: 'get',
			url: 'getData/get-patient-details.php',
			params:{id: $scope.id}
		}).then(function(response) {
			$scope.patients = response.data;
		});

        $http({
			method: 'get',
			url: 'getData/get-medication-details.php',
			params:{id: $scope.id}
		}).then(function(response) {
			$scope.medications = response.data;	
		});

        $http({
			method: 'get',
			url: 'getData/get-final-order-details.php',
			params:{at: $scope.at,
                    id: $scope.id,
                    orderid: $scope.orderid}
		}).then(function(response) {
			$scope.orders = response.data;
		});
		   
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
				
                case 'LaboratoryDept':
                        window.location.href = 'laboratorydept.php?at=' + $scope.at;
                        break;

                case 'Logout':
                            window.location.href = '../logout.php?at=' + $scope.at;
                            break;

				default:
					break;
			}
		}
        $scope.goBack = function() {
                window.history.back();
            }

		
		

   }]);
</script>		
</div>
<?php include 'footer.php'?>