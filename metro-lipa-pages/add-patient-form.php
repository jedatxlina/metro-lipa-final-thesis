<?php include 'admin-header.php'; $get = $_GET['id']; ?>
<div ng-app="myApp" ng-controller="myCtrl" ng-init="check('<?php echo $get; ?>')">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Registration Form</h3>
            </div>
        </div>
        <div class="col-lg-15">
                    <div class="panel panel-default">
                    
                <form action="javascript:void(0)">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel-body">
                                <input type="hidden" ng-model="param">
                                <div class="form-group">
                                    <label>Admission ID</label>
                                    <input type="text" class="form-control" readonly="readonly" ng-model="admissionid">
                                </div>

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" placeholder="Juan" class="form-control" ng-model="firstname">
                                </div>

                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" placeholder="Atienza" class="form-control" ng-model="middlename">
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Dela Cruz" ng-model="lastname" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="panel-body">

                                <div class=" form-group">
                                    <label>Admission Type</label>
                                    <select ng-model="admissiontype" class="form-control" disabled>
                                        <option value = "Emergency"> Emergency </option>
                                        <option value = "Outpatient"> Outpatient </option>
                                    </select>
                                </div> 
                                
      
                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="form-control" ng-options="data.provname for data in prov | orderBy:'provname':false track by data.id" ng-model="province" ng-change="cityUpdate()">
                                        <option value="" disabled selected>Select Province</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" ng-options="data.city for data in citymun | orderBy:'city':false track by data.id" ng-model="city">
                                        <option value="" disabled selected>Select City</option>
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" ng-model="compaddress" class="form-control">
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" ng-model="gender">
                                        <option value="" disabled selected>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Age</label>
                                    <input class="form-control" type="number" ng-model="age"> 
                                </div>
                      

                                <div class="form-group">
                                    <label>Civil Status</label>
                                    <select class="form-control" ng-model="civilstatus">
                                        <option value="" disabled selected>Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label>Birthdate</label>
                                    <input class="form-control" type="date" ng-model="birthdate"> 
                                </div>

                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" ng-model="contact" ui-mask="+63 999 999-9999"  ui-mask-placeholder ui-mask-placeholder-char="_"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <hr>
                            <div class="col-lg-4">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Attending Physician</label>
                                        <input type="text" placeholder="Dr. Juan Dela Cruz" ng-model="$parent.attendingdoctor" class="form-control">
                                        <br>
                                        <label>Classificiation<br></label>
                                        <div>
                                        <label class="radio-inline">
                                            <input type ="radio" name="userdetails" value="Cash" ng-model="selectedtype" /><label>Cash</label>
                                        </label>
                                        <label class="radio-inline">
                                            <input type ="radio" name="userdetails" value="HMO" ng-model="selectedtype" /><label>HMO</label>
                                        </label>
                                        <label class="radio-inline">
                                            <input type ="radio" name="userdetails" value="Corporate" ng-model="selectedtype" /><label>Corporate</label>
                                        </label>
                                        <label class="radio-inline">
                                            <input type ="radio" name="userdetails" value="Private" ng-model="selectedtype" /><label>Private</label>
                                        </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <section ng-show="admissiontype == 'Emergency'">
                            <div class="col-lg-3">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input type="text" placeholder="Employee" ng-model="$parent.occupation" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Religion</label>
                                        <input type="text" placeholder="Catholic" ng-model="religion" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input type="text" placeholder="Filipino" ng-model="citizenship" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Triage</label>
                                        <br>

                                        <div>
                                            <label class="radio-inline">
                                                <input type ="radio" name="triage" value="Emergent" ng-model="triage" /><label>Emergent</label>
                                            </label>
                                            <label class="radio-inline">
                                                <input type ="radio" name="triage" value="Urgent" ng-model="triage" /><label>Urgent</label>
                                            </label>
                                            <label class="radio-inline">
                                                <input type ="radio" name="triage" value="Non Urgent" ng-model="triage" /><label>Non Urgent</label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-4">
                        <input type="button" class="btn btn-default" value="Cancel" onclick="goBack()">
                        <button ng-click='Register()' class="btn btn-primary">Confirm</button>
                        <br>&emsp;
                    </div>
                    <br>&emsp;&emsp;&emsp;
                </form>
            </div>
        </div>
    </div>
    <script>
            var app = angular.module('myApp', ['ui.mask']);
            app.controller('myCtrl', function($scope, $window, $http) {

                $scope.admissionid = "<?php echo "2017" .  rand(111111, 999999); ?>"
                $scope.Register = function() {
                    $http.post("http://localhost/Metro Lipa Patient System/metro-lipa-pages/patient-form-exec.php", {
                        'admissionid': $scope.admissionid,
                        'firstname': $scope.firstname,
                        'middlename': $scope.middlename,
                        'lastname': $scope.lastname,
                        'admissiontype': $scope.admissiontype,
                        'province': $scope.province.provname,
                        'city': $scope.city.city,
                        'gender': $scope.gender,
                        'age': $scope.age,
                        'civilstatus': $scope.civilstatus,
                        'birthdate': $scope.birthdate,
                        'contact': $scope.contact,
                        'attendingdoctor': $scope.$parent.attendingdoctor,
                        'paymenttype': $scope.selectedtype,
                        'occupation': $scope.$parent.occupation
                    }).then(function(response){
                        if($scope.admissiontype == 'Emergency'){
                            window.location.href = 'emergency.php'
                        }else{
                            window.location.href = 'outpatient.php'
                        }
                    });

                };
                $scope.check = function(check){
                    $scope.param = check;
                    if($scope.param == 1){
                        $scope.admissiontype = 'Emergency';
                        
                    }else{
                        $scope.admissiontype = 'Outpatient';
                    }
                }
                $http({
                    method: 'GET',
                    url: '../assets/getData/get-province-details.php',
                    contentType:"application/json; charset=utf-8",
                    dataType:"json"
                }).then(function(response) {
                    $scope.prov = response.data;
                });
                
                $scope.cityUpdate = function(){
        
                    $http({
                        method: 'GET',
                        url: '../assets/getData/get-citymun-details.php',
                        params: {id: this.province.id}
                    }).then(function(response) {
                        $scope.citymun = response.data;
                    });
                };
            });
                function goBack() {
                    window.history.back();
            }
    </script>
</div>
<?php include 'admin-footer.php' ?>