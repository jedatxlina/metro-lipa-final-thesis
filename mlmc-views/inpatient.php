<?php 
	  $activeMenu = "patients";	
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
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2>Currently Admitted</h2><a ng-click="viewReport()" class="pull-right"><i class="ti ti-printer"></i></a>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
							<div class="tab-container tab-midnightblue">
												<ul class="nav nav-tabs">
													<li class="active"><a href="#home1" data-toggle="tab"> Inpatient</a></li>
													<li><a href="#profile1" data-toggle="tab">Nursery</a></li>
													
												
												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="home1">
														<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
															<thead>
															<tr>
																
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
													<a ng-click="viewReport()">Print Report &nbsp;<i class="ti ti-printer"></i></a>
													<div class="tab-pane" id="profile1">
													<table id="nursery_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
														<thead>
														<tr>
															<th>Admission ID</th>
															<th>Last name</th>
															<th>First name</th>
															<th>Middle name</th>
															<th>Birthdate</th>
														</tr>
														</thead>
														<tbody>
														<tr ng-repeat="patient in patients" ng-class="{'selected': patient.AdmissionID == selectedRow}"  ng-click="setClickedRow(patient.AdmissionID)">
											
															<td>{{patient.AdmissionID}}</td>
															<td>{{patient.Lastname}}</td>
															<td>{{patient.Firstname}}</td>
															<td>{{patient.Middlename}}</td>
															<td>{{patient.Birthdate}}</td>
															</tr>
														</tbody>
													</table>
													</div>
												</div>
											</div>
							</div>
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
                        <a href="#" ng-click="relocatePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Transfer Patient</a>
                        <a href="#" ng-click="dischargePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i>Discharge</a>
                        <a href="#" ng-click="ReAdmitPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i> Re-Admit</a>
						<a href="#" ng-click="transferRequest()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i><span class="badge badge-primary"  ng-if="request > 0 ">{{request}}</span> Transfer Requests</a>
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
										<h2>Transfer Patient</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body" style="height: auto" data-ng-repeat="relocate in reldetails | limitTo:1">
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

										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Admission Number</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-init="admissno[$index] = relocate.AdmissionNo" ng-model="admissno[$index]" disabled>
												</div>
											</div>
										</div>

										<center><span><strong>Current Room</strong></span></center>	
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
												<label for="focusedinput" class="col-sm-3 control-label">Current Room</label>
												<div class="col-sm-5">
													<input type="text" class="form-control" ng-value="relocate.RoomType + ' ' + relocate.BedID" disabled>
													<input type="hidden" class="form-control" ng-init = "curroomtype[$index] = relocate.RoomType" ng-model="curroomtype[$index]" disabled>
													<input type="hidden" class="form-control" ng-init = "curroom[$index] = relocate.BedID" ng-model="curroom[$index]" disabled>
												</div>
											</div>
										</div>
										<center><span><strong>Transfer Details</strong></span></center>	
										<hr>
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Room Type</label>
												<div class="col-sm-5">
													<select ng-model="RoomType" class="form-control">
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
														<option value="ICU">ICU</option>
													</select>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="focusedinput" class="col-sm-3 control-label">Bed Number</label>
												<div class="col-sm-5">
													<select class="form-control" ng-options="data.BedID for data in bed |  filter:filterBed(RoomType)" ng-model="$parent.bedno" ng-disabled="RoomType==''">
														<option value="" disabled selected>Select Bed Number</option>
													</select>
												</div>
											</div>
										</div>
									</div>
											<div class="form-group">
												<label for="focusedinput" class="col-sm-7 control-label">Transfer Permanently</label>
												<div class="col-sm-5">
												<input type="checkbox" ng-model="perma" ng-click="transPermanent()">
												</div>
											</div>
									<div class="panel-footer">
										<button type="button" ng-click="ConfirmRelo()" class="btn btn-danger-alt pull-right">Confirm</button>
										<button type="button" data-dismiss="modal" class="btn btn-default-alt pull-right">Cancel</button>
									</div>
								</div>
							
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
										<h2>Room Transfer Patient</h2>
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

						<!-- Request modal -->
						<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<form class="form-horizontal" >
							<div class="modal-dialog" >
								<div class="panel panel-danger" data-widget='{"draggable": "false"}' >
									<div class="panel-heading">
										<h2>Transfer Patient</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body" style="height: auto">
										<center><span><strong>Registry Information</strong></span></center>
										<hr>
										<table id="request_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Patient Name</th>
                                                    <th>Current Room</th>
													<th>Transfer To</th>
                                                    <th>Request</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="val in details track by $index" ng-class="{'selected': val.ID == selectedRow}" ng-click="setClickedRow(val.ID)">
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{val.Fullname}}</td>
                                                    <td>{{val.Current}}</td>
													<td>{{val.BedID}}</td>
                                                    <td>{{val.SpecialRequest}}</td>
                                                </tr>
                                            </tbody>
                                        </table>

									</div>
									<div class="panel-footer">
										<button type="button" ng-click="requestAccept()" class="btn btn-danger-alt pull-right">Accept</button>
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
		$scope.admissno = [];
		$scope.curroom = [];
		$scope.curroomtype = [];
		$scope.perma = false;

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

			$http({
                method: 'get',
                url: 'getData/get-relocate-request-details.php'
                }).then(function(response) {
					$scope.request = response.data.length;
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

		$scope.accesstype = $scope.at[0];
        $http({
        	method: 'GET',
            url: 'getData/get-user-profile.php',
            params: {id: $scope.at,
                atype : $scope.accesstype}
        }).then(function(response) {
            $scope.userdetails = response.data;
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
	   
	   $scope.transferRequest = function(){
				$http({
					method: 'get',
					url: 'getData/get-relocate-request-details.php'
				}).then(function(response) {
						$scope.details = response.data;
						angular.element(document).ready(function() {
                                dTable = $('#request_table')
                                dTable.DataTable();
                            });
						$('#transferModal').modal('show');
				});
	   }

	   	   
		$scope.requestAccept = function(){
			if($scope.selectedRow != null){
				$scope.requestid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'updateData/update-relocate-request-details.php',
					params: {transid: $scope.requestid}
				}).then(function(response) {
					swal({
                        icon: "success",
                        title: "Successfully Accepted!",
                        text: "Redirecting in 2..",
                        timer: 2000
                    }).then(function() {
						window.location.reload(false);
                    }, function(dismiss) {
                        if (dismiss === 'cancel') {
						window.location.reload(false);
                        }
                    });
				});
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

		$scope.viewPatientDetails = function(){
			window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
		}
		

		$scope.ConfirmRelo = function(){
				alert($scope.perma);
			if($scope.bedno == null || $scope.RoomType == null)
			{
				$http({
					method: 'GET',
					url: 'updateData/update-beddura-details.php',
					params: {id: $scope.admissionid,
							admissno: $scope.admissno[0],
							bedno: $scope.bedno.BedID,
							Prev: $scope.curroom[0],
							PrevType: $scope.curroomtype[0],
							keeproom: $scope.perma}
				}).then(function(response) {
					window.location.reload();
				});
			}
			else
				alert('Complete The form');
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
			alert($scope.bednum);			
			window.location.href = 'insertData/insert-relocate-details.php?id=' + $scope.admissionid +'&relobed='+ $scope.bednum;
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
				
				case 'LaboratoryDept':
                    	window.location.href = 'laboratorydept.php?at=' + $scope.at;
						break;
						
				case 'Logout':
                        window.location.href = '../logout.php?at=' + $scope.at;
                        break;
						
				case 'Others':
                        window.location.href = 'migrate.php?at=' + $scope.at;
                        break;

				default:
					break;
			}
				
		}

   }]);
</script>	
<div id="custom-footer">
            
			</div>			
</div>
<?php include 'footer.php'?>