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
      <div class="clearfix">
            <div class="pull-left">
               &emsp;<button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
            </div>
        </div>
    <br>
    <div class="container-fluid">
    <div data-widget-group="group1">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-profile">
                        <div class="panel-body"  data-ng-repeat="patient in patientdetails">
                            <img ng-src="{{patient.QRpath}}">
                            <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                            <div class="info">{{patient.AdmissionID}}</div>  
                            <br>
                            <a ng-click="printQR()"><i class="ti ti-printer"></i>&nbsp; Print QR Code</a>
                        </div>
                        <center>
                     
                    </div><!-- panel -->
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-details" role="tab" data-toggle="tab" class="list-group-item active"><i class="fa fa-stethoscope"></i>Patient Vitals</a>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-9">
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab-details">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel panel-danger widget-progress" data-widget='{"draggable": "false"}'  data-ng-repeat="vitals in latestvitals">
                                        <div class="panel-heading">
                                            <h2>Latest Blood Pressure</h2>
                                            <div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-refresh-demo='{"type": "circular"}'>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="tabular">
                                                <div class="tabular-row">
                                                    <div class="tabular-cell">
                                                        <span class="status-total">Systolic</span>
                                                        <span class="status-value">	{{vitals.BP}}</span>
                                                    </div>
                                                    <div class="tabular-cell">
                                                        <span class="status-pending">Diastolic</span>
                                                        <span class="status-value">	{{vitals.BPD}}</span>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <br>
                                            <center><span >As of {{vitals.DateTimeChecked}} </span></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-danger widget-progress" data-widget='{"draggable": "false"}'  data-ng-repeat="vitals in latestvitals">
                                        <div class="panel-heading">
                                            <h2>Latest Temperature</h2>
                                            <div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-refresh-demo='{"type": "circular"}'>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <center><span ><h1>{{vitals.Temperature}}°</h1></span></center>
                                            <center><span >As of {{vitals.DateTimeChecked}} </span></center>
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-danger widget-progress" data-widget='{"draggable": "false"}' data-ng-repeat="vitals in latestvitals">
                                        <div class="panel-heading">
                                            <h2>Latest Pulse Rate/Respiratory Rate</h2>
                                            <div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-refresh-demo='{"type": "circular"}'>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="tabular">
                                                <div class="tabular-row">
                                                    <div class="tabular-cell">
                                                        <span class="status-total">PR</span>
                                                        <span class="status-value">	{{vitals.PR}}</span>
                                                    </div>
                                                    <div class="tabular-cell">
                                                        <span class="status-pending">RR</span>
                                                        <span class="status-value">	{{vitals.RR}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <center><span >As of {{vitals.DateTimeChecked}} </span></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Medical Details</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <div class="grid-form">
                                            <div class="row">
                                                <fieldset data-ng-repeat="patient in patientdetails">
                                                        <div data-row-span="2">
                                                            <div data-field-span="1">
                                                                <label>Patient ID</label>
                                                                <input type="text" class="form-control" ng-model="patient.AdmissionID"  ng-disabled='true'>
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Admission No</label>
                                                                <input type="text" ng-model="patient.AdmissionNo" ng-disabled='true'>
                                                            </div>
                                                        </div>
                                                        <div data-row-span="3">
                                                            <div data-field-span="1">
                                                                <label>Admission Date</label>
                                                                <input type="text" class="form-control" ng-model="patient.AdmissionDate"  ng-disabled='true'>
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Admission Time</label>
                                                                <input type="text" ng-model="patient.AdmissionTime" ng-disabled='true'>
                                                            </div>
                                                          
                                                        </div>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1">
                                                                <label>Admission</label>
                                                                <input type="text" class="form-control" ng-model="patient.Admission"  ng-disabled='true'>
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Admission Type</label>
                                                                <input type="text" ng-model="patient.AdmissionType" ng-disabled='true'>
                                                            </div>
                                                        </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h2>Patient Vitals</h2>
                                    <!-- <button ng-click="try()" class="btn-danger-alt btn">Next</button> -->
           
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                    <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="panel-white" data-widget='{"draggable": "false"}'>
                                                                <div class="panel-heading">
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
                        </div> <!-- #tab-projects -->
                    </div><!-- .tab-content -->
                </div><!-- col-sm-8 -->
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../mlmc-views/assets/js/Chart.bundle.js"></script>
    <script type="text/javascript" src="../mlmc-views/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../mlmc-views/assets/js/utils.js"></script>
    <script>

        var data = angular.module('myApp', []);
        data.controller("userCtrl", function($scope, $window, $http,$httpParamSerializerJQLike) {  
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.admissionid = "<?php echo $_GET['id']; ?>"

            $http({
            method: 'GET',
            url: 'getData/get-patient-details.php',
            params: {id: $scope.admissionid}
            }).then(function(response) {
                $scope.patientdetails = response.data;
            });

            
            $http({
            method: 'GET',
            url: 'getData/get-latestvitals-details.php',
            params: {id: $scope.admissionid}
            }).then(function(response) {
                $scope.latestvitals = response.data;
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

            $scope.accesstype = $scope.at[0];
            $http({
            method: 'GET',
            url: 'getData/get-user-profile.php',
            params: {id: $scope.at,
                    atype : $scope.accesstype}
            }).then(function(response) {
                $scope.userdetails = response.data;
            });
            
            // $scope.viewImage = function(){
     
            // var url_base64 = document.getElementById("mycanvas1").toDataURL("image/jpg");
            // $scope.image = url_base64;

            // }
            $scope.try = function(){
                var url_base64 = document.getElementById("mycanvas1").toDataURL("image/jpg");
                $scope.image = url_base64;

                // $http({
                // method: 'POST',  
                // url: baseUrl,
                // data: $httpParamSerializerJQLike({
                //     "user":{
                //     "email":"wahxxx@gmail.com",
                //     "password":"123456"
                //     }
                // }),
                // headers:
                //     'Content-Type': 'application/x-www-form-urlencoded'
                // })
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

                    case 'Logout':
                            window.location.href = '../logout.php?at=' + $scope.at;
                            break;
                    
                    default:
                        break;
                }
                        
            }  
            $scope.goBack = function(){
                        window.history.back();
            }            
            
            
        });

        

    
    $(document).ready(function(){
            $.ajax({
                url: "data.php",
                method: "GET",
                dataType: 'json',
                data: { id: "<?php echo $_GET['id']; ?>"} ,
                success: function(data) {
                    console.log(data);
                    var bloodp = [];
                    var bloodpd = [];
                    var respi = [];
                    var temp = [];
                    var pulse = [];
                    var date = [];
                    for(var i in data) {
                        bloodp.push(data[i].BP);
                        bloodpd.push(data[i].BPD);
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
                                backgroundColor: 'rgba(178,34,34,0.10)',
                                borderColor: 'rgba(167, 12, 12, 0.75)',
                                hoverBackgroundColor: 'rgba(178,34,34, 1)',
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
                                backgroundColor: 'rgba(178,34,34,0.10)',
                                borderColor: 'rgba(178,34,34,1)',
                                hoverBackgroundColor: 'rgba(178,34,34,0.5)',
                                hoverBorderColor: 'rgba(178,34,34,1)',
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
                        backgroundColor: 'rgba(178,34,34,0.10)',
                        data: bloodp,
                        borderColor: 'rgba(178,34,34,1)',
                        borderWidth: 2
                    }, {
                        type: 'bar',
                        label: 'Diastolic',
                        backgroundColor: 'rgba(0,191,255,0.10)',
                        data: bloodpd,
                        borderColor: 'rgba(0,191,255,1)',
                        borderWidth: 2
                    }]
                };
                var chartdata4 = {
                    labels: date,
                    datasets: [{
                        type: 'line',
                        label: 'Respiration Rate',
                        backgroundColor: 'rgba(178,34,34,0.10)',
                        data: respi,
                        borderColor: 'red',
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
        // var link = document.getElementById("link");
        // link.setAttribute("href", url_base64);
    </script>
<?php include 'footer.php'?>