<?php include 'admin-header.php'?>

<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 	
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css"/>

<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li><a href="#">Patients</a>
    </li>
    <li class="active"><a href="index.php">Patient Bill Details</a>
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
                        <a href="#tab-edit" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Summary Of Bills</a>
                        <a href="#tab-edit" ng-click="Redirect()" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Detailed Bill</a>
                        
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
                                                <input type="text" ng-model="id" ng-disabled='true'>
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
                                    <div class="container-fluid">
                                    <fieldset  data-ng-repeat="medicine in medicinedetails">
                                        <input type="hidden" ng-model='MedicineBill[$index]' ng-init='MedicineBill[$index] = medicine.totalbill'>
                                    </fieldset>
                                    <fieldset  data-ng-repeat="room in roomdetails track by $index">
                                        <input type="hidden" ng-model='RoomBill[$index]' ng-init='RoomBill[$index] = room.bedbill'>
                                    </fieldset>
                                        <h2>Summary Of Bills</h2>
                                        <div class="row" >
                                            <div class="col-md-2">
                                                <h4>Room Bill</h4>
                                            </div>
                                            <div class="col-md-8" style="text-align: center;">
                                                <h4>---------------------------------------------------------------</h4>
                                            </div>
                                            <div class="col-md-2">
                                                <h4>{{ subtotalroom }}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4>Medicine Bill</h4>
                                            </div>
                                            <div class="col-md-8" style="text-align: center;">
                                                <h4>---------------------------------------------------------------</h4>
                                            </div>
                                            <div class="col-md-2">
                                                <h4>{{ subtotalmedi }}</h4>
                                            </div>
                                        </div>
                                        <hr size="30">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4 style="font-size: 30px;">Sub Total</h4>
                                            </div>
                                            <div class="col-md-8" style="text-align: center;">
                                                <h4 style="font-weight: bold;">---------------------------------------------------------------</h4>
                                            </div>
                                            <div class="col-md-2">
                                                <b><h4 style="font-size: 20px;font-weight: bold;">{{ subtotal }}</h4></b>
                                            </div>
                                        </div>
                                            <div class="pull-right">
                                                <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                <button class="btn-primary btn" ng-click="">Save</button>
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
                    $scope.id = "<?php echo $_GET['id']; ?>";
                    $scope.MedicineBill = [];
                    $scope.RoomBill = [];
                    $scope.subtotalmedi = 0;
                    $scope.subtotalroom = 0;
                    $scope.MedID = [];
                    $scope.Quantity = [];
                    $scope.Dosage = [];
                    $scope.NoteID = [];
                    var total = 0;
                    var total1 = 0;
                    
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
                    url: 'getData/get-inpatient-roombill.php',
                    params: {id: $scope.id}
                    }).then(function(response) {
                        $scope.roomdetails = response.data;
                    });
                    
                    $http({
                    method: 'GET',
                    url: 'getData/get-medication-billdetailed.php',
                    params: {id: $scope.id}
                    }).then(function(response) {
                        $scope.medicinedetails = response.data;
                    });
                    $http({
                        method: 'get',
                        url: 'getData/get-patient-details.php',
                        params: {id: $scope.id}
                    }).then(function(response) {
                        $scope.patientdetails = response.data;
             
                    });
                    $http({
                        method: 'GET',
                        url: 'getData/get-medication-details.php',
                        params: {medicationid: $scope.medicationid,
                        admissionid: $scope.admissionid}
                    }).then(function(response) {
                        $scope.medications = response.data;
                        for(var i = 0; i < $scope.MedicineBill.length; i++){
                            var product = $scope.MedicineBill[i];
                            total = total + product;
                        }
                        $scope.subtotalmedi=total;
                        for(var i = 0; i < $scope.RoomBill.length; i++){
                            var product1 = $scope.RoomBill[i];
                            total1 = total1 + product1;
                        }
                        $scope.subtotalroom=total1;
                        $scope.subtotal = $scope.subtotalroom+$scope.subtotalmedi;
                    });
                    $scope.submitDetails = function(type){
                        $scope.totalbill = 5000;
                        $http({
                        method: 'GET',
                        url: 'insertData/insert-bed-bill.php',
                        params: {admissionid: $scope.admissionid,
                            department: $scope.User,
                            description: 'Room Fee',
                            total: $scope.totalbill}
                        });
                      
                        swal({
                            icon: "success",
                            title: "Successfully Added!",
                            text: "Redirecting in 2..",
                            timer: 2000
                        }).then(function () {
                                window.location.href = 'initiate-medication.php?quantity=' + $scope.Quantity + '&id=' + $scope.medicationid + '&at=' + $scope.at + '&dosage=' + $scope.Dosage + '&medid=' + $scope.MedID + '&param=' + $scope.param + '&notes=' + $scope.NoteID;
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                window.location.href = 'initiate-medication.php?quantity=' + $scope.Quantity + '&id=' + $scope.medicationid + '&at=' + $scope.at + '&dosage=' + $scope.Dosage + '&medid=' + $scope.MedID + '&param=' + $scope.param + '&notes=' + $scope.NoteID;
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

                    $scope.Redirect = function(){
                            window.location.href = 'view-patient-bill.1.php?at=' + $scope.at + '&id=' + $scope.id;
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