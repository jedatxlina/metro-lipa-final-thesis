<?php include 'admin-header.php' ?>

<style>
    .selected {
    color: #337AB7;
    background-color: #F5F5F5;
    font-weight: bold;
    }
</style>

<div id="page-wrapper"  ng-app="myApp" ng-controller="userCtrl">
   <div class="row">
      <div class="col-lg-12">
         <h3 class="page-header">Users</h3>
      </div>
      <!-- /.col-lg-12 -->
   </div>
   <!-- /.row -->
   <div class="row">
      <div class="col-lg-6">
         <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
         Add User
         </button><br>&emsp;
         <!-- Modal -->
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel">User Account</h4>
                  </div>
                  <div class="modal-body">
                     <p>Data below will be used as credential and restrictions of the user</p>
                     <form>
                        <div class="form-group" >
                           <label>Account ID</label>
                           <input type="text" class="form-control" readonly="readonly" ng-model="accountid">
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
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button ng-click='Confirm()' class="btn btn-primary">Confirm</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <div class="panel panel-default">
            <div class="panel-heading">
               Active Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div>
                  <table width="100%" class="table table-hover">
                     <thead>
                        <tr>
                           <th>Account ID</th>
                           <th>Access Type</th>
                           <th>Password</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr ng-repeat="user in users" ng-class="{'selected': user.AccountID == selectedRow}" ng-click="setClickedRow(user.AccountID)">
                           <td>{{user.AccountID}}</td>
                           <td>{{user.AccessType}}</td>
                           <td>{{user.Password}}</td>
                        </tr>
                     </tbody>
                  </table>
                  <!-- /.table-responsive -->
                </div><!-- /.panel-body -->
            </div>
            <!-- /.panel -->
         </div>
         <!-- /.col-lg-12 -->
      </div>
   </div>
</div>
<script>
   var fetch = angular.module('myApp', []);
   
      fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
     
          $scope.selectedRow = null;
          $scope.Confirm = function() {
                    $http.post("http://localhost/Metro Lipa Patient System/metro-lipa-pages/add-user.php", {
                        'accountid': $scope.accountid,
                        'accesstype': $scope.accesstype,
                        'password': $scope.password
                    }).then(function(response){
                            window.location.href = 'users.php';
                    });

                };
          $http({
          method: 'get',
          url: '../assets/getData/get-user-accounts.php'
          }).then(function successCallback(response) {
              $scope.users = response.data;
          });
          $scope.accessType = function (){
              if($scope.accesstype == 1){
                $scope.accountid = "<?php echo "1-" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 2){
                $scope.accountid = "<?php echo "2-" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 3){
                $scope.accountid = "<?php echo "3-" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 4){
                $scope.accountid = "<?php echo "4-" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 4){
                $scope.accountid = "<?php echo "5-" .  rand(10000, 99999); ?>"
              }if($scope.accesstype == 4){
                $scope.accountid = "<?php echo "6-" .  rand(10000, 99999); ?>"
                }
          }

          $scope.setClickedRow = function(user) {
              $scope.selectedRow = user;
          }
   
          $scope.setClickedRow = function (index) {
          $scope.selectedRow = ($scope.selectedRow == index) ? null : index;
      }
   
      }]);            
</script>   
<?php include 'admin-footer.php' ?>
