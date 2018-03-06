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
                        <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> About </a>
                        <a href="#tab-diagnosis" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Diagnosis Details</a>
                        <a href="#tab-order" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-time"></i>Order Details</a>
                      
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-8">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-about">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Profile</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <h4>Personal Information</h4>
                                            <div class="table-responsive">
                                            <table class="table" data-ng-repeat="patient in patients">
                                                <tbody>
                                                <tr>
                                                    <th>Admission ID</th>
                                                    <td>{{patient.AdmissionID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission No</th>
                                                    <td>{{patient.AdmissionNo}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admisison Date</th>
                                                    <td>{{patient.AdmissionDate}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admisison Time</th>
                                                    <td>{{patient.AdmissionTime}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission</th>
                                                    <td>{{patient.Admission}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission Type</th>
                                                    <td>{{patient.AdmissionType}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-diagnosis">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Diagnosis</h2><a ng-click="viewReport()" class="pull-right">Print Report &nbsp;<i class="ti ti-printer"></i></a>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <h4>Diagnosis Details</h4>
                                            <div class="table-responsive">
                                            <table class="table" data-ng-repeat="diag in diagnosis">
                                                <tbody>
                                                <tr>
                                                    <th>Diagnosis ID</th>
                                                    <td>{{diag.DiagnosisID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Attending Physician</th>
                                                    <td>{{diag.Lname}}, {{diag.Fname}} {{diag.Mname}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Diagnosed</th>
                                                    <td>{{diag.DateDiagnosed}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Time Diagnosed</th>
                                                    <td>{{diag.TimeDiagnosed}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Findings</th>
                                                    <td>{{diag.Findings}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-order">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Order</h2><a ng-click="viewReport()" class="pull-right">Print Report &nbsp;<i class="ti ti-printer"></i></a>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <h4>Order Details</h4>
                                            <div class="table-responsive">
                                            <table class="table" data-ng-repeat="order in orders">
                                                <tbody>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <td>{{order.OrderID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission ID</th>
                                                    <td>{{order.AdmissionID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Attending Physician</th>
                                                    <td>{{order.Lname}}, {{order.Fname}} {{order.Mname}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Task</th>
                                                    <td>{{order.Task}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Laboratory</th>
                                                    <td>{{order.LaboratoryID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Order</th>
                                                    <td>{{order.DateOrder}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Time Order</th>
                                                    <td>{{order.TimeOrder}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{order.Status}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .tab-content -->
                </div><!-- col-sm-8 -->
            </div>
        </div>
	
<script>
   var fetch = angular.module('myApp', []);

   fetch.controller('userCtrl', ['$scope', '$http','$interval','$window', function($scope, $http,$interval,$window) {   
		$scope.at = "<?php echo $_GET['at'];?>";
        $scope.id = "<?php echo $_GET['id'];?>";
  

		// var pusher = new Pusher('c23d5c3be92c6ab27b7a', {
		// cluster: 'ap1',
		// encrypted: true
	  	// });
  
		// var channel = pusher.subscribe('my-channel');
		// channel.bind('my-event', function(data) {
		
		// 	console.log(data.message);
		// 	swal({
		// 		icon: "success",
		// 		title: "New Physician Order!",
		// 		text: data.message
		// 		}).then(function () {
		// 	});

			// $http({
			// method: 'get',
			// url: 'getData/get-order-details.php',
			// params:{id:$scope.at}
			// }).then(function(response) {
			// 	$scope.orders = response.data;	
			// 	angular.element(document).ready(function() {  
			// 	dTable = $('#orders_table')  
			// 	dTable.DataTable();  
			// 	});  
			// });

	  	// });

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
			url: 'getData/get-diagnosis-details.php',
			params:{at: $scope.at,
                    id: $scope.id}
		}).then(function(response) {
			$scope.diagnosis = response.data;	
		});

        $http({
			method: 'get',
			url: 'getData/get-final-order-details.php',
			params:{at: $scope.at,
                    id: $scope.id}
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

				default:
					break;
			}
		}
		
		

   }]);
</script>		
</div>
<?php include 'footer.php'?>