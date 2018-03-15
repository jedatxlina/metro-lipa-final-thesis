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
    <li class="active"> <a href="specialization.php">Physician</a>
    </li>
</ol>
<div class="clearfix">
    <div class="pull-left">
        &emsp;<button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">

    </div>
    <br>
    <div data-widget-group="group1">
        <div id="physiciandashboard">
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
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Post Diagnosis</h2>
                            <div class="panel-ctrls"></div>
                        </div>
                        <div class="panel-body">
                            <form class="grid-form">
                                <div class="row">
                                    <fieldset data-ng-repeat="patient in patientdetails">
                                        <div data-row-span="2">
                                            <div data-field-span="1">
                                                <label>Admission ID<br></label>
                                                <input type="text" ng-model="admissionid" ng-disabled='true'>
                                            </div>
                                            <div data-field-span="1">
                                                <label>Patient Name<br></label>
                                                <input type="text" class="form-control" ng-value="patient.Firstname + ' ' + patient.Middlename + ' ' + patient.Lastname" disabled="disabled">
                                            </div>
                                        </div>
                                        <div data-row-span="1">
                                            <div data-field-span="1">
                                                <label>Attending ID</label>
                                                <input type="text" class="form-control" ng-value="patient.Attending" disabled="disabled">
                                                <input type="hidden" ng-model="$parent.attendingid" ng-init="$parent.attendingid = patient.Attending">
                                            </div>
                                        </div>
                                    </fieldset>
                                     <fieldset>
                                        <div data-row-span="2">
                                            <div data-field-span="1">
                                                <label>Post-Diagnosis</label><br>
                                                <select id="diagnosis" class="select2" multiple="multiple" style="width:420px;">
                                                        <optgroup label="List of Medicines">
                                                            <option ng-repeat="condition in conditions" value="{{condition.ConditionID}}">{{condition.Conditions}}</option>
                                                        </optgroup>
                                                        <option ng-value="Others">Others</option>
                                                </select>  
                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('diagnosis')"></i></a><br><br>
                                                    <div id="otherdiagnosis">
                                                        <label>Other Conditions</label>
                                                        <input type="text" ng-model="otherdiagnosis" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                    </div>   
                                            </div>
                                            <div data-field-span="1">
                                                <label>Post-Order</label><br>
                                                <textarea autogrow ng-model="$parent.order"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div data-row-span="1">
                                            <div data-field-span="1">
                                                <label>Laboratory: </label>
                                                <input type="radio" ng-model="lab" name="lab" value='Yes' class="tooltips" data-trigger="hover" data-original-title="Yes"> Yes &nbsp;
                                                <input type="radio" ng-model="lab" name="lab" value='No' class="tooltips" data-trigger="hover" data-original-title="No" selected> No <br>
                                                <select id="laboratories" class="select2" multiple="multiple" style="width:370px;" ng-disabled="lab != 'Yes'">
                                                    <optgroup label="List of Laboratories">
                                                        <option ng-repeat="lab in labs" value="{{lab.LaboratoryID}}">{{lab.Description}}</option>
                                                    </optgroup>
                                                    <option ng-value="Others">Others</option>
                                                </select>
                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('labs')"></i></a>
                                                <br><br>
                                                <div id="otherlabs">
                                                    <label>Other Laboratories</label>
                                                    <input type="text" ng-model="otherlabs" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                </div>
                                            </div>
                                        </div>
                                        <div data-row-span="1">
                                            <div data-field-span="1">
                                                <label>Medications: </label>
                                                <select id="medications" class="select2" multiple="multiple" style="width:370px;">
                                                                <optgroup label="List of Medicines">
                                                                    <option ng-repeat="meds in medicines" value="{{meds.MedicineID}}">{{meds.MedicineName}}</option>
                                                                </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                            </select>
                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('meds')"></i></a>
                                                <br><br>
                                                <div id="othermeds">
                                                    <label>Other Medicines</label>
                                                    <input type="text" ng-model="othermeds" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <button type="button" class="btn btn-defualt pull-right" data-dismiss="modal">Close</button>
                                <button ng-click='confirmDiagnosis()' class="btn btn-danger pull-right">Confirm</button>
                            </form>
                        </div>
                        <div class="panel-footer"></div>

                    </div>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>

        <script>
            $('.select2').select2({ placeholder : '' });
    
            $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});
    
            $('button[data-select2-open]').click(function(){
            $('#' + $(this).data('select2-open')).select2('open');
            });
            
            var fetch = angular.module('myApp', ['angular-autogrow']);
    
    
                fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {
                    $scope.at = "<?php echo $_GET['at'];?>";
                    $scope.admissionid = "<?php echo $_GET['id'];?>";
                    $scope.lab = 'No';
    
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
                        method: 'get',
                        url: 'getData/get-patient-details.php',
                        params: {id: $scope.admissionid}
                    }).then(function(response) {
                        $scope.patientdetails = response.data;
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
                    $scope.otherdiagnosis = '';
                    $scope.otherlabs = ''; 
                    $scope.othermeds = ''; 
                    
                    $('#otherdiagnosis').hide();
                    $('#otherlabs').hide();
                    $('#othermeds').hide();
                    
                    $( "#diagnosis" ).click(function() {
                        $scope.diagnosis = $("#diagnosis").val();

                        if( $scope.diagnosis.indexOf('Others') >= 0){
                            $('#otherdiagnosis').show();
                        }
                   
                    });

                    $("#laboratories").click(function() {
                            $scope.lab = $("#laboratories").val();
                            if( $scope.lab.indexOf('Others') >= 0){
                                $('#otherlabs').show();
                            }
                       
                    });
    
                    $("#medications").click(function() {
                            $scope.meds = $("#medications").val();
                            if( $scope.meds.indexOf('Others') >= 0){
                                $('#othermeds').show();
                            }
                    });
    
                    $scope.reset = function(val){
                            $scope.chck = val;
                            switch ($scope.chck) {
                                case 'diagnosis':
                                $('#diagnosis').removeAttr('disabled');
                                $('#otherdiagnosis').hide();
                                break;

                                case 'labs':
                                $('#otherlabs').hide();
                                    break;
    
                                case 'meds':
                                $('#othermeds').hide();
                                    break;
                            
                                default:
                                    break;
                            }
           
                    }
    
                    $scope.confirmDiagnosis = function(){
                        $scope.diagnosis = $("#diagnosis").val();
                        
                        $scope.found2 = $scope.diagnosis.indexOf('Others');
                            while ($scope.found2 !== -1) {
                                $scope.diagnosis.splice($scope.found2, 1);
                                $scope.found2 = $scope.diagnosis.indexOf('Others');
                             
                            }
                            if($scope.otherdiagnosis != ''){
                                $scope.diagnosis = $scope.diagnosis.concat($scope.otherdiagnosis);
                            }

                        if($scope.lab === 'Yes'){
                            $scope.lab = $("#laboratories").val();
                            $scope.found = $scope.lab.indexOf('Others');
                            
                            while ($scope.found !== -1) {
                                $scope.lab.splice($scope.found, 1);
                                $scope.found = $scope.lab.indexOf('Others');
                            }
                            if($scope.otherlabs != ''){
                                $scope.lab = $scope.lab.concat($scope.otherlabs);
                            }
                        }
                        $scope.meds = $("#medications").val();
                            $scope.found1 = $scope.meds.indexOf('Others');
                            
                            while ($scope.found1 !== -1) {
                                $scope.meds.splice($scope.found1, 1);
                                $scope.found1 = $scope.meds.indexOf('Others');
                            }
                            if($scope.othermeds != ''){
                                $scope.meds = $scope.meds.concat($scope.othermeds);
                            }
                 
                        if($scope.lab != 'No'){
                            window.location.href = 'insertData/insert-diagnosis-details.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&diagnosis=' + $scope.diagnosis + '&order=' + $scope.order + '&lab=' + $scope.lab + '&meds=' + $scope.meds + '&attendingid=' + $scope.attendingid;        
                        }else{
                            window.location.href = 'insertData/insert-diagnosis-details.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&diagnosis=' + $scope.diagnosis + '&order=' + $scope.order + '&meds=' + $scope.meds + '&attendingid=' + $scope.attendingid;        
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
                            
                            default:
                                break;
                        }
                            
                    }
    
                    $scope.goBack = function(){
                            window.history.back();
                    }
    
    
                }]);
        </script>
    </div>
    <?php include 'footer.php'?>