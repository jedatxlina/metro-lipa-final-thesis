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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Action Panel</h2>

                    </div>
                    <div class="panel-body">
                        <a href="#" ng-click="AddSpecialization()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-list-alt fa-fw"></i><span>&nbsp;&nbsp;Add Specialization</span></a>
                        <a href="#" ng-click="EditSpecialization()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Edit Specialization</span></a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="AddSpecializationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Specialization</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Specialization </label>
                                    <input type="text" ng-model="specialization" placeholder="Surgeon" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='Add()' class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>

            <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        Select Medical Specialization record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="EditSpecialization" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Specialization</h4>
                        </div>
                        <div class="modal-body">
                            <form ng-repeat="special in specials">
                                <div class="form-group">
                                    <label>Specialization ID</label>
                                    <input type="text" ng-model="$parent.specialid" ng-init="$parent.specialid=special.SpecializationID" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Specialization Name</label>
                                    <input type="text" ng-model="$parent.specialn" ng-init="$parent.specialn=special.SpecializationName" class="form-control" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            var fetch = angular.module('myApp', ['ui.mask']);


            fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
                $scope.param = "<?php echo $_GET['at'];?>";
                $scope.selectedRow = null;
                $scope.selectedStatus = null;
                $scope.clickedRow = 0;
                $scope.new = {};

                    switch ($scope.param) {
                case '1':
                    $scope.Administrator = true;
                     break;
                        
                case '2':
                    $scope.Admission = true;
                    break;
                        
                case '3':
                    $scope.Nurse = true;
                    break;
                        
                case '4':
                    $scope.Physician = true;
                    break;
                        
                case '5':
                    $scope.Pharmacy = true;
                    break;

                case '6':
                    $scope.Billing = true;
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
                        window.location.href = 'specialization.php?at=' + $scope.param;
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
                        window.location.href = 'specialization.php?at=' + $scope.param;
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
                                window.location.href = 'index.php?at=' + $scope.param;
                                break;
                        case 'Emergency':
                                window.location.href = 'emergency.php?at=' + $scope.param;
                                break;
                        case 'Outpatient':
                                window.location.href = 'outpatient.php?at=' + $scope.param;
                                break;
                        case 'Inpatient':
                                window.location.href = 'inpatient.php?at=' + $scope.param;
                                break;
                                
                        case 'Confined':
                                window.location.href = 'nurse-patient.php?at=' + $scope.param;
                                break;
                        
                        case 'Physician':
                                window.location.href = 'physician.php?at=' + $scope.param;
                                break;
                        
                        case 'Pharmacy':
                                window.location.href = 'medicine-requisition.php?at=' + $scope.param;
                                break;
                                            							
                        case 'Pharmaceuticals':
                                window.location.href = 'pharmacy.php?at=' + $scope.param;
                                break; 

                        case 'Billing':
                                window.location.href = 'billing.php?at=' + $scope.param;
                                break;

                        case 'Cashier':
                                window.location.href = 'cashier.php?at=' + $scope.param;
                                break;
                        
                        case 'Accounts':
                                window.location.href = 'user.php?at=' + $scope.param;
                                break;

                        case 'Bed':
                                window.location.href = 'bed.php?at=' + $scope.param;
                                break;

                        case 'Specialization':
                                window.location.href = 'specialization.php?at=' + $scope.param;
                                break;
                        
                        case 'Laboratory':
                                window.location.href = 'laboratory.php?at=' + $scope.param;
                                break;
                        
                        default:
                            break;
                    }
                        
                }


            }]);
        </script>
    </div>
    <?php include 'footer.php'?>