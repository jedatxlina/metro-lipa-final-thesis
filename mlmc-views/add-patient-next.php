<?php include 'admin-header.php'?>

<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 	
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css"/>

<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li><a href="#">Patients</a>
    </li>
    <li class="active"><a href="index.php">Patient Medical Details</a>
    </li>
</ol><br><br>

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
                                            <legend>Personal Medical History</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    
                                                    <label>Conditions</label>
                                                    <select id="conditions" class="select2" multiple="multiple" style="width:550px;">
                                                        <optgroup label="List of Medicines">
                                                            <option ng-repeat="condition in conditions" value="{{condition.ConditionID}}">{{condition.Conditions}}</option>
                                                        </optgroup>
                                                        <option ng-value="Others">Others</option>
                                                    </select>     

                                                    <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('condition')"></i></a><br><br>
                                                    <div id="otherconditions">
                                                        <label>Other Conditions</label>
                                                        <input type="text" ng-model="otherconditions" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                    </div>

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
                                                    <label>PR</label>
                                                    <input type="text" ng-model="pr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>RR</label>
                                                    <input type="text" class="form-control" ng-model="rr" ui-mask="99"  ui-mask-placeholder ui-mask-placeholder-char="-  "/>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Temperature</label>
                                                    <input type="text" class="form-control" ng-model="temp" ui-mask="99°"  ui-mask-placeholder ui-mask-placeholder-char="-  "/>
                                                </div>
                                            </div>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Current Medications</label>
                                                    <select id="medications" class="select2" multiple="multiple" style="width:350px;">
                                                        <optgroup label="List of Medicines">
                                                             <option ng-repeat="medicine in medicines" value="{{medicine.MedicineID}}">{{medicine.MedicineName}}</option>
                                                        </optgroup>
                                                        <option ng-value="Others">Others</option>
                                                    </select>

                                                    <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('currentmed')"></i></a><br><br>
                                                    <div id="othercurrentmed">
                                                        <label>Other Current Medication</label>
                                                        <input type="text" ng-model="othercurrentmed" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                    </div>
                                                </div>
                                                <div data-field-span="1">
                                                        <label>Weight (Kg)</label>
                                                        <input type="text" ng-model="weight" class="form-control tooltips" data-trigger="hover" data-original-title="(Kg)">
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Height (cm)</label>
                                                        <input type="text" ng-model="height"class="form-control tooltips" data-trigger="hover" data-original-title="(Cm)">
                                                    </div>
                                            </div>
                                           
                                            <legend>Review of System</legend>
                                            <div data-row-span="4"> 
                                                    <div data-field-span="2">
                                                        <label>Impression/Admitting Diagnosis</label>
                                                        <textarea autogrow ng-model="diagnosis"></textarea>
                                                    </div>
                                                    <div data-field-span="2">
                                                        <label>Administered Medications</label>
                                                        <div class="controls">
                                                        
                                                            <select id="administered" class="select2" multiple="multiple" style="width:400px;">
                                                                <optgroup label="List of Medicines">
                                                                     <option ng-repeat="medicine in medicines" value="{{medicine.MedicineID}}">{{medicine.MedicineName}}</option>
                                                                </optgroup>
                                                                <option ng-value="Others">Others</option>
                                                            </select>
                                                            <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('administeredmed')"></i></a><br><br>
                                                            <div id="otheradministeredmed">
                                                                <label>Other Administered Medication</label>
                                                                <input type="text" ng-model="otheradministeredmed" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Attending Physician</label>
                                                    <select class="form-control" ng-model="attendingphysician" style="width:395px;">
                                                        <option value="" disabled selected>Select Physician</option>
                                                         <option ng-repeat="physician in physicians" value="{{physician.AccountID}}">{{physician.Fullname}}</option>
                                                       
                                                    </select>
                                                
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
        $('.select2').select2({ placeholder : '' });

        $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

        $('button[data-select2-open]').click(function(){
        $('#' + $(this).data('select2-open')).select2('open');
        });

                var app = angular.module('myApp', ['angular-autogrow','ui.mask']);

                app.controller('userCtrl', function($scope, $window, $http,$interval) {
                    $scope.at = "<?php echo $_GET['at'];?>";
                    $scope.admissionid = "<?php echo $_GET['id']; ?>";
                    $scope.medid = "<?php echo $_GET['medid']; ?>";
                    $scope.param = "<?php echo $_GET['param']; ?>";
                  
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
                                params: {id: $scope.at}
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

                    $scope.otherconditions = '';
                    $scope.othercurrentmed = '';
                    $scope.otheradministeredmed = '';
                    $('#otherconditions').hide();
                    $('#othercurrentmed').hide();
                    $('#otheradministeredmed').hide();
                
                    $( "#conditions" ).click(function() {
                        $scope.condition = $("#conditions").val();

                        if( $scope.condition.indexOf('Others') >= 0){
                            $('#otherconditions').show();
                        }
                   
                    });

                    $( "#medications" ).click(function() {
                        $scope.medication = $("#medications").val();
                        if( $scope.medication.indexOf('Others') >= 0){
                            $('#othercurrentmed').show();
                        }
                   
                    });

                    $( "#administered" ).click(function() {
                        $scope.administered = $("#administered").val();
                        if( $scope.administered.indexOf('Others') >= 0){
                            $('#otheradministeredmed').show();
                        }
                    });


                  

                    $scope.reset = function(val){
                        $scope.chck = val;
                        switch ($scope.chck) {
                            case 'condition':
                            $('#conditions').removeAttr('disabled');
                            $('#otherconditions').hide();
                                break;
                                
                            case 'currentmed':
                            $('#medications').removeAttr('disabled');
                            $('#othercurrentmed').hide();
                                break;

                            case 'administeredmed':
                            $('#administered').removeAttr('disabled');
                            $('#otheradministeredmed').hide();
                                break;
                        
                            default:
                                break;
                        }
                    }
                    
                    $scope.parsedbp = [];

                    $scope.submitDetails = function(){

                             $scope.condition = $("#conditions").val();
                             $scope.medication =$("#medications").val();
                             $scope.administered =$("#administered").val();

                            $scope.found = $scope.condition.indexOf('Others');
                            while ($scope.found !== -1) {
                                $scope.condition.splice($scope.found, 1);
                                $scope.found = $scope.condition.indexOf('Others');
                             
                            }
                            if($scope.otherconditions != ''){
                                $scope.condition = $scope.condition.concat($scope.otherconditions);
                            }
                            

                            $scope.found1 = $scope.medication.indexOf('Others');
                            while ($scope.found1 !== -1) {
                                $scope.medication.splice($scope.found1, 1);
                                $scope.found1 = $scope.medication.indexOf('Others');
                             
                            }
                            if($scope.othercurrentmed != ''){
                                $scope.medication = $scope.medication.concat($scope.othercurrentmed);
                            }
                           
                            
                            $scope.found2 = $scope.administered.indexOf('Others');
                            while ($scope.found2 !== -1) {
                                $scope.administered.splice($scope.found2, 1);
                                $scope.found2 = $scope.administered.indexOf('Others');
                             
                            }
                            if($scope.otheradministeredmed != ''){
                                $scope.administered = $scope.administered.concat($scope.otheradministeredmed);
                            }
                

                            $scope.vitalsid =     "<?php echo rand(111111, 999999);?>"; 
                            $scope.medicationid = "<?php echo rand(111111, 999999);?>"; 
                            $scope.diagnosisid =  "<?php echo rand(111111, 999999);?>"; 
                            $scope.attendingid =  "<?php echo rand(111111, 999999);?>"; 

                            $scope.parsedbp =  $scope.bp.split('/');
                      
                            if($scope.param != 'Outpatient'){
                                $http({
                                method: 'GET',
                                url: 'qr-generator/index.php',
                                params: {medid: $scope.medid,
                                        admissionid: $scope.admissionid,
                                    }
                                }).then(function(response) {
                                });
                            }
                     
                           
         
                            $http({
                                method: 'GET',
                                url: 'insertData/insert-medical-details.php',
                                params: {medid: $scope.medid,
                                        admissionid: $scope.admissionid,
                                        vitalsid: $scope.vitalsid,
                                        medicationid: $scope.medicationid,
                                        diagnosisid: $scope.diagnosisid,
                                        attendingid: $scope.attendingid,
                                        surgery: $scope.surgery,
                                        bp: JSON.stringify($scope.parsedbp),
                                        pr: $scope.pr,
                                        rr: $scope.rr,
                                        temp: $scope.temp,
                                        weight: $scope.weight,
                                        height: $scope.height,
                                        diagnosis: $scope.diagnosis,
                                        attending: $scope.attendingphysician}
                            }).then(function(response) {
                                window.location.href = 'insertData/insert-medications-details.php?param=' + $scope.param + '&at=' + $scope.at + '&medicationid=' + $scope.medicationid + '&admissionid=' + $scope.admissionid + '&administered=' + $scope.administered + '&physicianid=' + $scope.attendingphysician + '&medication=' + $scope.medication + '&condition=' + $scope.condition;
                            });
                 
                    }

                    $scope.goBack = function(){
                            $http({
                                method: 'get',
                                url: 'cancelData/cancel-patient-details.php',
                                params: {id: $scope.admissionid}
                            }).then(function(response) {
                               alert('jed');
                            });
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
                });
                
        </script>
</div>
<?php include 'footer.php'?>