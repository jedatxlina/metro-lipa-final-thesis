<?php
$activeMenu = "patients";	
?>
<?php include 'admin-header.php' ?>

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

<div class="container-fluid">
    <div class="panel-body">
        <button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        <button ng-click="admitPatientArchive()" class="btn-danger btn pull-right">Admit Patient</button>
    </div>
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-sm-3">
            <div class="panel panel-profile">   
                        <div class="panel-body"  data-ng-repeat="history in patienthistory | limitTo : 1">
                            <img ng-src="{{history.QRpath}}">
                            <div class="name">{{history.Lastname}}, {{history.Firstname}} {{history.Middlename}}</div>
                            <div class="info">{{history.ArchiveID}}</div>  
                            <br>
                            <a ng-click="printQR()" ng-if="chckval != 7"><i class="ti ti-printer"></i>&nbsp; Print QR Code</a>
                        </div>
                        <center>
                     
                    </div>
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> About </a>
                    <!-- <a href="#" ng-click="processMedCert()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Issue Medical Certificate</a> -->
                </div>
            </div><!-- col-sm-3 -->
            <div class="col-sm-9">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab-about">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2>Personal Information</h2>
                            </div>
                            <div class="panel-body">
                                
                                <div class="about-area">
                                        <div class="grid-form">
                                            <div class="row">
                                            <fieldset data-ng-repeat="patient in patientdetails">
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Patient Name</label>
                                                            <input type="text" ng-model="patient.Firstname + ' ' + patient.Middlename + ' ' + patient.Lastname" disabled="true">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Age</label>
                                                            <input type="text" ng-model="patient.Age" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Gender</label>
                                                            <input type="text" ng-model="patient.Gender" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Birthdate</label>
                                                            <input type="text" ng-model="patient.Birthdate" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Civil Status</label>
                                                            <input type="text" ng-model="patient.CivilStatus" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Contact</label>
                                                            <input type="text" ng-model="patient.Contact" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Province</label>
                                                            <input type="text" ng-model="patient.Province" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>City</label>
                                                            <input type="text" ng-model="patient.City" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Complete Address</label>
                                                            <input type="text" ng-model="patient.CompleteAddress" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Citizenship</label>
                                                            <input type="text" ng-model="patient.Citizenship" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h2>Medical History</h2><a ng-click="viewHistoryReport()" class="pull-right"><i class="ti ti-printer"></i></a>
                                    <div class="panel-ctrls"></div>
                                </div>
                                    <div class="panel-body">
                                        <table id="medhistory_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Admission Date & Time</th>
                                                    <th>Admission Type</th>
                                                    <th>Attending Doctor</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="history in patienthistory track by $index" ng-class="{'selected': history.ArchiveNo == selectedRow}" ng-click="setClickedRow(history.ArchiveNo)">
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{history.AdmissionDate}} {{history.AdmissionTime}}</td>
                                                    <td>{{history.AdmissionType}}</td>
                                                    <td>{{history.PhysicianFullname}}</td>
                                                    <td></td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                </div>
                                    <div class="panel-footer">
                                        <button type="button" ng-click="viewPatientDataHistory()" class="btn btn-danger-alt pull-left">View Details</button>
                                    </div>
                                </div>       
                    </div>
                </div><!-- .tab-content -->
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
                            </div>
                        </div>
                    </div>
                    <!--/ Error modal -->
            </div><!-- col-sm-8 -->
        </div>
    </div>
    
</div>

<script>
var fetch = angular.module('myApp', ['ui.mask']);
   
   fetch.controller('userCtrl', ['$scope', '$http','$window', function($scope, $http,$window) {
       $scope.at = "<?php echo $_GET['at'];?>";
       $scope.id = "<?php echo $_GET['id'];?>";

       $scope.chckval = $scope.at.charAt(0);
       
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
            method: 'GET',
            url: 'getData/get-patient-archive.php',
            params: {id: $scope.id}
        }).then(function(response) {
            $scope.patientdetails = response.data;
        });



        $http({
            method: 'GET',
            url: 'getData/get-history-details.php',
            params: {id: $scope.id}
        }).then(function(response) {
            $scope.patienthistory = response.data;
      
            angular.element(document).ready(function() {
                dTable = $('#medhistory_table')
                dTable.DataTable();
            });
        });

       $scope.viewPatientDataHistory = function(){
            if ($scope.selectedRow != null) {
                $scope.archiveno = $scope.selectedRow;
                window.location.href = 'view-archived-data.php?at=' + $scope.at + '&id=' + $scope.archiveno;
            } else {
                $('#errorModal').modal('show');
            }
        
       }

       $scope.setClickedRow = function(lab) {
           $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
       }

        $scope.printQR = function(){    
           
           $window.open('view-qr-code.php?at='+$scope.at+'&id='+$scope.id, '_blank');
           
       }
       
       $scope.viewHistoryReport = function(){
        $window.open('view-history-report.php?at='+$scope.at+'&id='+$scope.id, '_blank');
       }

        $scope.processMedCert = function() {
            if ($scope.selectedRow != null) {
                $window.open('inpatient-med-cert.php?at=' + $scope.at + '&admissionid=' + $scope.id, '_blank');
            } else {
                $('#errorModal').modal('show');
            }
        }      

       $scope.admitPatientArchive = function(){
          
            $scope.archiveid = $scope.id;
            switch ($scope.at.charAt(0)) {
                case '7':
                    window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 0 + '&chk=' + $scope.archiveid;
                    break;
            
                default:
                    window.location.href = 'add-patient.php?at=' + $scope.at + '&id=' + 1 + '&chk=' + $scope.archiveid;
                    break;
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

<?php include 'footer.php'?>