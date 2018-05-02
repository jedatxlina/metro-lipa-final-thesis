<?php 
	  $activeMenu = "patients";	
?>
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
                    <div class="panel-body"  data-ng-repeat="patient in patientdetails">
                        <img ng-src="{{patient.QRpath}}">
                        <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                        <div class="info">{{patient.AdmissionID}}</div>
                    </div>
                    </div><!-- panel -->
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-edit" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Medication Details</a>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-9">
                    <div class="tab-content">
                        <!-- <div class="tab-pane active" id="tab-edit" data-ng-repeat="patient in patientdetails"> -->
                        <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Patient Medication Details</h2>
                                <!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div> -->
                            </div>
                            <div class="panel-body">
                                <form class="grid-form" action="javascript:void(0)">  
                                        <fieldset data-ng-repeat="patient in patientdetails">
                                            <div data-row-span="3">
                                                    <div data-field-span="1">
                                                        <label>Admission ID<br></label>
                                                        <input type="text" ng-model="admissionid" ng-disabled='true' >
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Admission No<br></label>
                                                        <input type="text" ng-init="AdmissionNo[$index] = patient.AdmissionNo" ng-model="AdmissionNo[$index]" ng-disabled='true'>
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
                                        
                                        <fieldset data-ng-repeat="intake in intakes track by $index"> 
                                            <legend>Administered Medicines </legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Medicine</label>
                                                    <input type="text" ng-model="Intake[$index]" ng-init="Intake[$index] = intake.MedicineName" disabled="true">  {{intake.Dosage}}
                                                    <input type="hidden" ng-model="Dosage[$index]" ng-init="Dosage[$index] = intake.Dosage"> 
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Quantity Administered</label>
                                                    <input type="text" ng-model="QuantityIntake[$index]" ng-init="QuantityIntake[$index] = intake.Quantity">    
                                                </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Notes</label>
                                                    <input type="text" ng-value="AdmissionNo" ng-model="NoteID[$index]" placeholder="Notes here"> 
                                                </div>
                                            </div>
                                        </fieldset>
                                        
                                        <!-- <fieldset data-ng-repeat="medication in medications track by $index">
                                            <legend>Required Medicine Intake</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Medicine</label>
                                                    <input type="text" ng-model="Dosage[$index]" ng-init="Dosage[$index] = medication.MedicineName + ' ' + medication.Unit" disabled="disabled"> 
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Required Quantity</label>
                                                    <input type="text" ng-model="Quantity[$index]" ng-init="Quantity[$index] = medication.Quantity">
                                                    <input type="hidden" ng-model="MedID[$index]" ng-init="MedID[$index] = medication.MedicineID"> 
                                                </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Notes</label>
                                                    <input type="text" ng-model="NoteID[$index]" placeholder="Notes here"> 
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Intake Interval</label>
                                                    <select class="form-control" ng-model="IntakeInterval[$index]" style="width:395px;">
                                                        <option value="" disabled selected>Select Interval</option>
                                                        <option ng-repeat="intrvl in interval" value="{{intrvl.DosingID}}">{{intrvl.Intake}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset> -->
                                        <fieldset>
                                            <legend>Guarantors:  
                                                    <small><input type="checkbox" ng-model="phil" ng-click="philhealthClick()" ng-disabled="$parent.fee == 0"> Philhealth </small>
                                                    <small><input type="checkbox" ng-model="hmo" ng-click="hmoClick()"> HMO </small>	
                                            </legend>  

                                            <div id="philhealth">
                                                <div data-row-span="2">
                                                    <div data-field-span="1"> 
                                                        <label>Philhealth</label>
                                                        <input type="text" value="Philhealth">
                                                    </div>
                                                    <!-- <div data-field-span="1"> 
                                                        <label>Control Number</label>
                                                        <input type="text" ng-model="controlphil"> 
                                                    </div> -->
                                                </div>
                                            </div>

                                            <div id="providers">
                                                <div data-row-span="2">
                                                    <div data-field-span="1"> 
                                                        <label>Accredited HMO Providers</label>
                                                        <select class="form-control" ng-model="hmoprovider">
                                                            <option value="" disabled selected>Select Guarantor</option>
                                                            <option ng-repeat="hmo in hmolist" value="{{hmo.Provider}}" ng-init="hmoprovider = hmo.Provider">{{hmo.Provider}}</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div data-field-span="1"> 
                                                        <label>Control Number</label>
                                                        <input type="text" ng-model="controlhmo"> 
                                                    </div> -->
                                                </div>
                                            </div>
                                         
                                        </fieldset>

                                            <div data-row-span="1">
                                                <div class="pull-right">
                                                    <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                    <button type="submit" class="btn-danger btn" ng-click="submitDetails(type)">Submit</button>
                                                </div>
                                            </div>
                                        
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
                    $scope.medicationid = "<?php echo $_GET['medicationid']; ?>";
                    $scope.admissionid = "<?php echo $_GET['admissionid']; ?>";
                    $scope.param = "<?php echo $_GET['param']; ?>";
                    // $scope.MedID = [];
                    // $scope.Quantity = [];
                    $scope.Dosage = [];
                    // $scope.IntakeInterval = [];

                    $scope.AdmissionNo = [];
                    $scope.NoteID = [];
                    $scope.Intake = [];
                    $scope.QuantityIntake = [];
					$scope.hmoprovider = '';	

                    $scope.philhealth = false;
                    $scope.hmoclick = false;
                    
                    $('#philhealth').hide();
                    $('#providers').hide();

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
                        method: 'get',
                        url: 'getData/get-medicines-intaked.php',
                        params: {id: $scope.admissionid,
                                medicationid: $scope.medicationid}
                    }).then(function(response) {
                        $scope.intakes = response.data;
                 
                    });

                    // $http({
                    //     method: 'GET',
                    //     url: 'getData/get-medication-details.php',
                    //     params: {medicationid: $scope.medicationid,
                    //             admissionid: $scope.admissionid}
                    // }).then(function(response) {
                    //     $scope.medications = response.data;
                    // });

                    $http({
                        method: 'get',
                        url: 'getData/get-patient-details.php',
                        params: {id: $scope.admissionid}
                    }).then(function(response) {
                        $scope.patientdetails = response.data;
                    
                    });

                    // $http({
                    //     method: 'GET',
                    //     url: 'getData/get-dosing-interval.php'
                    // }).then(function(response) {
                    //     $scope.interval = response.data;
                    // });

                    $http({
            			method: 'get',
            			url: 'getData/get-hmo-providers.php'
            		}).then(function(response) {
            			$scope.hmolist = response.data;
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

                    $scope.philhealthClick = function(){

                        if ($scope.philhealth == false) {
                            // $('#philhealth').show();
                            $scope.philhealth = true;
                        } else {
                            // $('#philhealth').hide();
                            $scope.philhealth = false;
                        }
					}

                    
                    $scope.hmoClick = function(){

                         if ($scope.hmoclick == false) {
                            $('#providers').show();
                            $scope.hmoclick = true;
                         } else {
                            $('#providers').hide();
                            $scope.hmoclick = false;
                         }
                    }

                    $scope.submitDetails = function(type){
                 
                        $scope.totalbill = 2500;
                        $http({
                        method: 'GET',
                        url: 'insertData/insert-bed-bill.php',
                        params: {admissionid: $scope.admissionid,
                            department: $scope.User,
                            description: 'Emergency Room Fee',
                            admissno: $scope.AdmissionNo[0],
                            total: $scope.totalbill}
                        });

                        if($scope.philhealth == true && $scope.hmoclick == true){
                            $http({
                                method: 'get',
                                url: 'insertData/insert-philhmo-details.php',
                                params: {id: $scope.admissionid,    
                                        at: $scope.at,
                                        philhealth: 'Pending',
                                        hmo: 'Pending',
                                        hmoprovider: $scope.hmoprovider}
                            }).then(function(response) {
                                console.log(response.data);
                            });
                        }
                        if($scope.philhealth == false && $scope.hmoclick == true){
                            $http({
                                method: 'get',
                                url: 'insertData/insert-philhmo-details.php',
                                params: {id: $scope.admissionid,
                                        at: $scope.at,
                                        philhealth: 'Not Applicable',
                                        hmo: 'Pending',
                                        hmoprovider: $scope.hmoprovider}
                            }).then(function(response) {
                                console.log(response.data);
                            });
                        }
                         if($scope.philhealth == true && $scope.hmoclick == false){
                            $http({
                                method: 'get',
                                url: 'insertData/insert-philhmo-details.php',
                                params: {id: $scope.admissionid,
                                        at: $scope.at,
                                        philhealth: 'Pending',
                                        hmo: 'Not Applicable'}
                            }).then(function(response) {
                                console.log(response.data);
                            });
                        }

                        swal({
                            icon: "success",
                            title: "Successfully Added !",
                            text: "Successfully Added Patient ..",
                            timer: 2000
                        }).then(function () {
                                window.location.href = 'initiate-medication.php?admissionid=' + $scope.admissionid  + '&id=' + $scope.medicationid + '&at=' + $scope.at  + '&param=' + $scope.param + '&notes=' + $scope.NoteID + '&intake=' + $scope.Intake + '&qntyintake=' + $scope.QuantityIntake + '&dosage=' + $scope.Dosage;
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                window.location.href = 'initiate-medication.php?admissionid=' + $scope.admissionid   + '&id=' + $scope.medicationid + '&at=' + $scope.at   + '&param=' + $scope.param + '&notes=' + $scope.NoteID + '&intake=' + $scope.Intake + '&qntyintake=' + $scope.QuantityIntake + '&dosage=' + $scope.Dosage;
                            }
                        });

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