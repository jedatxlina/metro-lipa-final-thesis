<?php session_start(); $_SESSION['id'] = $_GET['id']; include 'admission-header.php'; $get = $_GET['id'];?>
<div ng-app="myApp" ng-controller="userCtrl" ng-init="check('<?php echo $get; ?>')">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Vitals Sheet</h3>
            </div>
        </div>
        <div class="col-lg-15">
                    <div class="panel panel-default">
                    
                <form action="javascript:void(0)">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Patient ID</label>
                                    <input type="text" placeholder="" class="form-control" ng-model="admissionid" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Patient Name</label>
                                    <input type="text" placeholder="Juan" class="form-control" ng-model="patientname" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label>Blood Pressure</label>
                                    <input type="text" ng-model="BP" maxlength="3" class="form-control">
                                    </select>
                                </div>
                                
      
                                <div class="form-group">
                                    <label>Temperature</label>
                                    <input type="text" ng-model="TEMP" maxlength="5" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Respiratory Rate</label>
                                    <input type="text" ng-model="RP" maxlength="3" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pulse Rate</label>
                                    <input type="text" ng-model="PR" maxlength="3" class="form-control">
                                    </select>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <input type="button" class="btn btn-default" value="Cancel" onclick="goBack()">
                        <button ng-click='AddVitals()' class="btn btn-primary">Confirm</button>
                        <br>&emsp;
                    </div>
                    <br>&emsp;&emsp;&emsp;
                </form>
            </div>
        </div>
    </div>
    <?php 
    include '../mlmc-views/getData/get-inpatient-vitals.php';
    ?>
    <script>
        var data = angular.module('myApp', []);
        data.controller("userCtrl", function($scope, $window, $http) {  
            $scope.admissionid = "<?php echo $AdID; ?>"
            $scope.patientname = "<?php echo $Fname.' '.$Mname.' '.$Lname; ?>"
            $scope.AddVitals = function() {
                    $http.post("../mlmc-views/insertData/patient-vitals-exec.php", {
                        'admissionid': $scope.admissionid,
                        'patientname': $scope.patientname,
                        'bloodpressure': $scope.BP,
                        'temperature': $scope.TEMP,
                        'respiratoryrate': $scope.RP,
                        'pulserate': $scope.PR
                    }).then(function(response){
                        if($scope.admissiontype == 'Emergency'){
                            window.location.href = 'emergency.php'
                        }else{
                            window.location.href = 'outpatient.php'
                        }
                    });

                };
        });
    </script>

</div>
<?php include 'footer.php' ?>