<?php 
	  $activeMenu = "patients";	
?>
<?php include 'admin-header.php' ?>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
    <link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css" />

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
        <li> <a href="#">Patient</a>
        </li>
        <li class="active"> <a href="#">Details</a>
        </li>
    </ol>
    <br>
    <div class="clearfix">
        <div class="pull-left">
            &emsp;
            <button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div data-widget-group="group1">

            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-profile">
                        <div class="panel-body" data-ng-repeat="patient in patientdetails">
                            <img ng-src="{{patient.QRpath}}">
                            <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                            <div class="info">{{patient.AdmissionID}}</div>
                        </div>
                    </div>
                    <!-- panel -->
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-about" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i>Medical Details</a>
                    </div>
                </div>
                <!-- col-sm-3 -->
                <div class="col-sm-9">
                    <div class="tab-content">

                        <div class="tab-pane" id="tab-projects">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Medical History</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive" data-ng-repeat="patient in patientdetails">
                                        <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="80%">
                                            <thead>
                                                <tr>
                                                    <th>Patients Name</th>
                                                    <th>Admission ID</th>
                                                    <th>Admission Date</th>
                                                    <th>Admission Time</th>
                                                    <th>Bed ID</th>
                                                    <th>Medical ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID)">
                                                    <td>{{patient.Lname}}, {{patient.Fname}} {{patient.Mname}}</td>
                                                    <td>{{patient.AdmissionID}}</td>
                                                    <td>{{patient.AdmissionDate}}</td>
                                                    <td>{{patient.AdmissionTime}}</td>
                                                    <td>{{patient.BedID}}</td>
                                                    <td>{{patient.MedicalID}}</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <!-- #tab-projects -->

                        <div class="tab-pane active" id="tab-about">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Profile</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <h4>Personal Information</h4>
                                        <div class="table-responsive">
                                            <table class="table about-table" data-ng-repeat="patient in patientdetails">
                                                <tbody>
                                                    <tr>
                                                        <th>Patient Name</th>
                                                        <td>{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</td>
                                                        <th>Age</th>
                                                        <td>{{patient.Age}}</td>

                                                    </tr>
                                                    <tr>
                                                        <th>Birth Date</th>
                                                        <td>{{patient.Birthdate}}</td>
                                                        <th>Civil Status</th>
                                                        <td>{{patient.CivilStatus}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td>{{patient.Gender}}</td>
                                                        <th>Contact</th>
                                                        <td>{{patient.Contact}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Province</th>
                                                        <td>{{patient.Province}}</td>
                                                        <th>Occupation</th>
                                                        <td>{{patient.Occupation}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>{{patient.City}}</td>

                                                        <th>Citizenship</th>
                                                        <td>{{patient.Citizenship}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{patient.CompleteAddress}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="about-area">
                                        <h4>Medical Information</h4>
                                        <form class="grid-form" action="javascript:void(0)">
                                            <fieldset data-ng-repeat="patient in allpatientdetails">
                                                <div data-row-span="2">
                                                    <div data-field-span="1">
                                                        <label>Conditions
                                                            <br>
                                                        </label> {{patient.Findings}}
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Operations/Surgeries/Laboratories
                                                            <br>
                                                        </label> {{patient.Desc}}

                                                    </div>
                                                </div>
                                                <!-- <div data-row-span="4">
                                                    <div data-field-span="1">
                                                        <label>Blood Pressure</label>
                                                        <input type="text" ng-value="patient.Lastname" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Pulse Rate</label>
                                                        <input type="text" ng-value="patient.Firstname" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Temparature</label>
                                                        <input type="text" ng-value="patient.Middlename" ng-disabled='true'>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Respiratory Rate</label>
                                                        <input type="text" ng-value="patient.Middlename" ng-disabled='true'>
                                                    </div>
                                                </div> -->
                                                <div class="clearfix pt-md">
                                                            <div class="pull-right">
                                                                <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                                <button type="submit" class="btn-danger btn" ng-click="submitDetails()">Confirm</button>
                                                            </div>
                                                        </div>
                                            </fieldset>
                                        </form>
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

        var fetch = angular.module('myApp', ['ui.mask']);

        fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.id = "<?php echo $_GET['id'];?>";
            $scope.pid = "<?php echo $_GET['physicianid'];?>";
            $scope.selectedRow = null;
            $scope.selectedStatus = null;
            $scope.clickedRow = 0;
            $scope.new = {};

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

                default:
                    break;
            }

            $http({
                method: 'GET',
                url: 'getData/get-patient-details.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.patientdetails = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-all-patient-data.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.allpatientdetails = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-medicine-details.php'
            }).then(function(response) {
                $scope.medicines = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-conditions-details.php'
            }).then(function(response) {
                $scope.conditions = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-physician-id.php',
                params: {
                    accid: $scope.pid
                }
            }).then(function(response) {
                $scope.physician = response.data;
            });

            $scope.otherdiagnosis = '';
            $scope.otheradministeredmed = '';

            $('#otherdiagnosis').hide();
            $('#otheradministeredmed').hide();

            $("#diagnosis").click(function() {
                $scope.medication = $("#diagnosis").val();
                if ($scope.medication.indexOf('Others') >= 0) {
                    $('#otherdiagnosis').show();
                }
            });

            $("#administered").click(function() {
                $scope.administered = $("#administered").val();
                if ($scope.administered.indexOf('Others') >= 0) {
                    $('#otheradministeredmed').show();
                }
            });

            $scope.reset = function(val) {
                $scope.chck = val;
                switch ($scope.chck) {
                    case 'diagnosis':
                        $('#diagnosis').removeAttr('disabled');
                        $('#otherdiagnosis').hide();
                        break;

                    case 'administeredmed':
                        $('#administered').removeAttr('disabled');
                        $('#otheradministeredmed').hide();
                        break;

                    default:
                        break;
                }
            }

            $scope.setClickedRow = function(lab) {
                $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
                $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
            }

            $scope.submitDetails = function() {
                // $scope.diagnosis = $("#diagnosis").val();
                // $scope.found3 = $scope.diagnosis.indexOf('Others');
                // while ($scope.found3 !== -1) {
                //     $scope.diagnosis.splice($scope.found3, 1);
                //     $scope.found3 = $scope.diagnosis.indexOf('Others');

                // }
                // if ($scope.otherdiagnosis != '') {
                //     $scope.diagnosis = $scope.diagnosis.concat($scope.otherdiagnosis);
                // }

                // $scope.administered = $("#administered").val();
                // $scope.found2 = $scope.administered.indexOf('Others');
                // while ($scope.found2 !== -1) {
                //     $scope.administered.splice($scope.found2, 1);
                //     $scope.found2 = $scope.administered.indexOf('Others');

                // }
                // if ($scope.otheradministeredmed != '') {
                //     $scope.administered = $scope.administered.concat($scope.otheradministeredmed);
                // }

                $http({
                    method: 'GET',
                    url: 'qr-generator/index.php',
                    params: { admissionid: $scope.id}
                }).then(function(response) {
                });
                
                window.location.href = 'updateData/update-patient-opdtransfer.php?at=' + $scope.at + '&id=' + $scope.id + '&physicianid=' + $scope.pid;
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

            $scope.viewQRcode = function() {
                $('#qrModal').modal('show');
            }

            // $scope.viewQRcode = function(){
            // $('#qrModal').modal('show');
            // }

            $scope.goBack = function() {
                window.history.back();
            }

        }]);
    </script>

    <?php include 'footer.php'?>