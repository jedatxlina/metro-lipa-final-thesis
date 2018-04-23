<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="userCtrl">
<?php session_start(); 
?>
<head>
    <meta charset="utf-8">

    <link rel="shortcut icon" href="../mlmc-site/img/Metrolipa/header-logo.png" />
    <title>Metro Lipa Patient Management System</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="KaijuThemes">
    
    <link type='text/css' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

    <link type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link type="text/css" href="assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">
    <!-- Themify Icons -->
    <link type="text/css" href="assets/css/styles.css" rel="stylesheet">
    <!-- Core CSS with all styles -->

    <link type="text/css" href="assets/plugins/codeprettifier/prettify.css" rel="stylesheet">
    <!-- Code Prettifier -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <!-- iCheck -->

    <link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">

    <link type="text/css" href="assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">


    <!-- FullCalendar -->
    <link type="text/css" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link type="text/css" href="assets/plugins/switchery/switchery.css" rel="stylesheet">
    <!-- Switchery -->
    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    

    <style>
        .disabled {
        	color: #ccc;
            pointer-events:none;
        	}
    </style>
    
    <script src="components/angular.min.js"></script>
    <script src="assets/js/mask.js"></script>
    <script src="assets/js/angular-autogrow.js"></script>
    <script src="assets/sweetalert.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
</head>

<body class="animated-content">
    <?php
	$at = $_GET['at'];
 	$id = $at[0];
	?>
        <header id="topnav" class="navbar navbar-graylight navbar-fixed-top" role="banner">

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
              

                <li class="dropdown toolbar-icon-bg">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-gear"></i></span></a>
                    <ul class="dropdown-menu userinfo arrow">
                        <li><a href="#" ng-click="viewProfile()"><i class="ti ti-user"></i><span>Profile</span></a></li>
                        <li class="divider"></li>
                        <li><a ng-click="getPage('Logout')" href="javascript:void(0);"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
                    </ul>
                </li>

            </ul>

        </header>
        
        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-graylight">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="userinfo">
                                        <div class="avatar" ng-repeat="user in userdetails">
                                            <div ng-if="user.pathPhoto != ''">
                                                <img src="{{user.pathPhoto}}" class="img-responsive img-circle" >
                                            </div>
                                            <div ng-if="user.pathPhoto == ''">
                                                <img src="assets/img/defaultphoto.png" class="img-responsive img-circle">
                                            </div>
                                        </div>
                                        <div class="info"  ng-repeat="user in userdetails">
                                            <span class="username">{{User}}</span><br>
                                            <span class="text-default" style="color: white;">{{user.Firstname}} {{user.Middlename}} {{user.Lastname}}</span>
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $activeMenu = isset($activeMenu) ? $activeMenu : ''; ?>
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li class="nav-separator"><span>Explore</span></li>
										<li ><a ng-click="getPage('Dashboard')" href="javascript:void(0);"><i class="ti ti-home"></i><span>Dashboard</span></a></li>
										<li  <?php if ($id!=1 && $id!=2 && $id !=7){?>style="display:none"<?php } ?>><a href="javascript:;"><i class="fa fa-users"></i><span>Patients</span></a>
											<ul class="acc-menu"  <?php if ($activeMenu =="patients") {?> style="display:block;" class="active" <?php } ?> >
												<li <?php if ($id == 7){?>style="display:none"<?php } ?>><a ng-click="getPage('Emergency')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Emergency</span></a></li>
												<li><a ng-click="getPage('Outpatient')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Outpatient</span></a></li>
												<li <?php if ($id == 7){?>style="display:none"<?php } ?>><a ng-click="getPage('Inpatient')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Inpatient</span></a></li>
											</ul>
										</li>
										<li     <?php if ($id!=1 && $id!=3){?>style="display:none"<?php } ?>><a href="javascript:;"><i class="fa fa-stethoscope"></i><span>Nursing Services</span></a>
                                            <ul class="acc-menu" <?php if ($activeMenu =="nurse") {?> style="display:block;" class="active" <?php } ?> >
											<li><a ng-click="getPage('Confined')" href="javascript:void(0);"><i class="fa fa-medkit"></i><span>&emsp;Confined Patients</span></a></li>
											<li <?php if ($id!=1 && $id!=3){?>style="display:none"<?php } ?>><a ng-click="getPage('Bed')" href="javascript:void(0);"><i class="fa fa-bed"></i><span>&emsp;Beds</span></a></li>
                                            </ul>
                                        </li>
										<li <?php if ($activeMenu =="physician") {?> style="display:block;" class="active" <?php } ?>   <?php if ($id!=1 && $id!=4){?>style="display:none"<?php } ?>><a ng-click="getPage('Physician')" href="javascript:void(0);"><i class="fa fa-user-md"></i><span>Physician Services</span></a></li>
										<li <?php if ($id!=1 && $id!=5){?>style="display:none"<?php } ?>><a  href="javascript:void(0);"><i class="fa fa-cubes"></i><span>Pharmacy Department</span></a>
                                            <ul class="acc-menu" <?php if ($activeMenu =="pharmacy") {?> style="display:block;" class="active" <?php } ?> >
											<li><a ng-click="getPage('Pharmacy')" href="javascript:void(0);"><i class="fa fa-users"></i><span>&emsp;Medicine Requests</span></a></li>
											<li><a ng-click="getPage('Pharmaceuticals')" href="javascript:void(0);"><i class="ti ti-support"></i><span>&emsp;Medicines & Supplies</span></a></li>
                                            </ul>
                                        </li>
										<li    <?php if ($id!=1 && $id!=6){?>style="display:none"<?php } ?>><a href="javascript:;"><i class="fa fa-file-text-o"></i><span>Billing Department</span></a>
											<ul class="acc-menu"  <?php if ($activeMenu =="billing") {?> style="display:block;" class="active" <?php } ?>>
												<li><a ng-click="getPage('Billing')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Patients</span></a></li>
											</ul>
										</li>
                                        <li <?php if ($activeMenu =="laboratory") {?> style="display:block;" class="active" <?php } ?>   <?php if ($id!=1 && $id!=8){?>style="display:none"<?php } ?>><a ng-click="getPage('LaboratoryDept')" href="javascript:void(0);"><i class="fa fa-flask"></i></i><span>Laboratory Department</span></a></li>
                                        <li class="nav-separator"><span>Extras</span></li>
                                        <li <?php if ($activeMenu =="accounts") {?> style="display:block;" class="active" <?php } ?>        <?php if ($id!=1){?>style="display:none"
                                            <?php } ?>><a ng-click="getPage('Accounts')" href="javascript:void(0);"><i class="fa fa-key"></i><span>Accounts</span></a></li>
                                        <li <?php if ($activeMenu =="ListOfDoctors") {?> style="display:block;" class="active" <?php } ?>         <?php if ($id!=1){?>style="display:none"
                                            <?php } ?>><a ng-click="getPage('Specialization')" href="javascript:void(0);"><i class="fa fa-medkit"></i><span>List of Doctors</span> </a></li>
                                        <li <?php if ($activeMenu =="laboratories") {?> style="display:block;" class="active" <?php } ?>       <?php if ($id!=1){?>style="display:none"
                                            <?php } ?>><a ng-click="getPage('Laboratory')" href="javascript:void(0);"><i class="fa fa-plus-square-o"></i><span>Ancillary Services</span></a></li>
                                        <li <?php if ($activeMenu =="others") {?> style="display:block;" class="active" <?php } ?>       <?php if ($id!=1){?>style="display:none"
                                            <?php } ?>><a ng-click="getPage('Others')" href="javascript:void(0);"><i class="fa fa-gears"></i><span>Others</span></a></li>
                                    </ul>

                                    <?php $activePage = "patient"; ?>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                      