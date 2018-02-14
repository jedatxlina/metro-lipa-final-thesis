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
    <li class="active"> <a href="bed.php">Pharmacy</a>
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
                        <h2>Pharmacy</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Pharmaceutical ID</th>
                                    <th>Pharmaceutical Type</th>
                                    <th>Pharmaceutical Name </th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="pharma in pharmacs" ng-class="{'selected': pharma.PharmaID == selectedRow}" ng-click="setClickedRow(pharma.PharmaID)">
                                    <td>{{pharma.PharmaID}}</td>
                                    <td>{{pharma.PharmaType}}</td>
                                    <td>{{pharma.PharmaName}}</td>
                                    <td>{{pharma.Unit}}</td>
                                    <td>{{pharma.Price}}</td>
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
                        <a href="#" ng-click="AddPharmaceutical()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-list-alt fa-fw"></i><span>&nbsp;&nbsp;Add Pharmaceutical</span></a>
                        <a href="#" ng-click="EditPharmaceutical()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Edit Pharmaceutical</span></a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Pharmaceutical</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Pharmaceutical Name </label>
                                    <input type="text" ng-model="pharmaname" placeholder="Paracetamol" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Pharmaceutical Type </label>
                                    <select ng-model="pharmatype" class="form-control">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="Drug">Drug</option>
                                        <option value="Medicine">Medicine</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unit </label>
                                    <input type="text" ng-model="unit" placeholder="500mg / tablet" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Price </label>
                                    <input type="text" ng-model="price" placeholder="100" class="form-control">
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
                        Select Pharmaceutical record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>

         
            <div class="modal fade" id="EditPharmaceutical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Pharmaceutical</h4>
                </div>
                <div class="modal-body">
                <form ng-repeat="ep in editpharmac">
                <div class="form-group">       
                        <label>Pharmaceutical ID</label>
                        <input type="text" ng-model="$parent.PID" ng-init="$parent.PID=ep.PharmaID" class="form-control" disabled>
                     </div>
                     <div class="form-group">       
                     <label>Pharmaceutical Name </label>
                     <input type="text" ng-model="$parent.PName" ng-init="$parent.PName=ep.PharmaName" class="form-control">
                  </div>
                  <div class="form-group">       
                     <label>Pharmaceutical Type </label>
                     <select ng-model="$parent.PType" ng-init="$parent.PType=ep.PharmaType" class="form-control">
                     <option value="" disabled selected>Select Type</option>
                           <option value="Drug">Drug</option>
                           <option value="Medicine">Medicine</option>
                      </select>
                  </div>
                  <div class="form-group">       
                     <label>Unit </label>
                     <input type="text" ng-model="$parent.PUnit" ng-init="$parent.PUnit=ep.Unit" class="form-control">
                  </div>
                  <div class="form-group">       
                     <label>Price </label>
                     <input type="text" ng-model="$parent.PPrice" ng-init="$parent.PPrice=ep.Price" class="form-control">
                  </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button ng-click='Update()' class="btn btn-primary">Confirm</button>
                     </div>
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
                url: 'getData/get-pharmaceutical-details.php'
            }).then(function(response) {
                $scope.pharmacs = response.data;
                angular.element(document).ready(function() {
                    dTable = $('#table_info')
                    dTable.DataTable();
                });
            });


            $scope.setClickedRow = function(pharma) {
                $scope.selectedRow = ($scope.selectedRow == null) ? pharma : ($scope.selectedRow == pharma) ? null : pharma;
                $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
            }

            $scope.AddPharmaceutical = function() {
                $('#AddModal').modal('show');
            }

            $scope.Add = function() {
                $scope.pharmaid = "<?php echo rand(100000, 999999); ?>"
                $http({
                    method: 'GET',
                    url: 'insertData/insert-pharmaceutical.php',
                    params: {
                        pharmaid: $scope.pharmaid,
                        pharmatype: $scope.pharmatype,
                        pharmaname: $scope.pharmaname,
                        unit: $scope.unit,
                        price: $scope.price
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.param;
                });
            }

            $scope.Update = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-pharmaceutical-details.php',
                    params: {
                        pharmaid: $scope.PID,
                        pharmatype: $scope.PType,
                        pharmaname: $scope.PName,
                        unit: $scope.PUnit,
                        price: $scope.PPrice
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.param;
                });
            }

            $scope.EditPharmaceutical = function() {
                if ($scope.selectedRow != null) {
                    $scope.pharmaid = $scope.selectedRow;
                    $('#EditPharmaceutical').modal('show');
                    $http({
                        method: 'GET',
                        params: {
                            id: $scope.pharmaid
                        },
                        url: 'getData/get-pharmaceutical-id.php'
                    }).then(function(response) {
                        $scope.editpharmac = response.data;
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