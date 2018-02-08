<?php 
include 'admission-header.php' ?>
<style>
.selected {
color: #800000;
background-color: #F5F5F5;
font-weight: bold;
}
</style>

<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li><a href="index.php">Patients</a></li>
<li class="active"><a href="inpatient.php">Inpatient</a></li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	
	
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Action Panel</h2>
							
							<div class="panel-ctrls">
								<a href="#" class="button-icon"><i class="ti ti-file"></i></a>
								<a href="#" class="button-icon"><i class="ti ti-mouse"></i></a>
								<a href="#" class="button-icon"><i class="ti ti-settings"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Details</span></a>
							<a href="#" ng-click="patientVitals()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Vitals</span></a>
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Doctors Order</span></a>
						</div>
					</div>
				</div>
				<!-- Error modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="alert alert-danger">
							Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
						</div>
					</div>
				</div>
				<!--/ Error modal -->

				<!-- Patient Modal -->
				<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form ng-repeat="patient in patientdetails">
						<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title">Patient Details</h2>
										<p>Data below belongs to <small><u>{{patient.Firstname}} {{patient.Middlename}} {{patient.Lastname}}</u></small> </p>
									</div>
									<div class="modal-body">
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>First Name</label> 
														<input type="text" class="form-control" ng-value="patient.Firstname" ng-model="new.Firstname" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Middle Name</label>
														<input type="text" class="form-control" ng-value="patient.Middlename" ng-model="new.Middlename" readonly="readonly">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Last Name</label> 
														<input type="text" class="form-control" ng-value="patient.Lastname" ng-model="new.Lastname" readonly="readonly"> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Gender</label> 
														<input type="text" class="form-control" ng-value="patient.Gender" ng-model="new.Gender" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Civilstatus</label> 
														<input type="text" class="form-control" ng-value="patient.Civilstatus" ng-model="new.Civilstatus" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Birthdate</label> 
														<input type="text" class="form-control" ng-value="patient.Birthdate" ng-model="new.Birthdate" readonly="readonly"> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Province</label> 
														<input type="text" class="form-control" ng-value="patient.Province" ng-model="new.Province" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>City</label> 
														<input type="text" class="form-control" ng-value="patient.City" ng-model="new.City" readonly="readonly"> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Contact</label> 
														<input type="text" class="form-control" ng-value="patient.Contact" ng-model="new.Contact" readonly="readonly"> 
													</div>
												</div>
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" ng-click="#" class="btn btn-primary-alt pull-left">View Details</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" ng-click="confirmBtn()" class="btn btn-primary">Confirm</button>
									</div>
							</div><!-- /.modal-content -->
						</div>
					</form>
				</div>
				<!-- Patient Modal -->
				<div class="modal fade" id="flagModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Newly Registered Inpatients</h4>
										<p>Confirmation of Patient's Arrival Tagging</p>
									</div>
									<div class="modal-body">
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" ng-click="confirmBtn()" class="btn btn-primary">Confirm</button>
									</div>
							</div><!-- /.modal-content -->
						</div>
				</div>
		
				
		</div>
	</div>
	
<script>
   var fetch = angular.module('myApp', []);
  

   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {   

		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};

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
            window.location.href = 'patient-vitals.php?id=' + $scope.selectedRow;
            }else{
                window.location.href = 'qr-scanner/index.php?type=patientvitals';
           }
       };


	   $scope.viewFlag = function(){
				$http({
					method: 'get',
					url: 'getData/get-inpatient-flags.php'
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

   }]);
</script>		
</div>
<?php include 'footer.php'?>