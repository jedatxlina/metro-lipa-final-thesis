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
    <li class="active"> <a href="specialization.php">Physician</a>
    </li>
</ol>
<br><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    <div class="row">

    </div>
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Administered Patients</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                   <div class="panel-body">
							<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>Admission ID</th>
									<th>Last Name</th>
									<th>First Name</th>
									<th>Middle Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
									<th>Admission</th>
                                    
								</tr>
								</thead>
								<tbody>
								<tr ng-repeat="patient in administered" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID)">
                                        <td>{{patient.AdmissionID}}</td>
                                        <td>{{patient.Lastname}}</td>
                                        <td>{{patient.Firstname}}</td>
                                        <td>{{patient.Middlename}}</td>
                                        <td>{{patient.Gender}}</td>
                                        <td>{{patient.Age}}</td>
                                        <td>{{patient.Admission}}</td>
                                    </tr>
								</tbody>
							</table>
						</div>
                    <div class="panel-footer"></div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
                    <a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Details</a>
                    <a href="#" ng-click="movePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Post Diagnosis</a>
                    <a href="#" ng-click="dischargePatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-check-square-o"></i>Post Prescription</a>
                   
                </div>
            </div>

        </div>

        <script>
            var fetch = angular.module('myApp', ['ui.mask']);


            fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
                $scope.at = "<?php echo $_GET['at'];?>";
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
                    
                        default:
                            break;
                    }
                
                $http({
                    method: 'GET',
                    url: 'getData/get-administered-patients.php',
                    params:{id:$scope.at}
                }).then(function(response) {
                    $scope.administered = response.data;
                    angular.element(document).ready(function() {  
                    dTable = $('#patient_table')  
                    dTable.DataTable();  
                    });  
                });

                $scope.viewProfile = function() { 
				    window.location.href = 'user-profile.php?at=' + $scope.at;
			    }
	

                $scope.setClickedRow = function(spec) {
                    $scope.selectedRow = ($scope.selectedRow == null) ? spec : ($scope.selectedRow == spec) ? null : spec;
                    $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                }

                $scope.viewPatient = function(){
                    if($scope.selectedRow != null){
                        $scope.admissionid = $scope.selectedRow;
                        $http({
                            method: 'get',
                            url: 'getData/get-patient-details.php',
                            params: {id: $scope.admissionid}
                        }).then(function(response) {
                            $scope.patientdetails = response.data;
                        });
                        $('#patientModal').modal('show');
                    
                    }
                    else{
                    $('#errorModal').modal('show');
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
                        
                        default:
                            break;
                    }
                        
                }


            }]);
        </script>
    </div>
    <?php include 'footer.php'?>