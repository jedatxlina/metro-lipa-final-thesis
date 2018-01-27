<?php include 'admin-header.php'; ?>

<style>
.selected {
color: #800000;
background-color: #F5F5F5;
font-weight: bold;
}
</style>
    
<div ng-app="myApp" ng-controller="userCtrl">
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Emergency</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Active Users
                    </div>
                    <div>
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
                            <a href="#" class="list-group-item" ng-click="patientDetails()">
                                <i class="fa fa-list-alt fa-fw"></i> Patient Details
                            </a>
                            <a href="#" class="list-group-item" ng-click="emergencyDetails()">
                                <i class="fa fa-user fa-fw"></i> Emergency Details
                            </a>
                            <a href="#" class="list-group-item">
                                    &nbsp;<i class="glyphicon glyphicon-bed"></i>&nbsp;Move to Inpatient
                                </a>

                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
        <!-- / .modals  -->

        <div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Patient</h4>
                    </div>

                    <div class="modal-body">
                    
                        <p>Patient Database Lookup</p>
                        <div class="row">
                            <center>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <span style="float: right"><label>Last Name:</label></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <span> <input type="text" class="form-control" ng-model="lastname"></span>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="row">
                            <center>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <span style="float: right"><label>First Name:</label></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <span> <input type="text" class="form-control" ng-model="firstname"></span>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="row">
                            <center>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <span style="float: right"><label>Middle Name:</label></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <span> <input type="text" class="form-control" ng-model="middlename"></span>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="row">
                            <center>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <span style="float: right"><label>Birthdate:</label></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <span> <input type="date" class="form-control" ng-model="birthdate" ></span>
                                    </div>
                                </div>
                            </center>
                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button ng-click='patientSearch()' class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Patient</h4>
                    </div>

                    <div class="modal-body">
                        <form>
                            <p>Patient Database Lookup Result</p>
                            <div class="row">
                                <center>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <span style="float: right"><label>Last Name: </label></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <span> {{ lastname }}</span>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="row">
                                <center>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <span style="float: right"><label>First Name: </label></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <span>{{ firstname }}</span>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="row">
                                <center>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <span style="float: right"><label>Middle Name: </label></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <span> {{ middlename }}</span>
                                        </div>
                                    </div>
                                </center>
                            </div>

                            <div class="row">
                                <center>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <span style="float: right"><label>Birthdate: </label></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <span> {{birthdate | date:'MM-dd-yyyy'}}</span>
                                        </div>
                                    </div>
                                </center>
                            </div>

                            <div class="row">
                                <center>
                                    <br>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <span><label>Result: </label></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                        <span style="text-align=left"> {{ result }}</span>
                                        </div>
                                    </div>
                                </center>
                            </div>

    
                            <div class="modal-footer">
                                    <span style="float: left"><button type="button" class="btn btn-info" data-dismiss="modal">View Details</button></span>
                              
                                    <button type="button" class="btn btn-default" ng-click="backModal()">Back</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='#' class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="alert alert-danger">
                    Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="alert alert-danger">
                    Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form ng-repeat="patient in getdetails">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Patient Details</h4>
                        </div>

                        <div class="modal-body">
                                <p>Data below will be moved to Inpatient section permanently.</p>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.FirstName">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.Province">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.MiddleName">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.City">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.LastName">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Civil Status</label>
                                                <select class="form-control" ng-model="patient.CivilStatus" readonly="readonly">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Separated">Separated</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Birthdate</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.Birthdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Gender</label>
                                                <select class="form-control" ng-model="patient.Gender" readonly="readonly">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.Contact" ui-mask="+63 999 999-9999"  ui-mask-placeholder ui-mask-placeholder-char="_"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" readonly="readonly" ng-model="patient.Age">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button ng-click='patientConfirm()' class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <div class="modal fade" id="emergencyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form ng-repeat="patient in getdetails">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Emergency</h4>
                        </div>

                        <div class="modal-body">
                                <p>Data below will be moved to Inpatient section permanently.</p>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Admission ID</label> 
                                            <input type="text" class="form-control" ng-value="{{patient.AdmissionID}}" ng-model="new.admissionID" readonly="readonly"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Admission No</label>
                                            <input type="text" class="form-control" ng-value="{{patient.AdmissionNo}}" ng-model="new.admissionNo" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Firstname</label> 
                                            <input type="text" class="form-control" ng-value="patient.FirstName" ng-model="new.FirstName" required> 
                                        </div>
                                    </div>
                                
                                </div>
                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button ng-click='emergencyConfirm()' class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>

    </div>
</div>

<script>
   var fetch = angular.module('myApp', ['ui.mask']);
   


   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http,$filter) {   

       $scope.selectedRow = null;
       $scope.clickedRow = 0;
   
       $http({
           method: 'get',
           url: '../assets/getData/get-emergency-details.php'
       }).then(function(response) {
           $scope.users = response.data;
       });
     

       $scope.setClickedRow = function(user) {
           $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
       }

       $scope.addPatient = function(){
        //    window.location.href = 'add-patient-form.php?id=' + 1;
        $('#checkModal').modal('show');
       }

       $scope.patientSearch = function(){
        if($scope.firstname == "" || $scope.middlename == "" || $scope.lastname == "")
        {
            alert("JED");
           
        }else{
            //      $http({
            //     method: 'GET',
            //     url: '../assets/getData/get-patient-verify-details.php',
            //     params: {Firstname: $scope.firstname, Lastname: $scope.lastname, Middlename: $scope.middlename},
            //     contentType:"application/json; charset=utf-8",
            //     dataType:"json"
            //     }).then(function(response) {

            //     if(response.data == 1){ 
            //         $('#checkModal').modal('hide');
            //         $scope.result = 'Old Patient'
            //         $('#verifyModal').modal('show');
            //     }else{
            //         $('#checkModal').modal('hide');
            //         $scope.result = 'New Patient'
            //         $('#verifyModal').modal('show');
            //     }
                
            // });
            $scope.str = $.datepicker.formatDate('yy-mm-dd', $scope.birthdate);
            alert($scope.str);
        }
        
 
       }

       $scope.backModal = function(){
            $('#verifyModal').modal('hide');
            $('#checkModal').modal('show');
       }
       $scope.patientDetails = function(){
          if($scope.selectedRow != null){
            $scope.admissionid = $scope.selectedRow;
            $http({
                    method: 'GET',
                    url: '../assets/getData/get-patient-details.php',
                    params: {id: $scope.admissionid},
                    contentType:"application/json; charset=utf-8",
                    dataType:"json"
                    }).then(function(response) {
                     $scope.getdetails = response.data;
                
                });
                $('#patientModal').modal('show');
          }else{
                $('#myModal').modal('show');
           }
                
       };

       $scope.emergencyDetails = function(){
        if($scope.selectedRow != null){
            $scope.admissionid = $scope.selectedRow;
            $http({
                    method: 'GET',
                    url: '../assets/getData/get-patient-details.php',
                    params: {id: $scope.admissionid},
                    contentType:"application/json; charset=utf-8",
                    dataType:"json"
                    }).then(function(response) {
                    $scope.getdetails = response.data;
                
                });
                $('#emergencyModal').modal('show');
          }else{
                $('#myModal').modal('show');
           }
       };

       $scope.patientConfirm = function(){
        
       };
       $scope.new = {};
       $scope.emergencyConfirm = function(){
        $http.post("http://localhost/Metro Lipa Patient System/assets/updateData/update-emergency-details.php", {
                        'AdmissionID': $scope.selectedRow,
                        'FirstName': $scope.new.FirstName
                    }).then(function(response){
                        $('#emergencyModal').modal('hide');
                       
                    });
        window.location.reload();
        };

    //    $scope.movetoInpatient = function(){
            
    //    };

   }]);
</script>

<?php
include 'admin-footer.php' ?>
