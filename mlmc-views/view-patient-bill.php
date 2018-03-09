    <?php include 'admin-header.php' ?>

    <style>
        .selected {
        color: #800000;
        background-color: #F5F5F5;
        font-weight: bold;
        }
        td {
            font-size: 20px;
        }
        .total {
            font-size: 30px;
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
    <div class="container-fluid">
        <div data-widget-group="group1">
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-profile">
                    <div class="panel-body"  data-ng-repeat="patient in patientdetails">
                        <img ng-src="{{patient.QRpath}}">
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
                                        <table class="table"  data-ng-repeat="room in roombill">
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
                                    <h2>Bill Breakdown</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="about-area">
                                        <h4>Room Bill</h4>
                                            <fieldset  data-ng-repeat="room in roomdetails track by $index">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Patient Arrival Date</th>
                                                                <td><b>{{room.ArrivalDate}}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Patient Discharge Date</th>
                                                                <td><b>{{room.DischargeDate}}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Room Type</th>
                                                                <td><b>{{room.RoomType}}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Room Rate</th>
                                                                <td><b>{{room.Rate}}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Bed ID</th>
                                                                <td><b>{{room.BedID}}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Bill</th>
                                                                <td><b>{{room.bedbill}}</b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <input type="text" ng-model='RoomBill[$index]' ng-init='RoomBill[$index] = room.bedbill'>
                                            </fieldset>
                                    </div>
                                    <div class="about-area">
                                        <h4>Medicine Bill</h4>
                                            <fieldset  data-ng-repeat="medicine in medicinedetails">
                                                <div class="table-responsive">
                                                    <table class="table"  >
                                                        <tbody>
                                                        <tr>
                                                            <th>Medicine ID</th>
                                                            <td>{{medicine.MedicineID}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Medicine Name</th>
                                                            <td>{{medicine.mediname}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Medicine Dosage</th>
                                                            <td>{{medicine.Dosage}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Medicine Price</th>
                                                            <td>{{medicine.price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Medicine Quantity</th>
                                                            <td>{{medicine.quantity}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Bill</th>
                                                            <td>{{medicine.totalbill}}</td>
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                            <input type="text" ng-model='MedicineBill[$index]' ng-init='MedicineBill[$index] = medicine.totalbill'>
                                            </fieldset>
                                    </div>
                                    <div class="about-area">
                                        <h4>Doctor Bill</h4>
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
                                        <h4>Operations Bill</h4>
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
                                        <h4>Sum Total</h4>
                                            <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Total of All Bills</th>
                                                    <td class="total">{{sumtotal}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <button class="btn-primary btn" ng-click="try()">Save</button>
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
           var total = 0;
           var total1 = 0;
           $scope.RoomBill = [];
           $scope.MedicineBill = [];
           $scope.selectedRow = null;
           $scope.selectedStatus = null;
           $scope.clickedRow = 0;
           $scope.new = {};
            


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
            $http({
            method: 'GET',
            url: 'getData/get-patient-details.php',
            params: {id: $scope.id}
            }).then(function(response) {
                $scope.patientdetails = response.data;
            });

            $http({
            method: 'GET',
            url: 'getData/get-inpatient-roombill.php',
            params: {id: $scope.id}
            }).then(function(response) {
                $scope.roomdetails = response.data;
            });

            $http({
            method: 'GET',
            url: 'getData/get-medication-billdetailed.php',
            params: {id: $scope.id}
            }).then(function(response) {
                $scope.medicinedetails = response.data;
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

           $scope.try = function(lab) {
                
            for(var i = 0; i < $scope.MedicineBill.length; i++){
                    var product = $scope.MedicineBill[i];
                    total = total + product;
                }
                for(var i = 0; i < $scope.RoomBill.length; i++){
                    var product = $scope.RoomBill[i];
                    total1 = total1 + product;
                }
                $scope.sumtotal = total+total1;
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