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
    <li class="active"> <a href="specialization.php">Medical Specialization</a>
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
                        <h2>MEDICAL SPECIALIZATION</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Specialization ID</th>
                                    <th>Specialization Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="spec in specs" ng-class="{'selected': spec.SpecializationID == selectedRow}" ng-click="setClickedRow(spec.SpecializationID)">
                                    <td>{{spec.SpecializationID}}</td>
                                    <td>{{spec.SpecializationName}}</td>
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
						<a href="#" ng-click="AddSpecialization()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i>Add Bed</a>
						<a href="#" ng-click="EditSpecialization()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Bed</a>
                	</div>
            </div>

            <div class="modal fade" id="AddSpecializationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Add Specialization</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 150px">
                             <form>
                                <div class="form-group">
                                    <label>Specialization </label>
                                    <input type="text" ng-model="specialization" placeholder="Surgeon" class="form-control">
                                </div>
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                    <button ng-click='Add()' class="btn btn-danger pull-right">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          
            <!-- Error modal -->
            <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

            <div class="modal fade" id="EditSpecialization" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                  <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Edit Specialization</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 250px">
                              <form ng-repeat="special in specials">
                                <div class="form-group">
                                    <label>Specialization ID</label>
                                    <input type="text" ng-model="$parent.specialid" ng-init="$parent.specialid=special.SpecializationID" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Specialization Name</label>
                                    <input type="text" ng-model="$parent.specialn" ng-init="$parent.specialn=special.SpecializationName" class="form-control" required>
                                </div>
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-danger pull-right">Confirm</button>
                            </form>
                        </div>
                    </div>
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
                    method: 'get',
                    url: 'getData/get-specialization-details.php'
                }).then(function(response) {
                    $scope.specs = response.data;
                    angular.element(document).ready(function() {
                        dTable = $('#table_info')
                        dTable.DataTable();
                    });
                });


                $scope.setClickedRow = function(spec) {
                    $scope.selectedRow = ($scope.selectedRow == null) ? spec : ($scope.selectedRow == spec) ? null : spec;
                    $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                }

                $scope.AddSpecialization = function() {
                    $('#AddSpecializationModal').modal('show');
                }

                $scope.Add = function() {
                    $scope.specializationid = "<?php echo rand(1000, 5000); ?>"
                    $http({
                        method: 'GET',
                        url: 'insertData/insert-specialization.php',
                        params: {
                            specializationid: $scope.specializationid,
                            specialization: $scope.specialization
                        }
                    }).then(function(response) {
                        window.location.href = 'specialization.php?at=' + $scope.at;
                    });
                }

                $scope.Update = function() {

                    $http({
                        method: 'GET',
                        url: 'updateData/update-specialization-details.php',
                        params: {
                            id: $scope.specialid,
                            specialization: $scope.specialn
                        }
                    }).then(function(response) {
                        window.location.href = 'specialization.php?at=' + $scope.at;
                    });
                }

                $scope.EditSpecialization = function() {
                    if ($scope.selectedRow != null) {
                        $scope.specializationid = $scope.selectedRow;
                        $('#EditSpecialization').modal('show');
                        $http({
                            method: 'GET',
                            params: {
                                id: $scope.specializationid
                            },
                            url: 'getData/get-specialization-id.php'
                        }).then(function(response) {
                            $scope.specials = response.data;
                        });
                    } else {
                        $('#ErrorModal').modal('show');
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