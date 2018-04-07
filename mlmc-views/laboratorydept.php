<?php 
	  $activeMenu = "laboratory";	
?>
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
    <li class="active"> <a href="">Medical Laboratories</a>
    </li>
</ol>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

   	<div class="row">
		<div class="col-md-9">
				<button type="button" ng-click="externalRequest()" class="btn btn-danger-alt pull-left"><i class="fa fa-external-link"></i>&nbsp; External Requests</button>
		</div>
	</div>
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-danger  ">
                    <div class="panel-heading">
                        <h2>LABORATORY REQUESTS</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Admission ID</th>
                                    <th>Fullname</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="labreq in labsreq" ng-class="{'selected': labreq.RequestID == selectedRow}" ng-click="setClickedRow(labreq.RequestID,labreq.AdmissionID,labreq.Description,labreq.LaboratoryID)">
                                    <td>{{labreq.AdmissionID}}</td>
                                    <td>{{labreq.Fullname}}</td>
                                    <td>{{labreq.Description}}</td>
                                    <td>{{labreq.Status}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
                 <div class="col-md-3">
                 <div class="panel panel-danger widget-progress" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Current Time</h2>
                                <div class="panel-ctrls button-icon-bg" 
                                    data-actions-container="" 
                                    data-action-refresh-demo='{"type": "circular"}'
                                    >
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="tabular">
                                    <div class="tabular-row">
                                        <div class="tabular-cell">
                                            <span class="status-total">Date</span>
                                            <span class="status-value">	{{ clock | date:'MMM d, y'}}</span>
                                        </div>
                                        <div class="tabular-cell">
                                            <span class="status-pending">Time</span>
                                            <span class="status-value">	{{ clock | date:'h:m:s a'}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
						<a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
						<a href="#" ng-click="viewPatient()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Patient Details</a>
                        <a href="#" ng-click="ClearRequest()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Clear Request</a>
                       
                </div>
                    
                    </div>
                    <div class="panel-footer"></div>
                
                 <!-- Patient Modal -->
				<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height: 550px" data-ng-repeat="patient in patientdetails">
									<center><span><strong>Registry Information</strong></span></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Patient name</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" ng-value="patient.Lastname + ', ' + patient.Firstname + ' ' + patient.Middlename"  disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission ID</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="patient.AdmissionID" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission Date</label>
											<div class="col-sm-5">
												<input type="text" class="form-control"  ng-value="patient.AdmissionDate" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="patient.Admission" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Admission Type</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" ng-value="patient.AdmissionType" disabled>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">QR Code</label>
											<div class="col-sm-5">
											<center> <img ng-src="{{patient.QRpath}}">
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
                <!-- PATIENT MODAL -->

                <!-- CLEAR REQUEST MODAL -->
                <div class="modal fade" id="ClearModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form class="form-horizontal">
						<div class="modal-dialog">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Patient Details</h2>
									<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
								</div>
								<div class="panel-body" style="height:auto">
                                <span>Are you sure to clear request from this Patient? </span>
                                <div class="panel-footer">
								<button type="button" data-dismiss="modal" class="btn btn-danger pull-right">Ok</button>
								</div>
							</div>
						</div>
					</form>
                </div>
            </div>
            <!-- CLEAR REQUEST MODAL -->

            <!-- External Request Modal -->
			<div class="modal fade" id="externalRequestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>External Laboratory Requests</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: auto">
							<center><span><strong>Search Registry Information</strong></span></center>
									<hr>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;Last Name</label>
											<div class="col-sm-7">
												<input type="text" ng-model='lastname' class="form-control">
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;First Name</label>
											<div class="col-sm-7">
												<input type="text" ng-model='firstname' class="form-control">
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;Middle Name</label>
											<div class="col-sm-7">
												<input type="text" ng-model='middlename' class="form-control">
											</div>
										</div>
									</div>
									<br>
							</div>
							<div class="panel-footer">
								<button type="button" ng-click="#" data-dismiss="modal" class="btn btn-danger pull-right">Search</button>
									<button type="button" data-dismiss="modal" class="btn btn-default pull-right">Cancel</button>
							</div>
						</div>
					</div>
           	 	</div>
			<!--/ External Request Modal -->

                <!-- Error modal -->
                <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>ERROR</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 60px">
                        Select Patient record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                        </div>                     
                    </div>
            <!--/ Error modal -->

           
               

                </div>
            </div>
        </div>
    </div>
   



</div>
<script>
    var fetch = angular.module('myApp', ['ui.mask']);


    fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {
        $scope.at = "<?php echo $_GET['at'];?>";
        $scope.selectedRow = null;
        $scope.selectedStatus = null;
        $scope.clickedRow = 0;
        $scope.selectedid = null;
        $scope.new = {};

            var tick = function() {
                $scope.clock = Date.now();
                $scope.datetime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });		
			

                }
	
                tick();
                $interval(tick, 1000);
                
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
					$scope.User = "Billing Staff";
					break;

                case '8':
					$scope.User = "Laboratory Staff";
					break;   
			
				default:
					break;
			}

        $http({
            method: 'get',
            url: 'getData/get-laboratory-requests.php'
        }).then(function(response) {
            $scope.labsreq = response.data;
            angular.element(document).ready(function() {
                dTable = $('#table_info')
                dTable.DataTable();
            });
        });


        $scope.description = '';
        $scope.labid = '';


        $scope.setClickedRow = function(labreq,pid,desc,lid) {
            $scope.selectedRow = ($scope.selectedRow == null) ? labreq : ($scope.selectedRow == labreq) ? null : labreq;
            $scope.selectedid = ($scope.selectedid == null) ? pid : ($scope.selectedid == pid) ? null : pid;
            $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
            $scope.description = desc;
            $scope.labid = lid;
        }

        $scope.externalRequest = function(){
            $('#externalRequestModal').modal('show');
        }

        $scope.ClearRequest = function(){
			if($scope.selectedRow != null){
                swal({
                    title: "Are you sure you want to clear this patient?",
                    text: "Once cleared, the nurses will be notified about the result!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $http({
                            method: 'GET',
                            params: {
                                requestid: $scope.selectedRow
                            },
                            url: 'updateData/update-laboratory-request.php'
                        }).then(function(response) {
                           
                        });
                        
                        
                        $http({
                            method: 'GET',
                            params: {
                                admissionid: $scope.selectedid,
                                laboratoryid: $scope.labid,
                                description: $scope.description

                            },
                            url: 'insertData/insert-laboratory-bill.php'
                        }).then(function(response) {
                           
                        });


                    swal("Patient Cleared! Refreshing page...", {
                        icon: "success",
                        timer: 2000
                    });
                    window.setTimeout(function(){
                        
                    // Move to a new location or you can do something else
                        window.location.href = 'laboratorydept.php?at=' + $scope.at;
                    }, 2000);
                    } else {
                    swal("Action Cancelled");
                    }
                });

                }
                else{
			    $('#ErrorModal').modal('show');
			    }
		    
         }

        $scope.viewPatient = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedid;
				$http({
					method: 'get',
					url: 'getData/get-patient-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.patientdetails = response.data;
				});
				$('#patientModal').modal('show');
			
			}
			else{
			$('#ErrorModal').modal('show');
			}
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

                case 'LaboratoryDept':
                        window.location.href = 'laboratorydept.php?at=' + $scope.at;
                        break;

                case 'Logout':
                        window.location.href = '../logout.php?at=' + $scope.at;
                        break;
                
                default:
                    break;
            }
				
		}

    }]);
</script>
</div>
<?php include 'footer.php'?>