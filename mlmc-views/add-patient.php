<?php include 'admin-header.php';  $get = $_GET['id'];  ?>
<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li><a href="#">Patients</a>
    </li>
    <li class="active"><a href="index.php">Patient Form</a>
    </li>
</ol>
<br>
<br>
<div ng-app="myApp" ng-controller="userCtrl" ng-init="check('<?php echo $get; ?>')">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div data-widget-group="group1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Form</h2>
                                    <!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div> -->
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Detail</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Admission ID</label>
                                                    <input type="text" ng-model="admissionid" disabled>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Admission Type</label>
                                                    <input type="text" ng-model="admissiontype" disabled>
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
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>Date of birth</label>
                                                    <input type="text" class="form-control" ng-model="" id="datepicker">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" ng-model="age">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Gender</label>
                                                    <select class="form-control" ng-model="gender">  
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Nationality</label>
                                                    <select class="form-control" ng-mode="country">  
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Philippines" title="Philippines">Filipino</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div data-row-span="4">
                                                <div data-field-span="2" data-field-error="Please enter a valid email address">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control" ng-model="email">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Mobile No.</label>
                                                    <input type="text" class="form-control" ng-model="contact" ui-mask="+63 999-999-9999"  ui-mask-placeholder ui-mask-placeholder-char="-  "/>
                                                </div>
                                            </div>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label>In case of a minor please provide details (Name of parent and natural guardian)</label>
                                                    <input type="text">
                                                </div>
                                        
                                            </div>

                                            <br>
                                            <fieldset>
                                                <legend>Residential address</legend>
                                             
                                                <div data-row-span="4">
                                                    <div data-field-span="1">
                                                        <label>Province</label>
                                                        <select class="form-control" ng-options="data.provname for data in provinces | orderBy:'provname':false track by data.id" ng-model="province" ng-change="cityUpdate()">
                                                             <option value="" disabled selected>Select Province</option>
                                                        </select>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>City</label>
                                                        <select class="form-control" ng-options="data.city for data in citymun | orderBy:'city':false track by data.id" ng-model="city">
                                                            <option value="" disabled selected>Select City</option>
                                                        </select>   
                                                    </div>
                                                    <div data-field-span="2">
                                                        <label>Complete Address</label>
                                                        <input type="text" ng-model="address">
                                                    </div>
                                                </div>
                                                 <div data-row-span="1">
                                                    <div data-field-span="1">
                                                        <label>Telephone Residence</label>
                                                        <input type="text" ng-model="telephone">
                                                    </div>

                                              
                                                </div>
                                            </fieldset>
                                        </fieldset>


                                        <br>
                                        <br>
                                        <fieldset>
                                            <legend>Personal Details</legend>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label>Occupation</label>
                                                    <label>
                                                        <input type="radio"  name="occupation" value="Executive" ng-model="occupation">Executive</label> &nbsp;
                                                    <label>
                                                        <input type="radio"  name="occupation" value="Non-executive" ng-model="occupation"> Non-executive</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="occupation" value="Retired" ng-model="occupation"> Retired</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="occupation" value="Student" ng-model="occupation"> Student</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="occupation" value="Other" ng-model="occupation"> Other</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="occupation" value="Unemployed" ng-model="occupation"> Unemployed</label>
                                                </div>
                                            </div>
                                              <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label>Job Title</label>
                                                    <input type="text" ng-model="jobtitle">
                                                </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Education</label>
                                                    <label>
                                                        <input type="radio" name="education" ng-model="education" value="Under Graduate"> Under graduate</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="education" ng-model="education" value="Graduate"> Graduate</label> &nbsp;
                                                    <label>
                                                        <input type="radio" name="education" ng-model="education" value="Others"> Others</label>
                                                </div>

                                            </div>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Maritial Status</label>
                                                    <select class="form-control" ng-model="status">  
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Separated">Separated</option>
                                                    </select>
                                                </div>
                                                <div data-field-span="2">
                                                    <label>Spouse name</label>
                                                    <input type="text" ng-model="spouse" ng-disabled="status != 'Married'">
                                                </div>
                                            </div>
                                          
                                            <br>

                                            <div class="clearfix pt-md">
                                                <div class="pull-right">
                                                    <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                    <button type="submit" class="btn-danger btn" ng-click="submitForm()">Next</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            
                var app = angular.module('myApp', ['ui.mask']);
                app.controller('userCtrl', function($scope, $window, $http) {
                    $scope.at = "<?php echo $_GET['at'];?>";
                    $scope.admissionid = "<?php echo "2017" .  rand(111111, 999999); ?>";
                    
                    switch ($scope.at.charAt(0)) {
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
                        method: 'GET',
                        url: 'getData/get-province-details.php'
                    }).then(function(response) {
                        $scope.provinces = response.data;
                    });

                    $scope.check = function(check){
                    $scope.param = check;
                    if($scope.param == 1){
                        $scope.admissiontype = 'Emergency';
                        
                    }else{
                        $scope.admissiontype = 'Outpatient';
                    }
                    }

                    $scope.cityUpdate = function(){
        
                        $http({
                            method: 'GET',
                            url: 'getData/get-city-details.php',
                            params: {id: this.province.id}
                        }).then(function(response) {
                            $scope.citymun = response.data;
                        });
                    };

                    $scope.submitForm = function(check){
                       
                        $scope.birthdate =$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd" ).val();
                        $scope.medicalid = "<?php echo  rand(111111, 999999); ?>";
                        
                        $http({
                            method: 'GET',
                            url: 'insertData/insert-emergency-details.php',
                            params: {admissionid: $scope.admissionid,
                                    admissiontype: $scope.admissiontype,
                                    firstname: $scope.firstname,
                                    middlename: $scope.middlename,
                                    lastname: $scope.lastname,
                                    province: $scope.province.provname,
                                    city: $scope.city.city,
                                    address:$scope.address,
                                    gender: $scope.gender,
                                    age: $scope.age,
                                    status: $scope.status,
                                    birthdate: $scope.birthdate,
                                    contact: $scope.contact,
                                    occupation: $scope.occupation,
                                    medicalid: $scope.medicalid}
                        }).then(function(response) {
                            window.location.href = 'add-patient-next.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medid=' + $scope.medicalid + '&param=' + $scope.admissiontype;
                        });
                     
                     
                    }

                    
                    $scope.goBack = function(){
                        window.history.back();
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
                });
                
         

        </script>
    </div>
</div>
<?php include 'footer.php'?>