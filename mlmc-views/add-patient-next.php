<?php 
	  $activeMenu = "patients";	
?>
    <?php include 'admin-header.php'?>

        <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
        <link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css" />

        <ol class="breadcrumb">
            <li><a href="index.php">Home</a>
            </li>
            <li><a href="#">Patients</a>
            </li>
            <li class="active"><a href="index.php">Patient Medical Details</a>
            </li>
        </ol>

        <div ng-app="myApp" ng-controller="userCtrl">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                        <div class="panel-heading">
                                            <h2>Patient Medical Details</h2>
                                        </div>
                                        <div class="panel-body">
                                            <form class="grid-form" action="javascript:void(0)">
                                                <fieldset>
                                                    <legend>Medical Conditions</legend>
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">

                                                            <label>Conditions</label>
                                                            <!-- <select id="conditions" class="select2" multiple="multiple" style="width:400px;">
                                                                <optgroup label="List of Conditions">
                                                                    <option ng-repeat="condition in conditions | orderBy:'Conditions'" value="{{condition.ConditionID}}">{{condition.Conditions}}</option>
                                                                </optgroup>
                                                                <option ng-value="Others">Others</option>
                                                            </select> -->
                                                            <textarea autogrow ng-model="condition"></textarea>      
                                                            <!-- <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('condition')"></i></a> -->
                                                            <!-- <br>
                                                            <br>
                                                            <div id="otherconditions">
                                                                <label>Other Conditions</label>
                                                                <input type="text" ng-model="otherconditions" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                            </div> -->
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Previous Surgeries</label>
                                                            <textarea autogrow ng-model="surgery"></textarea>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="4">
                                                        <div data-field-span="1">
                                                            <label>BP</label>
                                                            <input type="text" ng-model="bp" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with /">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Pulse Rate</label>
                                                            <input type="text" ng-model="pr">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Respiratory Rate</label>
                                                            <input type="text" class="form-control" ng-model="rr" ui-mask="99" ui-mask-placeholder ui-mask-placeholder-char="-  " />
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Temperature</label>
                                                            <input type="text" class="form-control" ng-model="temp">
                                                        </div>
                                                    </div>
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Administered Medicines</label>
                                                            <select id="medications" class="select2" multiple="multiple" style="width:350px;">
                                                                <optgroup label="List of Medicines">
                                                                    <option ng-repeat="medicine in medicines | orderBy:'MedicineName'" value="{{medicine.MedicineID}}">{{medicine.MedicineName}}</option>
                                                                </optgroup>
                                                                <option ng-value="Others">Others</option>
                                                            </select>

                                                            <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('currentmed')"></i></a>
                                                            <br>
                                                            <br>
                                                            <div id="othercurrentmedication">
                                                                <label>Other Administered Medicines</label>
                                                                <input type="text" ng-model="othercurrentmed" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                            </div>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Weight (Kg)</label>
                                                            <input type="text" ng-model="weight" class="form-control tooltips" data-trigger="hover" data-original-title="(Kg)">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Height (cm)</label>
                                                            <input type="text" ng-model="height" class="form-control tooltips" data-trigger="hover" data-original-title="(Cm)">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <legend>Attending Physician</legend>
                                                        <div data-row-span="4" ng-show="param != 'Outpatient'">
                                                            <div data-field-span="2">
                                                                <!-- <label>Impression/Admitting Diagnosis</label>
                                                            <select id="diagnosis" class="select2" multiple="multiple" style="width:400px;">
                                                                    <optgroup label="List of Impression/Diagnosis">
                                                                        <option ng-repeat="condition in conditions" value="{{condition.ConditionID}}">{{condition.Conditions}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('otherdiagnosis')"></i></a><br><br>
                                                                <div id="otherdiagnosis">
                                                                    <label>Other Impression/Diagnosis</label>
                                                                    <input type="text" ng-model="otherdiagnosis" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                                </div> -->
                                                                <div data-field-span="1">
                                                                    <label>Specialization</label>
                                                                    <select class="form-control" ng-model="specialization" style="width:395px;">
                                                                        <option value="" selected> Select Specialization</option>
                                                                        <option ng-repeat="val in specializations | orderBy:'SpecializationName'" value="{{val.SpecializationName}}">{{val.SpecializationName}}</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div data-field-span="2">
                                                                <!-- <label>Required Medicine Intake</label> -->
                                                                <!-- <div class="controls">
                                                                <select id="administered" class="select2" multiple="multiple" style="width:400px;">
                                                                    <optgroup label="List of Medicines">
                                                                        <option ng-repeat="medicine in medicines" value="{{medicine.MedicineID}}">{{medicine.MedicineName}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('administeredmed')"></i></a><br><br>
                                                                <div id="otheradministeredmed">
                                                                    <label>Other Required Medicine Intake</label>
                                                                    <input type="text" ng-model="otheradministeredmed" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                                </div>
                                                            </div> -->
                                                                <div ng-if="specialization">
                                                                    <div data-field-span="1">
                                                                        <label>Attending Physician</label>
                                                                        <select class="form-control" ng-options="physician.Fullname for physician in physicians |  filter:filterPhysician(specialization)" ng-model="$parent.attendingphysician1" style="width:395px;">
                                                                            <option value="" disabled selected>Select Physician</option>
                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div ng-if="!specialization">
                                                                    <div data-field-span="1">
                                                                        <label>Attending Physician</label>
                                                                        <select class="form-control" ng-model="$parent.attendingphysician2" style="width:395px;">
                                                                            <option value="" disabled selected>Select Physician</option>
                                                                            <option ng-repeat="physician in physicians" value="{{physician.PhysicianID}}">{{physician.Fullname}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="clearfix pt-md">
                                                        <div class="pull-right">
                                                            <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                            <button type="submit" class="btn-danger btn" ng-click="submitDetails()">Next</button>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                            </form>
                                        </div>
                                    </div>
                                </div>
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

                app.controller('userCtrl', function($scope, $window, $http, $interval) {
                    $scope.at = "<?php echo $_GET['at'];?>";
                    $scope.admissionid = "<?php echo $_GET['id']; ?>";
                    $scope.medid = "<?php echo $_GET['medid']; ?>";
                    $scope.param = "<?php echo $_GET['param']; ?>";
                    $scope.specialization = '';

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

                    switch ($scope.at.charAt(0)) {
                        case '7':
                            $http({
                                method: 'GET',
                                url: 'getData/get-physician-outpatient-details.php',
                                params: {
                                    id: $scope.at
                                }
                            }).then(function(response) {
                                $scope.physicians = response.data;
                            });
                            break;

                        default:
                            $http({
                                method: 'GET',
                                url: 'getData/get-physician-details.php'
                            }).then(function(response) {
                                $scope.physicians = response.data;
                            });
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
                        method: 'GET',
                        url: 'getData/get-medicine-details.php'
                    }).then(function(response) {
                        $scope.medicines = response.data;
                    });

                    $http({
                        method: 'GET',
                        url: 'getData/get-specialization-details.php'
                    }).then(function(response) {
                        $scope.specializations = response.data;
                    });

                    $http({
                        method: 'GET',
                        url: 'getData/get-conditions-details.php'
                    }).then(function(response) {
                        $scope.conditions = response.data;
                    });

                    $scope.otherconditions = '';
                    $scope.othercurrentmed = '';
                    $scope.otherdiagnosis = '';
                    $scope.otheradministeredmed = '';

                    $('#otherconditions').hide();
                    $('#othercurrentmedication').hide();
                    $('#otherdiagnosis').hide();
                    $('#otheradministeredmed').hide();

                    $("#conditions").click(function() {
                        $scope.condition = $("#conditions").val();

                        if ($scope.condition.indexOf('Others') >= 0) {
                            $('#otherconditions').show();
                        }

                    });

                    $("#medications").click(function() {
                        $scope.medication = $("#medications").val();
                        if ($scope.medication.indexOf('Others') >= 0) {
                            $('#othercurrentmedication').show();
                        }

                    });

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
                            case 'condition':
                                $('#conditions').removeAttr('disabled');
                                $('#otherconditions').hide();
                                break;

                            case 'currentmed':
                                $('#medications').removeAttr('disabled');
                                $('#othercurrentmedication').hide();
                                break;

                            case 'otherdiagnosis':
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

                    $scope.filterPhysician = function(param) {
                        return function(physician) {
                            if (physician.Specialization == param) {
                                return true;
                            }
                            return false;
                        };
                    }

                    $scope.parsedbp = [];

                    $scope.submitDetails = function() {
                        // alert($scope.attendingphysician.PhysicianID);
                        // $scope.condition = $("#conditions").val();
                       
                        $scope.medication = $("#medications").val();
                
                        $scope.vitalsid =     "<?php echo rand(111111, 999999);?>"; 
                        $scope.medicationid = "<?php echo rand(111111, 999999);?>"; 
                        $scope.attendingid =  "<?php echo rand(111111, 999999);?>"; 
                        $scope.diagnosisid =  "<?php echo rand(111111, 999999);?>"; 

                        $scope.parsedbp =  $scope.bp.split('/');

                        // // $scope.found = $scope.condition.indexOf('Others');
                        // // while ($scope.found !== -1) {
                        // //     $scope.condition.splice($scope.found, 1);
                        // //     $scope.found = $scope.condition.indexOf('Others');

                        // // }
                        // // if($scope.otherconditions != ''){
                        // //     $scope.condition = $scope.condition.concat($scope.otherconditions);
                        // // }

                        $scope.found1 = $scope.medication.indexOf('Others');
                        while ($scope.found1 !== -1) {
                            $scope.medication.splice($scope.found1, 1);
                            $scope.found1 = $scope.medication.indexOf('Others');

                        }
                        if($scope.othercurrentmed != ''){
                            $scope.medication = $scope.medication.concat($scope.othercurrentmed);
                        }

                        if($scope.param != 'Outpatient'){
                            if($scope.specialization == ''){
                              
                                $scope.attendphysician = $scope.attendingphysician2;
                            }else{
                                $scope.attendphysician = $scope.attendingphysician1.PhysicianID;
                            }

                        //         // $scope.diagnosis =$("#diagnosis").val();
                        //         // $scope.found3 = $scope.diagnosis.indexOf('Others');
                        //         // while ($scope.found3 !== -1) {
                        //         //     $scope.diagnosis.splice($scope.found3, 1);
                        //         //     $scope.found3 = $scope.diagnosis.indexOf('Others');

                        //         // }
                        //         // if($scope.otherdiagnosis != ''){
                        //         //     $scope.diagnosis = $scope.diagnosis.concat($scope.otherdiagnosis);
                        //         // }

                        //         // $scope.administered =$("#administered").val();
                        //         // $scope.found2 = $scope.administered.indexOf('Others');
                        //         // while ($scope.found2 !== -1) {
                        //         //     $scope.administered.splice($scope.found2, 1);
                        //         //     $scope.found2 = $scope.administered.indexOf('Others');

                        //         // }
                        //         // if($scope.otheradministeredmed != ''){
                        //         //     $scope.administered = $scope.administered.concat($scope.otheradministeredmed);
                        //         // }
                    
                                $http({
                                method: 'GET',
                                url: 'qr-generator/index.php',
                                params: {medid: $scope.medid,
                                        admissionid: $scope.admissionid,
                                    }
                                }).then(function(response) {
                                });

                            $http({
                            method: 'GET',
                            url: 'insertData/insert-medical-details.php',
                            params: {medid: $scope.medid,
                                    admissionid: $scope.admissionid,
                                    vitalsid: $scope.vitalsid,
                                    condition: $scope.condition,
                                    medicationid: $scope.medicationid,
                                    attendingid: $scope.attendingid,
                                    diagnosisid: $scope.diagnosisid,
                                    surgery: $scope.surgery,
                                    bp: JSON.stringify($scope.parsedbp),
                                    pr: $scope.pr,
                                    rr: $scope.rr,
                                    temp: $scope.temp,
                                    weight: $scope.weight,
                                    height: $scope.height,
                                    attending: $scope.attendphysician}
                            }).then(function(response) {
                                window.location.href = 'insertData/insert-medications-details.php?param=' + $scope.param + '&at=' + $scope.at + '&medicationid=' + $scope.medicationid + '&admissionid=' + $scope.admissionid + '&physicianid=' + $scope.attendphysician + '&medication=' + $scope.medication  + '&attendingid=' + $scope.attendingid + '&medid=' + $scope.medid;
                            });      
                        }
                        // else{
                        //     $http({
                        //     method: 'GET',
                        //     url: 'insertData/insert-medicalopd-details.php',
                        //     params: {medid: $scope.medid,
                        //             admissionid: $scope.admissionid,
                        //             vitalsid: $scope.vitalsid,
                        //             attendingid: $scope.attendingid,
                        //             surgery: $scope.surgery,
                        //             bp: JSON.stringify($scope.parsedbp),
                        //             pr: $scope.pr,
                        //             rr: $scope.rr,
                        //             temp: $scope.temp,
                        //             weight: $scope.weight,
                        //             height: $scope.height,
                        //             attending: $scope.attendingphysician}
                        //     }).then(function(response) {
                        //         window.location.href = 'insertData/insert-condition-details.php?param=' + $scope.param + '&at=' + $scope.at + '&admissionid=' + $scope.admissionid + '&condition=' + $scope.condition + '&medid=' + $scope.medid + '&medication=' + $scope.medication;
                        //     });   
                        // }

                    }

                    $scope.goBack = function() {
                        $http({
                            method: 'get',
                            url: 'cancelData/cancel-patient-details.php',
                            params: {
                                id: $scope.admissionid
                            }
                        }).then(function(response) {
                            alert('jed');
                        });
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