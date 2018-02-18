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
                                    <!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div> -->
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Medical History</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Conditions</label>
                                                    <select id="conditions" class="select2" multiple="multiple" style="width:400px;">
                                                        <optgroup label="List of Conditions">
                                                            <option value="Asthma">Asthma</option>
                                                            <option value="Cva">CVA</option>
                                                            <option value="Cancer">Cancer</option>
                                                            <option value="Heart Disease">Heart Disease</option>
                                                            <option value="Hypertension">Hypertension</option>
                                                        </optgroup>   
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Previous Surgeries</label>
                                                    <textarea autogrow ng-model="surgery"></textarea>
                                                </div>
                                            </div>
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>BP</label>
                                                    <input type="text" ng-model="bp">
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
                                                    <select id="medications" class="select2" multiple="multiple" style="width:400px;">
                                                        <optgroup label="List of Medicines">
                                                             <option ng-repeat="medicine in medicines" value="{{medicine.MedicineID}}">{{medicine.MedicineName}}</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                        <label>Weight</label>
                                                        <input type="text" ng-model="weight">
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Height</label>
                                                        <input type="text" ng-model="height">
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
                                                            <!-- <select id="administered" class="select2" multiple="multiple" style="width:400px;">
                                                                <optgroup label="List of Medicines">
                                                                    <option value="Aspirin">Aspirin</option>
                                                                    <option value="Paracetamol">Paracetamol</option>    
                                                                    <option value="Biogesic">Biogesic</option>
                                                                    <option value="Bioflu">Bioflu</option>
                                                                    <option value="Ibuprofen">Ibuprofen</option>
                                                                </optgroup>
                                                            </select> -->
                                                            <!-- <select class="form-control"  ng-model="administered" ng-options="medicine.MedicineName for medicine in medicines | orderBy:'provname':false track by medicine.MedicineID">
                                                                <option value="" disabled selected>Select Medicine</option>
                                                            </select> -->
                                                            <select id="administered" class="select2" multiple="multiple" style="width:400px;">
                                                                <optgroup label="List of Medicines">
                                                                     <option ng-repeat="medicine in medicines" value="{{medicine.MedicineID}}">{{medicine.MedicineName}}</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Attending Physician</label>
                                                    <select class="form-control" ng-options="physician.Fullname for physician in physicians | orderBy:'provname':false track by physician.PhysicianID" ng-model="attending">
                                                        <option value="" disabled selected>Select Physician</option>
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Classification</label>
                                                    <label>
                                                        <input type="radio" name="classification" ng-model="classification" value="Cash"> Cash</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="classification" ng-model="classification" value="HMO"> Corporate</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="classification" ng-model="classification" value="Corporate"> HMO</label>
                                                    <label>
                                                        <input type="radio" name="classification" ng-model="classification" value="Private"> Private</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="clearfix pt-md">
                                                <div class="pull-right">
                                                    <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                    <button type="submit" class="btn-danger btn" ng-click="submitDetails()">Submit</button>
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

                app.controller('userCtrl', function($scope, $window, $http) {
                    $scope.at = "<?php echo $_GET['at'];?>";
                    $scope.admissionid = "<?php echo $_GET['id']; ?>";
                    $scope.medid = "<?php echo $_GET['medid']; ?>";
                    $scope.param = "<?php echo $_GET['param']; ?>";
                    
                    switch ($scope.at.charAt(0)) {
                        case '1':
                            $scope.Administrator = true;
                            break;
                        
                        case '2':
                            $scope.Admission = true;
                            break;
                        
                        case '3':
                            $scope.Nurse = true;
                            break;
                        
                        case '4':
                            $scope.Physician = true;
                            break;
                        
                        case '5':
                            $scope.Pharmacy = true;
                            break;

                        case '6':
                            $scope.Billing = true;
                            break;
                    
                        default:
                            break;
                    }

                    $http({
                        method: 'GET',
                        url: 'getData/get-physician-details.php'
                    }).then(function(response) {
                        $scope.physicians = response.data;
                    });

                    
                    $http({
                        method: 'GET',
                        url: 'getData/get-medicine-details.php'
                    }).then(function(response) {
                        $scope.medicines = response.data;
                    });
                    

         

                    $scope.submitDetails = function(){
                        $scope.condition =$("#conditions").val();
                        $scope.medication =$("#medications").val();
                        $scope.administered =$("#administered").val();

                        $http({
                            method: 'GET',
                            url: 'insertData/insert-medical-details.php',
                            params: {medid: $scope.medid,
                                    admissionid: $scope.admissionid,
                                    conditions: $scope.condition,
                                    surgery: $scope.surgery,
                                    bp: $scope.bp,
                                    pr: $scope.pr,
                                    rr: $scope.rr,
                                    temp: $scope.temp,
                                    medications: $scope.medication,
                                    weight: $scope.weight,
                                    height: $scope.height,
                                    diagnosis: $scope.diagnosis,
                                    administered: $scope.administered,
                                    attending: $scope.attending.PhysicianID,
                                    classification: $scope.classification}
                        }).then(function(response) {
                        });

                              
                        $http({
                            method: 'GET',
                            url: 'qr-generator/index.php',
                            params: {medid: $scope.medid,
                                    admissionid: $scope.admissionid,
                                 }
                        }).then(function(response) {
                                switch ($scope.param) {
                                    case 'Emergency':
                                    window.location.href = 'emergency.php?at=' + $scope.at;         
                                    break;
                            
                                default:
                                    break;
                            }
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