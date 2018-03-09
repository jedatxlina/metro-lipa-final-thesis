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
                <div class="panel panel-profile">
                <div class="panel-body"  data-ng-repeat="patient in patientdetails">
                    <!-- <img ng-src="{{patient.QRpath}}"> -->
                    <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                    <!-- <div class="info">{{patient.AdmissionID}}</div> -->
                </div>
                </div><!-- panel -->
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> About </a>
                    <a href="#tab-edit" 	role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-pencil"></i> Edit</a>
                </div>
            </div><!-- col-sm-3 -->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-about">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Profile</h2>
                            </div>
                            <div class="panel-body">
                                <div class="about-area">
                                    <h4>Personal Information</h4>
                                        <div class="table-responsive">
                                        <table class="table about-table"  data-ng-repeat="patient in patientdetails">
                                            <tbody>
                                            <tr>
                                                <th>Full Name</th>
                                                <td>{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</td>
                                                <th>Age</th>
                                                <td>{{patient.Age}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th>Birth Date</th>
                                                <td>{{patient.Birthdate}}</td>
                                                <th>Civil Status</th>
                                                <td>{{patient.Status}}</td>
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
                                                <th>Religion</th>
                                                <td>{{patient.Religion}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{patient.CompleteAddress}}</td>
                                                <th>Citizenship</th>
                                                <td>{{patient.Nationality}}</td>
                                            </tr>
                                       
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-edit">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2>Edit</h2>
                            </div>
                            <div class="panel-body">
                                <div class="about-area">
                                    <h4>Personal Information</h4>
                                        <div class="table-responsive" data-ng-repeat="patient in patientdetails">
                                            <div class="col-lg-11" >
                                            <table class="table about-table"  >
                                                <tbody>
                                                <tr>
                                                    <th>Last name</th>
                                                    <td><input type="text" class="form-control"  ng-model="patient.Lastname" ></td>
                                                    <th>Address</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.CompleteAddress"></td>
                                                </tr>
                                                <tr>
                                                    <th>First name</th>
                                                    <td><input type="text" class="form-control"  ng-model="patient.Firstname"></td>
                                                    <th>Age</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Age"></td>
                                                </tr>
                                                <tr>
                                                    <th>Middle name</th>
                                                    <td><input type="text" class="form-control"  ng-model="patient.Middlename"></td>
                                                    <th>Civil Status</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Status"></td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Date</th>
                                                    <td><input type="text" class="form-control"  ng-model="patient.Birthdate"></td>
                                                    <th>Contact</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Contact"></td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Gender"></td>
                                                    <th>Occupation</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Occupation"></td>
                                                </tr>
                                                <tr>
                                                    <th>Province</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Province"></td>
                                                    <th>Religion</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Religion"></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.City"></td>
                                                    <th>Citizenship</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Nationality"></td>
                                                </tr>
                                                </tbody>
                                                
                                            </table>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-1 pull-right">
                                                        <button class="btn-danger btn pull-left" ng-click="saveDetails(patient)">Save</button>
                                                        <!-- <button class="btn-default btn" ng-click="resetDetails(oldpatient)">Reset</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .tab-content -->
            </div><!-- col-sm-8 -->
        </div>
    </div>
</div>

<script>
var fetch = angular.module('myApp', ['ui.mask']);
   
   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
       $scope.at = "<?php echo $_GET['at'];?>";
       $scope.id = "<?php echo $_GET['id'];?>";
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
        url: 'getData/get-search-details.php',
        params: {at:$scope.at,
                id: $scope.id}
        }).then(function(response) {
            $scope.patientdetails = response.data;
        });


       $scope.setClickedRow = function(lab) {
           $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
       }
       
       $scope.saveDetails = function(patient){
            $http({
            method: 'GET',
            url: 'updateData/update-patient-archive-details.php',
            params: {id: $scope.id,
                    Lastname: patient.Lastname,
                    Firstname: patient.Firstname,
                    Middlename: patient.Middlename,
                    Birthdate: patient.Birthdate,
                    Gender: patient.Gender,
                    Province: patient.Province,
                    City: patient.City,
                    Address: patient.CompleteAddress,
                    Age: patient.Age,
                    CivilStatus: patient.Status,
                    Contact: patient.Contact,
                    Occupation: patient.Occupation,
                    Religion: patient.Religion,
                    Citizenship: patient.Nationality}
            }).then(function(response) {
                window.location.href = 'view-patient-data-archive.php?at=' + $scope.at + '&id=' + $scope.id;
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