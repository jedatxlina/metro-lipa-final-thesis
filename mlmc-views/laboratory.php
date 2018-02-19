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
    <li class="active"> <a href="laboratory.php">Medical Laboratories</a>
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
                        <h2>MEDICAL LABORATORY</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Laboratory ID</th>
                                    <th>Description</th>
                                    <th>Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="lab in labs" ng-class="{'selected': lab.LaboratoryID == selectedRow}" ng-click="setClickedRow(lab.LaboratoryID)">
                                    <td>{{lab.LaboratoryID}}</td>
                                    <td>{{lab.Description}}</td>
                                    <td>{{lab.Rate}}</td>
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
                    <a href="#" ng-click="AddLaboratory()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i> Add Laboratory</a>
                    <a href="#" ng-click="EditLaboratory()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Laboratory</a>
                   
                </div>
            </div>

            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Edit Laboratory</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 340px">
                             <form ng-repeat="elab in editlab">
                                <div class="form-group">
                                    <label>Laboratory ID</label>
                                    <input type="text" ng-model="$parent.laboratoryid" ng-init="$parent.laboratoryid=elab.LaboratoryID" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Description </label>
                                    <input type="text" ng-model="$parent.description" ng-init="$parent.description=elab.Description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="$parent.rate" ng-init="$parent.rate=elab.Rate" class="form-control">
                                </div>
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-danger pull-right">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Add Laboratory</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 250px">
                             <form>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" ng-model="description" placeholder="XRAY" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="rate" placeholder="5000" class="form-control">
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
                        Select record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Error modal -->




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
            url: 'getData/get-laboratory-details.php'
        }).then(function(response) {
            $scope.labs = response.data;
            angular.element(document).ready(function() {
                dTable = $('#table_info')
                dTable.DataTable();
            });
        });


        $scope.setClickedRow = function(lab) {
            $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
            $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
        }

        $scope.AddLaboratory = function() {
            $('#AddModal').modal('show');
        }

        $scope.Add = function() {

            $scope.laboratoryid = "<?php echo rand(1000, 1100); ?>"
            $http({
                method: 'GET',
                url: 'insertData/insert-laboratory.php',
                params: {
                    laboratoryid: $scope.laboratoryid,
                    description: $scope.description,
                    rate: $scope.rate
                }
            }).then(function(response) {
                window.location.href = 'laboratory.php?at=' + $scope.at;
            });
        }

        $scope.Update = function() {
            $http({
                method: 'GET',
                url: 'updateData/update-laboratory-details.php',
                params: {
                    laboratoryid: $scope.laboratoryid,
                    description: $scope.description,
                    rate: $scope.rate
                }
            }).then(function(response) {
                window.location.href = 'laboratory.php?at=' + $scope.at;
            });
        }

        $scope.EditLaboratory = function() {
            if ($scope.selectedRow != null) {
                $scope.laboratoryid = $scope.selectedRow;
                $('#EditModal').modal('show');
                $http({
                    method: 'GET',
                    url: 'getData/get-laboratory-id.php',
                    params: {
                        id: $scope.laboratoryid
                    }
                }).then(function(response) {
                    $scope.editlab = response.data;
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