<?php include 'admin-header.php'?>

<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 	
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css"/>

<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li><a href="#">Patients</a>
    </li>
    <li class="active"><a href="index.php">Patient Medication Details</a>
    </li>
</ol><br><br>

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
                    </div>
                    </div><!-- panel -->
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-med" role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Medication Details</a>
                        <a href="#tab-edit" 	role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-pencil"></i> Edit</a>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-med">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Medication Details</h2>
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">  
                                    <fieldset data-ng-repeat="patient in patientdetails">
                                        <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Admission ID<br></label>
                                                    <input type="text" ng-model="admissionid" ng-disabled='true'>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Admission No<br></label>
                                                    <input type="text" ng-model="patient.AdmissionNo" ng-disabled='true'>
                                                
                                                </div>
                                            </div>
                                        <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>Last Name</label>
                                                    <input type="text" ng-value="patient.Lastname" ng-disabled='true'>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>First Name</label>
                                                    <input type="text" ng-value="patient.Firstname" ng-disabled='true'>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Middle Name</label>
                                                    <input type="text" ng-value="patient.Middlename" ng-disabled='true'>
                                                </div>
                                        </div>
                                        </fieldset>  
                                        <br>
                                
                                        <fieldset>
                                                <legend data-ng-repeat="med in medications">{{med.MedicineName}} <h6>Medicine ID: {{med.MedicineID}}</h6></legend>
                                                <div data-row-span="2"  data-ng-repeat="med in medications">
                                                    <div data-field-span="1">
                                                        <label>Dosage</label>
                                                        <input type="text" ng-model="med.Unit"  disabled="disabled"> 
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Quantity</label>
                                                        <input type="text" ng-model="med.Quantity" disabled="disabled">
                                                        <input type="hidden" ng-model="MedID[$index]"> 
                                                    </div>
                                                    
                                                </div>
                                                <div data-row-span="1"  data-ng-repeat="med in medications">
                                                    <div data-field-span="1">
                                                        <label>Notes</label>
                                                        <input type="text" ng-model="med.Notes" placeholder="Notes here" disabled="disabled"> 
                                                    </div>
                                                </div>
                                                <div data-row-span="2">
                                                <div data-field-span="1">
                                                    </div>
                                                <div data-field-span="1"  data-ng-repeat="med in medications">
                                                    <label>Intake(Q1,Q2,Q3,Q4)</label>
                                                        
                                                    <input type="text" ng-model="med.Intake" disabled="disabled"> 
                                                </div>
                                                <br><br>
                                        </fieldset>
                                        <fieldset>
                                                <div class="pull-right">
                                                    <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                    <button type="submit" class="btn-danger btn" ng-click="submitDetails(type)">Submit</button>
                                                </div>
                                        </fieldset>

                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-edit">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Medication Details</h2>
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">  
                                    <fieldset data-ng-repeat="patient in patientdetails">
                                        <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Admission ID<br></label>
                                                    <input type="text" ng-model="admissionid" ng-disabled='true'>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Admission No<br></label>
                                                    <input type="text" ng-model="patient.AdmissionNo" ng-disabled='true'>
                                                
                                                </div>
                                            </div>
                                        <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>Last Name</label>
                                                    <input type="text" ng-value="patient.Lastname" ng-disabled='true'>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>First Name</label>
                                                    <input type="text" ng-value="patient.Firstname" ng-disabled='true'>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Middle Name</label>
                                                    <input type="text" ng-value="patient.Middlename" ng-disabled='true'>
                                                </div>
                                        </div>
                                        </fieldset>  
                                        <br>
                                
                                        <fieldset>
                                                <legend data-ng-repeat="med in medications">{{med.MedicineName}} <h6>Medicine ID: {{med.MedicineID}}</h6></legend>
                                                <div data-row-span="2"  data-ng-repeat="med in medications">
                                                    <div data-field-span="1">
                                                        <label>Dosage</label>
                                                        <input type="text" ng-model="med.Unit"  disabled="disabled"> 
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Quantity</label>
                                                        <input type="text" ng-model="med.Quantity" disabled="disabled">
                                                        <input type="hidden" ng-model="MedID[$index]"> 
                                                    </div>
                                                    
                                                </div>
                                                <div data-row-span="1"  data-ng-repeat="med in medications">
                                                    <div data-field-span="1">
                                                        <label>Notes</label>
                                                        <input type="text" ng-model="med.Notes" placeholder="Notes here" disabled="disabled"> 
                                                    </div>
                                                </div>
                                                <div data-row-span="2">
                                                <div data-field-span="1">
                                                    </div>
                                                <div data-field-span="1">
                                                    <label>Intake(Q1,Q2,Q3,Q4)</label>
                                                        <select id="intake" class="select2" multiple="multiple" style="width:280px;">
                                                            <optgroup label="List of Intake Intervals">
                                                                <option value="Q1">Quarter 1 - Q1</option>
                                                                <option value="Q2">Quarter 2 - Q2</option>
                                                                <option value="Q3">Quarter 3 - Q3</option>
                                                                <option value="Q4">Quarter 4 - Q4</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br><br>
                                        </fieldset>
                                        <fieldset>
                                                <div class="pull-right">
                                                    <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                    <button type="submit" class="btn-danger btn" ng-click="submitDetails(type)">Submit</button>
                                                </div>
                                        </fieldset>

                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- .tab-content -->
                </div><!-- col-sm-8 -->
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
                    $scope.medicineid = "<?php echo $_GET['medid']; ?>";
                    
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
                        url: 'getData/get-medication-details.php',
                        params: {medid: $scope.medicineid,
                                id: $scope.admissionid}
                    }).then(function(response) {
                        $scope.medications = response.data;
                    });

                    $http({
                        method: 'get',
                        url: 'getData/get-patient-details.php',
                        params: {id: $scope.admissionid}
                    }).then(function(response) {
                        $scope.patientdetails = response.data;
             
                    });

                    $scope.submitDetails = function(type){
                        $scope.interval = $("#intake").val();
                        window.location.href = 'updateData/update-intake-interval.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medid=' + $scope.medicineid + '&interval=' + $scope.interval;
                    }

                    $scope.goBack = function(){
                            $http({
                                method: 'get',
                                url: 'cancelData/cancel-patient-details.php',
                                params: {id: $scope.admissionid}
                            }).then(function(response) {
                           
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

                            case 'LaboratoryDept':
                                    window.location.href = 'laboratorydept.php?at=' + $scope.at;
                                    break;
                            
                            default:
                                break;
                        }
                    }
                });
                
         

        </script>
</div>
<?php include 'footer.php'?>