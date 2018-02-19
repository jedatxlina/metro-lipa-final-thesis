<?php 
include 'admin-header.php';
include '../mlmc-views/getData/get-inpatient-vitals.php';
?>
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Patients</a></li>
<li class="active"><a href="#">Inpatient</a></li>
</ol>
<div class="container-fluid" data-ng-repeat="patient in patientdetails">
    <br>
    <br>

    <div class="col-sm-3" >
        <div class="panel panel-profile">
            <div class="panel-body"  >
                <img ng-src="{{patient.QRpath}}">
                <div class="name">{{patient.Lastname}}, {{patient.Firstname}}{{patient.Middlename}}</div>
                <div class="info">{{patient.AdmissionID}}</div>
                
            </div>
        </div><!-- panel -->
    </div>

    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div data-widget-group="group1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Patient Vitals</h2>
                                </div>
                                <div class="panel-body">
                                    <div id="chart-container">
			                            <canvas style="height: 380px;" id="mycanvas1"></canvas>
                                    </div>
                                </div>  
                                <div class="panel-body">
                                    <div id="chart-container">
			                        <canvas style="height: 500px;" id="mycanvas2"></canvas>
		                            </div>
                                </div>
                                <div class="panel-body">
                                    <div id="chart-container">
			                        <canvas style="height: 500px;" id="mycanvas3"></canvas>
		                            </div>
                                </div>
                                <div class="panel-body">
                                    <div id="chart-container">
			                        <canvas style="height: 500px;" id="mycanvas4"></canvas>
		                            </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../mlmc-views/assets/js/Chart.bundle.js"></script>
    <script type="text/javascript" src="../mlmc-views/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../mlmc-views/assets/js/utils.js"></script>
<script>
        var data = '<?php echo json_encode($data) ?>';
        var data = angular.module('myApp', []);
        data.controller("userCtrl", function($scope, $window, $http) {  
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.admissionid = "<?php echo $_GET['id']; ?>"

            $http({
            method: 'GET',
            url: 'getData/get-patient-details.php',
            params: {id: $scope.admissionid}
            }).then(function(response) {
                $scope.patientdetails = response.data;
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
			
				default:
					break;
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
                    
                    default:
                        break;
                }
                        
            }  
                  
            
            
        });
        $(document).ready(function(){
        $.ajax({
            url: "data.php",
            method: "GET",
            dataType: 'json',
            data: { id: "<?php echo $AdID; ?>"} ,
            success: function(data) {
                console.log(data);
                var bloodp = [];
                var respi = [];
                var temp = [];
                var pulse = [];
                var date = [];
                for(var i in data) {
                    bloodp.push(data[i].BP);
                    respi.push(data[i].RR);
                    temp.push(data[i].Temperature);
                    pulse.push(data[i].PR);
                    date.push(data[i].DateTimeChecked);
                }

                var chartdata = {
                    labels: date,
                    datasets : [
                        {
                            label: 'Temperature',
                            backgroundColor: 'rgba(229,28,35,0.10)',
                            borderColor: 'rgba(167, 12, 12, 0.75)',
                            hoverBackgroundColor: 'rgba(12, 23, 45, 1)',
                            hoverBorderColor: 'rgba(123, 43, 55, 1)',
                            data: temp
                        }
                    ]
                };
                var chartdata2 = {
                    labels: date,
                    datasets : [
                        {
                            label: 'Pulse Rate',
                            backgroundColor: 'rgba(229,28,35,0.75)',
                            borderColor: 'rgba(167, 12, 12, 0.75)',
                            hoverBackgroundColor: 'rgba(12, 23, 45, 1)',
                            hoverBorderColor: 'rgba(123, 43, 55, 1)',
                            data: pulse
                        }
                    ]
                };
                var ctx = $("#mycanvas1");
                var ct2 = $("#mycanvas2");
                var ct3 = $("#mycanvas3");
                var ct4 = $("#mycanvas4");

                var barGraph = new Chart(ctx, {
                    type: 'line',
                    data: chartdata,
                    height: 2000,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 0,
                                right: 50,
                                top: 50,
                                bottom: 0
                            }
                        },
                        scales: {
                            yAxes: [{
                                    display: true,
                                    ticks: {
                                        beginAtZero: true,
                                        steps: 10,
                                        stepValue: 5,
                                        max: 50
                                    }
                                }]
                        }
                    }
                });
                var barChart = new Chart(ct2, {
                    type: 'bar',
                    data: chartdata2,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 0,
                                right: 50,
                                top: 50,
                                bottom: 0
                            }
                        },
                        scales: {
                            yAxes: [{
                                    display: true,
                                    ticks: {
                                        beginAtZero: true,
                                        steps: 10,
                                        stepValue: 5,
                                        max: 200
                                    }
                                }]
                        }
                    }
                });
                var chartdata3 = {
                labels: date,
                datasets: [{
                    type: 'bar',
                    label: 'Systolic',
                    backgroundColor: window.chartColors.red,
                    data: bloodp,
                    borderColor: 'white',
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: 'Diastolic',
                    backgroundColor: window.chartColors.green,
                    data: respi
                }]
            };
            var chartdata4 = {
                labels: date,
                datasets: [{
                    type: 'line',
                    label: 'Respiration Rate',
                    backgroundColor: window.chartColors.red,
                    data: respi,
                    borderColor: 'white',
                    borderWidth: 2
                }]
            };
                var barChart2 = new Chart(ct3, {
                    type: 'bar',
                    data: chartdata3,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 0,
                                right: 50,
                                top: 50,
                                bottom: 0
                            }
                        },
                        scales: {
                            yAxes: [{
                                    display: true,
                                    ticks: {
                                        beginAtZero: true,
                                        steps: 10,
                                        stepValue: 5,
                                        max: 200
                                    }
                                }]
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        }
                    }
                });
                var linechart2 = new Chart(ct4, {
                    type: 'line',
                    data: chartdata4,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 0,
                                right: 50,
                                top: 50,
                                bottom: 0
                            }
                        },
                        scales: {
                            yAxes: [{
                                    display: true,
                                    ticks: {
                                        beginAtZero: true,
                                        steps: 10,
                                        stepValue: 5,
                                        max: 200
                                    }
                                }]
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        }
                    }
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
});
    </script>
<?php include 'footer.php'?>