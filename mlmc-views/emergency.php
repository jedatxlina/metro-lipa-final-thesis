<?php 
	  $activeMenu = "patients";	
?>
    <?php include 'admin-header.php'  ?>
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
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger-alt dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-group"></i>&nbsp; Patient <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" role="menu">
                            <li><a ng-click="addPatient()"><i class="fa fa-search"></i>&nbsp; Data Lookup</a></li>
                            <li><a ng-click="addNewPatient()"><i class="fa fa-plus-square-o"></i>&nbsp; Add New</a></li>
                            <li><a href="qr-scanner/index.php?at=<?php echo $_GET['at']?>"><i class="fa fa-qrcode"></i>&nbsp; Scan & Admit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2>Emergency Patients</h2>
                                <a ng-click="viewReport()"> <i class="ti ti-printer pull-right"></i></a>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body">
                                <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                     
                                            <th>Patient name</th>
                                            <th>Admission Date Time</th>
                                            <th>Admission</th>
                                            <th>Admission Type</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID)">
                              
                                        <td>{{user.Lname}}, {{user.Fname}} {{user.Mname}} </td>
                                            <td>{{user.AdmissionDate}} {{user.AdmissionTime}}</td>
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
                            <a href="#" ng-click="movePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Move to Inpatient</a>
                            <!-- <a href="#" ng-click="processBilling()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i>Process Billing</a> -->
                            <a href="#" ng-click="processWaiver()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-o"></i>Process Refusal Waiver</a>
                            <!-- <a href="#" ng-click="dischargePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i> Discharge</a> -->
                            <a href="#" ng-click="opdTransfer()" role="tab" data-toggle="tab" class="list-group-item"><span class="badge badge-primary"  ng-if="notifs > 0">{{notifs}}</span><i class="fa fa-check-square-o"></i>Outpatient Transfers</a>
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
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Last Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" ng-model='lastname' class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-3 control-label">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;First Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" ng-model='firstname' class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-3 control-label">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Middle Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" ng-model='middlename' class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-3 control-label">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Birthdate
                                            </label>
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
                                    <button type="button" ng-click="newPatient()" class="btn btn-danger-alt pull-left">New</button>
                                    <center><span class="'pull-left"><strong>Search Registry Information Result</strong></span></center>
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

                    <!-- OPD Transfers modal -->
                    <div class="modal fade" id="opdTransferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog">
                            <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Outpatient Transfers</h2>
                                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                </div>
                                <div class="panel-body" style="height: auto">
                                    <center><span class="'pull-left"><strong>Search Registry Information Result</strong></span></center>
                                    <hr>
                                    <table id="opdtransfer_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>Patient Name</th>
                                                <th>Gender</th>
                                                <th>Admission Type</th>
                                                <th>Admission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-ng-repeat='trans in transfers' ng-class="{'selected': trans.AdmissionID == selectedRow}" ng-click="setClickedRow(trans.AdmissionID,trans.AdmissionNo)">
                                                <td>{{trans.AdmissionID}}</td>
                                                <td>{{trans.Firstname}} {{trans.Middlename}} {{trans.Lastname}}</td>
                                                <td>{{trans.Gender}}</td>
                                                <td>{{trans.AdmissionType}}</td>
                                                <td>{{trans.Admission}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" ng-click="searchResultView()" class="btn btn-danger-alt pull-left">View Details</button>
                                    <button type="button" ng-click="admitopdTransfer()" data-dismiss="modal" class="btn btn-danger pull-right">Admit</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- OPD Transfers modal -->

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
                                                <label for="focusedinput" class="col-sm-3 control-label">Patient ID</label>
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

                    <div class="modal fade" id="dischargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form class="form-horizontal">
                            <div class="modal-dialog">
                                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                    <div class="panel-heading">
                                        <h2>Tag as Discharged</h2>
                                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                    </div>
                                    <div class="panel-body" style="height: auto">
                                        <center><span><strong>Registry Information</strong></span></center>
                                        <hr>
                                        <div class="row" data-ng-repeat="details in dischargedetails">
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">Patient name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" ng-value="details.firstname + ' ' + details.middlename + ' ' + details.lastname" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" data-ng-repeat="details in dischargedetails">
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">Total Bill</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" ng-value="details.totalbill" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" data-ng-repeat="details in dischargedetails">
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

                <div class="modal fade" id="moveInpatientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <form class="form-horizontal">
                        <div class="modal-dialog">
                            <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Details</h2>
                                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                </div>
                                <div class="panel-body" style="height: auto" ng-repeat="patient in getdetails">
                                    <center><span><strong>Registry Information</strong></span>
                                        <p><small>Data below will be moved to Inpatient section permanently</small></p>
                                    </center>
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
                                                <input type="text" class="form-control" ng-value="patient.AdmissionDate" disabled>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-3 control-label">Diet Plan</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" ng-model="$parent.dietplan">
                                                    <option value="" disabled selected>Select Diet Plan</option>
                                                    <option ng-repeat="diet in diets" value="{{diet.DietOrder}}" ng-init="$parent.dietplan = diet.DietOrder">{{diet.DietOrder}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">Diet Remarks</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" ng-model="dietremarks">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">Advance Payments</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" ng-model="advpayment">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">OR Number</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" ng-model="ornumber">
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
            <div id="custom-footer">

            </div>
        </div>

        <script>
            var fetch = angular.module('myApp', []);

            fetch.controller('userCtrl', ['$scope', '$http', '$window', '$interval', function($scope, $http, $window, $interval) {
                $scope.at = "<?php echo $_GET['at'];?>";
                $scope.selectedRow = null;
                $scope.clickedRow = 0;
                $scope.new = {};
                $scope.order = 0;
                $scope.notifs = 1;

                // Search Query
				$scope.firstname = '';
				$scope.middlename = '';
				$scope.lastname = '';
				$scope.birthdate = '';


                var pusher = new Pusher('c23d5c3be92c6ab27b7a', {
                    cluster: 'ap1',
                    encrypted: true
                });

                var channel = pusher.subscribe('my-channel-emergency');
                channel.bind('my-event-emergency', function(data) {

                    console.log(data.message);
                    console.log(data.transfer);
                    $scope.transferopdid = data.transfer;
                    swal({
                        icon: "success",
                        title: "New Notification!",
                        text: data.message
                    }).then(function() {});
                });

                var tick = function() {
                    $scope.clock = Date.now();
                    $scope.datetime = new Date().toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        hour12: true,
                        minute: 'numeric'
                    });

                    $http({
                        method: 'get',
                        url: 'getData/get-transfering-opd.php',
                        params: {
                            id: $scope.at
                        }
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
                    contentType: "application/json; charset=utf-8",
                    dataType: "json"
                }).then(function(response) {
                    $scope.bed = response.data;
                });

                $http({
                    method: 'GET',
                    url: 'getData/get-physician-details.php'
                }).then(function(response) {
                    $scope.physicians = response.data;
                });

                $('#patient_table').on('search.dt', function() {
                    var value = $('.dataTables_filter input').val();
                    $scope.val = value;
                });

                $scope.setClickedRow = function(user,param) {
                    $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
                    $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                    $scope.AdmissionNo = param;
                }

                $scope.addPatient = function() {
                    // window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1;
                    $('#searchPatientModal').modal('show');
                }

				 $scope.addNewPatient = function() {
                    window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1 + '&fname=' + $scope.firstname + '&mname=' + $scope.middlename +'&lname=' + $scope.lastname;
                }
                $scope.searchPatient = function() {

                    $scope.birthdate = $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd").val();

                    $('#searchPatientModal').modal('hide');
                    
                    if($scope.firstname == '' && $scope.middlename == '' && $scope.lastname == '' && $scope.birthdate == ''){
                        $('#errorModal').modal('show');
                    }else{
                        $http({
                            method: 'get',
                            url: 'getData/get-search-details.php',
                            params: {
                                firstname: $scope.firstname,
                                middlename: $scope.middlename,
                                lastname: $scope.lastname,
                                birthdate: $scope.birthdate
                            }
                        }).then(function(response) {
                            $scope.searchres = response.data
                            angular.element(document).ready(function() {
                                dTable = $('#results_table')
                                dTable.DataTable();
                            });
                        });
                        $('#searchResultPatientModal').modal('show');
                    }

                }

                $scope.tagPatientDischarge = function() {
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

                }

                $scope.searchResultView = function() {
                    if ($scope.selectedRow != null) {
                        $scope.archiveid = $scope.selectedRow;
                        window.location.href = 'view-patient-data-archive.php?at=' + $scope.at + '&id=' + $scope.archiveid;
                    } else {
                        $('#errorModal').modal('show');
                    }
                }

                $scope.newPatient = function() {
                    window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1 + '&fname=' + $scope.firstname + '&mname=' + $scope.middlename +'&lname=' + $scope.lastname;
                }

                $scope.searchPatientSelect = function() {
                    if ($scope.selectedRow != null) {
                        $scope.archiveid = $scope.selectedRow;
                        window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1 + '&chk=' + $scope.archiveid;
                    } else {
                        $('#errorModal').modal('show');
                    }
                }

                $scope.processBilling = function() {
                    //  if($scope.selectedRow != null){
                    $scope.admissionid = $scope.selectedRow;
                    // $http({
                    // 	method: 'get',
                    // 	url: 'getData/get-bill-details.php',
                    // 	params: {id: $scope.admissionid}
                    // }).then(function(response) {
                    // 	$scope.billdetails = response.data;
                    // });
                    // $http({
                    // 	method: 'get',
                    // 	url: 'getData/get-medication-bill.php',
                    // 	params: {id: $scope.admissionid}
                    // }).then(function(response) {
                    // 	$scope.medicinebill = response.data;
                    // });
                    // $http({
                    // 	method: 'get',
                    // 	url: 'getData/get-medication-billdetailed.php',
                    // 	params: {id: $scope.admissionid}
                    // }).then(function(response) {
                    // 	$scope.medicinebill2 = response.data;
                    // });
                    // 	$('#dischargeModal').modal('show');
                    // }
                    // else{
                    // $('#errorModal').modal('show');
                    //  }
                    window.location.href = 'view-emergency-bill.php?at=' + $scope.at + '&id=' + $scope.admissionid;
                }

                $scope.dischargePatient = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;

                        $http({
                            method: 'get',
                            url: 'getData/get-bill-details.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.billdetails = response.data;
                        });

                        $http({
                            method: 'get',
                            url: 'getData/get-medication-bill.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.medicinebill = response.data;
                        });

                        $http({
                            method: 'get',
                            url: 'getData/get-medication-billdetailed.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            $scope.medicinebill2 = response.data;
                        });
                        $('#dischargeModal').modal('show');
                    } else {
                        $('#errorModal').modal('show');
                    }
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
                        $('#errorModal').modal('show');
                    }
                }

                $scope.viewReport = function() {
                    if ($scope.val == '') {
                        $window.open('emergency-list-report.php?at=' + $scope.at, '_blank');
                    } else {
                        $window.open('emergency-list-report.php?at=' + $scope.at + '&searchparam=' + $scope.val, '_blank');
                    }
                }

                $scope.viewPatientDetails = function() {
                    window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.admissionid;
                }

                $scope.opdTransfer = function() {
                    $http({
                        method: 'get',
                        url: 'getData/get-transfering-opd.php'
                    }).then(function(response) {
                        $scope.transfers = response.data;
                        angular.element(document).ready(function() {
                            dTable = $('#opdtransfer_table')
                            dTable.DataTable();
                        });
                    });
                    $('#opdTransferModal').modal('show');
                }

                $scope.admitopdTransfer = function() {
                    if ($scope.selectedRow != null) {
                     $scope.admissionid = $scope.selectedRow;

                        $scope.totalbill = 2000;
                        $http({
                        method: 'GET',
                        url: 'insertData/insert-bed-bill.php',
                        params: {admissionid: $scope.admissionid,
                            department: $scope.User,
                            description: 'Emergency Room Fee',
                            admissno: $scope.AdmissionNo,
                            total: $scope.totalbill}
                        });

                        $http({
                            method: 'get',
                            url: 'updateData/update-transfering-patient.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            swal({
                                icon: "success",
                                title: "Successfully Transferred!",
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
                    } else {
                        $('#errorModal').modal('show');
                    }
                }

                $scope.admitOpdConfirm = function() {
                    window.location.href = 'add-patient-fromopd.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&physicianid=' + $scope.attendingphysician;
                }

                $scope.movePatient = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $http({
                            method: 'GET',
                            url: 'getData/get-diet-plans.php'
                        }).then(function(response) {
                            $scope.diets = response.data;
                        });
                        $http({
                            method: 'GET',
                            url: 'getData/get-patient-details.php',
                            params: {
                                id: $scope.admissionid
                            },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json"
                        }).then(function(response) {
                            $scope.getdetails = response.data;

                        });
                        $('#moveInpatientModal').modal('show');

                    } else {
                        $('#errorModal').modal('show');
                    }
                };

                $scope.filterBed = function(param) {
                    return function(bed) {
                        if (bed.RoomType == param) {
                            if (bed.Status == 'Available')
                                return true;
                        }
                        return false;
                    };
                };

                $scope.processWaiver = function() {
                    if ($scope.selectedRow != null) {
                        $scope.admissionid = $scope.selectedRow;
                        $window.open('view-refusal-waiver.php?at=' + $scope.at + '&admissionid=' + $scope.admissionid, '_blank');
                    }else{
                        $('#errorModal').modal('show');
                    }
                }

                $scope.ConfirmInpatient = function() {
                    $http({
                        method: 'GET',
                        url: 'updateData/update-inpatient-details.php',
                        params: {
                            AdmissionID: $scope.selectedRow,
                            BedID: $scope.bedno.BedID,
                            Dietplan: $scope.dietplan,
                            Dietremarks: $scope.dietremarks
                        }
                    }).then(function(response) {});
                    $http({
                        method: 'GET',
                        url: 'insertData/insert-advpayment-details.php',
                        params: {
                            admissionid: $scope.selectedRow,
                            payment: $scope.advpayment,
                            ornumber: $scope.ornumber
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
                                $('#dischargeModal').modal('show');
                            }
                        });

                    } else {
                        $('#myModal').modal('show');
                    }
                }

                $scope.getPage = function(check) {

                    switch (check) {
                        case 'Dashboard':
                            window.location.href = 'index.php?at=' + $scope.at
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
      
        </div>
        
        <?php include 'footer.php'?>