<?php include 'admin-header.php' ?>
<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 	
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css"/>
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
    <li class="active"> <a href="specialization.php">Physician</a>
    </li>
</ol>
<br><br>
<div class="container-fluid">

    <div class="row">

    </div>
    <br>
    <div data-widget-group="group1">
        <div  id="physiciandashboard">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Administered Patients</h2>
                            <div class="panel-ctrls"></div>
                        </div>
                    <div class="panel-body">
                                <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Admission ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Admission</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="patient in administered" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID)">
                                            <td>{{patient.AdmissionID}}</td>
                                            <td>{{patient.Lastname}}</td>
                                            <td>{{patient.Firstname}}</td>
                                            <td>{{patient.Middlename}}</td>
                                            <td>{{patient.Gender}}</td>
                                            <td>{{patient.Age}}</td>
                                            <td>{{patient.Admission}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <div class="panel-footer"></div>

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
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
                        <a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Details</a>
                        <a href="#" ng-click="post()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>View Patient Condition</a>
                        <a href="#" ng-click="postDiagnosis()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Post Diagnosis</a>
                    </div>
                </div>
            </div>
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
        <script>
        $('.select2').select2({ placeholder : '' });

        $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

        $('button[data-select2-open]').click(function(){
        $('#' + $(this).data('select2-open')).select2('open');
        });
            var fetch = angular.module('myApp', ['angular-autogrow']);


            fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {
                $scope.at = "<?php echo $_GET['at'];?>";
                $scope.selectedRow = null;
                $scope.selectedStatus = null;
                $scope.clickedRow = 0;
                $scope.new = {};
                $scope.diagnosis = '';
                $scope.lab = 'No';

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
                            method: 'GET',
                            url: 'getData/get-laboratory-details.php'
                        }).then(function(response) {
                            $scope.labs = response.data;
                        });
           
                
                $http({
                        method: 'GET',
                        url: 'getData/get-administered-patients.php',
                        params:{id:$scope.at}
                }).then(function(response) {
                        $scope.administered = response.data;
                        angular.element(document).ready(function() {  
                        dTable = $('#patient_table')  
                        dTable.DataTable();  
                        });  
                });

                $scope.viewPatientDetails = function(){
                    window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
                }

                $scope.setClickedRow = function(spec) {
                    $scope.selectedRow = ($scope.selectedRow == null) ? spec : ($scope.selectedRow == spec) ? null : spec;
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
                    $('#errorModal').modal('show');
                    }
                }

                $scope.postDiagnosis = function(){
                    if($scope.selectedRow != null){
                        $scope.admissionid = $scope.selectedRow;
                        window.location.href = 'post-diagnosis.php?at=' + $scope.at + '&id=' + $scope.admissionid;
                        
                    }
                    else{
                    $('#errorModal').modal('show');
                    }
                }
                
                $scope.confirmDiagnosis = function(){
                    alert($scope.laboratory);
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