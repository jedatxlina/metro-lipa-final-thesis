<?php 
	  $activeMenu = "nurse";	
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
            <li class="active"><a href="#">Inpatient</a></li>
        </ol>

        <div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
            <div class="panel-body">
                <h3>Inpatient<small> Section</small></h3>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <a href="qr-scanner/index.php?at=<?php echo $_GET['at']?>" class="btn btn-danger-alt pull-left"><i class="fa fa-qrcode"></i>&nbsp;&nbsp;Scan</a>
                </div>
            </div>
            <br>
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2>Patients</h2><a ng-click="viewReport()" class="pull-right"> &nbsp;<i class="ti ti-printer"></i></a>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body">
                            <div class="tab-container tab-midnightblue">
												<ul class="nav nav-tabs">
													<li class="active"><a href="#home1" data-toggle="tab">Emergency</a></li>
													<li><a href="#profile1" data-toggle="tab">Inpatient</a></li>
                                                    <li><a href="#profile2" data-toggle="tab">Nursery</a></li>
												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="home1">
														<table id="emergency_patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
															<thead>
															<tr>
																<!-- <th>Inpatient ID</th>
																<th>Admission No</th> -->
																<th>Full name</th>
																<th>Admission Date</th>
																<th>Admission Time</th>
																
																<th>Admission</th>
																<th>Admission Type</th>
																<th>Gender</th>
															</tr>
															</thead>
															<tbody>
															<tr ng-repeat="user in epatient" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID,user.MedicalID,user.Fullname)">
																<!-- <td>{{user.AdmissionID}}</td>
																<td>{{user.AdmissionNo}}</td> -->
																<td>{{user.Lname}}, {{user.Fname}} {{user.Mname}} </td>
																<td>{{user.AdmissionDate}}</td>
																<td>{{user.AdmissionTime}}</td>
																
																<td>{{user.Admission}}</td>
																<td>{{user.AdmissionType}}</td>
																<td>{{user.Gender}}</td>
																</tr>
															</tbody>
														</table>
													</div>
													<!-- <a ng-click="viewReport()">Print Report &nbsp;<i class="ti ti-printer"></i></a> -->
													<div class="tab-pane" id="profile1">
                                                    <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Room & Bed No.</th>
                                                            <th>Patient Name</th>
                                                            <th>Gender</th>
                                                            <th>Blood Pressure</th>
                                                            <th>Pulse Rate</th>
                                                            <th>Respiratory Rate</th>
                                                            <th>Temperature</th>
                                                            <th>Date Time Checked</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID,user.MedicalID)">
                                                            <td>{{user.BedID}}</td>
                                                            <td>{{user.Fullname}}</td>
                                                            <td>{{user.Gender}}
                                                            <td>{{user.BP}}/{{user.BPD}}</td>
                                                            <td>{{user.PR}}</td>
                                                            <td>{{user.RR}}</td>
                                                            <td>{{user.Temperature}}</td>
                                                            <td>{{user.DateTimeChecked}}</td>
                                                        </tr>
                
                                                    </tbody>
                
                                                </table>
                                                
													</div>
                                                
                                                    
                                                    
												</div>
                                                
											</div>
                                            

                                <a ng-click="generatePatientDiet()" class="pull-right"> Generate Patient Diet&nbsp;<i class="ti ti-printer"></i></a>
                               
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
                            <a href="#" ng-click="patientVitals()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Patient Vitals</a>
                            <a href="#" ng-click="viewPatientMedication()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary"></span> <i class="fa fa-medkit"></i>View Medication</a>
                            <a href="#" ng-click="medicineRequisition()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary"></span> <i class="fa fa-plus-square-o"></i>Medicine Requisition</a>
                            <a href="#" ng-click="postDiagnosis()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Post Diagnosis</a>
                            <a href="#" ng-click="postMedication()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary"></span> <i class="fa fa-plus-square-o"></i>Post Medication</a>
                            <a href="#" ng-click="viewOrder()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary"  ng-if="order > 0 ">{{order}}</span> <i class="ti ti-email"></i>Doctors Order</a>
                       <!-- <a href="#" ng-click="postBills()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Process Billing</a> -->
                            <a href="#" ng-click="dischargePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-tag"></i>Tag As Discharged</a>
                            <a href="#" ng-click="processMedCert()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Process Medical Certificate</a>
                            <a href="#" ng-click="viewFlag()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-danger" ng-if="notif > 0">{{notif}}</span><i class="ti ti-bell"></i> Notifications</a>
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
                                    Select Inpatient record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Error modal -->

                    <!-- Requisition Modal -->
                    <div class="modal fade" id="medicineRequisitionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form class="form-horizontal">
                            <div class="modal-dialog">
                                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                    <div class="panel-heading">
                                        <h2>Medicine Requisition</h2>
                                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                    </div>
                                    <div class="panel-body" style="height: 500px">
                                        <center><span><strong>CURRENT MEDICINES REQUIRED TO INTAKE</strong></span></center>
                                        <hr>
                                        <table id="requisition_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Required Intake</th>
                                                    <th>Dosage</th>
                                                    <th>Ordered By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="medication in medicationdetails | filter:{ DosingID: '!0'}" ng-class="{'selected': medication.ID == selectedRow}" ng-click="setClickedRow(medication.ID)">
                                                    <td>{{medication.MedicineName}}</td>
                                                    <td>{{medication.Quantity}}</td>
                                                    <td>{{medication.Dosage}}</td>
                                                    <td>Dr. {{medication.Fullname}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="button" ng-click="sendRequisition()" data-dismiss="modal" class="btn btn-danger pull-right">Request Medicine</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Requisition Modal -->

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
                                                    <th>Patient Name</th>
                                                    <th>Physician</th>
                                                    <th>Task</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="order in orders | filter:{ AdmissionType: '!Outpatient'}" ng-class="{'selected': order.OrderID == selectedRow}" ng-click="setClickedRow(order.OrderID,order.AdmissionID)">
                                                    
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
                                                    <th>Admission Date & Time</th>
                                                    <th>Room</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="patient in flagPatients" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID)">
                                                    <td>{{patient.Lname}}, {{patient.Fname}} {{patient.Mname}}</td>
                                                    <td>{{patient.AdmissionID}}</td>
                                                    <td>{{patient.AdmissionDate}} {{patient.AdmissionTime}}</td>
                                                    <td>{{patient.BedID}}</td>
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

                    <!-- View Medication Modal -->
                    <div class="modal fade" id="viewMedicationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form class="form-horizontal">
                            <div class="modal-dialog">
                                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                    <div class="panel-heading">
                                        <h2>Current Patient Medications</h2>
                                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                    </div>
                                    <div class="panel-body" style="height: 500px">
                                        <center><span><strong>History and Current Medicines</strong></span></center>
                                        <hr>
                                        <table id="medication_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Required Intake</th>
                                                    <th>Dosage</th>
                                                    <th>Ordered By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="medication in medicationdetails " ng-class="{'selected': medication.ID == selectedRow}" ng-click="setClickedRow(medication.ID)">
                                                    <td>{{medication.MedicineName}}</td>
                                                    <td>{{medication.Quantity}}</td>
                                                    <td>{{medication.Dosage}}</td>
                                                    <td>Dr. {{medication.Fullname}}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="panel-footer">
                                        <button type="button" ng-click="viewMedicine()" class="btn btn-default pull-left" data-dismiss="modal">View Details</button>
                                        <button type="button" class="btn btn-danger-alt pull-right" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- View Medication Modal -->

                    <!-- Post Medication Modal -->
                    <div class="modal fade" id="postMedicationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form class="form-horizontal">
                            <div class="modal-dialog">
                                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                    <div class="panel-heading">
                                        <h2>Post Patient Medication</h2>
                                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                    </div>
                                    <div class="panel-body" style="height: 500px">
                                        <center><span><strong>Registry Information</strong></span></center>
                                        <hr>
                                        <table id="postmedication_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>  <a ng-click="clearPushID()" class="pull-right"><i class="ti ti-reload"></i></a></th>
                                                    <th>Medicine Name</th>
                                                    <th>Quantity (on hand)</th>
                                                    <th>Dosage</th>
                                                    <th>Fullname</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="medication in medicationdetails track by $index" ng-if="medication.QuantityOnHand!=0">
                                                    <td><input id="rad" type="radio" ng-click="PushID(medication.ID)"></td>
                                                    <td>{{medication.MedicineName}}</td>
                                                    <td>{{medication.QuantityOnHand}}</td>
                                                    <td>{{medication.Dosage}}</td>
                                                    <td>{{medication.Fullname}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div ng-repeat="med in medicationdetails">
                                        <input type="hidden" ng-model="$parent.medicationid" ng-init="$parent.medicationid = med.MedicationID">
                                    </div>

                                    <div class="panel-footer">
                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                        <button type="button" ng-click="postMedicationConfirm()" class="btn btn-danger pull-right">Post Medication</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Post Medication Modal -->

                    <div class="modal fade" id="dischargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form class="form-horizontal">
                            <div class="modal-dialog">
                                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                    <div class="panel-heading">
                                        <h2>Tag as Discharged</h2>
                                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                    </div>
                                    <div class="panel-body" style="height: auto" data-ng-repeat="details in dischargedetails   | limitTo : 1">
                                        <center><span><strong>Registry Information</strong></span></center>
                                        <hr>
                                        <div class="row" >
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">Patient name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" ng-value="details.firstname + ' ' + details.middlename + ' ' + details.lastname" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">Total Bill</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" ng-value="details.totalbill" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" ng-value="details.status" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="button" ng-click="tagPatientDischarge()" class="btn btn-danger-alt pull-right">Tag</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            var fetch = angular.module('myApp', []);

            fetch.controller('userCtrl', ['$scope', '$http', '$interval', '$window', function($scope, $http, $interval, $window) {
                $scope.at = "<?php echo $_GET['at'];?>";
                $scope.selectedRow = null;
                $scope.clickedRow = 0;
                $scope.new = {};
                $scope.PostCheck =  [];

                    $http({
                    method: 'get',
                    url: 'getData/get-emergency-details.php'
                     }).then(function(response) {
                    $scope.epatient = response.data;
                    angular.element(document).ready(function() {
                        dTable = $('#emergency_patient_table')
                        dTable.DataTable();
                    });
                    });


                var pusher = new Pusher('c23d5c3be92c6ab27b7a', {
                    cluster: 'ap1',
                    encrypted: true
                });

                var channel = pusher.subscribe('my-channel-inpatient');
                channel.bind('my-event-inpatient', function(data) {

                    console.log(data.message);
                    console.log(data.message1);
                    console.log(data.medtimeline);
                    console.log(data.medname);
            
                    swal({
                    title: data.message,
                    text: data.message1 + ': ' + data.medname,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $http({
                        method: 'get',
                        url: 'updateData/update-medtimeline-details.php',
                        params: {medtimeline: data.medtimeline}
                        }).then(function(response) {
                            swal("Medication Successfully Alerted!", {
                            icon: "success",
                            });
                        });
                            
                    } else {
                        swal("Failed to be alerted!");
                    }
                    });
             
                });
          
                var tick = function() {
                    $scope.clock = Date.now();
                    $scope.time = new Date().toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        hour12: true,
                        minute: 'numeric'
                    });

                    $http({
                        method: 'get',
                        url: 'getData/get-order-details.php'
                    }).then(function(response) {
                        $scope.NoOfOrder = response.data;
                        $scope.order = response.data.length;
                    });

                    $http({
                    	method: 'get',
                    	url: 'getData/get-medication-notif.php'
                    }).then(function(response) {
                    	
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
                    params: {
                        id: $scope.at,
                        atype: $scope.accesstype
                    }
                }).then(function(response) {
                    $scope.userdetails = response.data;
                });

                $http({
                    method: 'get',
                    url: 'getData/get-all-inpatient-vitals.php'
                }).then(function(response) {
                    $scope.users = response.data;
                    angular.element(document).ready(function() {
                        dTable = $('#patient_table')
                        dTable.DataTable();
                    });
                });

                $scope.generatePatientDiet = function() {
                    if ($scope.val == '') {
                        $window.open('patient-diet.php?at=' + $scope.at, '_blank');
                    } else {
                        $window.open('patient-diet.php?at=' + $scope.at + '&searchparam=' + $scope.val, '_blank');
                    }
                }

                $scope.processMedCert = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $window.open('inpatient-med-cert.php?at=' + $scope.at + '&admissionid=' + $scope.admissionid, '_blank');
                    } else {
                        $('#errorModal').modal('show');
                    }
                }

                $http({
                    method: 'get',
                    url: 'getData/get-inpatient-flags.php'
                }).then(function(response) {
                    $scope.notif = response.data.length;
                });

                $http({
                    method: 'get',
                    url: 'getData/get-order-details.php'
                }).then(function(response) {
                    $scope.orders = response.data;
                    angular.element(document).ready(function() {
                        dTable = $('#orders_table')
                        dTable.DataTable();
                    });
                });

                $scope.addPatient = function() {
                    window.location.href = 'add-patient.php?id=' + 1;
                }

                $scope.PushID = function(param){
                    $scope.PostCheck.push(param);
                }

                $scope.clearPushID = function(){
                    $('#rad').attr('checked',false);
                    $scope.PostCheck.length = 0;
                    $scope.selectedRow = '';
                }

                $scope.setClickedRow = function(user, param,name) {
                    $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
                    $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                    $scope.orderadmissionid = param;
                    $scope.name = name;
                }


                $scope.viewPatient = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $http({
                            method: 'get',
                            url: 'getData/get-patient-details.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.patientdetails = response.data;
                        });
                        $('#patientModal').modal('show');

                    } else {
                        $('#myModal').modal('show');
                    }
                }

                
                $scope.postDiagnosis = function(){
                    if($scope.selectedRow != null){
                        $scope.admissionid = $scope.selectedRow;
                        window.location.href = 'post-diagnosis-nurse.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medicalid=' + $scope.orderadmissionid;
                        
                    }
                    else{
                    $('#errorModal').modal('show');
                    }
           
                }

                $scope.postBills = function() {
                    if ($scope.selectedRow != null) {
                        // $http({
                        //     method: 'get',
                        //     url: 'updateData/update-roomend-date.php',
                        //     params: {
                        //         id: $scope.selectedRow
                        //     }
                        // }).then(function(response) {});
                        window.location.href = 'view-patient-bill.php?at=' + $scope.at + '&id=' + $scope.selectedRow;
                    } else {
                        $('#myModal').modal('show');
                    }
                }

                $scope.viewPatientDetails = function() {
                    window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
                }

                $scope.viewPatientMedication = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $http({
                            method: 'get',
                            url: 'getData/get-medication-details.php',
                            params: {
                                admissionid: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.medicationdetails = response.data;
                            angular.element(document).ready(function() {
                                dTable = $('#medication_table')
                                dTable.DataTable();
                            });
                        });
                        $('#viewMedicationModal').modal('show');

                    } else {
                        $('#myModal').modal('show');
                    }
                }

                $scope.viewMedicine = function(param) {
                    $scope.medid = $scope.selectedRow;
                    window.location.href = 'view-medication-details.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medid=' + $scope.medid;
                }

                $scope.medicineRequisition = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $http({
                            method: 'get',
                            url: 'getData/get-medication-details.php',
                            params: {
                                admissionid: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.medicationdetails = response.data;
                            angular.element(document).ready(function() {
                                dTable = $('#requisition_table')
                                dTable.DataTable();
                            });
                        });
                        $('#medicineRequisitionModal').modal('show');
                    } else {
                        $('#myModal').modal('show');
                    }
                }

                $scope.sendRequisition = function() {
                    $scope.selectedmed = $scope.selectedRow;
                    swal({
                        icon: "success",
                        title: "Medicine Requested!",
                        text: "Redirecting in 2..",
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'insertData/insert-medicine-request.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&med=' + $scope.selectedmed;
                    }, function(dismiss) {
                        if (dismiss === 'cancel') {
                            window.location.href = 'insertData/insert-medicine-request.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&med=' + $scope.selectedmed;
                        }
                    });
                }

                $scope.viewProfile = function() {
                    window.location.href = 'user-profile.php?at=' + $scope.at;
                }

                $scope.postMedication = function() {
              
                        if ($scope.selectedRow != null) {
                            $scope.admissionid = $scope.selectedRow;
                            $http({
                                method: 'get',
                                url: 'getData/get-medication-details.php',
                                params: {
                                    admissionid: $scope.admissionid
                                }
                            }).then(function(response) {
                                $scope.medicationdetails = response.data;
                                var onhand = 0;
                                angular.forEach($scope.medicationdetails, function(value, key){
                                   
                                    if(value.QuantityOnHand != 0){
                                        onhand += 1;
                                    }
                                            
                                });
                                if(onhand > 0){
                                    $scope.selectedRow = '';
                                    angular.element(document).ready(function() {
                                    dTable = $('#postmedication_table')
                                    dTable.DataTable();
                                    });
                                    $('#postMedicationModal').modal('show');
                                }else{
                                    swal({
                                            icon: "warning",
                                            title: "Quantity on hand is empty!",
                                            text: "Redirecting in 2..",
                                            timer: 2000
                                        }).then(function() {
                                            window.location.reload(false);
                                        }, function(dismiss) {
                                            if (dismiss === 'cancel') {
                                                window.location.reload(false);
                                            }
                                        });
                                }
                             

                            });

                        
                           

                        } else {
                            $('#myModal').modal('show');
                        }
                }

                $scope.postMedicationConfirm = function() {
                    // $scope.medid = $scope.selectedRow;
               
                    // if($scope.PostCheck.indexOf($scope.medid) === -1) {
                    //     $scope.PostCheck.push($scope.medid);
                    // }
                   
                    swal({
                        icon: "success",
                        title: "Medication Updated!",
                        text: "Redirecting in 2..",
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'insertData/post-medication-details.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medid=' + $scope.PostCheck;
                    }, function(dismiss) {
                        if (dismiss === 'cancel') {
                            window.location.href = 'insertData/post-medication-details.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medid=' + $scope.PostCheck;
                        }
                    });
                }

                $scope.viewOrder = function() {
                    $('#orderModal').modal('show');
                }

                $scope.viewOrderDetails = function() {
                    $window.open('view-order-prescription.php?at='+$scope.at+'&id='+$scope.orderadmissionid, '_blank');
                }

                $scope.acceptOrder = function() {
                    $scope.id = $scope.selectedRow;
                    $http({
                        method: 'get',
                        url: 'updateData/update-order-details.php',
                        params: {
                            id: $scope.id
                        }
                    }).then(function(response) {
                        swal({
                            icon: "success",
                            title: "Order Accepted!",
                            text: "Refreshing in 2..",
                            timer: 2000
                        }).then(function() {
                            console.log(response);
                            window.location.reload();
                        }, function(dismiss) {
                            if (dismiss === 'cancel') {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    });
                }

                $scope.patientVitals = function() {
                    if ($scope.selectedRow != null) {
                        window.location.href = 'patient-vitals.php?at=' + $scope.at + '&id=' + $scope.selectedRow;
                    } else {
                        window.location.href = 'qr-scanner/index.php?at=' + $scope.at;
                    }
                };

                $scope.viewFlag = function() {
                    $http({
                        method: 'get',
                        url: 'getData/get-inpatient-flags.php',
                        params: {
                            id: $scope.selectedRow
                        }
                    }).then(function(response) {
                        $scope.flagPatients = response.data;
                    });
                    $('#flagModal').modal('show');
                }

                $scope.confirmBtn = function(user) {

                    $scope.admissionid = $scope.selectedRow;
                    $http({
                        method: 'get',
                        url: 'insertData/insert-roomstart-date.php',
                        params: {
                            id: $scope.admissionid
                        }
                    }).then(function(response) {});
                    $http({
                        method: 'get',
                        url: 'updateData/update-inpatient-flag.php',
                        params: {
                            id: $scope.admissionid
                        }
                    }).then(function(response) {
                        window.location.reload();
                    });
                }

                $scope.dischargePatient = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $http({
                            method: 'get',
                            url: 'getData/get-patient-discharge-details.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.dischargedetails = response.data;
                            if (response.data.length == 0) {
                                swal({
                                    icon: "warning",
                                    title: "Billing is still being processed",
                                    text: "Redirecting in 2..",
                                    timer: 2000
                                }).then(function() {
                                    window.location.reload(false);
                                }, function(dismiss) {
                                    if (dismiss === 'cancel') {
                                        window.location.reload(false);
                                    }
                                });
                            } else {
                                swal({
                                    title: 'Discharge ' + $scope.name + '?',
                                    text: 'Patient Will Be Discharged Upon Confirm.',
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                    if (willDelete) {
                                        $http({
                                        method: 'get',
                                        url: 'insertData/insert-discharged-inpatient.php',
                                        params: {
                                            id: $scope.admissionid
                                        }
                                    }).then(function(response) {
                                        swal({
                                        icon: "success",
                                        title: "Successfully Discharged!",
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
                            
                    } else {
                        window.location.reload(false);
                    }
                    });
                            }
                        });
                    } else {
                        $('#myModal').modal('show');
                    }
                }

                // $scope.tagPatientDischarge = function() {
                 

                // }

                $scope.getPage = function(check) {
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