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
    <li class="active"> <a href="#">User Profile</a>
    </li>
</ol>
<br>
  <div class="clearfix">
        <div class="pull-left">
            <!-- &emsp;<button ng-click="goBack()" class="btn-danger-alt btn">Back</button> -->
        </div>
    </div>
<br>
<div class="container-fluid">
    <div data-widget-group="group1">
        
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-profile">
                    <div class="panel-body" ng-repeat="user in userdetails">
                        <img src="assets/img/defaultphoto.png">
                                <div class="name">{{user.Lastname}}, {{user.Firstname}} {{user.Middlename}}</div>
                                <div class="info">{{user.AccountID}}</div>
                            <!-- <div class="col-sm-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Upload a photo</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" ng-model="photo">
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                </div>
                            </div> -->
                    </div>
                </div><!-- panel -->
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#tab-about" role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> About </a>
                    <a href="#tab-edit" role="tab" data-toggle="tab" class="list-group-item active" ng-click="ChangePassword"><i class="ti ti-pencil"></i> Change Password</a>
                    <a href="#tab-edit" role="tab" data-toggle="tab" class="list-group-item active" ng-click="ChangeEmail"><i class="ti ti-pencil"></i> Change Email / Contact</a>
                </div>
            </div><!-- col-sm-3 -->
            <div class="col-sm-9">
                <div class="tab-content">

                    <div class="tab-pane active" id="tab-about">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Profile</h2>
                            </div>

                            <div class="panel-body"  data-ng-repeat="user in userdetails" >
                                <div class="about-area">
                                    <h4>Personal Information</h4>
                                        <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>First Name</th>
                                                <td>{{user.Firstname}}</td>
                                            </tr>
                                            <tr>
                                                <th>Middle Name</th>
                                                <td>{{user.Middlename}}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Name </th>
                                                <td>{{user.Lastname}}</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>{{user.Gender}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{user.Address}}</td>
                                            </tr>
                                            <tr>
                                                <th>Birthdate</th>
                                                <td>{{user.Birthdate}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{user.Email}}</td>
                                            </tr>
                                            <tr>
                                            <th>Change Photo</th>
                                            <td>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file">
                                                     <span class="fileinput-new">Upload a photo</span>
                                                     <span class="fileinput-exists">Change</span>
                                                         <input type="file" ng-model="photo">
                                                </span>
                                                     <span class="fileinput-filename"></span>
                                                 <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                            </div>
                                            </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>

                                <div class="about-area"  <?php if ($id!=4){?>style="display:none"<?php } ?>>
                                    <h4>Professional Information</h4>
                                        <div class="table-responsive">
                                        <table class="table about-table">
                                            <tbody>
                                            <tr>
                                                <th>Specialization</th>
                                                <td>{{user.Specialization}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th>Professional Fee</th>
                                                <td>{{user.ProfessionalFee}}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td>+63{{user.Contact}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="tab-edit">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2>Edit</h2>
                            </div>
                            <div class="panel-body">
                            <div class="about-area" data-ng-repeat="user in userdetails">
                                <div class="about-area">
                                    <h4>Personal Information</h4>
                                        <div class="table-responsive">
                                            <div class="col-lg-11">
                                            <table class="table about-table">
                                                <tbody>
                                                <tr>
                                                    <th>Last name</th>
                                                    <td><input type="text" class="form-control"  ng-model="user.Lastname" disabled></td>
                                                    <th  <?php if ($id!=4){?>style="display:none"<?php } ?>>Specialization</th>
                                                    <td  <?php if ($id!=4){?>style="display:none"<?php } ?>><input type="text" class="form-control" ng-model="user.Specialization" ng-disabled="true"></td>
                                                 </tr>
                                                <tr>
                                                    <th>First name</th>
                                                    <td><input type="text" class="form-control"  ng-model="user.Firstname" disabled></td>
                                                    <th  <?php if ($id!=4){?>style="display:none"<?php } ?>>Professional Fee</th>
                                                    <td  <?php if ($id!=4){?>style="display:none"<?php } ?>><input type="text" class="form-control" ng-model="user.ProfessionalFee"></td>
                                                </tr>
                                                <tr>
                                                    <th>Middle name</th>
                                                    <td><input type="text" class="form-control"  ng-model="user.Middlename" disabled></td>
                                                    <th <?php if ($id!=4){?>style="display:none"<?php } ?>>Mobile No.</th>
                                                    <td <?php if ($id!=4){?>style="display:none"<?php } ?>>   <input type="text" class="form-control" ng-model="user.Contact" ui-mask="+63 999-999-9999"  ui-mask-placeholder ui-mask-placeholder-char="-  "/></td>
                                                </div>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td> 
                                                    <select class="form-control" ng-model="user.Gender" disabled>  
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><input type="text" class="form-control"  ng-model="user.Address" disabled></td>
                                                </tr>                                              
                                                <tr>
                                                    <th>Birthdate</th>
                                                    <td><input type="text" class="form-control" ng-model="user.Birthdate" disabled></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><input type="text" class="form-control" ng-model="user.Email"></td>
                                                </tr>
                                                <tr>
                                                <th>Profile Photo</th>
                                                    <td>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Upload a photo</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" ng-model="photo">
                                                            </span>
                                                            <span class="fileinput-filename"></span>
                                                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-12 pull-right">
                                        <button class="btn-primary btn" ng-click="saveDetails(user)">Save</button>
                                        <button class="btn-default btn" ng-click="uploadPhoto()">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .tab-content -->
            </div><!-- col-sm-8 -->
        </div>
    </div>
</div>

<script>
var fetch = angular.module('myApp', ['ui.mask']);
   
   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
       $scope.at = "<?php echo $_GET['at'];?>";
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
            $scope.accesstype = $scope.at[0];
            
            $http({
            method: 'GET',
            url: 'getData/get-user-profile.php',
            params: {id: $scope.at, atype : $scope.accesstype}
            }).then(function(response) {
                $scope.userdetails = response.data;
            });

        $scope.saveDetails = function(user){
                $http({
                method: 'GET',
                url: 'updateData/update-user-profile.php',
                params: {atype: $scope.at[0],
                        id: $scope.at,
                        Lastname: user.Lastname,
                        Firstname: user.Firstname,
                        Middlename: user.Middlename,
                        Gender: user.Gender,
                        Birthdate: user.Birthdate,
                        Address: user.Address,
                        ProfessionalFee: user.ProfessionalFee,
                        Contact: user.Contact,
                        Email: user.Email,
                        Specialization: user.Specialization}
                }).then(function(response) {
                    window.location.href = 'user-profile.php?at=' + $scope.at;
                });
        }

        $scope.uploadPhoto = function(){
            alert($scope.file);
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

       $scope.viewQRcode = function(){
        $('#qrModal').modal('show');
        }

        // $scope.viewQRcode = function(){
        // $('#qrModal').modal('show');
        // }

       $scope.goBack = function(){
                    window.history.back();
        }

   }]);
</script>

<?php include 'footer.php'?>