<?php include 'admission-header.php';  $get = $_GET['id'];  ?>
<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li><a href="#">Patients</a>
    </li>
    <li class="active"><a href="index.php">Patient Medical Details</a>
    </li>
</ol><br><br>
<div ng-app="myApp" ng-controller="userCtrl" ng-init="check('<?php echo $get; ?>')">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div data-widget-group="group1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Medical Details</h2>
                                    <!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div> -->
                                </div>
                                <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Medical History</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Conditions</label>
                                                    <select id="e2" multiple style="width:100% !important" class="populate" id="source" ng-model="">
                                                        <optgroup label="List of Conditions">
                                                                <option value="Asthma">Asthma</option>
                                                                <option value="Cva">CVA</option>
                                                                <option value="Cancer">Cancer</option>
                                                                <option value="Heart Disease">Heart Disease</option>
                                                                <option value="Hypertension">Hypertension</option>
                                                            </optgroup>
                                                    </select>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Previous Surgeries</label>
                                                    <textarea class="form-control fullscreen"></textarea>
                                                </div>
                                            </div>
                                            <div data-row-span="1">
                                                <div data-field-span="1">
                                                    <label>Current Medications</label>
                                                    <textarea class="form-control fullscreen"></textarea>
                                                </div>
                                            
                                            </div>
                                        </fieldset>
                                        <br>

                                        <div class="clearfix pt-md">
                                            <div class="pull-right">
                                                <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                <button type="submit" class="btn-danger btn" ng-click="submitForm()">Submit</button>
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
    </div>
    <script>
            
                var app = angular.module('myApp', []);
                app.controller('userCtrl', function($scope, $window, $http) {
                    
                    $scope.admissionid = "<?php echo "2017" .  rand(111111, 999999); ?>";
                    
              

                    $scope.check = function(check){
                    $scope.param = check;
                    if($scope.param == 1){
                        $scope.admissiontype = 'Emergency';
                        
                    }else{
                        $scope.admissiontype = 'Outpatient';
                    }
                    }

               
                    $scope.submitForm = function(check){
                       
                    $scope.conditions =$("#e2").val();

                     alert($scope.conditions);
                     
                    }

                    
                    $scope.goBack = function(){
                        window.history.back();
                    }
                });
                
         

        </script>
</div>
<?php include 'footer.php'?>