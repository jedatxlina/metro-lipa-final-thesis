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
<li class="active"><a href="#">Inpatient</a></li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	<div class="row">
		<div class="col-md-9">
                <br>
				<a href="qr-scanner/index.php?type=addpatientvitals" class="btn btn-danger-alt pull-left"><i class="fa fa-qrcode"></i>&nbsp;&nbsp;Scan</a>
				
	
		</div>
	</div>
	<br>
	<div data-widget-group="group1">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Inpatient Patients</h2>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
							<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>Admission ID</th>
									<th>Admission No</th>
									<th>Admission Date-Time</th>
									<th>Full name</th>
									<th>Admission</th>
									<th>Admission Type</th>
									<th>Gender</th>
									<th>Province</th>
								</tr>
								</thead>
								<tbody>
								<tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID)">
                                        <td>{{user.AdmissionID}}</td>
                                        <td>{{user.AdmissionNo}}</td>
                                        <td>{{user.AdmissionDateTime}}</td>
                                        <td>{{user.Lname}}, {{user.Fname}} {{user.Mname}} </td>
                                        <td>{{user.Admission}}</td>
                                        <td>{{user.AdmissionType}}</td>
                                        <td>{{user.Gender}}</td>
                                        <td>{{user.Province}}</td>
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer"></div>
					</div>
					<div class="alert alert-dismissable alert-info">
							&nbsp; 	<a href="#" ng-click="viewFlag()" <i class="ti ti-flag-alt"></i></a>&nbsp;&nbsp;Click the flag to view newly registered inpatient and confirm for tagging.
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-midnightblue widget-progress" data-widget='{"draggable": "false"}'>
						<div class="panel-heading">
							<h2>Current Time</h2>
							<div class="panel-ctrls button-icon-bg" 
								data-actions-container="" 
								data-action-refresh-demo='{"type": "circular"}'
								>
							</div>
						</div>
						<div class="panel-footer">
							<div class="tabular">
								<div class="tabular-row">
									<div class="tabular-cell">
										<span class="status-total">Date</span>
										<span class="status-value">	{{ clock | date:'MMM d, y'}}</span>
									</div>
									<div class="tabular-cell">
										<span class="status-pending">Time</span>
										<span class="status-value">	{{ clock | date:'h:m:s a'}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="panel panel-default">
						<div class="panel-heading">
							<h2>Action Panel</h2>
						</div>
						
						
						<div class="panel-body">
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Details</span></a>
							<a href="#" ng-click="patientVitals()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Vitals</span></a>
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Doctors Order</span></a>
						</div>
					</div> -->
					<div class="list-group list-group-alternate mb-n nav nav-tabs">
						<a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
						<a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Details</a>
                        <a href="#" ng-click="patientVitals()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Patient Vitals</a>
                        <a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary">1</span> <i class="ti ti-email"></i>Doctors Order</a>
                        <a href="#" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-danger" ng-if="notif > 0">{{notif}}</span><i class="ti ti-bell"></i> Notifcations</a>
                    </div>
				</div>
					
				<!-- Error modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Error:</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: 60px">
							Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
							</div>
							<!-- <div class="panel-footer">
								<span class="text-gray"><em>Footer</em></span>
							</div> -->
						</div>
						<!-- <div class="alert alert-danger">
							Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
						</div> -->
					</div>
				</div>
				<!--/ Error modal -->


				<!-- Patient Modal -->
				<!-- Patient Modal -->
				<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: 550px" data-ng-repeat="patient in patientdetails">
									<center><span><strong>Registry Information</strong></span></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Patient name</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" ng-value="patient.Lastname + ', ' + patient.Firstname + ' ' + patient.Middlename"  disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission ID</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="patient.AdmissionID" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission Date Time</label>
											<div class="col-sm-5">
												<input type="text" class="form-control"  ng-value="patient.AdmissionDateTime" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="patient.Admission" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission Type</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="patient.AdmissionType" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">QR Code</label>
											<div class="col-sm-5">
											<center> <img ng-src="{{patient.QRpath}}">
											</div>
										</div>
									</div>
								
								</div>
								<div class="panel-footer">
								<button type="button" ng-click="#" class="btn btn-danger-alt pull-left">View Details</button>
								<button type="button" data-dismiss="modal" class="btn btn-danger pull-right">Ok</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				<div class="modal fade" id="flagModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Newly Registered Inpatients</h2>
									
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: 500px">
									<center><span><strong>Registry Information</strong></span></center>
									<hr>
									<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="80%">
										<thead>
										<tr>
											<th>Patients Name</th>
											<th>Admission ID</th>
											<th>Admission Date</th>
											<th>Bed ID</th>
											<th>Medical ID</th>
										</tr>
										</thead>
										<tbody>
										<tr ng-repeat="patient in flagPatients" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID)">
												<td>{{patient.Lname}}, {{patient.Fname}} {{patient.Mname}}</td>
												<td>{{patient.AdmissionID}}</td>
												<td>{{patient.AdmissionDateTime}}</td>
												<td>{{patient.BedID}}</td>
												<td>{{patient.MedicalID}}</td>
												<td></td>
											</tr>
										</tbody>
									</table>

								
								</div>
								<div class="panel-footer">
										<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
										<button type="button" ng-click="confirmBtn()" class="btn btn-danger pull-right">Confirm</button>
								</div>
							</div>
						</div>
					</form>
				</div>
		
				
		</div>
	</div>
	
<script>

   var fetch = angular.module('myApp', []);
  

   fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {   
		$scope.at = "<?php echo $_GET['at'];?>";
		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};
		$scope.notif = 0;

		var tick = function() {
			$scope.clock = Date.now();
			$scope.datetime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });		
			// if($scope.try == $scope.datetime){
			// 	alert('jed');
			// }
		}
		
		tick();
		$interval(tick, 1000);

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
           method: 'get',
           url: 'getData/get-inpatient-details.php'
       	}).then(function(response) {
		 	$scope.users = response.data;
			angular.element(document).ready(function() {  
			dTable = $('#patient_table')  
			dTable.DataTable();  
			});  
		});
		   
		$scope.addPatient = function(){
			window.location.href = 'add-patient.php?id=' + 1;
		}

		$scope.setClickedRow = function(user) {
           $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
	   }
	   
	  
		$scope.viewPatient = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-patient-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.patientdetails = response.data;
				});
				$('#patientModal').modal('show');
			
			}
			else{
			$('#myModal').modal('show');
			}
		}


		$scope.confirmBtn = function(){
			alert($scope.new.Firstname);
		}

        $scope.patientVitals = function(){
            if($scope.selectedRow != null){
            window.location.href = 'patient-vitals.php?at=' + $scope.at + '&id=' + $scope.selectedRow;
            }else{
                window.location.href = 'qr-scanner/index.php';
           }
       };


	   $scope.viewFlag = function(){
				$http({
					method: 'get',
					url: 'getData/get-inpatient-flags.php',
					params:{id:$scope.selectedRow}
				}).then(function(response) {
					$scope.flagPatients = response.data;
				});
				$('#flagModal').modal('show');
		}


		$scope.confirmBtn = function(user){
	
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'updateData/update-inpatient-flag.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
				window.location.reload();
				});
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

   }]);
</script>		
</div>
<?php include 'footer.php'?>