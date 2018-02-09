<?php 
include 'admission-header.php';
include '../mlmc-views/getData/get-inpatient-vitals.php';
?>
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li><a href="index.php">Patients</a></li>
<li class="active"><a href="inpatient.php">Inpatient</a></li>
</ol>
<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

<p style="font-size: 30px;padding: 20px;" ng-model="admissionid">{{admissionid}}</p>
<p style="font-size: 30px;padding: 20px;" ng-model="patientname">{{patientname}}</p>
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
</div>

<script type="text/javascript" src="../mlmc-views/assets/js/Chart.js"></script>
<script type="text/javascript" src="../mlmc-views/assets/js/jquery.min.js"></script>
<script>
        var data = '<?php echo json_encode($data) ?>';
        var data = angular.module('myApp', []);
        data.controller("userCtrl", function($scope, $window, $http) {  
            $scope.admissionid = "<?php echo $AdID; ?>"
            $scope.patientname = "<?php echo $Fname.' '.$Mname.' '.$Lname; ?>"
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
				bloodp.push(data[i].BloodPressure);
                respi.push(data[i].RespiRate);
				temp.push(data[i].Temperature);
				pulse.push(data[i].PulseRate);
				date.push(data[i].DateTaken);
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
		},
		error: function(data) {
			console.log(data);
		}
	});
});
    </script>
<?php include 'footer.php'?>