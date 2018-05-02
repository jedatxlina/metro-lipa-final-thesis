<?php include 'admin-header.php'?>

    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
    <link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css" />

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a>
        </li>
        <li><a href="#">Patients</a>
        </li>
        <li class="active"><a href="index.php">Patient Bill Details</a>
        </li>
    </ol>
    <br>
    <div class="clearfix">
            <div class="pull-left">
                &emsp;<button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
            </div>
        </div>
    <br>
    <div ng-app="myApp" ng-controller="userCtrl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div data-widget-group="group1">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel panel-profile">
                                    <div class="panel-body" data-ng-repeat="patient in patientdetails">
                                        <img ng-src="{{patient.QRpath}}">
                                        <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                                        <div class="info">{{patient.AdmissionID}}</div>
                                    </div>
                                </div>
                                <!-- panel -->
                                <div class="list-group list-group-alternate mb-n nav nav-tabs">
                                    <a href="#tab-edit" role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Summary Of Bills</a>
                                    <a href="#tab-edit" ng-click="Redirect()" role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-view-list-alt"></i> Detailed Bill</a>
                                </div>
                            </div>
                            <!-- col-sm-3 -->
                            <div class="col-sm-9">
                                <div class="tab-content">

                                    <!-- <div class="container-fluid"> -->
                                    <fieldset data-ng-repeat="medicine in medicinedetails">
                                        <input type="hidden" ng-model='MedicineBill[$index]' ng-init='MedicineBill[$index] = medicine.totalbill'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="room in roomdetails track by $index">
                                        <input type="hidden" ng-model='RoomBill[$index]' ng-init='RoomBill[$index] = room.bedbill'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="emroom in emroomdetails track by $index">
                                        <input type="hidden" ng-model='EmRoomBill[$index]' ng-init='EmRoomBill[$index] = emroom.EmRoomBill'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="room in roomdetails track by $index">
                                        <input type="hidden" ng-model='RoomDur[$index]' ng-init='RoomDur[$index] = room.Duration'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="lab in labdetails track by $index">
                                        <input type="hidden" ng-model='LabBill[$index]' ng-init='LabBill[$index] = lab.Rate'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="doc in docdetails track by $index">
                                        <input type="hidden" ng-model='DocBill[$index]' ng-init='DocBill[$index] = doc.Pfee - doc.Discount'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="patientadv2 in patientadv track by $index">
                                        <input type="hidden" ng-model='AdvPay[$index]' ng-init='AdvPay[$index] = patientadv2.Amount'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="deb in debitdetails track by $index">
                                        <input type="hidden" ng-model='DebitBill[$index]' ng-init='DebitBill[$index] = deb.Amount'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="sup in supplydetails track by $index">
                                        <input type="hidden" ng-model='SupplyID[$index]' ng-init='SupplyID[$index] = sup.totalbill'>
                                    </fieldset>
                                    <fieldset data-ng-repeat="phil in phildetails track by $index">
                                        <input type="hidden" ng-model='PhilBill[$index]' ng-init='PhilBill[$index] = phil.Total'>
                                    </fieldset>
                                </div>
                                <div class="row mb-xl">
                                    <div class="col-md-12">
                                        <h2 class="text-primary text-center" style="font-weight: small;">Statement of Account</h2>
                                    </div>
                                    <div ng-repeat="patient in patientdetails">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <ul class="text-left list-unstyled">
                                                    <li><strong>Patient Name:</strong>&emsp; {{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</li>
                                                    <li><strong>Patient Room:</strong>&emsp; 19/05/2015</li>
                                                    <li><strong>Advance Payment:</strong>&emsp; {{advpay.toLocaleString('en')}}</li>
                                                </ul>
                                                <br>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger-alt dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Report <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a ng-click="viewReport()"><i class="ti ti-printer pull-right"></i> View</a></li>
                                                        <li><a ng-click="viewReportToEmail()"><i class="ti ti-email pull-right"></i>Email to</a></li>
                                                        <li><a ng-click="notifyPatient()"><i class="ti ti-email pull-right"></i>Notify</a></li>
                                                        <li class="divider"></li>
                                                        <li><a ng-click="viewReport()"><i class="ti ti-download pull-right"></i>Download</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <ul class="text-left list-unstyled">
                                                    <li><strong>Patient ID:</strong>&emsp; {{patient.AdmissionID}}</li>
                                                    <li><strong>Admission No:</strong>&emsp; {{patient.AdmissionNo}}</li>
                                                    <br><br>
                                                    <small><input type="checkbox" ng-model="senior" ng-click="seniorClick()" ng-disabled="$parent.fee == 0"> Senior Citizen </small>
                                                    <small><input type="checkbox" ng-model="senior" ng-click="philhealthClick()" ng-disabled="$parent.fee == 0"> Philhealth </small>
                                                </ul>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-xl">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-body no-padding">
                                                <div class="table-responsive">
                                                    <table class="table table-hover m-n">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Description</th>
                                                                <th class="text-right">Unit Cost</th>
                                                                <th class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Room Bill</td>
                                                                <td class="text-right">₱ {{ subtotalroom.toLocaleString('en') }}</td>
                                                                <td class="text-right">₱ {{ subtotalroom.toLocaleString('en') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Medicines Bill</td>
                                                                <td class="text-right">₱ {{ subtotalmedi.toLocaleString('en') }}</td>
                                                                <td class="text-right">₱ {{ subtotalmedi.toLocaleString('en') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Laboratory Bill</td>
                                                                <td class="text-right">₱ {{ subtotallab.toLocaleString('en') }}</td>
                                                                <td class="text-right">₱ {{ subtotallab.toLocaleString('en') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Doctors Bill</td>
                                                                <td class="text-right">₱ {{ subtotaldoc.toLocaleString('en') }}</td>
                                                                <td class="text-right">₱ {{ subtotaldoc.toLocaleString('en') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Supplies Bill</td>
                                                                <td class="text-right">₱ {{ subtotalsupp.toLocaleString('en') }}</td>
                                                                <td class="text-right">₱ {{ subtotalsupp.toLocaleString('en') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Discounts From Philhealth</td>
                                                                <td class="text-right">₱ {{ subtotalphil.toLocaleString('en') }}</td>
                                                                <td class="text-right">₱ {{ subtotalphil.toLocaleString('en') }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><strong>SUB TOTAL:₱ {{ subtotal.toLocaleString('en') }}</strong></p>
                                                <p class="text-right">DISCOUNT:₱ {{totaldiscount.toLocaleString('en')}}</p>
                                                <!-- <p class="text-right">VAT: **</p> -->
                                                <hr>
                                                <h3 class="text-right text-danger" style="font-weight: bold;">₱ {{ subtotal2.toLocaleString('en') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <a href="#" ng-click="postBilling()" class="btn btn-danger">Process Bill</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .tab-content -->

                        </div>
                        <!-- col-sm-8 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.select2').select2({
            placeholder: ''
        });

        $('.select2-remote').select2({
            data: [{
                id: 'A',
                text: 'A'
            }]
        });

        $('button[data-select2-open]').click(function() {
            $('#' + $(this).data('select2-open')).select2('open');
        });

        var app = angular.module('myApp', ['angular-autogrow', 'ui.mask']);

        app.controller('userCtrl', function($scope, $window, $http) {

            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.id = "<?php echo $_GET['id']; ?>";
            $scope.MedicineBill = [];
            $scope.RoomBill = [];
            $scope.EmRoomBill = [];
            $scope.LabBill = [];
            $scope.PhilBill = [];
            $scope.DocBill = [];
            $scope.RoomDur = [];
            $scope.DebitBill = [];
            $scope.AdvPay = [];
            $scope.subtotalmedi = 0;
            $scope.subtotalroom = 0;
            $scope.subtotallab = 0;
            $scope.subtotaldoc = 0;
            $scope.subtotalsupp = 0;
            $scope.subtotalphil = 0;
            $scope.advpay = 0;
            $scope.MedID = [];
            $scope.Quantity = [];
            $scope.Dosage = [];
            $scope.NoteID = [];
            $scope.SupplyID = [];
            var total = 0;
            var total1 = 0;
            var total2 = 0;
            var total3 = 0;
            var total4 = 0;
            var total5 = 0;
            var total6 = 0;
            var total7 = 0;
            var total8 = 0;

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

            $http({
                method: 'GET',
                url: 'getData/get-inpatient-roombill.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.roomdetails = response.data;
            });
            
            // $http({
            //     method: 'GET',
            //     url: 'getData/get-empatient-roombill.php',
            //     params: {
            //         id: $scope.id
            //     }
            // }).then(function(response) {
            //     $scope.emroomdetails = response.data;
            // });

            $http({
                method: 'GET',
                url: 'getData/get-medication-billdetailed.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.medicinedetails = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-laboratory-billdetailed.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.labdetails = response.data;
            });
            $http({
                method: 'GET',
                url: 'getData/get-doctor-billdetailed.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.docdetails = response.data;
            });
            $http({
                method: 'GET',
                url: 'getData/get-guarantor-inpatientbill.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.debitdetails = response.data;
            });
            $http({
                method: 'GET',
                url: 'getData/get-usedsupplies-details.php',
                params: {
                    id: $scope.id
                }
                
            }).then(function(response) {
                $scope.supplydetails = response.data;
            });
            $http({
                method: 'GET',
                url: 'getData/get-philhealthsupply-details.php',
                params: {
                    id: $scope.id
                }
                
            }).then(function(response) {
                $scope.phildetails = response.data;
            });
            $http({
                method: 'GET',
                url: 'getData/get-patient-advance.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.patientadv = response.data;
            });
            $http({
                method: 'get',
                url: 'getData/get-patient-details.php',
                params: {
                    id: $scope.id
                }
            }).then(function(response) {
                $scope.patientdetails = response.data;
                for (var i = 0; i < $scope.MedicineBill.length; i++) {
                    var product = $scope.MedicineBill[i];
                    total = total + parseFloat(product);
                }
                $scope.subtotalmedi = total;
                for (var i = 0; i < $scope.RoomBill.length; i++) {
                    var product1 = $scope.RoomBill[i];
                    total1 = total1 + parseFloat(product1);
                }
                $scope.subtotalroom = total1
                for (var i = 0; i < $scope.EmRoomBill.length; i++) {
                    var product4 = $scope.EmRoomBill[i];
                    total4 = total4 + parseFloat(product4);
                }
                $scope.subtotalemroom = total4;
                for (var i = 0; i < $scope.LabBill.length; i++) {
                    var product2 = $scope.LabBill[i];
                    total2 = total2 + parseFloat(product2);
                }
                $scope.subtotallab = total2;
                for (var i = 0; i < $scope.DocBill.length; i++) {
                    var product3 = $scope.DocBill[i];
                    total3 = total3 + parseFloat(product3);
                }
                $scope.subtotaldoc = total3;
                for (var i = 0; i < $scope.AdvPay.length; i++) {
                    var product6 = $scope.AdvPay[i];
                    total6 = total6 + parseFloat(product6);
                }
                $scope.advpay = total6;
                for (var i = 0; i < $scope.DebitBill.length; i++) {
                    var product5 = $scope.DebitBill[i];
                    total5 = total5 + parseFloat(product5);
                }
                $scope.discountamount = total5;
                for (var i = 0; i < $scope.SupplyID.length; i++) {
                    var product7 = $scope.SupplyID[i];
                    total7 = total7 + parseFloat(product7);
                }
                $scope.subtotalsupp = total7;
                for (var i = 0; i < $scope.PhilBill.length; i++) {
                    var product8 = $scope.PhilBill[i];
                    total8 = total8 + parseFloat(product8);
                }
                $scope.subtotalphil = total8;
                $scope.totaldiscount = $scope.discountamount+$scope.advpay+$scope.subtotalphil;
                $scope.subtotal = $scope.subtotalroom + $scope.subtotalmedi+$scope.subtotallab+$scope.subtotaldoc;
                $scope.subtotal2 = ($scope.subtotalroom + $scope.subtotalmedi+$scope.subtotallab+$scope.subtotaldoc)-$scope.totaldiscount;
                if($scope.subtotal2 <= 0)
                    $scope.subtotal2 = '0';
                else
                    $scope.subtotal2 = ($scope.subtotalroom + $scope.subtotalmedi+$scope.subtotallab+$scope.subtotaldoc)-$scope.totaldiscount;
                $scope.subtotalroom = $scope.subtotalroom + $scope.subtotalemroom;
            });
            $http({
                method: 'GET',
                url: 'getData/get-medication-details.php',
                params: {
                    medicationid: $scope.medicationid,
                    admissionid: $scope.admissionid
                }
            }).then(function(response) {
                $scope.medications = response.data;
            });
            $scope.submitDetails = function(type) {
                $scope.totalbill = 5000;
                $http({
                    method: 'GET',
                    url: 'insertData/insert-bed-bill.php',
                    params: {
                        admissionid: $scope.admissionid,
                        department: $scope.User,
                        description: 'Room Fee',
                        total: $scope.totalbill
                    }
                });

                swal({
                    icon: "success",
                    title: "Successfully Added!",
                    text: "Redirecting in 2..",
                    timer: 2000
                }).then(function() {
                    window.location.href = 'initiate-medication.php?quantity=' + $scope.Quantity + '&id=' + $scope.medicationid + '&at=' + $scope.at + '&dosage=' + $scope.Dosage + '&medid=' + $scope.MedID + '&param=' + $scope.param + '&notes=' + $scope.NoteID;
                }, function(dismiss) {
                    if (dismiss === 'cancel') {
                        window.location.href = 'initiate-medication.php?quantity=' + $scope.Quantity + '&id=' + $scope.medicationid + '&at=' + $scope.at + '&dosage=' + $scope.Dosage + '&medid=' + $scope.MedID + '&param=' + $scope.param + '&notes=' + $scope.NoteID;
                    }
                });
            }

            $scope.seniorClick = function(){
					
                    $http({
                        method: 'GET',
                        url: 'getData/get-discount-details.php'
                    }).then(function(response) {
                        $scope.scdiscount = JSON.parse(response.data);

                        $scope.disc =  $scope.scdiscount;

                        $scope.discount = parseFloat($scope.disc);
                        $scope.discount /= 100;
                        
                        if($scope.senior == 'true'){
                            $scope.senior = 'false';
                            $scope.subtotal = $scope.subtotalroom + $scope.subtotalmedi+$scope.subtotallab+$scope.subtotaldoc;
                            $scope.subtotal2 = $scope.subtotal-$scope.totaldiscount;
                        }else{
                            $scope.senior = 'true';
                            $scope.subtotal = $scope.subtotal - ($scope.subtotal*$scope.discount);
                            $scope.subtotal2 = $scope.subtotal-$scope.totaldiscount;
                        }
                        if($scope.subtotal2 <= 0)
                            $scope.subtotal2 = '0';
                        else
                            $scope.subtotal2 = $scope.subtotal-$scope.totaldiscount;
                        });
                    
                }

            $scope.goBack = function() {
                $http({
                    method: 'get',
                    url: 'cancelData/cancel-patient-details.php',
                    params: {
                        id: $scope.admissionid
                    }
                }).then(function(response) {

                });
            }

            $scope.viewReport = function() {
                $window.open('billing-report.php?at=' + $scope.at + '&id=' + $scope.id + '&subtotal=' + $scope.subtotal+ '&totald=' + $scope.totaldiscount+ '&subtotal2=' + $scope.subtotal2, '_blank');
            }

            $scope.postBilling = function() {
                for (var i = 0; i < $scope.DocBill.length; i++) {
                    if($scope.DocBill[i] == '0')
                    {
                        $scope.clear = 0;
                    }
                }
                if($scope.clear == 0)
                {
                    swal({
                                    icon: "warning",
                                    title: "A Doctor has Not Posted Their Bill",
                                    text: "Reloading in 2..",
                                    timer: 3000
                                }).then(function() {
                                    window.location.reload(false);
                                }, function(dismiss) {
                                    if (dismiss === 'cancel') {
                                        window.location.reload(false);
                                    }
                                });
                }
                else
                {
                    $http({
                        method: 'get',
                        url: 'insertData/insert-data-billing.php',
                        params: {
                            id: $scope.id,
                            total: $scope.subtotal2
                        }
                    }).then(function(response) {
                        window.location.href='billing.php?at=' + $scope.at;
                    });
                }
            }
            
            $scope.notifyPatient = function(){
              
         
					swal({
                            icon: "success",
                            title: "Successfully Notified!",
                            text: "Redirecting in 2..",
                            timer: 2000
                        }).then(function () {
                                window.location.href = 'notify-patient-sms.php?at=' + $scope.at + '&id=' + $scope.id + '&bill=' + $scope.subtotal;
                            }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                window.location.href = 'notify-patient-sms.php?at=' + $scope.at + '&id=' + $scope.id + '&bill=' + $scope.subtotal;
                            }
                        });
			
            }

            $scope.Redirect = function() {
                window.location.href = 'view-patient-bill.1.php?at=' + $scope.at + '&id=' + $scope.id;
            }

            $scope.getPage = function(check) {

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
            $scope.goBack = function(){
                    window.history.back();
            }
        });
    </script>
    </div>
    <?php include 'footer.php'?>