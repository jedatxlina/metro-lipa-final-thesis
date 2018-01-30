<?php include 'admission-header.php' ?>
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
<li class="active"><a href="outpatient.php">Outpatient</a></li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">
	
	<div class="row">
		<div class="col-md-6">
                <br>
				<button type="button" ng-click="addPatient()" class="btn btn-primary-alt pull-left"><i class="ti ti-user"></i>&nbsp;Add Patient</button>
				
		</div>
	</div>
	<br>
	<div data-widget-group="group1">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Outpatient Patients</h2>
							<div class="panel-ctrls"></div>
						</div>
						<div class="panel-body">
							<table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>Admission ID</th>
									<th>Admission No</th>
									<th>Admission Date-Time</th>
									<th>Full name</th>
									<th>Admission</th>
									<th>Admission Type</th>
									<th>Gender</th>
									<th>Province</th>
								</tr>
								</thead>
								<tbody>
								<tr ng-repeat="user in users" ng-class="{'selected': user.AdmissionID == selectedRow}" ng-click="setClickedRow(user.AdmissionID)">
                                        <td>{{user.AdmissionID}}</td>
                                        <td>{{user.AdmissionNo}}</td>
                                        <td>{{user.AdmissionDateTime}}</td>
                                        <td>{{user.Lname}}, {{user.Fname}} {{user.Mname}} </td>
                                        <td>{{user.Admission}}</td>
                                        <td>{{user.AdmissionType}}</td>
                                        <td>{{user.Gender}}</td>
                                        <td>{{user.Province}}</td>
                                    </tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer"></div>
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
							<a href="#" ng-click="viewPatient()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-user"></i><span>&nbsp;&nbsp;Patient Details</span></a>
							<a href="#" ng-click="viewEmergency()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Outpatient Details</span></a>
							<a href="#" ng-click="movePatient()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-stethoscope"></i><span>&nbsp;&nbsp;Move to Inpatient</span></a>
						</div>
					</div>
				</div>
				<!-- Error modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="alert alert-danger">
							Select Emergency record that you would like to apply an <a href="#" class="alert-link">Action.</a>
						</div>
					</div>
				</div>
				<!--/ Error modal -->

				<!-- Patient Modal -->
				<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<form ng-repeat="patient in patientdetails">
						<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title">Patient Details</h2>
										<p>Data below belongs to <small><u>{{patient.Firstname}} {{patient.Middlename}} {{patient.Lastname}}</u></small> </p>
									</div>
									<div class="modal-body">
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>First Name</label> 
														<input type="text" class="form-control" ng-value="patient.Firstname" ng-model="new.Firstname" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Middle Name</label>
														<input type="text" class="form-control" ng-value="patient.Middlename" ng-model="new.Middlename" readonly="readonly">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Last Name</label> 
														<input type="text" class="form-control" ng-value="patient.Lastname" ng-model="new.Lastname" readonly="readonly"> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Gender</label> 
														<input type="text" class="form-control" ng-value="patient.Gender" ng-model="new.Gender" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Civilstatus</label> 
														<input type="text" class="form-control" ng-value="patient.Civilstatus" ng-model="new.Civilstatus" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Birthdate</label> 
														<input type="text" class="form-control" ng-value="patient.Birthdate" ng-model="new.Birthdate" readonly="readonly"> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Province</label> 
														<input type="text" class="form-control" ng-value="patient.Province" ng-model="new.Province" readonly="readonly"> 
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>City</label> 
														<input type="text" class="form-control" ng-value="patient.City" ng-model="new.City" readonly="readonly"> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Contact</label> 
														<input type="text" class="form-control" ng-value="patient.Contact" ng-model="new.Contact" readonly="readonly"> 
													</div>
												</div>
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" ng-click="#" class="btn btn-primary-alt pull-left">View Details</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" ng-click="confirmBtn()" class="btn btn-primary">Confirm</button>
									</div>
							</div><!-- /.modal-content -->
						</div>
					</form>
				</div>
				<!-- Patient Modal -->
				
		</div>
	</div>
	
<script>
   var fetch = angular.module('myApp', []);
  

   fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {   

		$scope.selectedRow = null;
		$scope.clickedRow = 0;
		$scope.new = {};

       	$http({
           method: 'get',
           url: 'getData/get-outpatient-details.php'
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


		$scope.confirmBtn = function(){
			alert($scope.new.Firstname);
		}


	
        // $scope.filterBed = function (param) {
        //     return function (bed) {
        //         if (bed.RoomType == param)
        //         {
        //             if (bed.Status == 'Available')
        //             return true;
        //         }
        //         return false;
        //     };
        // };


    //    $scope.ConfirmInpatient = function(){
    //     $http.post("http://localhost/Metro Lipa Patient System/assets/updateData/update-inpatient-details.php", {
    //         'AdmissionID': $scope.selectedRow,
    //         'BedID' : $scope.bedno.BedID
    //     }).then(function(response){
            
           
	// 			});
	// 	window.location.reload();
	// 	};

    //    $scope.addPatient = function(){
    //        window.location.href = 'add-patient-form.php?id=' + 1;
    //    }

    //    $scope.patientDetails = function(){
    //       if($scope.selectedRow != null){
    //         $scope.admissionid = $scope.selectedRow;
    //         $http({
    //                 method: 'GET',
    //                 url: '../assets/getData/get-patient-details.php',
    //                 params: {id: $scope.admissionid},
    //                 contentType:"application/json; charset=utf-8",
    //                 dataType:"json"
    //                 }).then(function(response) {
    //                 $scope.getdetails = response.data;
                
    //             });
    //             $('#patientModal').modal('show');
    //       }else{
    //             $('#myModal').modal('show');
    //        }
                
    //    };

    //    $scope.movetoInpatient = function(){
    //     if($scope.selectedRow != null){
    //         $scope.admissionid = $scope.selectedRow;
    //         $http({
    //                 method: 'GET',
    //                 url: '../assets/getData/get-patient-details.php',
    //                 params: {id: $scope.admissionid},
    //                 contentType:"application/json; charset=utf-8",
    //                 dataType:"json"
    //                 }).then(function(response) {
    //                 $scope.getdetails = response.data;
                
    //             });
    //             $('#movetoInpatientModal').modal('show');
    //       }else{
    //             $('#myModal').modal('show');
    //        }
    //    };

    //    $http({
    //                 method: 'GET',
    //                 url: '../assets/getData/get-bed-details.php',
    //                 contentType:"application/json; charset=utf-8",
    //                 dataType:"json"
    //             }).then(function(response) {
    //                 $scope.bed = response.data;
    //             });
                

    //    $scope.emergencyDetails = function(){
    //     if($scope.selectedRow != null){
    //         $scope.admissionid = $scope.selectedRow;
    //         $http({
    //                 method: 'GET',
    //                 url: '../assets/getData/get-patient-details.php',
    //                 params: {id: $scope.admissionid},
    //                 contentType:"application/json; charset=utf-8",
    //                 dataType:"json"
    //                 }).then(function(response) {
    //                 $scope.getdetails = response.data;
                
    //             });
    //             $('#emergencyModal').modal('show');
    //       }else{
    //             $('#myModal').modal('show');
    //        }
    //    };

    //    $scope.patientConfirm = function(){
        
    //    };
    //    $scope.new = {};
    //    $scope.emergencyConfirm = function(){
    //     $http.post("http://localhost/Metro Lipa Patient System/assets/updateData/update-emergency-details.php", {
    //                     'AdmissionID': $scope.selectedRow,
    //                     'FirstName': $scope.new.FirstName
    //                 }).then(function(response){
    //                     $('#emergencyModal').modal('hide');
                       
    //                 });
    //     window.location.reload();
    //     };


   }]);
</script>		
</div>
<?php include 'footer.php'?>