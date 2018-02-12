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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Action Panel</h2>

                    </div>
                    <div class="panel-body">
                        <a href="#" ng-click="AddLaboratory()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-list-alt fa-fw"></i><span>&nbsp;&nbsp;Add Laboratory</span></a>
                        <a href="#" ng-click="EditLaboratory()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Edit Laboratory</span></a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Laboratory</h4>
                        </div>
                        <div class="modal-body">
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Laboratory</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" ng-model="description" placeholder="XRAY" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="rate" placeholder="5000" class="form-control">
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
                        Select Laboratory record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
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
                window.location.href = 'laboratory.php'
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
                window.location.href = 'laboratory.php'
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