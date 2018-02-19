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
    <li class="active"> <a href="bed.php">Bed Specifications</a>
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
                        <h2>BED</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                           <th>Account ID</th>
                           <th>Access Type</th>
                           <th>Password</th>
                           <th>Email</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr ng-repeat="user in users" ng-class="{'selected': user.AccountID == selectedRow}" ng-click="setClickedRow(user.AccountID)">
                           <td>{{user.AccountID}}</td>
                           <td>{{user.AccessType}}</td>
                           <td>{{user.Password}}</td>
                           <td>{{user.Email}}</td>
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
						<a href="#" ng-click="Add()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i>Add User</a>
						<a href="#" ng-click="EditUser()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit User</a>
                	</div>
            </div>
          
            <!--/ Edit modal -->
         
            <!--/ End Edit modal -->
             <!-- Modal -->
         <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2>Add User Account</h2>
                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                    </div>
                    <div class="panel-body" style="height: 460px">
                    <p>Data below will be used as credential and restrictions of the user</p>
                        <form>
                            <div class="form-group" >
                                <label>Account ID</label>
                                <input type="text" class="form-control" ng-model="accountid" disabled>
                            </div>
                            <div class="form-group">
                                <label>Access Type  </label>
                                <div class="col-sm-13 select">
                                <select ng-model="accesstype" class="form-control" ng-change="accessType()">
                                    <option value="">Select</option>
                                    <option value="1">Type 1 - All Priviliges</option>
                                    <option value="2">Type 2 - Admission Module</option>
                                    <option value="3">Type 3 - Nurse Module</option>
                                    <option value="4">Type 4 - Doctor Module</option>
                                    <option value="5">Type 5 - Pharmacy Module</option>
                                    <option value="6">Type 6 - Billing Module</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">       
                                <label>Password </label>
                                <input type="password" ng-model="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">       
                                <label>Email </label>
                                <input type="email" ng-model="email" placeholder="youremail@yahoo.com" class="form-control">
                            </div>
                            <!-- <div class="modal-footer">
                               
                            </div> -->
                            <button type="button" class="btn btn-defualt pull-right" data-dismiss="modal">Close</button>
                            <button ng-click='Confirm()' class="btn btn-danger pull-right">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
         </div>
         <!-- /.modal-dialog -->
           
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
                        <!-- <div class="panel-footer">
                            <span class="text-gray"><em>Footer</em></span>
                        </div> -->
                    </div>
                    <!-- <div class="alert alert-danger">
                        Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div> -->
                </div>
            </div>
            <!--/ Error modal -->


            <!-- Edit Error modal -->
            <div class="modal fade" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Edit User Account</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 460px">
                        <p>Data below will be used as credential and restrictions of the user</p>
                        <form ng-repeat="getaccount in getaccountid">
                        <div class="form-group">
                            <label>Account ID</label>
                            <input type="text" class="form-control" ng-model="$parent.accid" ng-init="$parent.accid=getaccount.AccountID" disabled>
                        </div>
                        <div class="form-group">
                            <label>Access Type </label>
                            <div class="col-sm-13 select">
                                <select ng-model="$parent.acctype" ng-init="$parent.acctype=getaccount.AccessType" class="form-control" ng-change="accessType()" disabled>
                                    <option value="">Select</option>
                                    <option value="1">Type 1 - All Priviliges</option>
                                    <option value="2">Type 2 - Admission Module</option>
                                    <option value="3">Type 3 - Nurse Module</option>
                                    <option value="4">Type 4 - Doctor Module</option>
                                    <option value="5">Type 5 - Pharmacy Module</option>
                                    <option value="6">Type 6 - Billing Module</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="text" ng-model="$parent.pword" ng-init="$parent.pword=getaccount.Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="email" ng-model="$parent.mail" ng-init="$parent.mail=getaccount.Email" class="form-control">
                        </div>
                        <!-- <div class="modal-footer">
                        </div> -->
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        <button ng-click='Update()' class="btn btn-danger pull-right">Update</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit Error modal -->
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
                url: 'getData/get-user-accounts.php'
            }).then(function(response) {
                $scope.users = response.data;
                angular.element(document).ready(function() {
                    dTable = $('#table_info')
                    dTable.DataTable();
                });
            });

           


            $scope.Confirm = function() { 
                $http({
                method: 'GET',
                url: 'insertData/insert-user.php',
                params: {
                    accountid: $scope.accountid,
                    accesstype: $scope.accesstype,
                    password: $scope.password,
                    email: $scope.email
                }
            }).then(function(response) {
                window.location.href = 'user.php?at=' + $scope.at;
            });
                };


            $scope.accessType = function (){
              if($scope.accesstype == 1){
                $scope.accountid = "<?php echo "1" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 2){
                $scope.accountid = "<?php echo "2" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 3){
                $scope.accountid = "<?php echo "3" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 4){
                $scope.accountid = "<?php echo "4" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 5){
                $scope.accountid = "<?php echo "5" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 6){
                $scope.accountid = "<?php echo "6" .  rand(10000, 99999); ?>"
                }
          }

          $scope.setClickedRow = function(user) {
              $scope.selectedRow = user;
          }
   
          $scope.setClickedRow = function (index) {
          $scope.selectedRow = ($scope.selectedRow == index) ? null : index;
          }

            $scope.Add = function() {
                $('#AddModal').modal('show');
            }

            $scope.Update = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-user-details.php',
                    params: {  
                    accountid : $scope.accid,
                    accesstype: $scope.acctype,
                    password: $scope.pword,
                    email: $scope.mail                  
                    }
                }).then(function(response) {
                    window.location.href = 'user.php?at=' + $scope.at;
                });
            }

            $scope.EditUser = function() {
                if ($scope.selectedRow != null) 
                {
                    $scope.accountid = $scope.selectedRow;
                        $('#EditUser').modal('show');
                        $http({
                            method: 'GET',
                            params: {
                                id: $scope.accountid
                            },
                            url: 'getData/get-user-id.php'
                        }).then(function(response) {
                            $scope.getaccountid = response.data;
                        });
                     
                }
                else {
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