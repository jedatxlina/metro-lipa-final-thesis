<?php include 'admin-header.php'?>

<?php 
            $id=$_GET['id'];
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "metro_lipa_db"; 
            
            $conn = mysqli_connect($host, $user, $password,$dbname);
            
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            } 
            ?>
<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 	
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css"/>
<style>
    .selected {
    color: #800000;
    background-color: #F5F5F5;
    font-weight: bold;
    }
</style>

<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li> <a href="#">Patient</a>
    </li>
    <li class="active"> <a href="#">Details</a>
    </li>
</ol>
<br>
  <div class="clearfix">
        <div class="pull-left">
           &emsp;<button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        </div>
    </div>
<br>
<div class="container-fluid" ng-init="LoadSupplyAdd()">
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-profile">   
                    <div class="panel-body"  data-ng-repeat="patient in patientdetails">
                        <img ng-src="{{patient.QRpath}}">
                        <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                        <div class="info">{{patient.AdmissionID}}</div>  
                        <br>
                        <a ng-click="printQR()" ng-if="chckval != 7"><i class="ti ti-printer"></i>&nbsp; Print QR Code</a>
                    </div>
                    <center>
                 
                </div><!-- panel -->
                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                    <a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> About </a>
                    <a href="#tab-details" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Add Patient Vitals</a>
                    <a href="#tab-supplies" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Supplies Used</a>
                    <a href="#tab-projects" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-view-list-alt"></i> Medical History</a>
                    <a href="#tab-edit" 	role="tab" data-toggle="tab" clata-toggle="tab" class="list-group-item" ng-if="chckval != 1"> <i class="ti ti-pencil"></i> Edit</a>
                </div>
            </div><!-- col-sm-3 -->
            <div class="col-sm-9">
                <div class="tab-content">

                    <div class="tab-pane" id="tab-details">
                    <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Vitals Sheet</h3>
            </div>
        </div>
        <div class="col-lg-15">
                    <div class="panel panel-default">
                    
                <form action="javascript:void(0)">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Patient ID</label>
                                    <input type="text" placeholder="" class="form-control" ng-model="id" disabled>
                                </div>
                                <div class="form-group" ng-repeat='patient in patientdetails'>
                                    <label>Patient Name</label>
                                    <input type="text" placeholder="Juan" class="form-control" ng-value="patient.Firstname + ' ' + patient.Middlename + ' ' + patient.Lastname" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-body">
                                <form class="grid-form" action="javascript:void(0)">
                                <fieldset>
                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>BP</label>
                                                    <input type="text" ng-model="bp" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with /">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Pulse Rate</label>
                                                    <input type="text" ng-model="pr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Respiratory Rate</label>
                                                    <input type="text" class="form-control" ng-model="rr" ui-mask="99"  ui-mask-placeholder ui-mask-placeholder-char="-  "/>
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Temperature</label>
                                                    <input type="text" class="form-control" ng-model="temp">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                    <div class="col-lg-4">
                        <input type="button" class="btn btn-default" value="Cancel" onclick="goBack()">
                        <button ng-click='AddVitals()' class="btn btn-primary">Confirm</button>
                        <br>&emsp;
                    </div>
                    <br>&emsp;&emsp;&emsp;
                </form>
            </div>
        </div>
                    </div> <!-- #tab-projects -->
                    <div class="tab-pane" id="tab-supplies" onload>
                    <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Supplies Used</h3>
            </div>
        </div>
        <div class="col-lg-15">
                    <div class="panel panel-default">
                    
                <form action="javascript:void(0)">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Patient ID</label>
                                    <input type="text" placeholder="" class="form-control" ng-model="id" disabled>
                                </div>
                                <div class="form-group" ng-repeat='patient in patientdetails'>
                                    <label>Patient Name</label>
                                    <input type="text" placeholder="Juan" class="form-control" ng-value="patient.Firstname + ' ' + patient.Middlename + ' ' + patient.Lastname" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-body">
                                <form class="grid-form" action="javascript:void(0)">
                                <fieldset>
                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                        <legend>Supplies Used</legend>
                                            <div data-row-span="2">
                                                <div data-field-span="1">
                                                    
                                                    <label>Supplies</label>
                                                    <select id="supplies" class="select2" multiple="multiple" style="width:550px;">
                                                        <optgroup label="List of Supplies">
                                                            <option ng-repeat="supp in supplies" value="{{supp.SuppliesName}}">{{supp.SuppliesName}}</option>
                                                        </optgroup>
                                                        <option ng-value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                    <div class="col-lg-4">
                        <input type="button" class="btn btn-default" value="Cancel" onclick="goBack()">
                        <button ng-click='AddSupplies()' class="btn btn-primary">Confirm</button>
                        <br>&emsp;
                    </div>
                    <br>&emsp;&emsp;&emsp;
                </form>
            </div>
        </div>
                    </div> <!-- #tab-projects -->

                    <div class="tab-pane" id="tab-projects">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h2>Medical History</h2><a ng-click="viewMedicationReport()" class="pull-right"><i class="ti ti-printer"></i></a>
                                    <div class="panel-ctrls"></div>
                                </div>
                                    <div class="panel-body">
                                        <div class="table-responsive"  data-ng-repeat="patient in patientdetails">
                                            <table id="medhistory_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Admission ID</th>
                                                    <th>Admission Date</th>
                                                    <th>Admission Time</th>
                                                    <th>Medical ID</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="history in patienthistory" ng-class="{'selected': history.ArchiveID == selectedRow}" ng-click="setClickedRow(history.ArchiveID)">
                                                    <td>{{history.Firstname}} {{history.Middlename}} {{history.Lastname}}</td>
                                                    <td>{{history.ArchiveID}}</td>
                                                    <td>{{history.AdmissionDate}}</td>
                                                    <td>{{history.AdmissionTime}}</td>
                                                     <td>{{history.MedicalID}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                </div>
                            </div>       
                       <!-- <div class="panel panel-default">
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
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="tab-pane active" id="tab-about">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2>Personal Information</h2>
                            </div>
                            <div class="panel-body">
                                
                                <div class="about-area">
                                        <div class="grid-form">
                                            <div class="row">
                                            <fieldset data-ng-repeat="patient in patientdetails">
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Patient Name</label>
                                                            <input type="text" class="form-control" ng-value="patient.Firstname + ' ' + patient.Middlename + ' ' + patient.Lastname" disabled="disabled">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Age</label>
                                                            <input type="text" ng-model="patient.Age" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Gender</label>
                                                            <input type="text" ng-model="patient.Gender" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Birthdate</label>
                                                            <input type="text" ng-model="patient.Birthdate" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Civil Status</label>
                                                            <input type="text" ng-model="patient.CivilStatus" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Contact</label>
                                                            <input type="text" ng-model="patient.Contact" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Province</label>
                                                            <input type="text" ng-model="patient.Province" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>City</label>
                                                            <input type="text" ng-model="patient.City" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Complete Address</label>
                                                            <input type="text" ng-model="patient.CompleteAddress" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Citizenship</label>
                                                            <input type="text" ng-model="patient.Citizenship" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                            </fieldset>
                                        </div>
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
                                                    <th>Citizenship</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.Citizenship"></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td><input type="text" class="form-control" ng-model="patient.City"></td>
                                               
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
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
            <div class="panel panel-danger" data-widget='{"draggable": "false"}'>
            <div class="panel-heading">
                <h2>Add Supply Used</h2>
                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
            </div>
            <div class="panel-body" style="height: auto; width: auto">
            <table class="table table-striped table-bordered" style="width: auto">
            <tr>
            <th>Supply Name</th>
            <th> Quantity Used</th>
            </tr>
            <tr ng-repeat="supp in supplies track by $index">
            <td>
            <div class="form-group">       
                     <input type="text" ng-value="supp" class="form-control" disabled>
                  </div>
            </td>
            <td>
            <div class="form-group">       
                     <input type="text" ng-model="qty[$index]" class="form-control" >
                  </div>
            </td>
            </tr>
            </table>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button ng-click='AddSupplies2()' class="btn btn-primary">Confirm</button>
                     </div>
                     </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    
</div>

<script>

$('.select2').select2({ placeholder : '' });
$('.select2-remote').select2({ data: [{id:'A', text:'A'}]});
$('button[data-select2-open]').click(function(){
$('#' + $(this).data('select2-open')).select2('open');
});

var fetch = angular.module('myApp', ['ui.mask']);
   
   fetch.controller('userCtrl', ['$scope', '$http','$window', function($scope, $http,$window) {
       $scope.at = "<?php echo $_GET['at'];?>";
       $scope.id = "<?php echo $_GET['id'];?>";
       $scope.chckval = $scope.at.charAt(0);
       $scope.selectedRow = null;
       $scope.selectedStatus = null;
       $scope.qty=[];
       $scope.supname=[];
       $scope.trol=[];
       $scope.clickedRow = 0;
       $scope.new = {};
       $scope.vitalsid =     "<?php echo rand(111111, 999999);?>"; 
       $scope.parsedbp = [];
                $scope.admissionid = "<?php echo $id; ?>"
            $scope.AddVitals = function() {
                $scope.parsedbp =  $scope.bp.split('/');
                $http({
                                method: 'GET',
                                url: 'insertData/patient-vitals-exec.php',
                                params: {
                                        admissionid: $scope.id,
                                        taker: $scope.at,
                                        vitalsid: $scope.vitalsid,
                                        bp: JSON.stringify($scope.parsedbp),
                                        pr: $scope.pr,
                                        rr: $scope.rr,
                                        temp: $scope.temp}   
                    }).then(function(response){
                        window.location.href = 'nurse-patient.php?at=<?php echo $_GET['at'] ?>';
                    });
                };
        
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
        
       $scope.AddSupplies = function(){
                                    $scope.supplies =$("#supplies").val();
                                    $('#myModal').modal('show');
        }
        $scope.AddSupplies2 = function(){
                                    for(var i = 0; i < $scope.supplies.length; i++)
                                    {
                                        $http({
                                            method: 'GET',
                                            url: 'insertData/insert-used-supply.php',
                                            params: {id: $scope.id,
                                                supplyname: $scope.supplies[i],
                                                qty: $scope.qty[i]}
                                        }).then(function(response) {
                                            alert($scope.supplies[i]);
                                            alert($scope.qty[i]);
                                        });
                                    }
                                    window.location.reload();
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

            $http({
                        method: 'GET',
                        url: 'getData/get-supplies-details.php'
                    }).then(function(response) {
                        $scope.supplies = response.data;
                    });

        $http({
            method: 'GET',
            url: 'getData/get-patient-details.php',
            params: {id: $scope.id}
        }).then(function(response) {
            $scope.patientdetails = response.data;
        });

        $http({
            method: 'GET',
            url: 'getData/get-history-details.php',
            params: {id: $scope.id}
        }).then(function(response) {
            $scope.patienthistory = response.data;
            angular.element(document).ready(function() {  
            dTable = $('#medhistory_table')  
            dTable.DataTable();  
            });  
        });

        $http({
        method: 'GET',
        url: 'getData/get-medication-details.php',
        params: {id: $scope.id}
        }).then(function(response) {
            $scope.medications = response.data;
            // angular.element(document).ready(function() {  
            // 			dTable = $('#medications_table')  
            // 			dTable.DataTable();  
            // 			});  
        });
    
       

       $scope.setClickedRow = function(lab) {
           $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
           $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
       }

       $scope.viewMedicationReport = function(){    
       
            $window.open('view-medication-report.php?at='+$scope.at+'&id='+$scope.id, '_blank');
         
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
            
            case 'LaboratoryDept':
                    window.location.href = 'laboratorydept.php?at=' + $scope.at;
                    break;

            case 'Logout':
                    window.location.href = '../logout.php?at=' + $scope.at;
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

<?php include 'footer.php'?>