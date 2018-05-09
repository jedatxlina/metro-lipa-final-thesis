<?php 
	  $activeMenu = "laboratories";	
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
    <li class="active"> <a href="#">Ancillary Services</a>
    </li>
</ol>
<br><br>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h2>ANCILLARY SERVICES</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Rate</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="lab in labs" ng-class="{'selected': lab.LaboratoryID == selectedRow}" ng-click="setClickedRow(lab.LaboratoryID,lab.Description,lab.Rate)">
                                    <td>{{lab.Description}}</td>
                                    <td>₱{{lab.Rate}}</td>
                                    <td>{{lab.Type}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   
                    <div class="panel-footer">
					
                </div>
                
                </div>
              
        </div>
        <div class="col-md-3">
                    
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#" role="tab" data-toggle="tab" class="list-group-item active">Actions Panel</a>
						<a href="#" ng-click="AddAncil()" role="tab" data-toggle="tab" ng-disabled="sample == 1" class="list-group-item"><i class="fa fa-list-alt fa-fw"></i>Add Ancillary Service</a>
                        <a href="#" ng-click="EditAncillary()"role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-info-alt"></i>Edit Rate</a>
                    </div>
                    </div>

                    <div class="modal fade" id="AddAncillary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <h2>Add Ancillary Service</h2>
                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                </div>
                <div class="panel-body" style="height: auto">
                            <form>
                                <div class="form-group">
                                    <label>Description </label>
                                    <input type="text" ng-model="description" placeholder="XRAY - Chest" class="form-control" ng-keypress="filterValueCharacter($event)">
                                    
                                    <span style="color:red" ng-show="description == null && submitted">* Description is required!</span>
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="rate" placeholder="1000"  ng-keypress="filterValue($event)" class="form-control">
                                    
                                    <span style="color:red" ng-show="rate == null && submitted">* Rate is required!</span>
                                </div>
                                <div class="form-group">
                                    <label>Type </label>
                                    <select ng-model="type" class="form-control" ng-change="accessType()" required>
                                        <option value="" disabled selected>Select</option>
                                         <option value="Laboratory">Laboratory</option>
                                        <option value="Operation">Operation</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='AddAncillary(); submitted=true' class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>

        

            <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        Select Ancillary record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>

         
            <div class="modal fade" id="EditAncillary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
            <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
            <div class="panel-heading">
                <h2>Edit Ancillary Service</h2>
                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
            </div>
            <div class="panel-body" style="height: auto">
                     <div class="form-group">       
                     <label>Description</label>
                     <input type="text" ng-model="AncilDesc" class="form-control" disabled>
                  </div>
                  
                  <div class="form-group">       
                     <label>Rate </label>
                     <input type="text" ng-model="AncilRate" class="form-control" ng-keypress="filterValue($event)">
                  </div>
                 
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button ng-click='UpdateAncillary()' class="btn btn-primary">Confirm</button>
                     </div>
                     </div>
                </div>
            </div>
          </div>


    </div>

</div>
<script>
    var fetch = angular.module('myApp', ['ui.mask']);


    fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.at = "<?php echo $_GET['at'];?>";
        $scope.selectedRow = null;
        $scope.selectedStatus = null;
        $scope.clickedRow = 0;
        $scope.new = {};
            $scope.sample = $scope.at[0];
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
            url: 'getData/get-laboratory-details.php'
        }).then(function(response) {
            $scope.labs = response.data;
            angular.element(document).ready(function() {
                dTable = $('#table_info')
                dTable.DataTable();
            });
        });

        $scope.AddAncil = function() {
                $('#AddAncillary').modal('show');
            }


        $scope.AddAncillary = function() {
            if ($scope.description == null || $scope.rate == null)
            {

            }
            else
            {
                $scope.labid = "<?php echo rand(100000, 999999); ?>"
                $http({
                    method: 'GET',
                    url: 'insertData/insert-laboratory.php',
                    params: {
                        laboratoryid: $scope.labid,
                        description: $scope.description,
                        rate: $scope.rate,
                        type: $scope.type
                    }
                }).then(function(response) {
                    window.location.href = 'laboratory.php?at=' + $scope.at;
                });
            }
            }

            $scope.UpdateAncillary = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-laboratory-details.php',
                    params: {
                        laboratoryid: $scope.selectedRow,
                        description: $scope.AncilDesc,
                        rate: $scope.AncilRate
                    }
                }).then(function(response) {
                    window.location.href = 'laboratory.php?at=' + $scope.at;
                });
            }

          

            $scope.EditAncillary = function() {
                if ($scope.selectedRow != null) {
                    $('#EditAncillary').modal('show');
                  $scope.AncilDesc = $scope.selectedDesc;
                  $scope.AncilRate = $scope.selectedRate;
                } else {
                    $('#ErrorModal').modal('show');
                }
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

        $scope.setClickedRow = function(lab,des,rat) {
            $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
            $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
            $scope.selectedDesc = des;
            $scope.selectedRate = rat;
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