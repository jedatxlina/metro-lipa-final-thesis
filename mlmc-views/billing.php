<?php 
	  $activeMenu = "billing";	
?>
<?php include 'admin-header.php' ?>
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
<li class="active"><a href="emergency.php">Billing</a></li>
</ol>
<br><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	

	<br>
	<div data-widget-group="group1">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2>List of Patients</h2>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
							<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>Admission ID</th>
									<th>Admission No</th>
									<th>Admission Date</th>
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
                                        <td>{{user.AdmissionDate}}</td>
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
				</div>
				<div class="col-md-3">
				<div class="panel panel-danger widget-progress" data-widget='{"draggable": "false"}'>
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
						<a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i>Patient Details</a>
                        <a href="#" ng-click="postFee()"role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Post Professional Fee</a>
						<a href="#" ng-click="postDiscount()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Post Discounts</a>
						<a href="#" ng-click="postTransfers()"role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Post A/R Transfers</a>
                        <a href="#" ng-click="postStatement()"role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>SOA/Billing Statement</a>
                        <a href="#" ng-click="reprintReceipt()"role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Print Receipt Details</a>
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
				<!-- Proffesional Fee Module -->
				<div class="modal fade" id="patientModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: auto" data-ng-repeat="att in attendingdetails2">
									<center><span><strong>Attending Doctor Information</strong></span></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Attending ID</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" ng-value="att.AttID" ng-model="doctorid"  disabled> 
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Doctor Name</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="att.FullName" disabled>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Professional Fee</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-model='profee'>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
								<button type="button" ng-click="updateFees()" class="btn btn-danger-alt pull-right">Ok</button>
								<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal fade" id="postdiscount2modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: auto" data-ng-repeat="att in attendingdetails2">
									<center><span><strong>Attending Doctor Information</strong></span></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Attending ID</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" ng-value="att.AttID" ng-model="doctorid"  disabled> 
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Doctor Name</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="att.FullName" disabled>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Discounted Fee</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-model='disfee'>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
								<button type="button" ng-click="updateDiscount()" class="btn btn-danger-alt pull-right">Ok</button>
								<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- Post Room Chage -->
				<div class="modal fade" id="RoomChargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<form class="form-horizontal">
									<div class="modal-dialog">
										<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
											<div class="panel-heading">
												<h2>Patients Doctors List</h2>	
												<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
											</div>
											<div class="panel-body" style="height: auto">
												<center><span><strong>Doctors List</strong></span></center>
												<hr>
												<table id="medication_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
													<tr>
														<th>Attending ID</th>
														<th>Doctor Name</th>
														<th>Doctor Specialization</th>
													</tr>
													</thead>
													<tbody>
													<tr ng-repeat="doc in attendingdetails" ng-class="{'selected': doc.AttID == selectedRow}" ng-click="setClickedRow(doc.AttID)">
															<td>{{doc.AttID}}</td>
															<td>{{doc.FullName}}</td>
															<td>{{doc.SP}}</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="panel-footer">
													<button type="button" ng-click="postFees()" class="btn btn-default pull-left" data-dismiss="modal">Post Fees</button>
													<button type="button" class="btn btn-danger-alt pull-right" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</form>
				</div>
				<div class="modal fade" id="PostDiscountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<form class="form-horizontal">
									<div class="modal-dialog">
										<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
											<div class="panel-heading">
												<h2>Patients Doctors List</h2>	
												<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
											</div>
											<div class="panel-body" style="height: auto">
												<center><span><strong>Doctors List</strong></span></center>
												<hr>
												<table id="medication_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
													<tr>
														<th>Attending ID</th>
														<th>Doctor Name</th>
														<th>Doctor Specialization</th>
													</tr>
													</thead>
													<tbody>
													<tr ng-repeat="doc in attendingdetails" ng-class="{'selected': doc.AttID == selectedRow}" ng-click="setClickedRow(doc.AttID)">
															<td>{{doc.AttID}}</td>
															<td>{{doc.FullName}}</td>
															<td>{{doc.SP}}</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="panel-footer">
													<button type="button" ng-click="postDiscounts()" class="btn btn-default pull-left" data-dismiss="modal">Post Discount</button>
													<button type="button" class="btn btn-danger-alt pull-right" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</form>
				</div>
				<!-- Patient Modal -->
				<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: 400px" data-ng-repeat="patient in patientdetails">
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
												<input type="text" class="form-control"  ng-value="patient.AdmissionDate	" disabled>
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
								</div>
								<div class="panel-footer">
								<button type="button" ng-click="#" class="btn btn-danger-alt pull-left">View Details</button>
								<button type="button" ng-click="#" class="btn btn-danger-alt pull-right">Ok</button>
								<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="modal fade" id="moveInpatientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: 400px" ng-repeat="patient in getdetails">
									<center><span><strong>Registry Information</strong></span>
									<p><small>Data below will be moved to Inpatient section permanently</small></p></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Patient name</label>
											<div class="col-sm-8">
											<input type="text" class="form-control" ng-value="patient.Firstname + ' ' + patient.Middlename + ' ' + patient.Lastname" ng-model="new.Fullname" disabled>
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
											<label for="focusedinput" class="col-sm-3 control-label">Room Type</label>
											<div class="col-sm-5">
												<select ng-model="RoomType" class="form-control" >
												<option value="" disabled selected>Select Room Type</option>
												<option value="Ward">Ward</option>
												<option value="OB-Ward">OB-Ward</option>
												<option value="Female-Ward">Female-Ward</option>
												<option value="Male-Ward">Male-Ward</option>
												<option value="Pedia-Ward">Pedia-Ward</option>
												<option value="Surgical-Ward">Surgical-Ward</option>
												<option value="Semi-Private">Semi-Private</option>
												<option value="Private">Private</option>
												<option value="Suite">Suite</option>
												<option value="Infectious">Infectious</option>
											</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Bed Number</label>
											<div class="col-sm-5">
												<select class="form-control" ng-options="data.BedID for data in bed |  filter:filterBed(RoomType)"  ng-model="$parent.bedno" ng-disabled="RoomType!='Single Deluxe' && RoomType!='Two-Bedded' && RoomType!='Four-Bedded' && RoomType!='Ward'">
													<option value="" disabled selected>Select Bed Number</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
								<button type="button" ng-click="ConfirmInpatient()" class="btn btn-danger-alt pull-right">Confirm</button>
								<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
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

			var tick = function() {
                $scope.clock = Date.now();
                $scope.datetime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });		
			

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
		   
		$scope.setClickedRow = function(user) {
           $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
	   	}

		$scope.addPatient = function(){
			window.location.href = 'add-patient.php?id=' + 1;
		}
		$scope.postStatement = function(){
			if($scope.selectedRow != null){
			window.location.href = 'view-patient-bill.php?at=' + $scope.at + '&id=' + $scope.selectedRow;
			}
			else{
			$('#errorModal').modal('show');
			}
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
			$('#errorModal').modal('show');
			}
		}

		$scope.postFee = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-patient-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.patientdetails = response.data;
				});
				$http({
					method: 'get',
					url: 'getData/get-attending-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.attendingdetails = response.data;
					$scope.selectedRow = '';
				});
				$('#RoomChargeModal').modal('show');
			
			}
			else{
			$('#errorModal').modal('show');
			}
		}
		$scope.updateFees= function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'updateData/update-attending-profee.php',
					params: {id: $scope.selectedRow,
							fee:$scope.profee}
				}).then(function(response) {
					window.location.reload();
				});
			}
			else{
				$('#errorModal').modal('show');
			}
		}

		$scope.updateDiscount= function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'updateData/update-discount-fee.php',
					params: {id: $scope.selectedRow,
							fee:$scope.disfee}
				}).then(function(response) {
					window.location.reload();
				});
			}
			else{
				$('#errorModal').modal('show');
			}
		}

		$scope.postDoctorFees = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-attending-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.medicaldetails2 = response.data;
				});
				$('#patientModal2').modal('show');
			
			}
			else{
			$('#errorModal').modal('show');
			}
		}
		$scope.postDiscount = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-patient-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.patientdetails = response.data;
				});
				$http({
					method: 'get',
					url: 'getData/get-attending-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.attendingdetails = response.data;
					$scope.selectedRow = '';
				});
				$('#PostDiscountModal').modal('show');
			
			}
			else{
			$('#errorModal').modal('show');
			}
		}
		
		

		// $scope.postRoomCharges = function(){
		// 	if($scope.selectedRow != null){
		// 		$scope.admissionid = $scope.selectedRow;
		// 		$http({
		// 			method: 'get',
		// 			url: 'getData/get-medical-details.php',
		// 			params: {id: $scope.admissionid}
		// 		}).then(function(response) {
		// 			$scope.medicaldetails = response.data;
		// 		});
		// 		$('#RoomChargeModal').modal('show');
			
		// 	}
		// 	else{
		// 	$('#errorModal').modal('show');
		// 	}
		// }

		$scope.postFees = function(){
			if($scope.selectedRow != null){
				$('#patientModal2').modal('show');
				$scope.doctor = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-attending-details2.php',
					params: {id: $scope.doctor}
				}).then(function(response) {
					$scope.attendingdetails2 = response.data;
				});
			}
			else{
			$('#errorModal').modal('show');
			}
		}

		$scope.postDiscounts = function(){
			if($scope.selectedRow != null){
				$('#postdiscount2modal').modal('show');
				$scope.doctor = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-attending-details2.php',
					params: {id: $scope.doctor}
				}).then(function(response) {
					$scope.attendingdetails2 = response.data;
				});
			}
			else{
			$('#errorModal').modal('show');
			}
		}
		$scope.viewPatientDetails = function(){
			window.location.href = 'view-patient-details.php?id=' + $scope.selectedRow;
		}


		$scope.confirmBtn = function(){
			alert($scope.new.Firstname);
		}

		$scope.movePatient = function(){
        	if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
						method: 'GET',
						url: 'getData/get-patient-details.php',
						params: {id: $scope.admissionid},
						contentType:"application/json; charset=utf-8",
						dataType:"json"
						}).then(function(response) {
						$scope.getdetails = response.data;
					
					});
				$('#moveInpatientModal').modal('show');
				
          	}else{
            	$('#errorModal').modal('show');
           	}
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
        }


       $scope.ConfirmInpatient = function(){
			$http({
				method: 'GET',
				url: 'updateData/update-inpatient-details.php',
				params: {AdmissionID: $scope.selectedRow,
						BedID:$scope.bedno.BedID}
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

   }]);
</script>		
</div>
<?php include 'footer.php'?>