<?php include 'admin-header.php' ?>
<style>
    .selected {
        color: #800000;
        background-color: #F5F5F5;
        font-weight: bold;
    }
</style>

<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li><a href="index.php">Patients</a></li>
<li class="active"><a href="emergency.php">Pharmacy</a></li>
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
                        <h2>Pharmacy</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Medicine ID</th>
                                    <th>Medicine Name </th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Re-Order Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="med in meds track by $index" ng-class="{'selected': med.PharmaID == selectedRow}" ng-click="setClickedRow(med.PharmaID)" >
                                    <td>{{med.PharmaID}}</td>
                                    <td>{{med.PharmaName}}</td>
                                    <td>{{med.Unit}}</td>
                                    <td>{{med.Price}}</td>
                                    <td style="color:red">{{med.Quantity}}</td>  
                                    <td>{{med.ReOrder}}</td>
                                </tr>
                                <tr ng-repeat="pharma in pharmacs track by $index" ng-class="{'selected': pharma.PharmaID == selectedRow}" ng-click="setClickedRow(pharma.PharmaID)" >
                                    <td>{{pharma.PharmaID}}</td>
                                    <td>{{pharma.PharmaName}}</td>
                                    <td>{{pharma.Unit}}</td>
                                    <td>{{pharma.Price}}</td>
                                    <td>{{pharma.Quantity}}</td>  
                                    <td>{{pharma.ReOrder}}</td>
                                </tr>
                            </tbody>
                           
                        </table>
                    <!-- Table 2 -->
                    <!-- <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Medicine ID</th>
                                    <th>Medicine Name </th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Re-Order Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="pharma in pharmacs track by $index" ng-class="{'selected': pharma.PharmaID == selectedRow}" ng-click="setClickedRow(pharma.PharmaID)" >
                                    <td>{{pharma.PharmaID}}</td>
                                    <td>{{pharma.PharmaName}}</td>
                                    <td>{{pharma.Unit}}</td>
                                    <td>{{pharma.Price}}</td>
                                    <td ng-style = "changeStyle(pharma.Quantity,pharmacs[$index])">{{pharma.Quantity}}</td>  
                                    <td>{{pharma.ReOrder}}</td>
                                </tr>
                            </tbody>
                        </table> -->
                        <!-- Table 2 end -->
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
						<a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
						<a href="#" ng-click="AddPharmaceutical()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i>Add Medicine</a>
                        <a href="#" ng-click="EditPharmaceutical()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Medicine</a>
                        <a href="#" ng-click="AddStock()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Add Stock</a>
                </div>
            </div>

            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <h2>Add Medicine</h2>
                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                </div>
                <div class="panel-body" style="height: auto">
                            <form>
                                <div class="form-group">
                                    <label>Medicine Name </label>
                                    <input type="text" ng-model="pharmaname" placeholder="Paracetamol" class="form-control">
                                </div>

                                
                                    <div class="form-group">
                                        <label>Unit </label>
                                        <div class="row">
                                 <div class="col-md-9">
                                        <input type="text" ng-model="unit" placeholder="100" class="form-control" ng-keypress="filterValue($event)" style="width:480px" ng-disabled="measurement == null ">
                                        </div>
                                        <div class="col-md-3">
                                        <select ng-model="measurement" class="form-control" style="width:130px">
                                        <option value="" disabled>Select</option>
                                        <option value="mg">mg</option>
                                        <option value="mL">mL</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                </div>
                                <div class="form-group">
                                    <label>Price </label>
                                    <input type="text" ng-model="price" placeholder="100"  ng-keypress="filterValue($event)" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity </label>
                                    <input type="text" ng-model="quantity" placeholder="10" ng-keypress="filterValue($event)" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Re-Order Point </label>
                                    <input type="text" ng-model="reorder" placeholder="5" ng-keypress="filterValue($event)" class="form-control">
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

            <div class="modal fade" id="AddStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Stock</h4>
                        </div>
                        <div class="modal-body">
                            <form ng-repeat="stock in stocks">
                                <div class="form-group">
                                    <label>Medicine Name </label>
                                    <input type="text" ng-model="$parent.medname" ng-init="$parent.medname=stock.PharmaName" class="form-control" disabled>
                                </div>
                                </forM>
                                <div class="form-group">
                                    <label>Quantity </label>
                                    <input type="text" ng-model="addqty" placeholder="10" class="form-control" ng-keypress="filterValue($event)">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='UpdateStock()' class="btn btn-primary">Confirm</button>
                                </div>
                            
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>



            <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        Select Medicine record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>

         
            <div class="modal fade" id="EditPharmaceutical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Medicine</h4>
                </div>
                <div class="modal-body">
                <form ng-repeat="ep in editpharmac">
                <div class="form-group">       
                        <label>Medicine ID</label>
                        <input type="text" ng-model="$parent.PID" ng-init="$parent.PID=ep.PharmaID" class="form-control" disabled>
                     </div>
                     <div class="form-group">       
                     <label>Medicine Name </label>
                     <input type="text" ng-model="$parent.PName" ng-init="$parent.PName=ep.PharmaName" class="form-control" disabled>
                  </div>
                  <div class="form-group">       
                     <label>Unit </label>
                     <input type="text" ng-model="$parent.PUnit" ng-init="$parent.PUnit=ep.Unit" class="form-control" disabled>
                  </div>
                  <div class="form-group">       
                     <label>Price </label>
                     <input type="text" ng-model="$parent.PPrice" ng-init="$parent.PPrice=ep.Price" class="form-control" ng-keypress="filterValue($event)">
                  </div>
                  <div class="form-group">       
                     <label>Quantity </label>
                     <input type="text" ng-model="$parent.qquantity" ng-init="$parent.qquantity=ep.Quantity" class="form-control" disabled>
                  </div>
                  <div class="form-group">       
                     <label>Re-Order Point </label>
                     <input type="text" ng-model="$parent.ROrder" ng-init="$parent.ROrder=ep.ReOrder" class="form-control" ng-keypress="filterValue($event)">
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
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.selectedRow = null;
            $scope.selectedStatus = null;
            $scope.clickedRow = 0;
            $scope.new = {};
            $scope.showData = true;
            $scope.onlyNumbers = '\\d+';

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

                $scope.filterValue = function($event){
                if(isNaN(String.fromCharCode($event.keyCode))){
                $event.preventDefault();
                }
                };

            $http({
                method: 'get',
                url: 'getData/get-medicine-aboveorder.php'
            }).then(function(response) {
                $scope.pharmacs = response.data;
                angular.element(document).ready(function() {
                    dTable = $('#table_info')
                    dTable.DataTable();
                });
            });
         
           
            $http({
                method: 'get',
                url: 'getData/get-medicine-underorder.php'
            }).then(function(response) {
                $scope.meds = response.data;
                $scope.count = response.data.length;
                if ($scope.count == 0)
                $scope.showData = false;
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
                $scope.unit = $scope.unit + '' +  $scope.measurement;
                $http({
                    method: 'GET',
                    url: 'insertData/insert-pharmaceutical.php',
                    params: {
                        pharmaid: $scope.pharmaid,
                        pharmaname: $scope.pharmaname,
                        unit: $scope.unit,
                        price: $scope.price,
                        quantity: $scope.quantity,
                        reorder: $scope.reorder
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.at;
                });
            }

            $scope.Update = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-pharmaceutical-details.php',
                    params: {
                        pharmaid: $scope.PID,
                        pharmaname: $scope.PName,
                        unit: $scope.PUnit,
                        price: $scope.PPrice,
                        quantity: $scope.qquantity,
                        reorder: $scope.ROrder
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.at;
                });
            }

            $scope.UpdateStock = function() {
                $scope.medid = $scope.selectedRow;
                $http({
                    method: 'GET',
                    url: 'updateData/update-pharmaceutical-stock.php',
                    params: {
                        pharmaid: $scope.medid,
                        qty: $scope.addqty
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.at;
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

            $scope.AddStock = function() {
                if ($scope.selectedRow != null) {
                    $scope.pharmaid = $scope.selectedRow;
                    $('#AddStock').modal('show');
                    $http({
                        method: 'GET',
                        params: {
                            id: $scope.pharmaid
                        },
                        url: 'getData/get-pharmaceutical-id.php'
                    }).then(function(response) {
                        $scope.stocks = response.data;
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

                    case 'LaboratoryDept':
                            window.location.href = 'laboratorydept.php?at=' + $scope.at;
                            break;
                    
                    default:
                        break;
                }
                        
            }


        }]);
    </script>
</div>
<?php include 'footer.php'?>