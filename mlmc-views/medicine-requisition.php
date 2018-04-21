<?php 
	  $activeMenu = "pharmacy";	
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
<li><a href="#">Home</a></li>
<li class="#"><a href="#">Medicine Requests</a></li>
</ol>
<br><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	

	<br>
	<div data-widget-group="group1">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2>Medicine Requests</h2>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
							<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
								<tr>
									<th>Fullname</th>
									<th>Medicine Name</th>
									<th>Status</th>
									<th>Quantity Requested</th>
								</tr>
								</tr>
								</thead>
								<tbody>
								<tr ng-repeat="user in users" ng-class="{'selected': user.MedRequestID == selectedRow}" ng-click="setClickedRow(user.MedRequestID,user.Status,user.MedicationID,user.Quantity,user.Dosage,user.MedicineName)">
                                       
                                        <td>{{user.Fullname}}</td>
                                        <td>{{user.MedicineName}} {{user.Dosage}}</td>
                                        <td>{{user.Status}}</td>
										<th>{{user.Quantity}}</th>
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer"></div>
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
						<a href="#" ng-click="readyMedicine()" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-user"></i> Set Medicine Ready (for PickUp)</a>
                        <a href="#" ng-click="clearMedicine()" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-text-o"></i>Clear Medicine Request</a>
                    </div>
				</div>
				
				<!-- Error modal -->
				<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Error:</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: 60px">
							Select Patient record that you would like to apply an <a href="#" class="alert-link">Action.</a>
							</div>
							<!-- <div class="panel-footer">
								<span class="text-gray"><em>Footer</em></span>
							</div> -->
						</div>
						<!-- <div class="alert alert-danger">
							Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
						</div> -->
					</div>
				</div>
				<!--/ Error modal -->

				<!-- Error modal -->
				<div class="modal fade" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Error:</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
							</div>
							<div class="panel-body" style="height: 60px">
							Pending Medicines should be ready before applying <a href="#" class="alert-link">Clear Medicine Request.</a>
							</div>
							<!-- <div class="panel-footer">
								<span class="text-gray"><em>Footer</em></span>
							</div> -->
						</div>
						<!-- <div class="alert alert-danger">
							Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
						</div> -->
					</div>
				</div>
				<!--/ Error modal -->
			
		</div>
	</div>
	
<script>
   var fetch = angular.module('myApp', []);
  

   fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {   
		$scope.at = "<?php echo $_GET['at'];?>";
		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};
		$scope.selectedStatus = null;

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
			
				default:
					break;
			}

       	$http({
           method: 'get',
           url: 'getData/get-medicine-request.php'
       	}).then(function(response) {
		 	$scope.users = response.data;
			angular.element(document).ready(function() {  
			dTable = $('#patient_table')  
			dTable.DataTable();  
				});  
			});

				$scope.accesstype = $scope.at[0];
        $http({
        	method: 'GET',
            url: 'getData/get-user-profile.php',
            params: {id: $scope.at,
                	atype : $scope.accesstype}
        }).then(function(response) {
            $scope.userdetails = response.data;
        });

		   
		$scope.setClickedRow = function(user,stat,medid,qty,dsg,mname) {
           $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
		   $scope.selectedStatus= ($scope.selectedStatus == null) ? stat : ($scope.selectedStatus == stat) ? null : stat;
		   $scope.selectedMedID = medid;
		   $scope.selectedQty = qty;
		   $scope.selectedDosage = dsg;
		   $scope.selectedMedName = mname;
		 
	   	}

		  
		
		   $scope.clearMedicine = function(){
			if($scope.selectedRow != null){
				if ($scope.selectedStatus == 'Pending')
				 {
				 	$('#pendingModal').modal('show');
				 }
				 else
				 {
						swal({
							title: "Are you sure you want to set this medicine to Claimed?",
							text: "Claimed Medicine Requests are cleared upon claimed by the nurses!",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
								$http({
									method: 'GET',
									params: {
										requestid: $scope.selectedRow,
										status: $scope.selectedStatus,
										medid: $scope.selectedMedID,
										quantity: $scope.selectedQty,
										dosage: $scope.selectedDosage,
										medname: $scope.selectedMedName
									},
									url: 'updateData/update-medicine-request.php'
								}).then(function(response) {
								
								});

							swal("Medicine Request Cleared! Refreshing page...", {
								icon: "success",
								timer: 2000
							});
							window.setTimeout(function(){
								
							// Move to a new location or you can do something else
								window.location.href = 'medicine-requisition.php?at=' + $scope.at;
							}, 2000);
							} else {
							swal("Action Cancelled");
							}
						});
					
					}
					
                }
				else{
			    $('#ErrorModal').modal('show');
			    }
              
		}
     
	  
		$scope.readyMedicine = function(){
			if($scope.selectedRow != null){
                swal({
                    title: "Are you sure you want to set this medicine to Ready?",
                    text: "Once Ready, the nurses will be notified that this medicine is ready for claim!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $http({
                            method: 'GET',
                            params: {
                                requestid: $scope.selectedRow,
								status: $scope.selectedStatus
                            },
                            url: 'updateData/update-medicine-request.php'
                        }).then(function(response) {
                           
                        });

                    swal("Medicine Request Updated! Refreshing page...", {
                        icon: "success",
                        timer: 2000
                    });
                    window.setTimeout(function(){
                        
                    // Move to a new location or you can do something else
                        window.location.href = 'medicine-requisition.php?at=' + $scope.at;
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

				case 'Others':
                        window.location.href = 'migrate.php?at=' + $scope.at;
                        break;

				default:
					break;
			}
		}

   }]);
</script>		
</div>
<?php include 'footer.php'?>