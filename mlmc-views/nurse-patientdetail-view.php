<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="userCtrl">
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

    <link type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">              <!-- Themify Icons -->
    <link type="text/css" href="assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->

    <!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/respond.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->
    
<link type="text/css" href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 						<!-- FullCalendar -->
<link type="text/css" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"> 			<!-- jVectorMap -->
<link type="text/css" href="assets/plugins/switchery/switchery.css" rel="stylesheet">   							<!-- Switchery -->
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
                                        <span class="username">{{User}}</span><br>
                                            {{ at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li class="nav-separator"><span>Explore</span></li>
                                        <li><a href="../qr-scanner/index2.php"><i class="ti ti-home"></i><span>Scan QR</span><span class="badge badge-teal">2</span></a></li>
                                        <li class="nav-separator"><span>Extras</span></li>
                                        <li><a href="app-inbox.html"><i class="ti ti-email"></i><span>Inbox</span><span class="badge badge-danger">3</span></a></li>
                                        <li><a href="extras-calendar.html"><i class="ti ti-calendar	"></i><span>Calendar</span><span class="badge badge-orange">1</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                    
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
                        <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                        <div class="info">{{patient.AdmissionID}}</div>
                    </div>
                    </div><!-- panel -->
                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                        <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> About </a>
                        <a href="#tab-details" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Medical Details</a>
                        <a href="#tab-timeline" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-time"></i>Medical  Activities</a>
                        <a href="#tab-projects" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-view-list-alt"></i> Medical History</a>
                        <a href="#tab-edit" 	role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-pencil"></i> Edit</a>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-9">
                    <div class="tab-content">

                        <div class="tab-pane" id="tab-details">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Details</h2>
                                </div>
                                <div class="panel-body">
                                <div class="about-area">
                                    <h4>Medical Details</h4>
                                        <div class="table-responsive">
                                        <table class="table"  data-ng-repeat="patient in patientdetails">
                                            <tbody>
                                            <tr>
                                                <th>Admission ID</th>
                                                <td>{{patient.AdmissionID}}</td>
                                            </tr>
                                            <tr>
                                                <th>Admission No</th>
                                                <td>{{patient.AdmissionNo}}</td>
                                            </tr>
                                            <tr>
                                                <th>Admisison Date</th>
                                                <td>{{patient.AdmissionDate}}</td>
                                            </tr>
                                            <tr>
                                                <th>Admisison Time</th>
                                                <td>{{patient.AdmissionTime}}</td>
                                            </tr>
                                            <tr>
                                                <th>Admission</th>
                                                <td>{{patient.Admission}}</td>
                                            </tr>
                                            <tr>
                                                <th>Admission Type</th>
                                                <td>{{patient.AdmissionType}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                            </div>
                        </div> <!-- #tab-projects -->

                        <div class="tab-pane" id="tab-projects">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Medical History</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive"  data-ng-repeat="patient in patientdetails">
                                        <table id="patient_table" class="table table-striped table-bordered" cellspacing="0" width="80%">
                                            <thead>
                                            <tr>
                                                <th>Patients Name</th>
                                                <th>Admission ID</th>
                                                <th>Admission Date</th>
                                                <th>Admission Time</th>
                                                <th>Bed ID</th>
                                                <th>Medical ID</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr ng-repeat="" ng-class="{'selected': patient.AdmissionID == selectedRow}" ng-click="setClickedRow(patient.AdmissionID)">
                                                    <td>{{patient.Lname}}, {{patient.Fname}} {{patient.Mname}}</td>
                                                    <td>{{patient.AdmissionID}}</td>
                                                    <td>{{patient.AdmissionDate}}</td>
                                                    <td>{{patient.AdmissionTime}}</td>
                                                    <td>{{patient.BedID}}</td>
                                                    <td>{{patient.MedicalID}}</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive -->
                                </div> <!-- /.panel-body -->
                            </div>
                        </div> <!-- #tab-projects -->

                        <div class="tab-pane active" id="tab-about">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2>Profile</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <h4>Medical Information</h4>
                                            <div class="table-responsive">
                                            <table class="table"  data-ng-repeat="patient in patientdetails">
                                                <tbody>
                                                <tr>
                                                    <th>Admission ID</th>
                                                    <td>{{patient.AdmissionID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission No</th>
                                                    <td>{{patient.AdmissionNo}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admisison Date</th>
                                                    <td>{{patient.AdmissionDate}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admisison Time</th>
                                                    <td>{{patient.AdmissionTime}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission</th>
                                                    <td>{{patient.Admission}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission Type</th>
                                                    <td>{{patient.AdmissionType}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                    <div class="about-area">
                                        <h4>Personal Information</h4>
                                            <div class="table-responsive">
                                            <table class="table about-table"  data-ng-repeat="patient in patientdetails">
                                                <tbody>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td>{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</td>
                                                    <th>Age</th>
                                                    <td>{{patient.Age}}</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th>Birth Date</th>
                                                    <td>{{patient.Birthdate}}</td>
                                                    <th>Civil Status</th>
                                                    <td>{{patient.CivilStatus}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>{{patient.Gender}}</td>
                                                    <th>Contact</th>
                                                    <td>{{patient.Contact}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Province</th>
                                                    <td>{{patient.Province}}</td>
                                                    <th>Occupation</th>
                                                    <td>{{patient.Occupation}}</td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>{{patient.City}}</td>
                                                    <th>Religion</th>
                                                    <td>{{patient.Religion}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{patient.CompleteAddress}}</td>
                                                    <th>Citizenship</th>
                                                    <td>Citizenship</td>
                                                </tr>
                                           
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-timeline">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h2>Activity Timeline</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="timeline">
                                                <li class="timeline-primary">
                                                    <div class="timeline-icon"><i class="ti ti-pencil"></i></div>
                                                    <div class="timeline-body">
                                                        <div class="timeline-header">
                                                            <span class="author">Posted by <a href="#">David Tennant</a></span>
                                                            <span class="date">Monday, November 21, 2013</span>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h4>Consectetur Adipisicing Elit</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, officiis, molestiae, deserunt asperiores architecto ut vel repudiandae dolore inventore nesciunt necessitatibus doloribus ratione facere consectetur suscipit!</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-info">
                                                    <div class="timeline-icon"><i class="ti ti-heart"></i></div>
                                                    <div class="timeline-body">
                                                        <div class="timeline-header">
                                                            <span class="author">Posted by <a href="#">David Tennant</a></span>
                                                            <span class="date">Monday, November 21, 2013</span>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h4>Consectetur Adipisicing Elit</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, officiis, molestiae, deserunt asperiores architecto ut vel repudiandae dolore inventore nesciunt necessitatibus doloribus ratione facere consectetur suscipit!</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-warning">
                                                    <div class="timeline-icon"><i class="ti ti-camera"></i></div>
                                                    <div class="timeline-body">
                                                        <div class="timeline-header">
                                                            <span class="author">Posted by <a href="#">David Tennant</a></span>
                                                            <span class="date">Monday, November 21, 2013</span>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h4>Consectetur Adipisicing Elit</h4>
                                                            <ul class="list-inline">
                                                                <li><img src="http://placehold.it/300&text=Placeholder" alt="" class="pull-left img-thumbnail img-responsive clearfix" width="200"></li>
                                                                <li><img src="http://placehold.it/300&text=Placeholder" alt="" class="pull-left img-thumbnail img-responsive clearfix" width="200"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-danger">
                                                    <div class="timeline-icon"><i class="ti ti-home"></i></div>
                                                    <div class="timeline-body">
                                                        <div class="timeline-header">
                                                            <span class="author">Posted by <a href="#">David Tennant</a></span>
                                                            <span class="date">Monday, November 21, 2013</span>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h4>Consectetur Adipisicing Elit</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, officiis, molestiae, deserunt asperiores architecto ut vel repudiandae dolore inventore nesciunt necessitatibus doloribus ratione facere consectetur suscipit!</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-edit" data-ng-repeat="patient in patientdetails">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h2>Edit</h2>
                                </div>
                                <div class="panel-body">
                                <div class="about-area">
                                    <form class="grid-form">
                                        <h4>Medical Information</h4>
                                            <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Admission ID</th>
                                                    <td>{{patient.AdmissionID}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission No</th>
                                                    <td>{{patient.AdmissionNo}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admisison Date</th>
                                                    <td>{{patient.AdmissionDate}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admisison Time</th>
                                                    <td>{{patient.AdmissionTime}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission</th>
                                                    <td>{{patient.Admission}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission Type</th>
                                                    <td>{{patient.AdmissionType}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="about-area">
                                        <h4>Personal Information</h4>
                                            <div class="table-responsive">
                                                <div class="col-lg-11">
                                                <table class="table about-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Last name</th>
                                                        <td><input type="text" class="form-control"  ng-model="patient.Lastname" ></td>
                                                        <th>Address</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.CompleteAddress"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>First name</th>
                                                        <td><input type="text" class="form-control"  ng-model="patient.Firstname"></td>
                                                        <th>Age</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Age"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Middle name</th>
                                                        <td><input type="text" class="form-control"  ng-model="patient.Middlename"></td>
                                                        <th>Civil Status</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.CivilStatus"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birth Date</th>
                                                        <td><input type="text" class="form-control"  ng-model="patient.Birthdate"></td>
                                                        <th>Contact</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Contact"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Gender"></td>
                                                        <th>Occupation</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Occupation"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Province</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Province"></td>
                                                        <th>Religion</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Religion"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.City"></td>
                                                        <th>Citizenship</th>
                                                        <td><input type="text" class="form-control" ng-model="patient.Citizenship"></td>
                                                    </tr>
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12 pull-right">
                                            <button class="btn-primary btn" ng-click="saveDetails(patient)">Save</button>
                                            <button class="btn-default btn" ng-click="resetDetails(oldpatient)">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .tab-content -->
                </div><!-- col-sm-8 -->
            </div>
        </div>
    </div>

<script>
    var fetch = angular.module('myApp', ['ui.mask']);
       
       fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {
           $scope.at = "<?php echo $_GET['at'];?>";
           $scope.id = "<?php echo $_GET['id'];?>";
           $scope.selectedRow = null;
           $scope.selectedStatus = null;
           $scope.clickedRow = 0;
           $scope.new = {};
       
               switch ($scope.at.charAt(0)) {
                   case '1':
                       $scope.Administrator = true;
                       break;
                           
                   case '2':
                       $scope.Admission = true;
                       break;
                           
                   case '3':
                       $scope.Nurse = true;
                       break;
                           
                   case '4':
                       $scope.Physician = true;
                       break;
                           
                   case '5':
                       $scope.Pharmacy = true;
                       break;
       
                   case '6':
                       $scope.Billing = true;
                       break;
                       
                       default:
                       break;
               }    
    
            $http({
            method: 'GET',
            url: '../getData/get-patient-details.php',
            params: {id: $scope.id}
            }).then(function(response) {
                $scope.patientdetails = response.data;
            });

            // $http({
            // method: 'GET',
            // url: 'getData/get-patient-details.php',
            // params: {id: $scope.id}
            // }).then(function(response) {
            //     $scope.editpatientdetails = response.data;
            // });

           $scope.setClickedRow = function(lab) {
               $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
               $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
           }
           
           $scope.saveDetails = function(patient){
                $http({
                method: 'GET',
                url: 'updateData/update-patient-medical-details.php',
                params: {id: $scope.id,
                        Lastname: patient.Lastname,
                        Firstname: patient.Firstname,
                        Middlename: patient.Middlename,
                        Birthdate: patient.Birthdate,
                        Gender: patient.Gender,
                        Province: patient.Province,
                        City: patient.City,
                        Address: patient.CompleteAddress,
                        Age: patient.Age,
                        CivilStatus: patient.CivilStatus,
                        Contact: patient.Contact,
                        Occupation: patient.Occupation,
                        Religion: patient.Religion,
                        Citizenship: patient.Citizenship}
                }).then(function(response) {
                    window.location.href = 'view-patient-data.php?at=' + $scope.at + '&id=' + $scope.id;
                });
           }

        //    $scope.resetDetails = function(oldpatient){
             
        //    }

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

           $scope.viewQRcode = function(){
            $('#qrModal').modal('show');
            }

            // $scope.viewQRcode = function(){
            // $('#qrModal').modal('show');
            // }

           $scope.goBack = function(){
                        window.history.back();
            }

       }]);
</script>

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