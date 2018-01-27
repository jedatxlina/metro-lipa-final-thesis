<?php
include 'admin-header.php' ?>

    <style>
    .selected {
    color: #800000;
    background-color: #F5F5F5;
    font-weight: bold;
    }
    </style>
    
<div  ng-app="myApp" ng-controller="userCtrl">
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Outpatient</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Active Users
                    </div>
                 <div >
                        <div class="panel-body">
                            
                            <input type="button" class="btn btn-primary" value="Add Patient" ng-click="addPatient()">
                            <!-- <span>
                            <input type="button" class="{{ clickedRow == 1 ? 'btn btn-danger' : 'btn btn-danger disabled' }}" value="Details">
                            </span> -->
                            <br />&emsp;

                                <table width="100%" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Admission ID</th>
                                            <th>Admission No</th>   
                                            <th>Admission Date-Time</th>
                                            <th>Full name</th>
                                            <th>Admission</th>
                                            <th>Admission Type</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID)">                                       
                                            <td>{{user.AdmissionID}}</td>
                                            <td>{{user.AdmissionNo}}</td>
                                            <td>{{user.AdmissionDateTime}}</td>
                                            <td>{{user.Lname}}, {{user.Fname}} {{user.Mname}} </td>
                                            <td>{{user.Admission}}</td>
                                            <td>{{user.AdmissionType}}</td>
                                            <td>{{user.Gender}}</td>
                                            <td>{{user.Address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Actions Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item" ng-click="emergencyDetails()">
                                    <i class="fa fa-list-alt fa-fw"></i> Emergency Details
                                </a>
                                <a href="#" class="list-group-item"  ng-click="patientDetails()">
                                    <i class="fa fa-user fa-fw"></i> Patient Details
                                </a>
                                <a href="#" class="list-group-item"  ng-click="moveInpatient()">
                                    &nbsp;<i class="glyphicon glyphicon-bed"></i>&nbsp;Move to Inpatient
                                </a>
                            
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- / .modal  -->

             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog">
                        <div class="alert alert-danger">
                         Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                        </div>
                    </div>
             </div>

             
             <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog">
                        <div class="alert alert-success">
                         Successfuly generated patient <a href="#" class="alert-link">QR Code.</a>
                        </div>
                    </div>
             </div>

             <div class="modal fade" id="failModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog">
                        <div class="alert alert-danger">
                         ERROR: Duplicate patient  <a href="#" class="alert-link">QR Code.</a>
                        </div>
                    </div>
             </div>

        </div>
     
             </div>

        </div>
    </div>
</div>

<script>
   var fetch = angular.module('myApp', []);
  

   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {   
       $scope.selectedRow = null;
       $scope.clickedRow = 0;
   
       $http({
           method: 'get',
           url: '../assets/getData/get-outpatient-details.php'
       }).then(function(response) {
           $scope.users = response.data;
       });

       $scope.setClickedRow = function(user) {
           $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
       }

       $scope.addPatient = function() {
           window.location.href = 'add-patient-form.php?id=' + 0;
       }

       $scope.emergencyDetails = function(){
           if($scope.selectedRow != null){
            window.location.href = 'emergency-details.php?id=' + $scope.selectedRow;
           }else{
            $('#myModal').modal('show');
           }
       };

       $scope.patientDetails = function(){
            if($scope.selectedRow != null){
            window.location.href = 'patient-details.php?id=' + $scope.selectedRow;
            }else{
                $('#myModal').modal('show');
           }
       };
       
 
   }]);
</script>

<?php
include 'admin-footer.php' ?>
