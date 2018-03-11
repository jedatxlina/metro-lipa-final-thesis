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
		<li class="active"><a href="#">Emergency</a></li>
	</ol>
	
<div class="container-fluid">	
	
	<div class="panel-body">
		<h3>Emergency<small> Section</small></h3>
	</div>	
	<div class="row">
		<div class="col-md-9">
				<button type="button" ng-click="addPatient()" class="btn btn-danger-alt pull-left"><i class="ti ti-user"></i>&nbsp;Add Patient</button>
		</div>
	</div>
	<br>
	<div data-widget-group="group1">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2>Emergency Patients</h2>	<a ng-click="viewReport()"> <i class="ti ti-printer pull-right"></i></a>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
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
						<a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Details</a>
                        <a href="#" ng-click="movePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Move to Inpatient</a>
						<a href="#" ng-click="movePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-o"></i>Move to Outpatient</a>
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

				  <!-- Search modal -->
				  <div class="modal fade" id="searchPatientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Patient Database Lookup</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: auto">
						<center><span><strong>Search Registry Information</strong></span></center>
                                <hr>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;Last Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" ng-model='lastname' class="form-control">
                                        </div>
									</div>
								</div>
								<br>
								<div class="row">
                                    <div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;First Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" ng-model='firstname' class="form-control">
                                        </div>
									</div>
								</div>
								<br>
								<div class="row">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;Middle Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" ng-model='middlename' class="form-control">
                                        </div>
									</div>
								</div>
								<br>
								<div class="row">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;Birthdate</label>
                                        <div class="col-sm-7">
											<input type="text" ng-model="" id="datepicker" class="form-control">
                                        </div>
									</div>
								</div>
								
						</div>
						<div class="panel-footer">
                            <button type="button" ng-click="searchPatient()" data-dismiss="modal" class="btn btn-danger pull-right">Search</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
			<!--/ Search modal -->
			
			  <!-- Search Result modal -->
			  <div class="modal fade" id="searchResultPatientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Patient Database Lookup</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: auto">
						<button type="button" ng-click="newPatient()" class="btn btn-danger-alt pull-left">New</button><center><span class="'pull-left"><strong>Search Registry Information Result</strong></span></center>
						<hr>
							<table id="results_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Birthdate</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="res in searchres" ng-class="{'selected': res.ArchiveID == selectedRow}" ng-click="setClickedRow(res.ArchiveID)">
                                            <td>{{res.Lastname}}</td>
                                            <td>{{res.Firstname}}</td>
                                            <td>{{res.Middlename}}</td>
                                            <td>{{res.Birthdate}}</td>
                                            <td>{{res.Gender}}</td>

                                        </tr>
                                    </tbody>
                            </table>
						</div>
						<div class="panel-footer">
						<button type="button" ng-click="searchResultView()" class="btn btn-danger-alt pull-left">View Details</button>
                            <button type="button" ng-click="searchPatientSelect()" data-dismiss="modal" class="btn btn-danger pull-right">Select</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Search Result modal -->

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
				
				<div class="modal fade" id="dischargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: auto">
									<center><span><strong>Patient Bill</strong></span></center>
									<hr>
									<div class="row" data-ng-repeat="bill in billdetails">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Bed Bill</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" ng-value="bill.totalbill"  disabled>
											</div>
										</div>
									</div>
									<div class="row" data-ng-repeat="bill in medicinebill2">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Medicine Name</label>
											<div class="col-sm-5">
												<input type="text" class="form-control"  ng-value="bill.mediname" disabled>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Medicine Quantity</label>
											<div class="col-sm-5">
												<input type="text" class="form-control"  ng-value="bill.quantity" disabled>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Medicine Price</label>
											<div class="col-sm-5">
												<input type="text" class="form-control"  ng-value="bill.price" disabled>
											</div>
										</div>
									</div>
									<div class="row" data-ng-repeat="bill in medicinebill">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Medicine Bill Total</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="bill.totalbill" disabled>
											</div>
										</div>
									</div>
									<br><br>
									<!--
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
									</div> -->
								
								</div>
								<div class="panel-footer">
									<button type="button" ng-click="viewPatientDetails()" class="btn btn-danger-alt pull-left">View Details</button>
									<button type="button" data-dismiss="modal" class="btn btn-danger pull-right">Ok</button>
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
  

   fetch.controller('userCtrl', ['$scope', '$http','$window','$interval', function($scope, $http,$window,$interval) {   
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
           url: 'getData/get-emergency-details.php'
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
			// window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1;
			$('#searchPatientModal').modal('show');
		}
		
		$scope.searchPatient = function(){
			$scope.birthdate =$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd" ).val();
			$('#searchPatientModal').modal('hide');
			$http({
				method: 'get',
				url: 'getData/get-search-details.php',
				params: {firstname: $scope.firstname,
				middlename: $scope.middlename,
				lastname: $scope.lastname,
				birthdate: $scope.birthdate}
			}).then(function(response) {
				$scope.searchres = response.data
				angular.element(document).ready(function() {  
				dTable = $('#results_table')  
				dTable.DataTable();  
			});  
				});
				$('#searchResultPatientModal').modal('show');
		}
            
		$scope.searchResultView = function(){
			if($scope.selectedRow != null){
            	$scope.archiveid = $scope.selectedRow;
				window.location.href = 'view-patient-data-archive.php?at=' + $scope.at + '&id=' + $scope.archiveid;
            }
            else{
            	$('#errorModal').modal('show');
            }
		}

	
		$scope.newPatient = function(){
			window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1;		
		}

		$scope.searchPatientSelect = function(){
			if($scope.selectedRow != null){
            	$scope.archiveid = $scope.selectedRow;
				window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1 + '&chk=' + $scope.archiveid;
            }
            	else{
            	$('#errorModal').modal('show');
            }
		}


		$scope.dischargePatient = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-bill-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.billdetails = response.data;
				});
				$http({
					method: 'get',
					url: 'getData/get-medication-bill.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.medicinebill = response.data;
				});
				$http({
					method: 'get',
					url: 'getData/get-medication-billdetailed.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.medicinebill2 = response.data;
				});
				$('#dischargeModal').modal('show');
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

		$scope.viewReport = function(){
			$window.open('try-report.php', '_blank');
		}

		$scope.viewPatientDetails = function(){
			window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
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
       };
	
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
						window.location.href = 'index.php?at=' + $scope.at
						break;
				case 'Emergency':
						window.location.href = 'emergency.php?at=' +  $scope.at;
						break;
				case 'Outpatient':
						window.location.href = 'outpatient.php?at=' +  $scope.at;
						break;
				case 'Inpatient':
						window.location.href = 'inpatient.php?at=' +  $scope.at;
						break;
						
				case 'Confined':
						window.location.href = 'nurse-patient.php?at=' +  $scope.at;
						break;
				
				case 'Physician':
						window.location.href = 'physician.php?at=' +  $scope.at;
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
						window.location.href = 'cashier.php?at=' +  $scope.at;
						break;
				
				case 'Accounts':
						window.location.href = 'user.php?at=' +  $scope.at;
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