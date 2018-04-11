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
<br>
  <div class="clearfix">
        <div class="pull-left">
           &emsp;<button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        </div>
    </div>
<br>
<div class="container-fluid">
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-sm-3">
      
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i>Master List </a>
                    <a href="#tab-details" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Patient Handled</a>
            
                </div>
            </div><!-- col-sm-3 -->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane" id="tab-details">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2>Patients Handled</h2>
                            </div>
                            <div class="panel-body">
                                <div class="about-area">
                                <table id="handled_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="patient in listhandled" ng-class="{'selected': patient.ArchiveID == selectedRow}" ng-click="setClickedRow(patient.ArchiveID)">
                                                <td>{{patient.ArchiveNo}}</td>
                                                <td>{{patient.Firstname}} {{patient.Middlename}} {{patient.Lastname}}</td>
                                                <td>{{patient.Gender}}</td>
                                                <td>{{patient.Birthdate}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="tab-pane active" id="tab-about">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2>Patient Master List</h2>
                            </div>
                            <div class="panel-body">
                                <div class="about-area">
                                    <table id="master_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="patient in masterlist" ng-class="{'selected': patient.ArchiveID == selectedRow}" ng-click="setClickedRow(patient.ArchiveID)">
                                                <td>{{patient.ArchiveNo}}</td>
                                                <td>{{patient.Firstname}} {{patient.Middlename}} {{patient.Lastname}}</td>
                                                <td>{{patient.Gender}}</td>
                                                <td>{{patient.Birthdate}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                </div><!-- .tab-content -->
            </div>
        </div>
    </div>
    
</div>

<script>
var fetch = angular.module('myApp', ['ui.mask']);
   
   fetch.controller('userCtrl', ['$scope', '$http','$window', function($scope, $http,$window) {
       $scope.at = "<?php echo $_GET['at'];?>";
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
            url: 'getData/get-patient-archive.php'
        }).then(function(response) {
            $scope.masterlist = response.data;
            angular.element(document).ready(function() {  
            dTable = $('#master_table')  
            dTable.DataTable();  
            });  
        });

        $http({
            method: 'GET',
            url: 'getData/get-patients-handled.php',
            params: {at: $scope.at}
        }).then(function(response) {
            $scope.listhandled = response.data;
            alert($scope.listhandled);
            angular.element(document).ready(function() {  
            dTable = $('#hadled_table')  
            dTable.DataTable();  
            });  
        });

       $scope.setClickedRow = function(lab) {
           $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
       }
       
       $scope.saveDetails = function(patient){
         
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

       $scope.viewQRcode = function(){
        $('#qrModal').modal('show');
        }

        // $scope.viewQRcode = function(){
        // $('#qrModal').modal('show');
        // }

       $scope.goBack = function(){
                    window.history.back();
        }

   }]);
</script>

<?php include 'footer.php'?>