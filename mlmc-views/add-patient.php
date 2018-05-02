<?php 
	  $activeMenu = "patients";	
?>
<?php include 'admin-header.php'?>
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
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div data-widget-group="group1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Form</h2>
                                    &nbsp;&nbsp;
                                    <small class='pull-right' ng-if="id != 0">New Born: &emsp;
                                        <input type="radio" ng-model="newborn" ng-click="newbornyes()" class="tooltips" data-trigger="hover" data-original-title="Yes"> Yes &nbsp;
                                        <input type="radio" ng-model="newborn" name="newborn"  id="newborno" value='No' ng-click="newbornno()" class="tooltips" data-trigger="hover" data-original-title="No" checked="checked"> No
                                    </small>
                                </div>
                                <div class="panel-body"  id="notnewborndiv">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Detail</label>
                                            </legend>
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
                                                    <label>Mobile No.</label>
                                                    <input type="text" class="form-control" ng-model="contact" ui-mask="+63 999-999-9999" ui-mask-placeholder ui-mask-placeholder-char="-  " />
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
                                                    <select class="form-control" ng-model="nationality">
                                                        <option value="" disabled selected>Select Nationality</option>
                                                         <option ng-repeat="nationality in cntntl" value="{{nationality.nationality}}">{{nationality.nationality}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>Companion</label>
                                                    <input type="text" class="form-control" ng-model="companion">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Contact</label>
                                                    <input type="text" class="form-control" ng-model="contact2" ui-mask="+63 999-999-9999" ui-mask-placeholder ui-mask-placeholder-char="-  " />
                                                </div>
                                            </div>

                                            <br>
                                            <div>
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
                                                            <select class="form-control" ng-options="data.city for data in citymun | orderBy:'city':false track by data.id" ng-model="city" ng-change="brgyUpdate()">
                                                                <option value="" disabled selected>Select City</option>
                                                            </select>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Brgy</label>
                                                            <select class="form-control" ng-options="data.brgy for data in brgydetails | orderBy:'brgy':false track by data.id" ng-model="brgy">
                                                                <option value="" disabled selected>Select Brgy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div data-row-span='4'>
                                                        <div data-field-span="1">
                                                            <label>House No/Blk No.</label>
                                                            <input type="text" ng-model="address">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                                <fieldset>
                                                    <legend>Personal Details</legend>
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Occupation</label>
                                                            <label>
                                                                    <input type="radio"  name="occupation" value="Employed" ng-model="occupation">Employed</label> &nbsp;
                                                            <label>
                                                                    <input type="radio" name="occupation" value="Retired" ng-model="occupation"> Retired</label> &nbsp;
                                                            <label>
                                                                    <input type="radio" name="occupation" value="Student" ng-model="occupation"> Student</label> &nbsp;
                                                            <label>
                                                                    <input type="radio" name="occupation" value="Unemployed" ng-model="occupation"> Unemployed</label>
                                                        </div>
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
                                                </fieldset>
                                            </div>
                                    </form>
                                    <br>
                                    <div class="clearfix pt-md">
                                        <div class="pull-right">
                                            <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                            <button type="submit" class="btn-danger btn" ng-click="submitForm()">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body"  id="oldpatientdiv"  data-ng-repeat="patient in patientdetails"> 
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Detail</label>
                                            </legend>
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
                                                    <input type="text" ng-model="patient.Firstname">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Middle Name</label>
                                                    <input type="text" ng-model="patient.Middlename">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Last Name</label>
                                                    <input type="text" ng-model="patient.Lastname">
                                                </div>
                                            </div>
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>Date of birth</label>
                                                    <input type="text" class="form-control" ng-model="patient.Birthdate">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Mobile No.</label>
                                                    <input type="text" class="form-control" ng-model="patient.Contact" ui-mask="+63 999-999-9999" ui-mask-placeholder ui-mask-placeholder-char="-  " />
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Gender</label>
                                                    <select class="form-control" ng-model="patient.Gender">  
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Nationality</label>
                                                    <select class="form-control" ng-model="patient.Nationality">
                                                        <option value="" disabled selected>Select Nationality</option>
                                                         <option ng-repeat="nationality in cntntl" value="{{nationality.nationality}}">{{nationality.nationality}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>In case of a minor please provide details (Name of parent and natural guardian)</label>
                                                    <input type="text">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Contact</label>
                                                    <input type="text" class="form-control" ng-model="contact2" ui-mask="+63 999-999-9999" ui-mask-placeholder ui-mask-placeholder-char="-  " />
                                                </div>
                                            </div>

                                            <br>
                                            <div>
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
                                                            <select class="form-control" ng-options="data.city for data in citymun | orderBy:'city':false track by data.id" ng-model="city" ng-change="brgyUpdate()">
                                                                <option value="" disabled selected>Select City</option>
                                                            </select>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Brgy</label>
                                                            <select class="form-control" ng-options="data.brgy for data in brgydetails | orderBy:'brgy':false track by data.id" ng-model="brgy">
                                                                <option value="" disabled selected>Select Brgy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div data-row-span='4'>
                                                        <div data-field-span="1">
                                                            <label>Complete Address</label>
                                                            <input type="text" ng-model="address">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                                <fieldset>
                                                    <legend>Personal Details</legend>
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Occupation</label>
                                                            <label>
                                                                    <input type="radio"  name="occupation" value="Employed" ng-model="patient.Occupation">Employed</label> &nbsp;
                                                            <label>
                                                                    <input type="radio" name="occupation" value="Retired" ng-model="patient.Occupation"> Retired</label> &nbsp;
                                                            <label>
                                                                    <input type="radio" name="occupation" value="Student" ng-model="patient.Occupation"> Student</label> &nbsp;
                                                            <label>
                                                                    <input type="radio" name="occupation" value="Unemployed" ng-model="patient.Occupation"> Unemployed</label>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Maritial Status</label>
                                                            <select class="form-control" ng-model="patient.Status">  
                                                                    <option value="" disabled selected>Select</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                    <option value="Separated">Separated</option>
                                                                </select>
                                                        </div>
                                                        <div data-field-span="2">
                                                            <label>Spouse name</label>
                                                            <input type="text" ng-model="spouse" ng-disabled="patient.Status != 'Married'">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                    
                                        <br>
                                        <div class="clearfix pt-md">
                                            <div class="pull-right">
                                                <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                <button type="submit" class="btn-danger btn" ng-click="submitOldPatientForm(patient)">Next</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="panel-body"  id="newbornbabydiv">

                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Detail</label></legend>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Mother Account</label>
                                                    <select  ng-change="newbornUpdate()" class="form-control" ng-model="mother">
                                                        <option  value="" disabled selected >Select Mother</option>
                                                         <option ng-repeat="patient in patients" value="{{patient.AdmissionID}}">{{patient.Fname}} {{patient.Mname}} {{patient.Lname}}</option>
                                                    </select>
                                                    
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Admission ID</label>
                                                    <input type="text" ng-model="babyadmission" disabled="disabled">
                                                </div>
                                                <div data-field-span="1">
                                                <label>Gender</label>
                                                    <select class="form-control" ng-model="babygender">  
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        </div>
                                            </div>
                                            <div data-row-span="4">
                                                <div data-field-span="1" >
                                                    <label>Last Name</label>
                                                    <input type="text" ng-model="babylastname">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>First Name</label>
                                                    <input type="text" ng-model="babyfirstname">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Middle Name</label>
                                                    <input type="text" ng-model="babymiddlename">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Nationality</label>
                                                    <select class="form-control" ng-model="babynationality">
                                                        <option value="" disabled selected>Select Nationality</option>
                                                         <option ng-repeat="nationality in cntntl" value="{{nationality.id}}">{{nationality.nationality}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                     
                                            <legend>Medical Detail</label></legend>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Blood Type</label>
                                                    <select class="form-control" ng-model="babybloodtype">
                                                        <optgroup label="List of Blood Types">
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Type of Delivery</label>
                                                    <select class="form-control" ng-model="babydelivery">
                                                        <optgroup label="List of Delivery">
                                                            <option value="Normal">Normal</option>
                                                            <option value="C-Section">Cesarian (C-Section)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Weight</label>
                                                    <input type="text" ng-model="babyweight">
                                                </div>
                                            </div>
                                            <div data-row-span="2">
                                                    <div data-field-span="1">
                                                            <label>Specialization</label>
                                                                <select class="form-control" ng-model="specialization" style="width:395px;">
                                                                    <option value="" selected> Select Specialization</option>
                                                                    <option ng-repeat="val in specializations | orderBy:'SpecializationName'" value="{{val.SpecializationName}}">{{val.SpecializationName}}</option>
                                                                </select>
                                                    </div>
                                                    <div ng-if="specialization">
                                                        <div data-field-span="1">
                                                                        <label>Attending Physician</label>
                                                                        <select class="form-control" ng-options="physician.Fullname for physician in physicians |  filter:filterPhysician(specialization)" ng-model="$parent.attendingphysician1" style="width:395px;">
                                                                            <option value="" disabled selected>Select Physician</option>
                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div ng-if="!specialization">
                                                                    <div data-field-span="1">
                                                                        <label>Attending Physician</label>
                                                                        <select class="form-control" ng-model="$parent.attendingphysician2" style="width:395px;">
                                                                            <option value="" disabled selected>Select Physician</option>
                                                                            <option ng-repeat="physician in physicians" value="{{physician.PhysicianID}}">{{physician.Fullname}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                </div>
                                        </fieldset>
                                    </form>
                                    <br>
                                    <div class="clearfix pt-md">
                                        <div class="pull-right">
                                            <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                            <button type="submit" class="btn-danger btn" ng-click="submitNewbornForm()">Next</button>
                                        </div>
                                    </div>
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

                    $scope.id = "<?php echo $_GET['id'];?>";

                    $scope.chk = "<?php echo $chk =  isset($_GET['chk']) ? $_GET['chk'] : ''; ?>";
                    $scope.admissionid = "<?php echo "2017" .  rand(111111, 999999); ?>";
                    $scope.medicalid = "<?php echo  rand(111111, 999999); ?>";
                    $scope.specialization = '';
                    $scope.newborn = 'No';

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

                        case '7':
                            $scope.User = "Secretary";
                            break;

                        case '8':
                            $scope.User = "Laboratory Staff";
                            break;
                    
                        default:
                            break;
                    }

                         switch ($scope.at.charAt(0)) {
                        case '7':
                            $http({
                                method: 'GET',
                                url: 'getData/get-physician-outpatient-details.php',
                                params: {id: $scope.at}
                            }).then(function(response) {
                                $scope.physicians = response.data;
                            });
                            break;
                    

                        default:
                            $http({
                                method: 'GET',
                                url: 'getData/get-physician-details.php'
                            }).then(function(response) {
                                $scope.physicians = response.data;
                            });
                            break;
                    }

                    
                    $scope.filterPhysician = function(param) {
                        return function(physician) {
                            if (physician.Specialization == param) {
                                return true;
                            }
                            return false;
                        };
                    }

                    $scope.accesstype = $scope.at[0];
                    $http({
                    method: 'GET',
                    url: 'getData/get-user-profile.php',
                    params: {id: $scope.at,
                        atype : $scope.accesstype}
                    }).then(function(response) {
                        $scope.userdetails = response.data;
                    });
              
                    $http({
                        method: 'GET',
                        url: 'getData/get-province-details.php'
                    }).then(function(response) {
                        $scope.provinces = response.data;
                    });

                   $http({
                        method: 'GET',
                        url: 'getData/get-nationality-details.php'
                    }).then(function(response) {
                        $scope.cntntl = response.data;
                    });

                       $http({
                        method: 'GET',
                        url: 'getData/get-specialization-details.php'
                    }).then(function(response) {
                        $scope.specializations = response.data;
                    });

        
                    $('#newbornbabydiv').hide();
                    
                    if($scope.id == 1){
                        $scope.admissiontype = 'Emergency';    
                    }else{
                        $scope.admissiontype = 'Outpatient';
                    }
                    
                    if($scope.chk != ''){

                        $('#notnewborndiv').hide();
                        $('#oldpatientdiv').show();
                        
                        window.location.href = 'insertData/insert-oldpatient-details.php?at=' + $scope.at + '&chk=' + $scope.chk + '&admissionid=' + $scope.chk + '&admissiontype=' + $scope.admissiontype + '&medicalid=' + $scope.medicalid;
                    }
                
                    $scope.newbornyes = function(){
                        $('#newbornbabydiv').show();
                        $('#notnewborndiv').hide();
                        $('#oldpatientdiv').hide();
                        
                        $http({
                            method: 'GET',
                            url: 'getData/get-inpatient-female.php'
                        }).then(function(response) {
                            $scope.patients = response.data;
                        });
                    }

                    $scope.newbornno = function(){
                        $('#newbornbabydiv').hide();

                        if($scope.chk != ''){
                            $('#notnewborndiv').hide();
                            $('#oldpatientdiv').show();
                        }else{
                            $('#notnewborndiv').show();
                            $('#oldpatientdiv').hide();
                        }
                    }


                    $scope.newbornUpdate = function(){

                        $http({
                            method: 'GET',
                            url: 'getData/get-patient-details.php',
                            params: {id: $scope.mother}
                        }).then(function(response) {
                            $scope.cnt = response.data.length;
                            $scope.babyadmission = $scope.mother.concat('-') + $scope.cnt;
                        });                  
                          
                            var today = new Date();
                            var dd = today.getDate();
                            var mm = today.getMonth()+1; //January is 0!

                            var yyyy = today.getFullYear();
                            if(dd<10){
                                dd='0'+dd;
                            } 
                            if(mm<10){
                                mm='0'+mm;
                            } 
                            var today = dd+'/'+mm+'/'+yyyy;
                            $scope.babybirthdate = today;
                           
                    }
                
                    $scope.cityUpdate = function(){
        
                        $http({
                            method: 'GET',
                            url: 'getData/get-city-details.php',
                            params: {id: this.province.id}
                        }).then(function(response) {
                            $scope.citymun = response.data;
                        });
                
                    }   

                     $scope.brgyUpdate = function(){
                        $http({
                            method: 'GET',
                            url: 'getData/get-brgy-details.php',
                            params: {id: $scope.city.id}
                        }).then(function(response) {
                            $scope.brgydetails = response.data;
                        });
                    }  



                    $scope.submitForm = function(check){
                        $scope.birthdate =$("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd" ).val();
                        $scope.address = $scope.address + ' ' + $scope.brgy.brgy + ' ' + $scope.city.city + ' ' + $scope.province.provname;
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
                                    brgy: $scope.brgy.brgy,
                                    address:$scope.address,
                                    gender: $scope.gender,
                                    status: $scope.status,
                                    birthdate: $scope.birthdate,
                                    contact: $scope.contact,
                                    occupation: $scope.occupation,
                                    medicalid: $scope.medicalid,
                                    nationality: $scope.nationality}
                        }).then(function(response) {
                            window.location.href = 'add-patient-next.php?at=' + $scope.at + '&id=' + $scope.admissionid + '&medid=' + $scope.medicalid + '&param=' + $scope.admissiontype;
                        });
                    
                    }

                    $scope.submitNewbornForm = function(){
                        if($scope.specialization == ''){
                            $scope.attendphysician = $scope.attendingphysician2;
                        }else{
                            $scope.attendphysician = $scope.attendingphysician1.PhysicianID;
                        }
                        
                               
                        $http({
                            method: 'GET',
                            url: 'qr-generator/index.php',
                            params: {medid: $scope.medicalid,
                            admissionid: $scope.babyadmission,
                        }
                        }).then(function(response) {
                        });

                     
                        $http({

                            method: 'GET',
                            url: 'insertData/insert-baby-details.php',
                            params: {babyadmission: $scope.babyadmission,
                                    admissionid: $scope.mother,
                                    lastname: $scope.babylastname,
                                    middlename: $scope.babymiddlename,
                                    firstname: $scope.babyfirstname,
                                    nationality: $scope.babynationality,
                                    babygender: $scope.babygender,
                                    bloodtype: $scope.babybloodtype,
                                    delivery: $scope.babydelivery,
                                    weight: $scope.babyweight,
                                    attending: $scope.attendphysician,
                                    medicalid: $scope.medicalid}
                            }).then(function(response) {
                            swal({
                                
                            icon: "success",
                            title: "Successfully Added!",
                            text: "Redirecting in 2..",
                            timer: 2000
                            }).then(function () {
                                window.location.href = 'emergency.php?at=' + $scope.at;
                                }, function (dismiss) {
                                if (dismiss === 'cancel') {
                                    window.location.href = 'emergency.php?at=' + $scope.at;
                                }

                            });
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

                            case 'Logout':
                                    window.location.href = '../logout.php?at=' + $scope.at;
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