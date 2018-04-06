<?php 
	  $activeMenu = "nurse";	
?>
<?php session_start(); $_SESSION['id'] = $_GET['id']; include 'admin-header.php'; $get = $_GET['id'];?>
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
                                <form class="grid-form" action="javascript:void(0)">
                                <fieldset>
                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>BP</label>
                                                    <input type="text" ng-model="bp" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with /">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Pulse Rate</label>
                                                    <input type="text" ng-model="pr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Respiratory Rate</label>
                                                    <input type="text" class="form-control" ng-model="rr" ui-mask="99"  ui-mask-placeholder ui-mask-placeholder-char="-  "/>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Temperature</label>
                                                    <input type="text" class="form-control" ng-model="temp">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
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
                    const input = $scope.bp;
                    const [sys,dia] = input.split('/');
                    var sys1 = sys;
                    var dia1 = dia;
                    $http.post("../mlmc-views/insertData/patient-vitals-exec.php", {
                        'admissionid': $scope.admissionid,
                        'nurid': <?php echo $_GET['at'] ?>,
                        'patientname': $scope.patientname,
                        'bloodpressure': sys1,
                        'bloodpressuredia': dia1,
                        'temperature': $scope.temp,
                        'respiratoryrate': $scope.rr,
                        'pulserate': $scope.pr
                    }).then(function(response){
                        window.location.href = 'nurse-patient.php?at=<?php echo $_GET['at'] ?>';
                    });
                };
        });
    </script>

</div>
<?php include 'footer.php' ?>