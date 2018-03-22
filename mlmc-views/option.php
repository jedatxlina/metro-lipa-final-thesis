<?php include 'admin-header.php' ?>
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
<li class="active"><a href="emergency.php">Emergency</a></li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Option</h4>
        </div>
        <div class="modal-body">
			<div class="panel-body">
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Details</span></a>
							<a href="#" ng-click="patientVitals()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Vitals</span></a>
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Doctors Order</span></a>
							<a href="#" ng-click="viewNotes()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Nurse's notes</span></a>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
</div>
<script type="text/javascript" src="../mlmc-views/assets/js/jquery.min.js"></script>
<script type="text/javascript">
    $(window).on('load', function(){
		$('#myModal').modal('show');
	});
	var fetch = angular.module('myApp', []);
   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {   
		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};
       	$http({
           method: 'get',
           url: 'getData/get-inpatient-details.php'
       	}).then(function(response) {
		 	$scope.users = response.data;
			angular.element(document).ready(function() {  
			dTable = $('#patient_table')  
			dTable.DataTable();  
			});  
		});  
		$scope.addPatient = function(){
			window.location.href = 'add-patient.php?id=' + 1;
		}
		$scope.setClickedRow = function(user) {
           $scope.selectedRow = ($scope.selectedRow == null) ? user : ($scope.selectedRow == user) ? null : user;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
	    }
		$scope.viewPatient = function(){
			if($scope.selectedRow != null){
				$scope.admissionid = $scope.selectedRow;
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
			$('#myModal').modal('show');
			}
		}
		$scope.viewNotes = function(){
            if($scope.selectedRow != null){
            window.location.href = 'nurse-notes.php';
            }
       	};
		$scope.confirmBtn = function(){
			alert($scope.new.Firstname);
		}
        $scope.patientVitals = function(){
            window.location.href = 'add-patient-vitals.php?id=<?php echo $_GET['result'] ?>&at=<?php echo $_GET['at']; ?>';
       	};
   }]);
</script>		
</div>
<?php include 'footer.php'?>