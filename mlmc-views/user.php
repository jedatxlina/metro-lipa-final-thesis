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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Action Panel</h2>

                    </div>
                    <div class="panel-body">
                        <a href="#" ng-click="Add()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-list-alt fa-fw"></i><span>&nbsp;&nbsp;Add User</span></a>
                        <a href="#" ng-click="EditUser()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Edit User</span></a>
                    </div>
                </div>
            </div>
          
            <!--/ Edit modal -->
         
            <!--/ End Edit modal -->
             <!-- Modal -->
         <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Add User Account</h4>
               </div>
               <div class="modal-body">
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
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button ng-click='Confirm()' class="btn btn-primary">Confirm</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         </div>
         <!-- /.modal-dialog -->




            <!-- Error modal -->
            <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        Select User record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>
            <!--/ Error modal -->
            <!-- Edit Error modal -->
            <div class="modal fade" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit User Account</h4>
                        </div>
                        <div class="modal-body">

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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-primary">Update</button>
                                </div>
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
                window.location.href = 'user.php?at=' + $scope.param;
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
                    window.location.href = 'user.php?at=' + $scope.param;
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