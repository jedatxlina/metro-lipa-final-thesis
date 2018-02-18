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


	<link type="text/css" href="assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">  
	<link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet"> 	
	<link type="text/css" href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 						<!-- FullCalendar -->
	<link type="text/css" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"> 			<!-- jVectorMap -->
	<link type="text/css" href="assets/plugins/switchery/switchery.css" rel="stylesheet">   							<!-- Switchery -->
	<link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
	<link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
	<style>
	.disabled {
	color: #ccc;
    pointer-events:none;
	}
	</style>
	
	<script src="components/angular.min.js"></script>
	<script src="assets/js/mask.js"></script>
	<script src="assets/js/angular-autogrow.js"></script>
	
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

	</div><!-- logo-area -->

	<ul class="nav navbar-nav toolbar pull-right">


        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="ti ti-fullscreen"></i></span></i></a>
        </li>

        <li class="dropdown toolbar-icon-bg hidden-xs">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-email"></i></span><span
			class="badge badge-deeporange">2</span></a>
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
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Frend Pratt</strong> <span class="text-gray">‒ I will start with the ...</span></h4>
									<span class="notification-time">40 mins ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Cynthia Hines</strong> <span class="text-gray">‒ Interior bits are ...</span></h4>
									<span class="notification-time">6 hours ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Robin Horton</strong> <span class="text-gray">‒ Are you even ...</span></h4>
									<span class="notification-time">8 days ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Amanda Torrez</strong> <span class="text-gray">‒ The message is ...</span></h4>
									<span class="notification-time">16 hours ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Khan Farhan</strong> <span class="text-gray">‒ Expected the stuff ...</span></h4>
									<span class="notification-time">2 days ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="http://placehold.it/300&text=Placeholder" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Will Whedon</strong> <span class="text-gray">‒ The movie of this ...</span></h4>
									<span class="notification-time">4 days ago</span>
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
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span><span class="badge badge-deeporange">2</span></a>
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
		<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-gear"></i></span><span class="badge badge-deeporange">2</span></a>
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
                <div class="static-sidebar-wrapper sidebar-graylight">
                    <div class="static-sidebar">
                        <div class="sidebar">
	<div class="widget">
        <div class="widget-body">
            <div class="userinfo">
                <div class="avatar">
                    <img src="http://meconstructionnews.com/wp-content/uploads/2016/05/Admin-logo.png" class="img-responsive img-circle"> 
                </div>
                <div class="info">
                    <span class="username"  ng-if="Administrator">Administrator</span>
					<span class="username"  ng-if="Admission">Admission Staff<br></span>
					<span class="username"  ng-if="Nurse">Nursing Staff<br></span>
					<span class="username"  ng-if="Physician">Physician<br></span>
					<span class="username"  ng-if="Pharmacy">Pharmacy Staff<br></span>
					<span class="username"  ng-if="Billing">Billing Staff<br></span>
					{{ at }}
                </div>
            </div>
        </div>
    </div>
	<div class="widget" id="widget-sidebar">
		<nav role="navigation" class="widget-body">
			<ul class="acc-menu">
				<li class="nav-separator"><span>Explore</span></li>
				<li><a ng-click="getPage('Dashboard')" href="javascript:void(0);"><i class="ti ti-home"></i><span>Dashboard</span></a></li>
				<li><a href="javascript:;"><i class="fa fa-users"></i><span>Patients</span></a>
					<ul class="acc-menu">
						<li><a ng-click="getPage('Emergency')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Emergency</span></a></li>
						<li><a ng-click="getPage('Outpatient')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Outpatient</span></a></li>
						<li><a ng-click="getPage('Inpatient')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Inpatient</span></a></li>
					</ul>
				</li>
				<li><a href="javascript:;"><i class="fa fa-stethoscope"></i><span>Nursing Services</span></a>
					<ul class="acc-menu">
						<li><a ng-click="getPage('Confined')" href="javascript:void(0);"<i class="fa fa-medkit"></i><span>&emsp;Confined Patients</span></a></li>
					</ul>
				</li>
				<li><a ng-click="getPage('Physician')" href="javascript:void(0);"><i class="fa fa-user-md"></i><span>Physician Services</span></a></li>
				<li><a  href="javascript:void(0);"><i class="fa fa-cubes"></i><span>Pharmacy Department</span></a>
					<ul class="acc-menu">
						<li><a ng-click="getPage('Pharmacy')" href="javascript:void(0);"><i class="fa fa-users"></i><span>&emsp;Patient Services</span></a></li>
						<li><a ng-click="getPage('Pharmaceuticals')" href="javascript:void(0);"><i class="ti ti-support"></i><span>&emsp;Pharmaceuticals</span></a></li>
					</ul>
				</li>
				<li><a href="javascript:;"><i class="fa fa-file-text-o"></i><span>Billing Department</span></a>
					<ul class="acc-menu">
						<li><a ng-click="getPage('Billing')" href="javascript:void(0);"><i class="fa fa-user"></i><span>&emsp;Patients</span></a></li>
						<li><a ng-click="getPage('Cashier')" href="javascript:void(0);"><i class="fa fa-money"></i><span>&emsp;Cashier Service</span></a></li>
					</ul>
				</li>
				<li class="nav-separator"><span>Other Transactions</span></li>
				
				<li><a ng-click="getPage('Accounts')" href="javascript:void(0);"><i class="fa fa-key"></i><span>Accounts</span></a></li>
				<li><a ng-click="getPage('Bed')" href="javascript:void(0);"><i class="fa fa-bed"></i><span>Beds</span></a></li>
				<li><a ng-click="getPage('Specialization')" href="javascript:void(0);"><i class="fa fa-medkit"></i><span>Medical Specializations</span> </a></li>
				<li><a  ng-click="getPage('Laboratory')" href="javascript:void(0);"><i class="fa fa-search"></i><span>Laboratories</span></a></li>
			</ul>
		</nav>
    </div>	
    
</div>
</div>
</div>

<div>
	<div>
		<div>
		