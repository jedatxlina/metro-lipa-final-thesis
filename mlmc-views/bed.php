<?php 
	  $activeMenu = "nurse";	
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
    <li><a href="#">Home</a>
    </li>
    <li class="active"> <a href="#">Room & Beds</a>
    </li>
</ol>
<bR><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    <div class="row">

    </div>
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h2>Room & Beds</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Bed No.</th>
                                    <th>Room Type</th>
                                    <th>Rate</th>
                                    <th>Floor</th>
                                    <th>Room</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="bed in beds" ng-class="{'selected': bed.BedID == selectedRow}" ng-click="setClickedRow(bed.BedID,bed.Status)">
                                    <td>{{bed.BedID}}</td>
                                    <td>{{bed.RoomType}}</td>
                                    <td>{{bed.Rate}}</td>
                                    <td>{{bed.Floor}}</td>
                                    <td>{{bed.Room}}</td>
                                    <td>{{bed.Status}}</td>
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
						<a href="#" ng-click="Edit()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Bed Status</a>
                	</div>
            </div>
          
            <!--/ Edit modal -->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Edit Bed</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: auto">
                        <form ng-repeat="getbed in getbedid">
                                <div class="form-group">
                                    <label>Bed No. </label>
                                    <input type="text" ng-model="bedid" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Room Type </label>
                                    <select ng-model="$parent.BType" class="form-control" ng-init="$parent.BType=getbed.RoomType" disabled>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Ward">Ward</option>
                                        <option value="OB-Ward">OB-Ward</option>
                                        <option value="Female-Ward">Female-Ward</option>
                                        <option value="Male-Ward">Male-Ward</option>
                                        <option value="Pedia-Ward">Pedia-Ward</option>
                                        <option value="Surgical-Ward">Surgical-Ward</option>
                                        <option value="Semi-Private">Semi-Private</option>
                                        <option value="Private">Private</option>
                                        <option value="Suite">Suite</option>
                                        <option value="Infectious">Infectious</option>
                                        <option value="ICU">ICU</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="$parent.Rate" class="form-control" ng-init="$parent.Rate=getbed.Rate" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Floor </label>
                                    <input type="text" ng-model="$parent.Floor" class="form-control" ng-init="$parent.Floor=getbed.Floor" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Room Number </label>
                                    <input type="text" ng-model="$parent.Room" placeholder="" class="form-control" ng-init="$parent.Room=getbed.Room" ui-mask-placeholder ui-mask-placeholder-char="_" disabled/>
                                </div>
                                
                                <div class="form-group">
                                    <label>Status </label>
                                    <select ng-model="$parent.status" class="form-control" ng-init="$parent.status=getbed.Status"/>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>
                                
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-danger pull-right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Edit modal -->

           


            <!-- Error modal -->
                <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>ERROR</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 60px">
                        Select Bed record that you would like to apply an <a href="#" class="alert-link">Action.</a>
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

            <!-- Edit Error modal -->
            <div class="modal fade" id="EditErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <!-- <div class="alert alesrt-danger">
                        <a href="#" class="alert-link">Occupied</a> records are unable to edit.
                    </div> -->
                    <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>Error:</h2>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                        </div>
                        <div class="panel-body" style="height: 60px">
                        <a href="#" class="alert-link">Occupied</a> records are unable to edit.
                        </div>
                        <!-- <div class="panel-footer">
                            <span class="text-gray"><em>Footer</em></span>
                        </div> -->
                    </div>
                </div>
            </div>
            <!--/ Edit Error modal -->
        </div>
    </div>

    <script>
        var fetch = angular.module('myApp', ['ui.mask']);


        fetch.controller('userCtrl', ['$scope', '$http','$interval', function($scope, $http,$interval) {
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.selectedRow = null;
            $scope.selectedStatus = null;
            $scope.clickedRow = 0;
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
			
				default:
					break;
			}
            $http({
                method: 'get',
                url: 'getData/get-bed-details.php'
            }).then(function(response) {
                $scope.beds = response.data;
                angular.element(document).ready(function() {
                    dTable = $('#table_info')
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

            $scope.setClickedRow = function(bed,stat) {
                $scope.selectedRow = ($scope.selectedRow == null) ? bed : ($scope.selectedRow == bed) ? null : bed;
                $scope.selectedStatus= ($scope.selectedStatus == null) ? stat : ($scope.selectedStatus == stat) ? null : stat;
                $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                
            }

            $scope.Update = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-bed-details.php',
                    params: {
                        id: $scope.bedid,
                        status: $scope.status
                    }
                }).then(function(response) {
                    window.location.href = 'bed.php?at=' + $scope.at;
                });
            }

            $scope.Edit = function() {
                if ($scope.selectedRow != null) 
                {
                    if ($scope.selectedStatus == 'Occupied')
                     $('#EditErrorModal').modal('show');
                     else
                     {
                    $('#EditModal').modal('show');
                    $scope.bedid = $scope.selectedRow;
                    $http({
                        method: 'GET',
                        params: {
                            id: $scope.selectedRow
                        },
                        url: 'getData/get-bed-id.php'
                    }).then(function(response) {
                        $scope.getbedid = response.data;
                    });
                    } 
                }
                else {
                    $('#ErrorModal').modal('show');
                }
            }

            $scope.getPage = function(check){
                    switch (check) {
                        case 'Dashboard':
                                window.location.href = 'index.php?at=' + $scope.at;
                                break;
                        case 'Emergency':
                                window.location.href = 'emergency.php?at=' +  $scope.at;
                                break;
                        case 'Outpatient':
                                window.location.href = 'outpatient.php?at=' +  $scope.at;
                                break;
                        case 'Inpatient':
                                window.location.href = 'inpatient.php?at=' +  $scope.at;
                                break;
                                
                        case 'Confined':
                                window.location.href = 'nurse-patient.php?at=' +  $scope.at;
                                break;
                        
                        case 'Physician':
                                window.location.href = 'physician.php?at=' +  $scope.at;
                                break;
                        
                        case 'Pharmacy':
                                window.location.href = 'medicine-requisition.php?at=' +  $scope.at;
                                break;

                        case 'Pharmaceuticals':
                                window.location.href = 'pharmacy.php?at=' +  $scope.at;
                                break; 

                        case 'Billing':
                                window.location.href = 'billing.php?at=' +  $scope.at;
                                break;

                        case 'Cashier':
                                window.location.href = 'cashier.php?at=' +  $scope.at;
                                break;
                        
                        case 'Accounts':
                                window.location.href = 'user.php?at=' +  $scope.at;
                                break;

                        case 'Bed':
                                window.location.href = 'bed.php?at=' +  $scope.at;
                                break;

                        case 'Specialization':
                                window.location.href = 'specialization.php?at=' +  $scope.at;
                                break;
                        
                        case 'Laboratory':
                                window.location.href = 'laboratory.php?at=' +  $scope.at;
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