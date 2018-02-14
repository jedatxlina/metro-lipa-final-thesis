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
        <li> <a href="#">Patient</a>
        </li>
        <li class="active"> <a href="#">Details</a>
        </li>
    </ol>
    <br><br>
    <div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
        <div data-widget-group="group1">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div> -->
                        </div>
                        <div class="panel-body" data-ng-repeat="patient in patientdetails">
                            <form class="grid-form" action="javascript:void(0)">
                                <fieldset>
                                    <legend>Patient Medical Details</legend>
                                        <br>
                                        <div data-row-span="3">
                                            <div data-field-span="1">
                                                <label>Patient Name</label>
                                                <input type="text" ng-model="admissionid"  ng-value="patient.Lastname + ', ' + patient.Firstname + ' ' + patient.Middlename" ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Admission ID</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.AdmissionID"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Admission No</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.AdmissionNo"  ng-disabled="true">
                                            </div>
                                        </div>
                                        <div data-row-span="2">
                                            <div data-field-span="1">
                                                <label>Admission Date Time</label>
                                                <input type="text" ng-model="admissionid"  ng-value="patient.AdmissionDateTime"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Admission</label>
                                                <input type="text" ng-model="admissionid"  ng-value="patient.Admission"  ng-disabled="true">
                                            </div>
                                        </div>
                                        <div data-row-span="3">
                                            <div data-field-span="1">
                                                <label>Admission Type</label>
                                                <input type="text" ng-model="admissionid"  ng-value="patient.AdmissionType"  ng-disabled="true">
                                            </div>
                                        </div>
                                        <br>
                                    <legend>Personal Details</legend>
                                        <br>
                                        <div data-row-span="4">
                                            <div data-field-span="2">
                                                <label>Complete Address</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.CompleteAddress"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Province</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Province"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>City</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.City"  ng-disabled="true">
                                            </div>
                                        </div>
                                        <div data-row-span="3">
                                            <div data-field-span="1">
                                                <label>Gender</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Gender"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Age</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Age"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Civil Status</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.CivilStatus"  ng-disabled="true">
                                            </div>
                                        </div>
                                        <div data-row-span="2">
                                            <div data-field-span="1">
                                                <label>Birthdate</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Birthdate"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Contact</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Contact"  ng-disabled="true">
                                            </div>
                                        </div>
                                        <div data-row-span="4">
                                            <div data-field-span="1">
                                                <label>Religion</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Religion"  ng-disabled="true">
                                            </div>
                                            <div data-field-span="1">
                                                <label>Citizenship</label>
                                                <input type="text" ng-model="admissionid" ng-value="patient.Citizenship"  ng-disabled="true" >
                                            </div>
                                        </div>
                                    <div class="clearfix pt-md">
                                        <div class="pull-right">
                                            <button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
                                        </div>
                                    </div>
                                
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Action Panel</h2>
							
							<div class="panel-ctrls">
								<a href="#" class="button-icon"><i class="ti ti-file"></i></a>
								<a href="#" class="button-icon"><i class="ti ti-mouse"></i></a>
								<a href="#" class="button-icon"><i class="ti ti-settings"></i></a>
							</div>
						</div>
						<div class="panel-body">
                        <a href="#" ng-click="viewQRcode()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-qrcode"></i><span>&nbsp;&nbsp;View QR Code</span></a>
							<a href="#" ng-click="viewMedicalHistory()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-stethoscope"></i><span>&nbsp;&nbsp;Medical History</span></a>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
        <!-- Patient Modal -->
				<div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient QR Code</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: 200px" data-ng-repeat="patient in patientdetails">
									<center><span><strong>This QR code belong to <i>{{ patient.Lastname }},{{patient.Firstname}} {{patient.Middlename}}</i></strong></span></center>
									<hr>
							
									<div class="row">
										<div class="form-group">
											<div class="col-sm-12">
											<center> <img ng-src="{{patient.QRpath}}"> </center>
											</div>
										</div>
									</div>
								
								</div>
								<div class="panel-footer">
								    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right">Ok</button>
								</div>
							</div>
						</div>
					</form>
				</div>

<script>
    var fetch = angular.module('myApp', ['ui.mask']);
       
       fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
           $scope.param = "<?php echo $_GET['at'];?>";
           $scope.id = "<?php echo $_GET['id'];?>";
           $scope.selectedRow = null;
           $scope.selectedStatus = null;
           $scope.clickedRow = 0;
           $scope.new = {};
       
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
    
            $http({
            method: 'GET',
            url: 'getData/get-patient-details.php',
            params: {id: $scope.id}
            }).then(function(response) {
                $scope.patientdetails = response.data;
            });

           $scope.setClickedRow = function(lab) {
               $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
               $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
           }
       
           $scope.getPage = function(check){
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