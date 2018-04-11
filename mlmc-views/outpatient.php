<?php 
	  $activeMenu = "patients";	
?>
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

<div class="container-fluid" >
    <div class="panel-body">
        <h3>Outpatient<small> Section</small></h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" ng-click="addPatient()" class="btn btn-danger-alt pull-left"><i class="ti ti-user"></i>&nbsp;Add Patient</button>
        </div>
    </div>
    <br>
    <div data-widget-group="group1" >
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h2>Outpatient Patients</h2><a ng-click="viewReport()" class="pull-right"><i class="ti ti-printer"></i></a>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Outpatient ID</th>
                                    <th>Admission Date/Time</th>
                                    <th>Full name</th>
                                    <th>Admission</th>
                                    <th>Admission Type</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID)">
                                    <td>{{user.AdmissionID}}</td>
                                    <td>{{user.AdmissionDate}} {{user.AdmissionTime}}</td>
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
                        <div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-refresh-demo='{"type": "circular"}'>
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
                    <a href="#" ng-click="dischargePatient('move')" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Move to Emergency</a>
                    <a href="#" ng-click="viewOrder()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary"  ng-if="notifs > 0">{{notifs}}</span> <i class="ti ti-email"></i>Doctors Order</a>
                    <a href="#" ng-click="dischargePatient('pay')" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i>Post Charge</a>
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
                            Select Outpatient record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                        </div>
                    </div>
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
                                            <input type="text" class="form-control" ng-value="patient.Lastname + ', ' + patient.Firstname + ' ' + patient.Middlename" disabled>
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
                                            <input type="text" class="form-control" ng-value="patient.AdmissionDate" disabled>
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

            <!-- Doctor Order Modal -->
            <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <form class="form-horizontal">
                    <div class="modal-dialog">
                        <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Posted Physician Orders</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" style="height: 500px">
                                <center><span><strong>Physician Orders</strong></span></center>
                                <hr>
                                <table id="orders_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Patient Name</th>
                                            <th>Physician Name</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="order in orders" ng-class="{'selected': order.OrderID == selectedRow}" ng-click="setClickedRow(order.OrderID,order.AdmissionID)">
											<td>{{order.OrderID}}</td>
											
                                            <td>{{order.Dname}}</td>
                                            <td>{{order.Pname}}</td>
                                            <td>{{order.Task}}</td>
                                            <td>{{order.Status}}</td>

                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                            <div class="panel-footer">
                                <button type="button" ng-click="viewOrderDetails()" class="btn btn-danger-alt pull-left">View Details</button>
                                <button type="button" ng-click="acceptOrder()" data-dismiss="modal" class="btn btn-danger pull-right">Accept</button>
                                <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Doctor Order Modal -->

            <!-- Discharge Modal -->
            <div class="modal fade" id="dischargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="static">
                <form>
                    <div class="modal-dialog">
                        <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Post Charges</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" style="height: auto">
                                <center><span><strong>Post Outpatient Charges</strong></span></center>
                                <br>
                                <div class="row" data-ng-repeat="physician in physiciandetails">
										<div class="col-md-6">
											<div class="form-group">
												<label>Physician Name</label>
												<input type="text" class="form-control" ng-model="$parent.namephysician" ng-init="$parent.namephysician = physician.Firstname + ' ' + physician.Middlename + ' ' + physician.Lastname" disabled="disabled">
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label>Fee</label>
												<input type="text" class="form-control" ng-model="$parent.fee" ng-init="$parent.fee = physician.Rate" disabled>	
												<small><input type="checkbox" ng-model="senior" ng-click="seniorClick()" ng-disabled="$parent.fee == 0"> Senior Citizen </small>
												<small><input type="checkbox" ng-model="hmo" ng-click="hmoClick()"> HMO </small>	
											</div>
										</div>
                                </div>

								<div class="row" data-ng-repeat="patient in outpatientdetails">
										<div class="col-md-6">
											<div class="form-group">
												<label>Patient Name</label>
												<input type="text" class="form-control" ng-model="$parent.namepatient" ng-init="$parent.namepatient = patient.Fname + ' ' + patient.Mname + ' ' + patient	.Lname" disabled="disabled">
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label>Admission Date-Time</label>
												<input type="text" class="form-control" ng-model="$parent.admitdatetime" ng-init="$parent.admitdatetime = patient.AdmissionDate + ' ' + patient.AdmissionTime" disabled="disabled">	
											</div>
										</div>
										<input type="hidden" ng-model="$parent.idpatient" ng-init="$parent.idpatient = patient.AdmissionID">
                                </div>

								<div class="row" ng-if="hmo == 'true'">
									<div class="col-md-6">
										<div class="form-group">
											<label>Accredited Providers</label>
											<select class="form-control" ng-model="$parent.hmoprovider">
                                                <option value="" disabled selected>Select Guarantor</option>
                                            	<option ng-repeat="hmo in hmolist" value="{{hmo.Provider}}" ng-init="$parent.hmoprovider = hmo.Provider">{{hmo.Provider}}</option>
                                            </select>
										</div>
									</div>
                                </div>

								<div class="row" ng-if="senior == 'true'">
									<div class="col-md-3">
										<div class="form-group">
											<label>Total Bill</label>
											<input type="text" class="form-control" ng-model="totalfee" ng-disabled="hmo == 'true'" disabled>	
										</div>
									</div>
                                </div>

                                <div class="panel-footer">
                                    <button type="button" ng-click="dischargeConfirm()" data-dismiss="modal" class="btn btn-danger pull-right">Discharge</button>
                                    <button type="button" ng-click="clearCheckBox()" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
                <!-- Discharge Modal -->
            </div>
        </div>

        <script>
            var fetch = angular.module('myApp', []);
            
               fetch.controller('userCtrl', ['$scope', '$http','$interval','$window', function($scope, $http,$interval,$window) {   
            		$scope.at = "<?php echo $_GET['at'];?>";
            		$scope.selectedRow = null;
            		$scope.clickedRow = 0;
            		$scope.new = {};
            		$scope.order = 0;
					$scope.senior = 'false';
					$scope.hmo = 'false';
					$scope.hmoprovider = '';	

            		$('#patient_table').on('search.dt', function() {
            			var value = $('.dataTables_filter input').val();
            			$scope.val = value;
            		});    
            
            		var pusher = new Pusher('c23d5c3be92c6ab27b7a', {
            		cluster: 'ap1',
            		encrypted: true
            	  	});
              
            		var channel = pusher.subscribe('my-channel-outpatient');
            		channel.bind('my-event-outpatient', function(data) {
            		
            			console.log(data.message);
            			swal({
            				icon: "success",
            				title: "New Physicisan Order!",
            				text: data.message
            				}).then(function () {
            			});
            
            			$http({
            			method: 'get',
            			url: 'getData/get-order-details.php',
            			params:{id:$scope.at}
            			}).then(function(response) {
            				$scope.orders = response.data;	
            				angular.element(document).ready(function() {  
            				dTable = $('#orders_table')  
            				dTable.DataTable();  
            				});  
            			});
            
            	  	});
            
            		var pushalert = function (){
            			alert('jed');
            		}	
					
            		var tick = function() {
            			
            			$scope.clock = Date.now();
            			$scope.datetime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });		
            			
            			$http({
            				method: 'get',
            				url: 'getData/get-order-details.php',
            				params:{id:$scope.at}
            			}).then(function(response) {
            				$scope.notifs = response.data.length;	
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
            				
            				case '7':
            					$scope.User = "Secretary";
            					break;
            			
            				default:
            					break;
            			}
            
            	
            
            		$http({
            			method: 'get',
            			url: 'getData/get-order-details.php',
            			params:{id:$scope.at}
            		}).then(function(response) {
            			$scope.orders = response.data;	
            			angular.element(document).ready(function() {  
            			dTable = $('#orders_table')  
            			dTable.DataTable();  
            			});  
            		});
            		   
            		$http({
            			method: 'get',
            			url: 'getData/get-outpatient-details.php',
            			params: {id: $scope.at}
            			}).then(function(response) {
            				$scope.users = response.data;
            				angular.element(document).ready(function() {  
            				dTable = $('#patient_table')  
            				dTable.DataTable();  
            				});  
            		});

					   
					$http({
            			method: 'get',
            			url: 'getData/get-hmo-providers.php'
            			}).then(function(response) {
            				$scope.hmolist = response.data;
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
            
            		$scope.addPatient = function(){
            			// window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 0;
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
						window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 0;		
					}

					$scope.searchPatientSelect = function(){
						if($scope.selectedRow != null){
            				$scope.archiveid = $scope.selectedRow;
							window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 0 + '&chk=' + $scope.archiveid;
            			}
            			else{
            			$('#errorModal').modal('show');
            			}
					}

            		$scope.setClickedRow = function(user,param) {
                       $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
                       $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;

					   $scope.orderadmissionid = param;
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
            
            		$scope.movePatient = function(){
                   
                   	}
            	   
            		$scope.viewOrder = function(){
            			$('#orderModal').modal('show');
            		}
            
            		$scope.acceptOrder = function(){
            			$scope.id = $scope.selectedRow;
            			$http({
            					method: 'get',
            					url: 'updateData/update-order-details.php',
            					params: {id: $scope.id}
            				}).then(function(response) {
            					console.log(response);
            					window.location.reload();
            				});
            		}
            
            		$scope.viewOrderDetails = function(){
            			$scope.id = $scope.selectedRow;
            			window.location.href = 'view-order-details.php?at=' + $scope.at + '&id=' + $scope.orderadmissionid + '&orderid=' + $scope.id;
					
            		}
            
            		$scope.dischargePatient = function(param){
						$scope.redirect = param;
						
            			if($scope.selectedRow != null){

            				$scope.patient = $scope.selectedRow;

							$http({
            					method: 'GET',
            					url: 'getData/get-physician-details.php',
            					params: {at: $scope.at,
										admissionid: $scope.patient}
            				}).then(function(response) {
								$scope.physiciandetails = response.data;
            				});
							$http({
            					method: 'GET',
            					url: 'getData/get-outpatient-discharge.php',
            					params: {id: $scope.at,
										admissionid: $scope.patient}
            				}).then(function(response) {
								$scope.outpatientdetails = response.data;
            				});
							$('#dischargeModal').modal('show');	
            			}
            			else{
            			$('#errorModal').modal('show');
            			}
			
            		}

					$scope.seniorClick = function(){
					
						$http({
            				method: 'GET',
            				url: 'getData/get-discount-details.php'
            			}).then(function(response) {
							$scope.scdiscount = JSON.parse(response.data);

							$scope.disc = '.' + $scope.scdiscount;

							$scope.discount = parseFloat($scope.disc);

							if($scope.senior == 'true'){
							$scope.senior = 'false';
							}else{
								$scope.senior = 'true';
								$scope.totalfee = $scope.fee - ($scope.fee*$scope.discount);
							}
						});
						
					}

					$scope.clearCheckBox = function(){
						
						$scope.senior = 'false';
						$scope.hmo = 'false';
					}

					$scope.hmoClick = function(){
						$http({
            				method: 'GET',
            				url: 'getData/get-discount-details.php'
            			}).then(function(response) {
							$scope.scdiscount = JSON.parse(response.data);

							$scope.disc = '.' + $scope.scdiscount;

							$scope.discount = parseFloat($scope.disc);

						if($scope.hmo == 'true'){
							$scope.hmo = 'false';
							$scope.totalfee = $scope.fee - ($scope.fee*$scope.discount);
						}else{
							$scope.hmo = 'true';
							$scope.totalfee = 0;
						}
						});
					}

					$scope.dischargeConfirm = function(){
						if($scope.senior != 'true'){
							$scope.totalfee = $scope.fee;
						}else{
							$scope.totalfee = $scope.fee - ($scope.fee*.20);
						}
						$http({
            			method: 'GET',
            			url: 'insertData/insert-discharged-outpatient.php',
            			params: {at: $scope.at,
								admissionid: $scope.patient,
								totalfee: $scope.totalfee,
								hmo: $scope.hmoprovider,
								re: $scope.redirect}
            			}).then(function(response) {
							swal({
                            icon: "success",
                            title: "Successfully Added!",
                            text: "Redirecting in 2..",
                            timer: 2000
							}).then(function () {
									window.location.href = 'outpatient.php?at=' + $scope.at;
								}, function (dismiss) {
								if (dismiss === 'cancel') {
									window.location.href = 'outpatient.php?at=' + $scope.at;
								}
							});
            			});
					}
            
            		$scope.viewReport = function(){
						if($scope.val == ''){
							$window.open('outpatient-list-report.php?at='+$scope.at, '_blank');
						}else{
							$window.open('outpatient-list-report.php?at='+$scope.at+'&searchparam='+$scope.val, '_blank');
						}
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