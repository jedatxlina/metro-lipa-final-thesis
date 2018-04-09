<?php 
	  $activeMenu = "others";	
?>
<?php include 'admin-header.php'?>

<style>
.resize {
    width: 50px;
    height: auto;
}
</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.5.1/rzslider.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.5.1/rzslider.min.js"></script>

<link type="text/css" href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet"> <!-- Dropzone Plugin -->

<script type="text/javascript" src="assets/plugins/dropzone/dropzone.min.js"></script>   	<!-- Dropzone Plugin -->
<!-- <script src="assets/js/report/webix.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/report/querybuilder.js"></script>
<link rel="stylesheet" type="text/css" href="assets/js/report/webix.css">
<link rel="stylesheet" type="text/css" href="assets/js/report/querybuilder.css"> -->

<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active"><a href="#" ng-click="#">Others</a></li>
</ol>
<div class="container-fluid">
	<div class="panel-body">
        <h3>Other<small> misc</small></h3>
    </div>	
	<br>
	<div data-widget-group="group1">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-settings" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-gear"></i> Settings </a>
                        <a href="#tab-migrate" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-database"></i>Migrate Archive</a>
						<a href="#tab-reports" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-file-pdf-o"></i>Reports</a>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-settings">
							<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
								<div class="panel-heading">
									<h2>Settings</h2>
								</div>
								<div class="panel-body">
									<div class="form-horizontal row-border">
										<div class="form-group">
											<div class="col-xs-4">Senior Citizen Discount <br><span class="text-muted">Currently at {{discount}}%</span></div>
											<div class="col-xs-8">
												<div>
												<div>
												<rzslider rz-slider-model="slider.value"
												rz-slider-options="slider.options"></rzslider>
												</div>
																								
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-12">
												<button type="button" ng-click="checkValue()" class="btn btn-danger-alt pull-right">&nbsp;Save Changes</button>
										</div>
									</div>
								</div>
							</div>
                        </div> <!-- #tab-projects -->

                        <div class="tab-pane" id="tab-migrate">	
                           		<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Patient Archive Migration (CSV)</h2>
										<!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div> -->
										<div class="options">
											<ul class="nav nav-tabs">
											<li><a href="#migrate-form" data-toggle="tab">Migrate</a></li>
											<li class="active"><a href="#template-form" data-toggle="tab">Templates</a></li>
											</ul>
										</div>
									</div>
									<div class="panel-body">
										<div class="tab-content">
											<div class="tab-pane" id="migrate-form">
												<!-- <form action="migrate-patient-archive.php" enctype='multipart/form-data' method="POST">
													<input type="hidden" name="at" value="<?php if(isset($_GET['at'])) { echo $_GET['at']; } ?>">
													<div align="center">
															<p>Upload CSV: <input type="file" name="file" ></p>
															<p><input type="submit" value="Import" name="submit"  class="btn-default btn"></p>
													</div>
												</form> -->
												<!-- <div class="panel panel-default" data-widget='{"draggable": "false"}'>
													<div class="panel-heading">
														<h2>File Upload</h2>
														<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
														<div class="options">
														</div>
													</div>
													<div class="panel-body"> -->
														<form action="migrate-patient-archive.php" enctype='multipart/form-data' class="dropzone"	 id="dropzonewidget">
															<!-- <p>Upload CSV: <input type="file" name="file" ></p>
															<p><input type="submit" value="Import" name="submit"  class="btn-default btn"></p> -->
														</form>
													<!-- </div>
												</div>	 -->
											</div>
											<div class="tab-pane active" id="template-form">
												<span>
												<a href="patientArchiveCsv/sample-patient-archive.csv">&emsp;&emsp;&emsp;<img src="assets/img/2000px-Microsoft_Excel_2013_logo.svg.png"  class="resize"><br>Patient Archive Template</a></span>
											</div>
										</div>
									</div>
								</div>
                        </div> <!-- #tab-projects -->

						<div class="tab-pane" id="tab-reports">
                           		<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Reports</h2>
										<!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div> -->
										<div class="options">
											<ul class="nav nav-tabs">
											<li><a href="#patients-form" data-toggle="tab">Patients</a></li>
											<li class="active"><a href="#doctors-form" data-toggle="tab">Doctors</a></li>
											<li><a href="#custom-form" data-toggle="tab">Custom</a></li>
											</ul>
										</div>
									</div>
									<div class="panel-body">
										<div class="tab-content">
											<div class="tab-pane" id="patients-form">
											asd
											</div>
											<div class="tab-pane active" id="doctors-form">
											ss
											</div>
											<div class="tab-pane" id="custom-form">
											
											</div>
										</div>
									</div>
								</div>
                        </div> <!-- #tab-projects -->


					</div><!-- .tab-content -->

				

                </div><!-- col-sm-8 -->

				
            </div>
        </div>
</div>

<script>

			var app = angular.module('myApp', ['rzModule']);
			app.controller('userCtrl', function($scope, $http) {

			$scope.at = "<?php echo $at;?>";

					var pusher = new Pusher('c23d5c3be92c6ab27b7a', {
            		cluster: 'ap1',
            		encrypted: true
            	  	});
              
            	var channel = pusher.subscribe('my-channel-others');
            		channel.bind('my-event-others', function(data) {
            		
            			console.log(data.message);
						console.log(data.message1);
            			swal({
            				icon: "success",
            				title: data.message,
            				text: data.message1
            				}).then(function () {
							window.location.href = 'migrate.php?at=' + $scope.at;
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
							window.location.href = 'migrate.php?at=' + $scope.at;
                            }
            			});
            
            	});

					
			$http({
                method: 'GET',
                url: 'getData/get-discount-details.php'
            }).then(function(response) {
				$scope.discount = JSON.parse(response.data);
				$scope.slider = {
				value: $scope.discount,
				options: {
					floor: 0,
					ceil: 100,
					translate: function(value) {
					return value + '%';
					},
					getPointerColor: function(value) {
					return '#c14949';
					}
				}
				};
            });
			
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
					$scope.User = "Secretary";
			
				default:
					break;
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

			$scope.checkValue = function(){
				$http({
                method: 'GET',
				url: 'updateData/update-discount-details.php',
				params: {discount: $scope.slider.value}
				}).then(function(response) {
					swal({
                            icon: "success",
                            title: "Successfully Changed!",
                            text: "Redirecting in 2..",
                            timer: 2000
                        }).then(function () {
                               window.location.reload(false); 
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
                               window.location.reload(false); 
                            }
                        });
				});
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
					
					case 'Migrate':
                            window.location.href = 'migrate.php?at=' + $scope.at;
                            break;
					
					
					default:
						break;
				}
			}

		});
</script>
<?php include 'footer.php'?>
