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
    <li class="active"> <a href="physician.php">Physician</a>
    </li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Physician Information</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                           <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Detail</legend>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label>Physician ID</label>
                                                    <div  ng-repeat="user in users">
                                                    <input type="text" ng-model="$parent.physicianid" ng-init="$parent.physicianid=user.AccountID" disabled >
                                                    </div>
                                                </div>
                                            </div>
                                             <div data-row-span="3">
                                         
                                                <div data-field-span="1">
                                                    <label>First Name</label>
                                                    <input type="text" ng-model="firstname">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Middle Name</label>
                                                    <input type="text" ng-model="middlename">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Last Name</label>
                                                    <input type="text" ng-model="lastname">
                                                </div>
                                            </div>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Date of birth</label>
                                                    <input type="text" class="form-control" ng-model="" id="datepicker">
                                                </div>
                                                
                                                <div data-field-span="1">
                                                    <label>Gender</label>
                                                    <select class="form-control" ng-model="gender">  
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                
                                                <div data-field-span="1" data-field-error="Please enter a valid email address">
                                                    <label>E-mail</label>
                                                    <div  ng-repeat="user in users">
                                                    <input type="text" class="form-control" ng-model="$parent.email" ng-init="$parent.email=user.Email" >
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <Br>
                                            <fieldset>
                                                <legend>Residential address</legend>
                                             
                                                <div data-row-span="2">

                                                    <div data-field-span="2">
                                                        <label>Complete Address</label>
                                                        <input type="text" ng-model="address">
                                                    </div>
                                                </div>
                                              
                                                <fieldset>
                                                <legend>Professional Details</legend>
                                             
                                                <div data-row-span="3">
                                               
                                                    <div data-field-span="1">
                                                        <label>Professional Fee </label>
                                                        <input type="text" ng-model="fee">
                                                    </div>
                                                <div data-field-span="1">
                                                    <label>Specialization</label>
                                                    <select ng-model="$parent.special" class="form-control" ng-options="data.SpecializationName as data.SpecializationName for data in spec | orderBy:'SpecializationName':false track by data.SpecializationID">
                                                    <option value="" disabled selected>Select Specialization</option>
                                                </select>
                                                </div>
                                                <div data-field-span="1">
                                                <label>Mobile No.</label>
                                                <input type="text" class="form-control" ng-model="contact" ui-mask="+63 999-999-9999"  ui-mask-placeholder ui-mask-placeholder-char="-  "/>
                                                </div>
                                                    </div>
                                              
                                                </div>
                                                </fieldset>
                                            </fieldset>
                                        </fieldset>
                                        <br>
                                        <br>
                                          
                                            <div class="clearfix pt-md">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn-danger btn" ng-click="submitForm()">Confirm</button>
                                                </div>
                                            </div>
                                    </form>


                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>


<!--/ Edit modal -->

<!--/ End Edit modal -->
<!-- / Add Modal -->

<!--/ End Add Modal -->
<!-- Error modal -->

<!--/ Error modal -->
<!-- Edit Error modal -->

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


        $http({
				method: 'get',
				params: {accid : $scope.param},
				url: 'getData/get-physician-id.php'
                    }).then(function(response) {		
                    $scope.users = response.data;
			});

        
    $http({
        method: 'get',
        url: 'getData/get-specialization-details.php'
         }).then(function(response) {
        $scope.spec = response.data;
    });

   

    $scope.submitForm = function(){

                $scope.birthdate =$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd" ).val();
                
                $http({
                method: 'GET',
                url: 'updateData/update-user-profile.php',
                params: {atype: $scope.param[0],
                        id: $scope.param,
                        Lastname: $scope.lastname,
                        Firstname: $scope.firstname,
                        Middlename: $scope.middlename,
                        Gender: $scope.gender,
                        Birthdate: $scope.birthdate,
                        Address: $scope.address,
                        ProfessionalFee: $scope.fee,
                        Email: $scope.email,
                        Specialization: $scope.special,
                        Contact: $scope.contact
                        }
                }).then(function(response) {
                    window.location.href = 'user-profile.php?at=' + $scope.param;
                });
        }



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


    $scope.goBack = function(){
                        window.history.back();
                    }
                    

    $scope.getPage = function(check) {
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