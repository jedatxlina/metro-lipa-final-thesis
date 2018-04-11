<?php 
	  $activeMenu = "pharmacy";	
?>
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
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl" ng-form="Form">

    <div class="row">

    </div>
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h2>Pharmacy</h2><a ng-click="ListOfSupplies()"> <i class="ti ti-printer pull-right"></i></a> 
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Supplies Name </th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="sup in supplies track by $index" ng-class="{'selected': sup.SuppliesID == selectedRowSupplies}" ng-click="setClickedRowSupplies(sup.SuppliesID, sup.SuppliesName, sup.Price)" >
                                    <td>{{sup.SuppliesName}}</td>
                                    <td>₱{{sup.Price}}</td>
                                </tr>
                            </tbody>
                           
                        </table>
                   
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="panel panel-danger widget-progress" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Current Time</h2>
                                <div class="panel-ctrls button-icon-bg" 
                                    data-actions-container="" 
                                    data-action-refresh-demo='{"type": "circular"}'
                                    >
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="tabular">
                                    <div class="tabular-row">
                                        <div class="tabular-cell">
                                            <span class="status-total">Date</span>
                                            <span class="status-value">	{{ clock | date:'MMM d, y'}}</span>
                                        </div>
                                        <div class="tabular-cell">
                                            <span class="status-pending">Time</span>
                                            <span class="status-value">	{{ clock | date:'h:m:s a'}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
						<a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
						<a href="#" ng-click="AddSupplies()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i>Add Supplies</a>
                        <a href="#" ng-click="EditSupplies()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Supplies</a>
                </div>
            </div>

            <div class="modal fade" id="AddModalSupplies" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <h2>Add Supplies</h2>
                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                </div>
                <div class="panel-body" style="height: auto">
                            <form>
                                <div class="form-group">
                                    <label>Supplies Name </label>
                                    <input type="text" ng-model="suppliesname" placeholder="Syringes" class="form-control" ng-keypress="filterValueCharacter($event)">
                                </div>
                                <div class="form-group">
                                    <label>Price </label>
                                    <input type="text" ng-model="price" placeholder="10"  ng-keypress="filterValue($event)" class="form-control">
                                </div>
      
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='AddSupp()' class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>

        

            <div class="modal fade" id="ErrorModalSupplies" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        Select Supplies record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>

         
            <div class="modal fade" id="EditSupplies" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
            <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
            <div class="panel-heading">
                <h2>Edit Supplies</h2>
                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
            </div>
            <div class="panel-body" style="height: auto">
                     <div class="form-group">       
                     <label>Supplies Name </label>
                     <input type="text" ng-model="SuppName" class="form-control" disabled>
                  </div>
                  
                  <div class="form-group">       
                     <label>Price </label>
                     <input type="text" ng-model="SuppPrice" class="form-control" ng-keypress="filterValue($event)">
                  </div>
                 
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button ng-click='UpdateSupplies()' class="btn btn-primary">Confirm</button>
                     </div>
                     </div>
                </div>
            </div>
          </div>

        </div>
    </div>

    <script>
        var fetch = angular.module('myApp', ['ui.mask']);


        fetch.controller('userCtrl', ['$scope', '$http', '$window', '$interval', function($scope, $http, $window, $interval) {
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.selectedRowSupplies = null;
            $scope.selectedStatus = null;
            $scope.clickedRow = 0;
            $scope.new = {};
            $scope.quantity = 0;
            $scope.reorder = 0;
            $scope.qquantity = 0;
            $scope.ROrder = 0;

                var tick = function() {
                $scope.clock = Date.now();
                $scope.datetime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });		
			

                }
	
                tick();
                $interval(tick, 1000);

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

                $scope.filterValueCharacter = function($event){
                if(isNaN(String.fromCharCode($event.keyCode))){
                
                }
                else
                $event.preventDefault();
                };

                $scope.ListOfSupplies = function(){
                    if($scope.val == ''){
                        $window.open('list-of-supplies.php?at='+$scope.at, '_blank');
                    }else{
                        $window.open('list-of-supplies.php?at='+$scope.at+'&searchparam='+$scope.val, '_blank');
                    }
                }

            $http({
                method: 'get',
                url: 'getData/get-supplies-details.php'
            }).then(function(response) {
                $scope.supplies = response.data;
                angular.element(document).ready(function() {
                    dTable = $('#table_info')
                    dTable.DataTable();
                });
            });
         
           
            // $http({
            //     method: 'get',
            //     url: 'getData/get-medicine-underorder.php'
            // }).then(function(response) {
            //     $scope.meds = response.data;
            //     $scope.count = response.data.length;
            //     angular.element(document).ready(function() {
            //         dTable = $('#table_info')
            //         dTable.DataTable();
            //     });
            // });
          
         

            $scope.setClickedRowSupplies = function(sup,name,pri ) {
                $scope.selectedRowSupplies = ($scope.selectedRowSupplies == null) ? sup : ($scope.selectedRowSupplies == sup) ? null : sup;
                $scope.clickedRowSupplies = ($scope.selectedRowSupplies == null) ? 0 : 1;
                $scope.sname = name;
                $scope.sprice = pri;
            }

            $scope.AddSupplies = function() {
                $('#AddModalSupplies').modal('show');
            }

            $scope.AddSupp = function() {
                $scope.supplyid = "<?php echo rand(100000, 999999); ?>"
                $http({
                    method: 'GET',
                    url: 'insertData/insert-supplies.php',
                    params: {
                        supplyid: $scope.supplyid,
                        supplyname: $scope.suppliesname,
                        price: $scope.price
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.at;
                });
            }

            $scope.UpdateSupplies = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-supplies.php',
                    params: {
                        supplyid: $scope.selectedRowSupplies,
                        supplyname: $scope.SuppName,
                        price: $scope.PPrice
                    }
                }).then(function(response) {
                    window.location.href = 'pharmacy.php?at=' + $scope.at;
                });
            }

          

            $scope.EditSupplies = function() {
                if ($scope.selectedRowSupplies != null) {
                    $scope.supplyid = $scope.selectedRowSupplies;
                    $('#EditSupplies').modal('show');
                  $scope.SuppName = $scope.sname;
                  $scope.SuppPrice = $scope.sprice;
                } else {
                    $('#ErrorModalSupplies').modal('show');
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

                    case 'Logout':
                            window.location.href = '../logout.php?at=' + $scope.at;
                            break;
                    
                    default:
                        break;
                }
                        
            }


        }]);
    </script>
</div>
<?php include 'footer.php'?>