<?php include 'admin-header.php'?>

    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
    <link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css" />

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a>
        </li>
        <li><a href="#">Patients</a>
        </li>
        <li class="active"><a href="index.php">Patient Medication Details</a>
        </li>
    </ol>
    <div class="clearfix">
        <div class="pull-left">
            &emsp;
            <button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        </div>
    </div>
    <br>
    <div ng-app="myApp" ng-controller="userCtrl">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div data-widget-group="group1">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel panel-profile">
                                    <div class="panel-body" data-ng-repeat="patient in patientdetails">
                                        <img ng-src="{{patient.QRpath}}">
                                        <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                                        <div class="info">{{patient.AdmissionID}}</div>
                                        <br>
                                        <a ng-click="printQR()" ng-if="chckval != 7"><i class="ti ti-printer"></i>&nbsp; Print QR Code</a>
                                    </div>
                                    <center>

                                </div>
                                <!-- panel -->
                                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                                    <a href="#tab-med" role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Medication Details</a>
                                </div>
                            </div>
                            <!-- col-sm-3 -->
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-med">
                                        <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                            <div class="panel-heading">
                                                <h2>Patient Medication Details</h2>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover m-n">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Medicine Name</th>
                                                                <th>Nurse ID</th>
                                                                <th>Date Time Intake</th>
                                                                <th>Next Time Intake</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr data-ng-repeat="medication in medications track by $index">
                                                                <td>{{$index}}</td>
                                                                <td>{{medication.MedicineName}}</td>
                                                                <td>{{medication.NurseID}}</td>
                                                                <td>{{medication.DateIntake}} {{medication.TimeIntake}}</td>
                                                                <td>{{medication.NextTimeIntake}}</td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .tab-content -->
                            </div>
                            <!-- col-sm-8 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.select2').select2({
                placeholder: ''
            });

            $('.select2-remote').select2({
                data: [{
                    id: 'A',
                    text: 'A'
                }]
            });

            $('button[data-select2-open]').click(function() {
                $('#' + $(this).data('select2-open')).select2('open');
            });

            var app = angular.module('myApp', ['angular-autogrow', 'ui.mask']);

            app.controller('userCtrl', function($scope, $window, $http) {
                $scope.at = "<?php echo $_GET['at'];?>";
                $scope.admissionid = "<?php echo $_GET['id']; ?>";

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
                    method: 'GET',
                    url: 'getData/get-medication-timeline-details.php',
                    params: {id: $scope.admissionid}
                }).then(function(response) {
                    $scope.medications = response.data;
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
                    method: 'get',
                    url: 'getData/get-patient-details.php',
                    params: {
                        id: $scope.admissionid
                    }
                }).then(function(response) {
                    $scope.patientdetails = response.data;
                });

                $scope.submitDetails = function(type) {

                }

                $scope.goBack = function() {
                    window.history.back();
                }

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
            });
        </script>
    </div>
    <?php include 'footer.php'?>