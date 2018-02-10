<?php include 'admission-header.php'; $id = $_GET['id']; ?>
<style>
.selected {
color: #800000;
background-color: #F5F5F5;
font-weight: bold;
}
</style>

<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li><a href="index.php">Patients</a></li>
<li class="active"><a href="inpatient.php">Inpatient</a></li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	<br>
	<div data-widget-group="group1">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Patient Relocate Summary</h2>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
                        <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Medical History</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Fullname</label>
                                                    
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Admission ID</label>
                                                    <textarea autogrow ng-model="surgery"></textarea>
                                                </div>
                                            </div>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Inpatient Date</label>
                                                    <input type="text" ng-model="pr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>RR</label>
                                                    <input type="text" ng-model="rr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>BP</label>
                                                    <input type="text" ng-model="bp">
                                                </div>
                                             
                                            </div>
                                            <legend>Relocate Patient Details</legend>
                                            <div data-row-span="3"> 
                                                    <div data-field-span="1">
                                                        <label>Floor Level</label>
                                                        <textarea ng-model="diagnosis" autogrow></textarea>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Room Type</label>
                                                        <input type="text" ng-model="bp">
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Room No</label>
                                                        <input type="text" ng-model="bp">
                                                    </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Rate</label>
                                                    <input type="text" ng-model="bp">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Status</label>
                                                    <input type="text" ng-model="bp">
                                                </div>
                                            </div>
                                            <legend>Relocate Patient To</legend>
                                            <div data-row-span="3"> 
                                                    <div data-field-span="1">
                                                        <label>Floor Level</label>
                                                        <textarea ng-model="diagnosis" autogrow></textarea>
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Room Type</label>
                                                        <input type="text" ng-model="bp">
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Room No</label>
                                                        <input type="text" ng-model="bp">
                                                    </div>
                                            </div>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    <label>Rate</label>
                                                    <input type="text" ng-model="bp">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Status</label>
                                                    <input type="text" ng-model="bp">
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
						<div class="panel-footer"></div>
					</div>
				</div>
			
			
			
		</div>
	</div>

<script>
	
   var fetch = angular.module('myApp', []);
   

   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {   

		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};	  

        $scope.relocateid = "<?php echo $id; ?>";
           
           
		$scope.relocatePatient = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
				$http({
					method: 'get',
					url: 'getData/get-relocate-details.php',
					params: {id: $scope.admissionid}
				}).then(function(response) {
					$scope.patientrelocate = response.data;
				});
				$('#relocateModal').modal('show');
			
			}
			else{
			$('#myModal').modal('show');
			}
		}


		$scope.relocateGo = function(){
			window.location.href = 'insertData/insert-relocate-details.php?id=' + $scope.admissionid;
		}

   }]);
</script>		
</div>
<?php include 'footer.php'?>