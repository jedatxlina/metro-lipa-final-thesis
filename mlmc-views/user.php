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
    <li class="active"> <a href="bed.php">Users</a>
    </li>
</ol>
<br><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl" >

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
						<a href="#" ng-click="Add()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i>Add User Account</a>
						<a href="#" ng-click="EditUser()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Account</a>
                        <a href="#" ng-click="ViewUser()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit User Details</a>
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
                    <div class="panel-body" style="height: auto">
                    <p>Data below will be used as credential and restrictions of the user</p>
                        <form>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group" >
                                <label>Account ID</label>
                                <input type="text" class="form-control" ng-model="accountid" disabled>
                            </div>
                            <div class="form-group">
                                <label>Access Type  </label>
                                <div class="col-sm-13 select">
                                <select ng-model="accesstype" class="form-control" ng-change="accessType()">
                                    <option value="" disabled>Select</option>
                                    <!-- <option value="1">Type 1 - All Priviliges</option> -->
                                    <option value="2">Type 2 - Admission Module</option>
                                    <option value="3">Type 3 - Nurse Module</option>
                                    <option value="4">Type 4 - Doctor Module</option>
                                    <option value="5">Type 5 - Pharmacy Module</option>
                                    <option value="6">Type 6 - Billing Module</option>
                                    <option value="7">Type 7 - Secretary Module</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">       
                                <label>Password </label>
                                <input type="text" ng-model="password" class="form-control" disabled>
                            </div>
                            <div class="form-group">       
                                <label>Email </label>
                                <input type="email" ng-model="email" placeholder="youremail@yahoo.com" class="form-control">
                            </div>
                            
                            </div>
                            <div class="col-md-6">

                            <div class="form-group">       
                                <label>First Name </label>
                                <input type="text" ng-model="fname" placeholder="Juan" class="form-control">
                            </div>
                            <div class="form-group">       
                                <label>Middle Name </label>
                                <input type="text" ng-model="mname" placeholder="Dela" class="form-control">
                            </div>
                            <div class="form-group">       
                                <label>Last Name </label>
                                <input type="text" ng-model="lname" placeholder="Cruz" class="form-control">
                            </div>
                            <div class="form-group">       
                                <label>Gender </label>
                                <select ng-model="gender" class="form-control">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">       
                                <label>Birthdate </label>
                                <input type="text" ng-model="" id="datepicker" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">       
                                <label>Address </label>
                                <input type="text" ng-model="address" placeholder="Province / City / Street" class="form-control">
                            </div>
                            </div>
                            </div>
                            <!-- <div class="modal-footer">
                               
                            </div> -->
                            <div class="form-group" ng-show='accesstype == 7' >
                                <label>Select Physician</label>
                                <select class="form-control" ng-model="assignedphysician" style="width:620px;">
                                    <optgroup label="List of Doctors">
                                        <option ng-repeat="physician in physicians" value="{{physician.AccountID}}">Dr. {{physician.Fullname}}</option>
                                    </optgroup>    
                                </select>
                            </div>

                            <div class="form-group" ng-show='accesstype == 4'>
                                <label >Select Specialization</label>
                                <select class="form-control" ng-model="specialization" style="width:620px">
                                <optgroup label="List of Specializations">
                                <option ng-repeat="special in spec" value="{{special.SpecializationName}}">{{special.SpecializationName}}</option>
                                </optgroup>
                                </select>
                                
                            </div>


                            <button type="button" class="btn btn-defualt pull-right" data-dismiss="modal">Close</button>
                            &emsp;
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
                        Select User record that you would like to apply an <a href="#" class="alert-link">Action.</a>
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
                        <div class="panel-body" style="height: auto">
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
                                    <!-- <option value="1">Type 1 - All Priviliges</option> -->
                                    <option value="2">Type 2 - Admission Module</option>
                                    <option value="3">Type 3 - Nurse Module</option>
                                    <option value="4">Type 4 - Doctor Module</option>
                                    <option value="5">Type 5 - Pharmacy Module</option>
                                    <option value="6">Type 6 - Billing Module</option>
                                    <option value="7">Type 7 - Secretary Module</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="password" ng-model="$parent.pword"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="email" ng-model="$parent.mail" ng-init="$parent.mail=getaccount.Email" class="form-control">
                        </div>
                       
                        <div class="form-group" >
                                <label ng-show='$parent.acctype == 7'>Select Physician</label>
                                <select class="form-control" ng-model="physician" style="width:620px;" ng-show='$parent.acctype == 7'>
                                    <optgroup label="List of Doctors">
                                        <option ng-repeat="physician in physicians" value="{{physician.PhysicianID}}">{{physician.Fullname}}</option>
                                    </optgroup>    
                                </select>
                            </div>

                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        <button ng-click='Update()' class="btn btn-danger pull-right">Update</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit Error modal -->

         <!-- View modal -->
         <div class="modal fade" id="ViewUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>User Information</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: auto">
                     <div ng-repeat="acc in getuser">
                        <div class="form-group">
                            <label>Account ID</label>
                            <input type="text" class="form-control" ng-model="$parent.viewid" ng-init="$parent.viewid=acc.AccountID" disabled>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" ng-model="$parent.firstname" ng-init="$parent.firstname=acc.FirstName">
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" ng-model="$parent.middlename" ng-init="$parent.middlename=acc.MiddleName">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" ng-model="$parent.lastname" ng-init="$parent.lastname=acc.LastName">
                        </div>

                        <div class="form-group">
                            <label>Birthdate</label>
                            <input type="text" class="form-control" ng-model="$parent.bdate" id="datepicker" ng-init="$parent.bdate=acc.Birthdate">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select ng-model="$parent.ggender" ng-init="$parent.ggender=acc.Gender" class="form-control">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" ng-model="$parent.aaddress" ng-init="$parent.aaddress=acc.Address">
                        </div>

                        <input type="hidden" class="form-control" ng-model="$parent.tempmail"  ng-init="$parent.tempmail=acc.Email" >

                         <div class="form-group" ng-show='viewid[0] == 4'>
                                <label >Select Specialization</label>
                                <select class="form-control" ng-model="$parent.sspecialization" ng-init="$parent.sspecialization=acc.Specialization" style="width:620px">
                                <option ng-repeat="special in spec" value="{{special.SpecializationName}}">{{special.SpecializationName}}</option>
                                </select>
                                
                        </div>

                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        <button ng-click='UpdateDetails()' class="btn btn-danger pull-right">Update</button>
                    
                        </div>
                    </div>
                </div>
            </div>
            <!--/ View modal -->

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

                $http({
                        method: 'get',
                        url: 'getData/get-specialization-details.php'
                        }).then(function(response) {
                        $scope.spec = response.data;
                    });

            $http({
                method: 'GET',
                url: 'getData/get-physician-details.php'
            }).then(function(response) {
                $scope.physicians = response.data;
            });


            $scope.Confirm = function() { 
                $scope.birthdate =$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd" ).val();
                switch ($scope.accesstype) {
                    case '7':
                            $http({
                                method: 'GET',
                                url: 'updateData/update-user-profile.php',
                                params: {id: $scope.accountid,
                                        Lastname: $scope.lname,
                                        Firstname: $scope.fname,
                                        Middlename: $scope.mname,
                                        Gender: $scope.gender,
                                        Birthdate: $scope.birthdate,
                                        Address: $scope.address,
                                        Contact: $scope.contact,
                                        Email: $scope.email,
                                        atype: $scope.accesstype,
                                        Assigned: $scope.assignedphysician
                                        }
                                }).then(function(response) {
                                    window.location.href = 'insertData/insert-user.php?at=' + $scope.at + '&accountid=' + $scope.accountid + '&accesstype=' + $scope.accesstype + '&password=' + $scope.password + '&email=' + $scope.email;
                                });
                        break;
                    case '4':
                            $http({
                                method: 'GET',
                                url: 'updateData/update-user-profile.php',
                                params: {id: $scope.accountid,
                                    Lastname: $scope.lname,
                                    Firstname: $scope.fname,
                                    Middlename: $scope.mname,
                                    Gender: $scope.gender,
                                    Birthdate: $scope.birthdate,
                                    Specialization: $scope.specialization,
                                    Address: $scope.address,
                                    Contact: $scope.contact,
                                    Email: $scope.email,
                                    atype: $scope.accesstype
                                    }
                                }).then(function(response) {
                                    window.location.href = 'insertData/insert-user.php?at=' + $scope.at + '&accountid=' + $scope.accountid + '&accesstype=' + $scope.accesstype + '&password=' + $scope.password + '&email=' + $scope.email;
                                });
                   
                        break;

                    default:
                            $http({
                            method: 'GET',
                            url: 'updateData/update-user-profile.php',
                            params: {id: $scope.accountid,
                                    Lastname: $scope.lname,
                                    Firstname: $scope.fname,
                                    Middlename: $scope.mname,
                                    Gender: $scope.gender,
                                    Birthdate: $scope.birthdate,
                                    Address: $scope.address,
                                    Contact: $scope.contact,
                                    Email: $scope.email,
                                    atype: $scope.accesstype
                                    }
                            }).then(function(response) {
                            window.location.href = 'insertData/insert-user.php?at=' + $scope.at + '&accountid=' + $scope.accountid + '&accesstype=' + $scope.accesstype + '&password=' + $scope.password + '&email=' + $scope.email;
                            });
                        break;
                }

                    
            }


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
              }if($scope.accesstype == 7){
                $scope.accountid = "<?php echo "7" .  rand(10000, 99999); ?>"
                }
          }

          $scope.setClickedRow = function(user) {
              $scope.selectedRow = user;
          }
   
          $scope.setClickedRow = function (index) {
          $scope.selectedRow = ($scope.selectedRow == index) ? null : index;
          }

            $scope.Add = function() {
                $scope.password="mlmc";
                $('#AddModal').modal('show');
            }

            $scope.Update = function() {
                
                window.location.href = 'updateData/update-user-details.php?at=' + $scope.at + '&accountid=' + $scope.accid + '&password=' + $scope.pword + '&email=' + $scope.mail;
         
        
               }

            $scope.UpdateDetails = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-user-profile.php',
                    params: {id: $scope.viewid,
                            Lastname: $scope.lastname,
                            Firstname: $scope.firstname,
                            Middlename: $scope.middlename,
                            Gender: $scope.ggender,
                            Birthdate: $scope.bdate,
                            Specialization: $scope.sspecialization,
                            Address: $scope.aaddress,
                            ProfessionalFee: $scope.fee,
                            Contact: $scope.contact,
                            Email: $scope.tempmail,
                            atype: $scope.viewid[0]
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

         


            $scope.ViewUser = function() {
                if ($scope.selectedRow != null) 
                {
                    $scope.accountid = $scope.selectedRow;

                            if ($scope.accountid[0] == 2)		
                            {
                                $http({
                                        method: 'get',
                                        params: {accid : $scope.accountid},
                                        url: 'getData/get-admissionstaff-id.php'
                                    }).then(function(response) {
                                        $scope.getuser = response.data;
                                    });
                            }	
                            else if ($scope.accountid[0] == 3)
                                {
                                    $http({
                                            method: 'get',
                                            params: {accid : $scope.accountid},
                                            url: 'getData/get-nurse-id.php'
                                        }).then(function(response) {
                                        $scope.getuser = response.data;
                                    });
                                }
                                else if ($scope.accountid[0] == 4)
                                {
                                    $http({
                                            method: 'get',
                                            params: {accid : $scope.accountid},
                                            url: 'getData/get-physician-id.php'
                                        }).then(function(response) {
                                        $scope.getuser = response.data;
                                    });
                                }
                            else if ($scope.accountid[0] == 5)
                                {
                                    $http({
                                            method: 'get',
                                            params: {accid : $scope.accountid},
                                            url: 'getData/get-pharmacystaff-id.php'
                                        }).then(function(response) {
                                        $scope.getuser = response.data;
                                    });
                                }	
                            else if ($scope.accountid[0] == 6)
                                {
                                    $http({
                                            method: 'get',
                                            params: {accid : $scope.accountid},
                                            url: 'getData/get-billingstaff-id.php'
                                        }).then(function(response) {
                                        $scope.getuser = response.data;
                                    });
                                }
                            else if ($scope.accountid[0] == 7)
                                {
                                    $http({
                                            method: 'get',
                                            params: {accid : $scope.accountid},
                                            url: 'getData/get-secretary-id.php'
                                        }).then(function(response) {
                                        $scope.getuser = response.data;
                                    });
                                }
                       
                        $('#ViewUser').modal('show');
            }
                     else
                     {
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