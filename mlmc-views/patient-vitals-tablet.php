<!DOCTYPE html>							
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Metro Lipa Patient Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="description" content="Avenxo Admin Theme">
        <meta name="author" content="KaijuThemes">
        <link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>
        <link type="text/css" href="../assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link type="text/css" href="../assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">
        <!-- Themify Icons -->
        <link type="text/css" href="../assets/css/styles.css" rel="stylesheet">
        <!-- Core CSS with all styles -->
        <link type="text/css" href="../assets/plugins/codeprettifier/prettify.css" rel="stylesheet">
        <!-- Code Prettifier -->
        <link type="text/css" href="../assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
        <!-- iCheck -->
        <link type="text/css" href="../assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
        <link type="text/css" href="../assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
        <link type="text/css" href="../assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <!-- FullCalendar -->
        <link type="text/css" href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
        <!-- jVectorMap -->
        <link type="text/css" href="../assets/plugins/switchery/switchery.css" rel="stylesheet">
        <!-- Switchery -->
        <link type="text/css" href="../assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
        <link type="text/css" href="../assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
        <style>
            .disabled {
            color: #ccc;
            pointer-events:none;
            }
        </style>
        <script src="../components/angular.min.js"></script>
        <script src="../assets/js/mask.js"></script>
        <script src="../assets/js/angular-autogrow.js"></script>
    </head>
    <body class="animated-content">
        <?php
            $at = $_GET['at'];
            $id = $at[0];
        ?>
        <header id="topnav" class="navbar navbar-red navbar-fixed-top" role="banner">
            <div class="logo-area">
                <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
                <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                <span class="icon-bg">
                <i class="ti ti-menu"></i>
                </span>
                </a>
                </span>
                <a class="navbar-brand" href="#">Metro Lipa Patient Management System</a>
            </div>
            <!-- logo-area -->
            <ul class="nav navbar-nav toolbar pull-right">
                <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
                    <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="ti ti-fullscreen"></i></span></i></a>
                </li>
                <li class="dropdown toolbar-icon-bg hidden-xs">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-email"></i></span></a>
                    <div class="dropdown-menu notifications arrow">
                        <div class="topnav-dropdown-header">
                            <span>Messages</span>
                        </div>
                        <div class="scroll-pane">
                            <ul class="media-list scroll-content">
                                <li class="media notification-message">
                                    <a href="#">
                                        <div class="media-left">
                                            <img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading"><strong>Vincent Keller</strong> <span class="text-gray">‒ Design should be ...</span></h4>
                                            <span class="notification-time">2 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">See all messages</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown toolbar-icon-bg">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span></a>
                    <div class="dropdown-menu notifications arrow">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="scroll-pane">
                            <ul class="media-list scroll-content">
                                <li class="media notification-success">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.4 successfully pushed</h4>
                                            <span class="notification-time">8 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-info">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.3 successfully pushed</h4>
                                            <span class="notification-time">24 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-teal">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.2 successfully pushed</h4>
                                            <span class="notification-time">16 hours ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-indigo">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.1 successfully pushed</h4>
                                            <span class="notification-time">2 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-danger">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-arrow-up"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Initial Release 1.0</h4>
                                            <span class="notification-time">4 days ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">See all notifications</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown toolbar-icon-bg">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-gear"></i></span></a>
                    <ul class="dropdown-menu userinfo arrow">
                        <li><a href="#" ng-click="viewProfile()"><i class="ti ti-user"></i><span>Profile</span></a></li>
                        <li><a href="#/"><i class="ti ti-settings"></i><span>Settings</span></a></li>
                        <li class="divider"></li>
                        <li><a href="../index.php"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
                    </ul>
                </li>
            </ul>
        </header>
        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-default">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="userinfo">
                                        <div class="avatar">
                                            <img src="http://placehold.it/300&text=Placeholder" class="img-responsive img-circle"> 
                                        </div>
                                        <div class="info">
                                            <span class="username">Jonathan Smith</span>
                                            <span class="useremail">jon@avenxo.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li class="nav-separator"><span>Explore</span></li>
                                        <li><a href="../qr-scanner/index2.php"><i class="ti ti-home"></i><span>Scan QR</span><span class="badge badge-teal"></span></a></li>
                                        <li class="nav-separator"><span>Extras</span></li>
                                        <li><a href="app-inbox.html"><i class="ti ti-email"></i><span>Inbox</span><span class="badge badge-danger"></span></a></li>
                                        <li><a href="extras-calendar.html"><i class="ti ti-calendar	"></i><span>Calendar</span><span class="badge badge-orange"></span></a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="widget" id="widget-progress">
                                <div class="widget-heading">
                                    Progress
                                </div>
                                <div class="widget-body">
                                    <div class="mini-progressbar">
                                        <div class="clearfix mb-sm">
                                            <div class="pull-left">Bandwidth</div>
                                            <div class="pull-right">50%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <div class="mini-progressbar">
                                        <div class="clearfix mb-sm">
                                            <div class="pull-left">Storage</div>
                                            <div class="pull-right">25%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" style="width: 25%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                    <div class="container-fluid" data-ng-repeat="patient in patientdetails">
                    <br>
                    <br>
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
                    <script type="text/javascript" src="../assets/js/Chart.bundle.js"></script>
                    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
                    <script type="text/javascript" src="../assets/js/utils.js"></script>
                <script>
                        var data = angular.module('myApp', []);
                        data.controller("userCtrl", function($scope, $window, $http) {  
                            $scope.at = "<?php echo $_GET['at'];?>";
                            $scope.admissionid = "<?php echo $_GET['result']; ?>"
                            $http({
                            method: 'GET',
                            url: '../getData/get-patient-details.php',
                            params: {id: "2017441375"}
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
                            data: { id: "<?php echo $_GET['result']; ?>"} ,
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
                                    data: bloodpd
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
                            </script>		
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="assets/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script type="text/javascript" src="assets/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script type="text/javascript" src="assets/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script type="text/javascript" src="assets/plugins/velocityjs/velocity.ui.min.js"></script>

<script type="text/javascript" src="assets/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script type="text/javascript" src="assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="assets/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="assets/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

<script type="text/javascript" src="assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script type="text/javascript" src="assets/js/application.js"></script>
<script type="text/javascript" src="assets/demo/demo.js"></script>
<script type="text/javascript" src="assets/demo/demo-switcher.js"></script>

<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->

<script type="text/javascript" src="assets/plugins/form-daterangepicker/moment.min.js"></script>              			<!-- Moment.js for Date Range Picker -->

<script type="text/javascript" src="assets/plugins/form-colorpicker/js/bootstrap-colorpicker.min.js"></script> 			<!-- Color Picker -->

<script type="text/javascript" src="assets/plugins/form-daterangepicker/daterangepicker.js"></script>     				<!-- Date Range Picker -->
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>      			<!-- Datepicker -->
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>      			<!-- Timepicker -->
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> <!-- DateTime Picker -->


<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>     								<!-- Clockface -->


<script type="text/javascript" src="assets/demo/demo-pickers.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/demo/demo-datatables.js"></script>    
<!-- Charts -->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.min.js"></script>             	<!-- Flot Main File -->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.pie.min.js"></script>             <!-- Flot Pie Chart Plugin -->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.stack.min.js"></script>       	<!-- Flot Stacked Charts Plugin -->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.orderBars.min.js"></script>   	<!-- Flot Ordered Bars Plugin-->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.resize.min.js"></script>          <!-- Flot Responsive -->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.tooltip.min.js"></script> 		<!-- Flot Tooltips -->
<script type="text/javascript" src="assets/plugins/charts-flot/jquery.flot.spline.js"></script> 				<!-- Flot Curved Lines -->

<script type="text/javascript" src="assets/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script type="text/javascript" src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>       <!-- jVectorMap -->
<script type="text/javascript" src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>   <!-- jVectorMap -->

<script type="text/javascript" src="assets/plugins/switchery/switchery.js"></script>     					<!-- Switchery -->
<script type="text/javascript" src="assets/plugins/easypiechart/jquery.easypiechart.js"></script>

<script type="text/javascript" src="assets/plugins/fullcalendar/moment.min.js"></script> 		 			<!-- Moment.js Dependency -->
<script type="text/javascript" src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>   			<!-- Calendar Plugin -->

							

<script type="text/javascript" src="assets/plugins/form-multiselect/js/jquery.multi-select.min.js"></script>  			<!-- Multiselect Plugin -->
<script type="text/javascript" src="assets/plugins/quicksearch/jquery.quicksearch.min.js"></script>           			<!-- Quicksearch to go with Multisearch Plugin -->
<script type="text/javascript" src="assets/plugins/form-typeahead/typeahead.bundle.min.js"></script>                 	<!-- Typeahead for Autocomplete -->
<script type="text/javascript" src="assets/plugins/form-select2/select2.min.js"></script>                     			<!-- Advanced Select Boxes -->
<script type="text/javascript" src="assets/plugins/form-autosize/jquery.autosize-min.js"></script>            			<!-- Autogrow Text Area -->
<script type="text/javascript" src="assets/plugins/form-colorpicker/js/bootstrap-colorpicker.min.js"></script> 			<!-- Color Picker -->

<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>      <!-- Touchspin -->

<script type="text/javascript" src="assets/plugins/form-fseditor/jquery.fseditor-min.js"></script>            			<!-- Fullscreen Editor -->
<script type="text/javascript" src="assets/plugins/form-jasnyupload/fileinput.min.js"></script>               			<!-- File Input -->
<script type="text/javascript" src="assets/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>     		<!-- Tokenfield -->

<script type="text/javascript" src="assets/plugins/card/lib/js/card.js"></script> 										<!-- Card -->


<script type="text/javascript" src="assets/plugins/jquery-chained/jquery.chained.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="assets/demo/demo-formcomponents.js"></script>



    <!-- End loading page level scripts-->

    </body>
</html>
    </body>
</html>