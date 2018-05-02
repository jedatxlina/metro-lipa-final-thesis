<?php 
	  $activeMenu = "physician";	
?>
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
    <li><a href="#">Home</a>
    </li>
    <li class="active"> <a href="#">Physician</a>
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
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h2>Administered Patients</h2><a ng-click="viewReport()"> <i class="ti ti-printer pull-right"></i></a>
                            <div class="panel-ctrls"></div>
                        </div>
                    <div class="panel-body">
                                <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Admission ID</th>
                                        <th>Patient Name</th>
                                        <th>Gender</th>
                                        <th>Admission</th>
                                        <th>AdmissionType</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="patient in administered" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID,patient.MedicalID,patient.AdmissionType)">
                                            <td>{{patient.AdmissionID}}</td>
                                            <td>{{patient.Lastname}} {{patient.Firstname}} {{patient.Middlename}}</td>
                                            <td>{{patient.Gender}}</td>
                                            <td>{{patient.Admission}}</td>
                                            <td>{{patient.AdmissionType}}</td>
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
                        <a href="#" ng-click="post()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>View Patient Condition</a>
                        <a href="#" ng-click="postDiagnosis()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Post Diagnosis</a>
                        <a href="#" ng-click="postReferral()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Post Referral</a>
                        <a href="#" ng-click="viewNotifs()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-danger" ng-if="notifs > 0">{{notifs}}</span><i class="ti ti-bell"></i>Referral Notifications</a>
                    </div>
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#" role="tab" data-toggle="tab" class="list-group-item active">Sub Panel</a>
                        <a href="#" ng-click="viewMaster()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Master List</a>
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
											<label for="focusedinput" class="col-sm-3 control-label">QR Code: </label>
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

             <!-- External Request Modal -->
			<div class="modal fade" id="referralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Refer a physician</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: auto">
							<center><span><strong>Refer to a physician</strong></span></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											Select Physician</label>
											<div class="col-sm-7">
                                                        <select class="form-control" ng-model="physicianrefer" style="width:350px;">
                                                            <option value="" disabled selected>Select Physician</option>
                                                            <option ng-repeat="physician in physicians" value="{{physician.PhysicianID}}">{{physician.Fullname}}</option>
                                                        </select>
											</div>
										</div>
									</div>
									<br>
                                    <div data-ng-repeat="patient in patientdetails">
                                   
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;Patient Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" ng-value="patient.Lastname + ', ' + patient.Firstname + ' ' + patient.Middlename"  disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;Admission No</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" ng-value="patient.AdmissionID" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<br>
							</div>
							<div class="panel-footer">
								<button type="button" ng-click="referPatient()" data-dismiss="modal" class="btn btn-danger pull-right">Refer</button>
									<button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
							</div>
						</div>
					</div>
           	 	</div>
			<!--/ External Request Modal -->

             <!-- External Referral Request Modal -->
			<div class="modal fade" id="referralNotifsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Referal Notifications</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: auto">
                                <table id="referral_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Referred By</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="referral in referraldetails" ng-class="{'selected': referral.ID == selectedRow}" ng-click="setClickedRow(referral.ID)">
                                            <td>{{referral.PatientName}}</td>
                                            <td>Dr. {{referral.firstname}} {{referral.middlename}} {{referral.lastname}}</td>
                                        </tr>
                                    </tbody>
                                </table>
							</div>
							<div class="panel-footer">
								<button type="button" ng-click="acceptPatient()" data-dismiss="modal" class="btn btn-danger pull-right">Accept</button>
								<button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                                <button type="button"  ng-click="denyPatient()"  data-dismiss="modal" class="btn btn-danger-alt pull-left">Deny</button>
							</div>
						</div>
					</div>
           	 	</div>
			<!--/ External Request Modal -->
                                           
                <!-- Error modal -->
				<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Error:</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: 60px">
							Select Patient record that you would like to apply an <a href="#" class="alert-link">Action.</a>
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

                       <!-- Error Refer modal -->
				<div class="modal fade" id="errorReferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Error</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: 60px">
							Outpatients cannot be referred to another doctor.
							</div>
						</div>
					</div>
				</div>
				<!--/ Error  Refer modal -->
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

                    $http({
                        method: 'GET',
                        url: 'getData/get-referral-details.php',
                        params: {at: $scope.at}
                    }).then(function(response) {
                        $scope.referraldetails = response.data;
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
                    
                        default:
                            break;
                    }

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

                $http({
                    method: 'GET',
                    url: 'getData/get-physician-details.php',
                    params:{at: $scope.at}
                }).then(function(response) {
                    $scope.physicians = response.data;
                });

                $scope.viewPatientDetails = function(){
                    window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
                }

                $scope.setClickedRow = function(spec,medid,admisstype) {
                    $scope.selectedRow = ($scope.selectedRow == null) ? spec : ($scope.selectedRow == spec) ? null : spec;
                    $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                    $scope.medid = medid;
                    $scope.admisstype = admisstype;
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

                $scope.viewMaster = function(){
                    window.location.href = 'patient-master-list.php?at=' + $scope.at;
                }

                $scope.postDiagnosis = function(){
                    if($scope.selectedRow != null){
                        $scope.admissionid = $scope.selectedRow;
                        window.location.href = 'post-diagnosis.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medicalid=' + $scope.medid;
                        
                    }
                    else{
                    $('#errorModal').modal('show');
                    }
                }
                
                $scope.confirmDiagnosis = function(){
                    alert($scope.laboratory);
                }

                 
                $scope.referPatient = function(){
                    $http({
                        method: 'get',
                        url: 'insertData/insert-referral-details.php',
                        params: {id: $scope.admissionid,
                                at: $scope.at,
                                physicianid: $scope.physicianrefer }
                    }).then(function(response) {
                        swal({
                            icon: "success",
                            title: "Successfully Referred!",
                            text: "Redirecting in 2..",
                            timer: 2000
                        }).then(function () {
                                window.location.href = 'physician.php?at=' + $scope.at;
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                window.location.href = 'physician.php?at=' + $scope.at;
                            }
                        });
                    });
                }

                $scope.postReferral = function(){
                    if($scope.admisstype == 'Outpatient')
                    {
                        $('#errorReferModal').modal('show');
                    }
                    else
                    {
                      
                        if($scope.selectedRow != null){
                            $scope.admissionid = $scope.selectedRow;
                            $http({
                                method: 'get',
                                url: 'getData/get-patient-details.php',
                                params: {id: $scope.admissionid}
                            }).then(function(response) {
                                $scope.patientdetails = response.data;
                            });
                            $('#referralModal').modal('show');
                        }
                        else{
                        $('#errorModal').modal('show');
                        }
                    }
                }

                $scope.acceptPatient = function(){
                    $scope.id = $scope.selectedRow;
                    $http({
                        method: 'get',
                        url: 'updateData/update-referral-details.php',
                        params: {id: $scope.id,
                                at: $scope.at}
                    }).then(function(response) {
                        swal({
                            icon: "success",
                            title: "Successfully Accepted!",
                            text: "Redirecting in 2..",
                            timer: 2000
                        }).then(function () {
                                window.location.reload(false); 
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                window.location.reload(false); 
                            }
                        });      
                    });    
                }
  

                $scope.viewNotifs = function(){
                      $('#referralNotifsModal').modal('show');
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