<?php include 'admission-header.php'   ?>
<script src="assets/js/angular-autogrow.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 	
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css"/>

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
                                                    <div class="controls">
                                                        <select id="conditions" class="select2" multiple="multiple" style="width:400px;">
                                                            <optgroup label="List of Conditions">
                                                                <option value="Asthma">Asthma</option>
                                                                <option value="Cva">CVA</option>
                                                                <option value="Cancer">Cancer</option>
                                                                <option value="Heart Disease">Heart Disease</option>
                                                                <option value="Hypertension">Hypertension</option>
                                                            </optgroup>   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Previous Surgeries</label>
                                                    <textarea autogrow ng-model="surgery"></textarea>
                                                </div>
                                            </div>
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>BP</label>
                                                    <input type="text" ng-model="bp">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>PR</label>
                                                    <input type="text" ng-model="pr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>RR</label>
                                                    <input type="text" ng-model="rr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Temperature</label>
                                                    <input type="text" ng-model="temp">
                                                </div>
                                            </div>
                                            <div data-row-span="3"> 
                                                    <div data-field-span="1">
                                                        <label>Current Medications</label>
                                                        <div class="controls">
                                                            <select id="medications" class="select2" multiple="multiple" style="width:400px;">
                                                                <optgroup label="List of Medicines">
                                                                    <option value="Aspirin">Aspirin</option>
                                                                    <option value="Paracetamol">Paracetamol</option>
                                                                    <option value="Biogesic">Biogesic</option>
                                                                    <option value="Bioflu">Bioflu</option>
                                                                    <option value="Ibuprofen">Ibuprofen</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Weight</label>
                                                        <input type="text" ng-model="weight">
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Height</label>
                                                        <input type="text" ng-model="height">
                                                    </div>
                                            </div>
                                            <legend>Review of System</legend>
                                            <div data-row-span="4"> 
                                                    <div data-field-span="4">
                                                        <label>Impression/Admitting Diagnosis</label>
                                                        <textarea ng-model="diagnosis" autogrow></textarea>
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
            $('.select2').select2({ placeholder : '' });

            $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

            $('button[data-select2-open]').click(function(){
            $('#' + $(this).data('select2-open')).select2('open');
            });

                var app = angular.module('myApp', ["angular-autogrow"]);
                app.controller('userCtrl', function($scope, $window, $http) {
                    
                    $scope.admissionid = "<?php echo "2017" .  rand(111111, 999999); ?>";
               
                    $scope.submitForm = function(){
                     
                        $scope.admissionid = "<?php echo $_GET['id']; ?>";
                        $scope.conditions =$("#conditions").val();
                        $scope.medications =$("#medications").val();

                        $http({
                            method: 'GET',
                            url: 'insertData/insert-medical-details.php',
                            params: {admissionid: $scope.admissionid,
                                    conditions: $scope.conditions,
                                    surgery: $scope.surgery,
                                    bp: $scope.bp,
                                    pr: $scope.pr,
                                    rr: $scope.rr,
                                    temp: $scope.temp,
                                    medications: $scope.medications,
                                    weight: $scope.weight,
                                    height: $scope.height,
                                    diagnosis: $scope.diagnosis}
                        }).then(function(response) {
                            
                        });
                      
                    }

                    
                    $scope.goBack = function(){
                        window.history.back();
                    }
                });
                
         

        </script>
</div>
<?php include 'footer.php'?>