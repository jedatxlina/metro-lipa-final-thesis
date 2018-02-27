<?php include 'admin-header.php' ?>
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

<div class="container-fluid">
	<div class="panel-body">
	<h3>Inpatient<small> Section</small></h3>
	</div>	
	<div data-widget-group="group1">
		
			<div class="row">
				<div class="col-md-9">
					
				<div class="tab-container tab-midnightblue">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#home1" data-toggle="tab">Inpatient</a></li>
										<li><a href="#profile1" data-toggle="tab">Nursery</a></li>
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Something</a></li>
												<li><a href="#">Something Else</a></li>
												<li class="divider"></li>
												<li><a href="#">And one more thing</a></li>
											</ul>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="home1">
										<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
											<tr>
												<th>Admission ID</th>
												<th>Admission No</th>
												<th>Admission Date</th>
												<th>Admission Time</th>
												<th>Full name</th>
												<th>Admission</th>
												<th>Admission Type</th>
												<th>Gender</th>
											</tr>
											</thead>
											<tbody>
											<tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID)">
												<td>{{user.AdmissionID}}</td>
												<td>{{user.AdmissionNo}}</td>
												<td>{{user.AdmissionDate}}</td>
												<td>{{user.AdmissionTime}}</td>
												<td>{{user.Lname}}, {{user.Fname}} {{user.Mname}} </td>
												<td>{{user.Admission}}</td>
												<td>{{user.AdmissionType}}</td>
												<td>{{user.Gender}}</td>
												</tr>
											</tbody>
										</table>
										</div>
              							<div class="tab-pane" id="profile1">
										  <table id="nursery_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
											<tr>
												<th>Nursery ID</th>
												<th>Admission ID</th>
												<th>Last name</th>
												<th>First name</th>
												<th>Middle name</th>
												<th>Birthdate</th>
												<th>Delivery Type</th>
											</tr>
											</thead>
											<tbody>
											<tr ng-repeat="patient in patients" ng-class="{'selected': patient.NurseryID == selectedRow}"  ng-click="setClickedRow(patient.NurseryID)">
												<td>{{patient.NurseryID}}</td>
												<td>{{patient.AdmissionID}}</td>
												<td>{{patient.Lastname}}</td>
												<td>{{patient.Firstname}}</td>
												<td>{{patient.Middlename}}</td>
												<td>{{patient.Birthdate}}</td>
												<td>{{patient.Deliverytype}}</td>
												</tr>
											</tbody>
										</table>

										</div>
				  					</div>
								</div>
				</div>
				<div class="col-md-3">
					<br><br>
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
					<div class="list-group list-group-alternate mb-n nav nav-tabs">
						<a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
						<a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Details</a>
                        <a href="#" ng-click="relocatePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Relocate Patient</a>
                        <a href="#" ng-click="dischargePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i>Discharge</a>
                        <a href="#" ng-click="ReAdmitPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i> Re-Admit</a>
                    </div>
				</div>

				<!-- Error modal -->
				<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
											<label for="focusedinput" class="col-sm-3 control-label">Admission Date</label>
											<div class="col-sm-5">
												<input type="text" class="form-control"  ng-value="patient.AdmissionDate" disabled>
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
								<button type="button" ng-click="viewPatientDetails()" class="btn btn-danger-alt pull-left">View Details</button>
								<button type="button" data-dismiss="modal" class="btn btn-danger pull-right">Ok</button>
								</div>
							</div>
						</div>
					</form>
				</div>
					<!-- Relocate modal -->
					<div class="modal fade" id="relocateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<form class="form-horizontal" >
							<div class="modal-dialog" >
								<div class="panel panel-danger" data-widget='{"draggable": "false"}' >
									<div class="panel-heading">
										<h2>Relocate Patient</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body" style="height: 450px" data-ng-repeat="relocate in reldetails">
										<center><span><strong>Registry Information</strong></span></center>
										<hr>

										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Patient name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" ng-value="relocate.Lastname + ', ' + relocate.Firstname + ' ' + relocate.Middlename"  disabled>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Admission ID</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-value="relocate.AdmissionID" disabled>
												</div>
											</div>
										</div>

										<center><span><strong>Relocate Patient Details</strong></span></center>	
										<hr>

										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Floor Level</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-value="relocate.Floor" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Room Type</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-value="relocate.RoomType" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Room No</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-value="relocate.Room" disabled>
												</div>
											</div>
										</div>
									</div>

									<div class="panel-footer">
										<button type="button" ng-click="relocateNext()" class="btn btn-danger-alt pull-right">Next</button>
										<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
									</div>
								</div>
								<!-- <div class="alert alert-danger">
									Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
								</div> -->
							</div>
						</form>
					</div>
					<!--/ Relocate modal -->
				
					<!-- Relocate next modal -->
					<div class="modal fade" id="relocateNextModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<form class="form-horizontal" >
							<div class="modal-dialog" >
								<div class="panel panel-danger" data-widget='{"draggable": "false"}' >
									<div class="panel-heading">
										<h2>Relocate Patient</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body" style="height: 250px">
										<center><span><strong>Relocate Patient To</strong></span></center>	
										<hr>

										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Floor Level</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-value="floor" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Room Type</label>
												<div class="col-sm-5">
													<select ng-model="RoomType" class="form-control" >
														<option value="" disabled selected>Select Room Type</option>
														<option value="Single Deluxe" >Single Deluxe</option>
														<option value="Two-Bedded" >Two-Bedded</option>
														<option value="Four-Bedded" >Four-Bedded</option>
														<option value="Ward" >Ward</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Room No</label>
												<div class="col-sm-5">
													<select class="form-control" ng-options="data.BedID for data in bed |  filter:filterBed(RoomType)"  ng-model="$parent.bedno" ng-change="filterFloor()" ng-disabled="RoomType!='Single Deluxe' && RoomType!='Two-Bedded' && RoomType!='Four-Bedded' && RoomType!='Ward'">
														<option value="" disabled selected>Select Bed Number</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="panel-footer">
										<button type="button" ng-click="relocateFinal()" class="btn btn-danger-alt pull-right">Next</button>
										<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!--/ Relocate modal -->
		</div>
	</div>
	
<script>
   var fetch = angular.module('myApp', []);
  

   fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {   
		$scope.at = "<?php echo $_GET['at'];?>";
		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};
		$scope.order = 0;
		$scope.notif = 0;

		var pushalert = function (){
			alert('jed');
		}	
		var tick = function() {
			$scope.clock = Date.now();
			$scope.datetime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });		
			
			$http({
					method: 'get',
					url: 'getData/get-inpatient-flags.php',
					params:{id:$scope.selectedRow}
				}).then(function(response) {
					$scope.notif = response.data.length;
					
				});
				
			
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
		   
		$http({
            method: 'GET',
            url: 'getData/get-bed-details.php',
            contentType:"application/json; charset=utf-8",
            dataType:"json"
        }).then(function(response) {
            $scope.bed = response.data;
        });

		   
		$http({
            method: 'GET',
            url: 'getData/get-baby-details.php'
        }).then(function(response) {
            $scope.patients = response.data;
			angular.element(document).ready(function() {  
			dTable = $('#nursery_table')  
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
				if( $scope.selectedRow.indexOf('-') >= 0){
                            alert('jed');
				}else{
					$http({
						method: 'get',
						url: 'getData/get-patient-details.php',
						params: {id: $scope.admissionid}
					}).then(function(response) {
						$scope.patientdetails = response.data;
					});
					$('#patientModal').modal('show');
				}
			}
			else{
			$('#errorModal').modal('show');
			}
		}

		$scope.viewPatientDetails = function(){
			window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
		}
		


		$scope.confirmBtn = function(){
			alert($scope.new.Firstname);
		}

		$scope.relocatePatient = function(){
			
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'GET',
					url: 'getData/get-relocate-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.reldetails = response.data;
				});
				$('#relocateModal').modal('show');
			}
			else{
			$('#errorModal').modal('show');
			}

		}

		$scope.relocateNext = function(){
			$('#relocateModal').modal('hide');
			$('#relocateNextModal').modal('show');
		}
	
        $scope.filterBed = function (param) {
            return function (bed) {
                if (bed.RoomType == param)
                {
                    if (bed.Status == 'Available')
                    return true;
                }
                return false;
            };
        };

		$scope.filterFloor = function () {
			$scope.param = $scope.bedno.BedID;
			switch ($scope.param.charAt(0)) {
				case '1':	$scope.floor = '1st';
							break;
				case '2':	$scope.floor = '2nd';
							break;
				case '3':	$scope.floor = '3rd';
							break;
			
				default:	$scope.floor = '';
							break;
			}
			
		
        };

		$scope.relocateFinal = function () {
			window.location.href = 'insertData/insert-relocate-details.php?id=' + $scope.admissionid;
        };

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