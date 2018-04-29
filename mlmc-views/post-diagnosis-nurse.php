<?php 
	  $activeMenu = "nurse";	
?>
<?php include 'admin-header.php' ?>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
    <link rel="stylesheet" type="text/css" href="//select2.github.io/select2/select2-3.4.1/select2.css" />
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
        <li class="active"> <a href="specialization.php">Physician</a>
        </li>
    </ol>
    <div class="clearfix">
        <div class="pull-left">
            &emsp;
            <button ng-click="goBack()" class="btn-danger-alt btn">Back</button>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">

        </div>
        <br>
        <div data-widget-group="group1">
            <div id="physiciandashboard">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel panel-profile">
                            <div class="panel-body" data-ng-repeat="patient in patientdetails">
                                <img ng-src="{{patient.QRpath}}">
                                <div class="name">{{patient.Lastname}}, {{patient.Firstname}} {{patient.Middlename}}</div>
                                <div class="info">{{patient.AdmissionID}}</div>
                                <input type="hidden" ng-model="$parent.admittype" ng-init="$parent.admittype = patient.AdmissionType"/>
                            </div>
                        </div>
                        <!-- panel -->
                        <div class="list-group list-group-alternate mb-n nav nav-tabs">
                            <a href="#tab-diagnosis" role="tab" data-toggle="tab" class="list-group-item active"><i class="fa fa-stethoscope"></i> Diagnosis</a>
                            <a href="#tab-laboratory" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i> Laboratory</a>
                            <a href="#tab-medications" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i> Medications</a>
                            <a href="#tab-details" role="tab" data-toggle="tab" class="list-group-item"><i class="fa fa-stethoscope"></i>Medical Details</a>
                            <a href="#tab-history" role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-view-list-alt"></i> Medical History</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-diagnosis">
                                <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h2>Latest Diagnosis</h2>
                                            <div class="panel-ctrls"></div>
                                        </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table id="latest_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Findings</th>
                                                                    <th>Date & Time Diagnosed</th>
                                                                    <th>Administered By</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data-ng-repeat="latest in latestdiagnosis">
                                                                    <td>{{latest.Findings}}</td>
                                                                    <td>{{latest.DateDiagnosed}} {{latest.TimeDiagnosed}}</td>
                                                                    <td>Dr. {{latest.PhysicianFirstname}} {{latest.PhysicianMiddlename}} {{ latest.PhysicianLastname}}</td>
                                                            
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <div class="panel-footer">
                                        </div>
                                </div>

                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h2>Post Diagnosis</h2>
                                        <div class="panel-ctrls"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div id="diagstepone">
                                            <form class="grid-form">
                                                <div class="row">
                                                    <fieldset data-ng-repeat="patient in patientdetails">
                                                            <input type="hidden" ng-model="$parent.attendingid" ng-init="$parent.attendingid = patient.Attending">
                                                    </fieldset>
                                                    <fieldset>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1">
                                                                <label>Diagnosis</label>
                                                                <br>
                                                                <select id="diagnosis" class="select2" multiple="multiple" style="width:420px;">
                                                                    <optgroup label="List of Conditions">
                                                                        <option ng-repeat="condition in conditions | orderBy:'Conditions'" value="{{condition.ConditionID}}">{{condition.Conditions}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('diagnosis')"></i></a>
                                                                <br>
                                                                <br>
                                                                <div id="otherdiagnosis">
                                                                    <label>Other Diagnosis (Philhealth Exclusion)</label>
                                                                    <input type="text" ng-model="otherdiagnosis" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                                </div>
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Post-Order</label>
                                                                <br>
                                                                <textarea autogrow ng-model="$parent.order"></textarea>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1">
                                                                <label>Laboratory: </label>
                                                                <input type="radio" ng-model="lab" name="lab" value='Yes' class="tooltips" data-trigger="hover" data-original-title="Yes"> Yes &nbsp;
                                                                <input type="radio" ng-model="lab" name="lab" value='No' class="tooltips" data-trigger="hover" data-original-title="No" selected> No
                                                                <br>
                                                                <select id="laboratories" class="select2" multiple="multiple" style="width:370px;" ng-disabled="lab != 'Yes'">
                                                                    <optgroup label="List of Laboratories">
                                                                        <option ng-repeat="lab in labs" value="{{lab.LaboratoryID}}">{{lab.Description}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('labs')"></i></a>
                                                                <br>
                                                                <br>
                                                                <div id="otherlabs">
                                                                    <label>Other Laboratories</label>
                                                                    <input type="text" ng-model="otherlabs" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                                </div>
                                                            </div>

                                                            <div data-field-span="1">
                                                                <label>Medications: </label>
                                                                <select id="medications" class="select2" multiple="multiple" style="width:370px;">
                                                                    <optgroup label="List of Medicines">
                                                                        <option ng-repeat="meds in medicines" value="{{meds.MedicineID}}">{{meds.MedicineName}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('meds')"></i></a>
                                                                <br>
                                                                <br>
                                                                <div id="othermeds">
                                                                    <label>Other Medicines</label>
                                                                    <input type="text" ng-model="othermeds" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-row-span="2" ng-show="checkadmit()">
                                                            <div data-field-span="1">
                                                                <label>Next appointment date</label>
                                                                <input type="text" class="form-control" ng-model="" id="datepicker">
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Rate</label>
                                                                <input type="text" class="form-control" ng-model="rate">
                                                            </div>
                                                        </div>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1" >
                                                                    <label>Attending Physicians</label>
                                                                    <select class="form-control" ng-model="attendingphysician" style="width:395px;">
                                                                        <option value="" selected> Select Physician</option>
                                                                        <option ng-repeat="val in attendingphysicians | orderBy:'FullName'" value="{{val.PID}}">{{val.FullName}}</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                </div>
                                                </fieldset>
                                                <button type="button" class="btn btn-defualt pull-right" data-dismiss="modal">Close</button>
                                            <button ng-click='confirmDiagnosis()' class="btn btn-danger pull-right">Next</button>
                                           
                                            </form>
                                            
                                        </div>
                                        <div id="diagsteptwo">
                                            <form class="grid-form" action="javascript:void(0)">
                                                <fieldset data-ng-repeat="patient in patientdetails">
                                                    <div data-row-span="3">
                                                        <div data-field-span="1">
                                                            <label>Admission ID
                                                                <br>
                                                            </label>
                                                            <input type="text" ng-model="admissionid" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Admission No
                                                                <br>
                                                            </label>
                                                            <input type="text" ng-model="patient.AdmissionNo" ng-disabled='true'>

                                                        </div>
                                                    </div>
                                                    <div data-row-span="4">
                                                        <div data-field-span="1">
                                                            <label>Last Name</label>
                                                            <input type="text" ng-value="patient.Lastname" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>First Name</label>
                                                            <input type="text" ng-value="patient.Firstname" ng-disabled='true'>
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Middle Name</label>
                                                            <input type="text" ng-value="patient.Middlename" ng-disabled='true'>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                                <fieldset data-ng-repeat="medication in medications track by $index">
                                                <input type="text" ng-model="Intake[$index]" ng-init="Intake[$index] = medication.MedicineName" disabled="true">
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Dosage</label>
                                                            <input type="text" ng-model="Dosage[$index]" ng-init="Dosage[$index] = medication.Unit">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Required Intake</label>
                                                            <input type="text" ng-model="Quantity[$index]" ng-init="Quantity[$index] = medication.Quantity">
                                                            <input type="hidden" ng-model="MedID[$index]" ng-init="MedID[$index] = medication.MedicineID">
                                                        </div>
                                                    </div>
                                                    <div data-row-span="2">
                                                        <div data-field-span="1">
                                                            <label>Notes</label>
                                                            <input type="text" ng-model="NoteID[$index]" placeholder="Notes here">
                                                        </div>
                                                        <div data-field-span="1">
                                                            <label>Intake Inerval</label>
                                                            <select class="form-control" ng-model="IntakeInterval[$index]" style="width:395px;">
                                                                <option value="" disabled selected>Select Interval</option>
                                                                <option ng-repeat="intrvl in interval" value="{{intrvl.DosingID}}">{{intrvl.Intake}}</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <br>
                                                </fieldset>
                                                <div class="pull-right">
                                                    <button ng-click="goBack()" class="btn-default btn">Cancel</button>
                                                    <button type="submit" class="btn-danger btn" ng-click="submitDetails(type)">Submit</button>
                                                </div>

                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="panel-footer"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-laboratory">
                                <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h2>Latest Diagnosis</h2>
                                            <div class="panel-ctrls"></div>
                                        </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table id="latest_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Findings</th>
                                                                    <th>Date & Time Diagnosed</th>
                                                                    <th>Administered By</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data-ng-repeat="latest in latestdiagnosis">
                                                                    <td>{{latest.Findings}}</td>
                                                                    <td>{{latest.DateDiagnosed}} {{latest.TimeDiagnosed}}</td>
                                                                    <td>Dr. {{latest.PhysicianFirstname}} {{latest.PhysicianMiddlename}} {{ latest.PhysicianLastname}}</td>
                                                            
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <div class="panel-footer">
                                        </div>
                                </div>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h2>Post Laboratory</h2>
                                    </div>
                                    <div class="panel-body">
                                    <form class="grid-form">
                                                <div class="row">
                                                    <fieldset>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1">
                                                                <label>Laboratory: </label>
                                                          
                                                                <select id="separatelaboratories" class="select2" multiple="multiple" style="width:400px;" >
                                                                    <optgroup label="List of Laboratories">
                                                                        <option ng-repeat="lab in labs" value="{{lab.LaboratoryID}}">{{lab.Description}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Special Requests </label>
                                                                <br>
                                                                <input type="text" ng-model="requests">
                                                            </div>
                                                        </div>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1" >
                                                                    <label>Attending Physicians</label>
                                                                    <select class="form-control" ng-model="attendingphysician" style="width:395px;">
                                                                        <option value="" selected> Select Physician</option>
                                                                        <option ng-repeat="val in attendingphysicians | orderBy:'FullName'" value="{{val.PID}}">{{val.FullName}}</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                </div>
                                                </fieldset>
                                            <button type="button" class="btn btn-defualt pull-right" data-dismiss="modal">Close</button>
                                            <button ng-click='confirmLaboratory()' class="btn btn-danger pull-right">Confirm</button>
                                            </form>
                                    </div> 
                                </div>
                            </div> 
                            <div class="tab-pane" id="tab-medications">
                                <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h2>Latest Diagnosis</h2>
                                            <div class="panel-ctrls"></div>
                                        </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table id="latest_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Findings</th>
                                                                    <th>Date & Time Diagnosed</th>
                                                                    <th>Administered By</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data-ng-repeat="latest in latestdiagnosis">
                                                                    <td>{{latest.Findings}}</td>
                                                                    <td>{{latest.DateDiagnosed}} {{latest.TimeDiagnosed}}</td>
                                                                    <td>Dr. {{latest.PhysicianFirstname}} {{latest.PhysicianMiddlename}} {{ latest.PhysicianLastname}}</td>
                                                            
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <div class="panel-footer">
                                        </div>
                                </div>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h2>Post Medications</h2>
                                    </div>
                                    <div class="panel-body">
                                    <form class="grid-form">
                                                <div class="row">
                                                    <fieldset>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1">
                                                                <label>Medications: </label>
                                                                <select id="separatemedications" class="select2" multiple="multiple" style="width:370px;">
                                                                    <optgroup label="List of Medicines">
                                                                        <option ng-repeat="meds in medicines" value="{{meds.MedicineID}}">{{meds.MedicineName}}</option>
                                                                    </optgroup>
                                                                    <option ng-value="Others">Others</option>
                                                                </select>
                                                                <a href="#">&nbsp;<i class="ti ti-close" ng-click="reset('meds')"></i></a>
                                                                <br>
                                                                <br>
                                                                <div id="separateothermeds">
                                                                    <label>Other Medicines</label>
                                                                    <input type="text" ng-model="separateothermeds" class="form-control tooltips" data-trigger="hover" data-original-title="Separate with , if more than 1">
                                                                </div>
                                                                
                                                            </div>
                                                            <div data-field-span="1">
                                                                <label>Special Order</label>
                                                                <br>
                                                                <input type="text" ng-model="medicationorder">
                                                            </div>
                                                        </div>
                                                        <div data-row-span="2">
                                                            <div data-field-span="1" >
                                                                    <label>Attending Physicians</label>
                                                                    <select class="form-control" ng-model="attendingphysician" style="width:395px;">
                                                                        <option value="" selected> Select Physician</option>
                                                                        <option ng-repeat="val in attendingphysicians | orderBy:'FullName'" value="{{val.PID}}">{{val.FullName}}</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                </div>
                                                </fieldset>
                                                <BR>
                                            <button type="button" class="btn btn-defualt pull-right" data-dismiss="modal">Close</button>
                                            <button ng-click='confirmMedication()' class="btn btn-danger pull-right">Confirm</button>
                                            </form>
                                    </div> 
                                </div>
                            </div> 
                            <div class="tab-pane" id="tab-details">
                                <div class="panel panel-danger">
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
                                </div>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h2>Diagnosis</h2><a ng-click="viewDiagnosisReport()" class="pull-right"><i class="ti ti-printer"></i></a>
                                        <div class="panel-ctrls"></div>
                                    </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="findings_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Findings</th>
                                                                <th>DateDiagnosed</th>
                                                                <th>TimeDiagnosed</th>
                                                                <th>Administered By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr  ng-repeat="finding in findings track by $index">
                                                                <td>{{$index}}</td>
                                                                <td>{{finding.Findings}}</td>
                                                                <td>{{finding.DateDiagnosed}}</td>
                                                                <td>{{finding.TimeDiagnosed}}</td>
                                                                <td>Dr. {{finding.PhysicianFirstname}} {{finding.PhysicianMiddlename}} {{finding.PhysicianLastname}}</td>
                                                            </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <div class="panel-footer">
                                    </div>
                                </div>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h2>Patient Medications</h2><a ng-click="viewMedicationsReport()" class="pull-right"><i class="ti ti-printer"></i></a>
                                        <div class="panel-ctrls"></div>
                                    </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="medications_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Medicine Name</th>
                                                                <th>Dosage</th>
                                                                <th>Quantity</th>
                                                                <th>Administered By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr  ng-repeat="med in medications track by $index">
                                                                <td>{{$index}}</td>
                                                                <td>{{med.MedicineName}}</td>
                                                                <td>{{med.Unit}}</td>
                                                                <td>{{med.Intake}}</td>
                                                                <td>Dr. {{med.PhysicianFirstname}} {{med.PhysicianFirstname}} {{med.PhysicianFirstname}}</td>
                                                            </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <div class="panel-footer">
                                    </div>
                                </div>
                            </div> <!-- #tab-details -->
                            <div class="tab-pane" id="tab-history">
                            <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h2>Medical History</h2><a ng-click="viewHistoryReport()" class="pull-right"><i class="ti ti-printer"></i></a>
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr ng-repeat="history in patienthistory" ng-class="{'selected': history.ArchiveNo == selectedRow}" ng-click="setClickedRow(history.ArchiveNo)">
                                                        <td>{{history.Firstname}} {{history.Middlename}} {{history.Lastname}}</td>
                                                        <td>{{history.ArchiveID}}</td>
                                                        <td>{{history.AdmissionDate}}</td>
                                                        <td>{{history.AdmissionTime}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                        <button type="button" ng-click="viewPatientDataHistory()" class="btn btn-danger-alt pull-left">View Details</button>
                                    </div>
                                </div>         
                            </div> 
                        </div>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="col-md-3">

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

        var fetch = angular.module('myApp', ['angular-autogrow','ui.mask']);

        fetch.controller('userCtrl', ['$scope', '$http', '$interval', function($scope, $http, $interval) {
            $scope.at = "<?php echo $_GET['at'];?>";
            $scope.admissionid = "<?php echo $_GET['id'];?>";
            $scope.medicalid = "<?php echo  isset($_GET['medicalid']) ? $_GET['medicalid'] : ''; ?>";
            $scope.lab = 'No';
            $('#diagsteptwo').hide();

            $scope.medicationid = "<?php echo  isset($_GET['medicationid']) ? $_GET['medicationid'] : ''; ?>";
            $scope.id = "<?php echo  isset($_GET['id']) ? $_GET['id'] : ''; ?>";
            $scope.MedID = [];
            $scope.Intake = [];
            $scope.Quantity = [];
            $scope.Dosage = [];
            $scope.NoteID = [];
            $scope.IntakeInterval = [];
            $scope.rate = '';

            if ($scope.medicationid != '' && $scope.medicalid != '') {
                $('#diagstepone').hide();
                $('#diagsteptwo').show();

                $http({
                    method: 'GET',
                    url: 'getData/get-medication-details.php',
                    params: {
                        medicationid: $scope.medicationid,
                        medicalid: $scope.medicalid
                    }
                }).then(function(response) {
                    $scope.medications = response.data;
                });

                $http({
                    method: 'get',
                    url: 'getData/get-patient-details.php',
                    params: {
                        id: $scope.admissionid
                    }
                }).then(function(response) {
                    $scope.patientdetails = response.data;
                });

                $http({
                    method: 'get',
                    url: 'getData/get-dosing-interval.php'
                }).then(function(response) {
                    $scope.interval = response.data;
                });
            }

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

            $http({
                method: 'GET',
                url: 'getData/get-latest-diagnosis.php',
                params: {admissionid: $scope.admissionid }
            }).then(function(response) {
                $scope.latestdiagnosis = response.data;
                angular.element(document).ready(function() {  
                dTable = $('#latest_table')  
                dTable.DataTable();  
            	});  
            });


            $http({
                method: 'GET',
                url: 'getData/get-laboratory-details.php'
            }).then(function(response) {
                $scope.labs = response.data;
            });

            $http({
                method: 'get',
                url: 'getData/get-patient-details.php',
                params: {
                    id: $scope.admissionid
                }
            }).then(function(response) {
                $scope.patientdetails = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-medicine-details.php'
            }).then(function(response) {
                $scope.medicines = response.data;
            });

            
            $http({
                method: 'GET',
                url: 'getData/get-attending-details.php',
                params: {id: $scope.admissionid}
            }).then(function(response) {
                $scope.attendingphysicians = response.data;
            });

            $http({
                method: 'GET',
                url: 'getData/get-conditions-details.php'
            }).then(function(response) {
                $scope.conditions = response.data;
            });

              $http({
                method: 'GET',
                url: 'getData/get-findings-details.php',
                params: {id: $scope.id}
            }).then(function(response) {
                $scope.findings = response.data;
                angular.element(document).ready(function() {  
                dTable = $('#findings_table')  
                dTable.DataTable();  
            	});  
            });

            // $http({
            // method: 'GET',
            // url: 'getData/get-medication-details.php',
            // params: {id: $scope.id}
            // }).then(function(response) {
            //     $scope.medications = response.data;
            //     angular.element(document).ready(function() {  
            // 	dTable = $('#medications_table')  
            // 	dTable.DataTable();  
            // 	});  
            // });

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


            $scope.otherdiagnosis = '';
            $scope.otherlabs = '';
            $scope.othermeds = '';
            $scope.separateothermeds = '';

            $('#otherdiagnosis').hide();
            $('#otherlabs').hide();
            $('#othermeds').hide();
            $('#separateothermeds').hide();

            $("#diagnosis").click(function() {
                $scope.diagnosis = $("#diagnosis").val();

                if ($scope.diagnosis.indexOf('Others') >= 0) {
                    $('#otherdiagnosis').show();
                }

            });

            $("#laboratories").click(function() {
                $scope.lab = $("#laboratories").val();
                if ($scope.lab.indexOf('Others') >= 0) {
                    $('#otherlabs').show();
                }

            });

            $("#medications").click(function() {
                $scope.meds = $("#medications").val();
                if ($scope.meds.indexOf('Others') >= 0) {
                    $('#othermeds').show();
                }
            });

            $("#separatemedications").click(function() {
                $scope.meds = $("#separatemedications").val();
                if ($scope.meds.indexOf('Others') >= 0) {
                    $('#separateothermeds').show();
                }
            });


            $scope.reset = function(val) {
                $scope.chck = val;
                switch ($scope.chck) {
                    case 'diagnosis':
                        $('#diagnosis').removeAttr('disabled');
                        $('#otherdiagnosis').hide();
                        break;

                    case 'labs':
                        $('#otherlabs').hide();
                        break;

                    case 'meds':
                        $('#othermeds').hide();
                        break;

                    default:
                        break;
                }

            }

            $scope.checkadmit = function() {
                if($scope.admittype == 'Outpatient')
                    return true;

            }

            $scope.confirmDiagnosis = function() {
                $scope.diagnosis = $("#diagnosis").val();
                $scope.appointment = $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd").val();

                $scope.found2 = $scope.diagnosis.indexOf('Others');
                while ($scope.found2 !== -1) {
                    $scope.diagnosis.splice($scope.found2, 1);
                    $scope.found2 = $scope.diagnosis.indexOf('Others');

                }
                if ($scope.otherdiagnosis != '') {
                    $scope.diagnosis = $scope.diagnosis.concat($scope.otherdiagnosis);
                }

                if ($scope.lab === 'Yes') {
                    $scope.lab = $("#laboratories").val();
                    $scope.found = $scope.lab.indexOf('Others');

                    while ($scope.found !== -1) {
                        $scope.lab.splice($scope.found, 1);
                        $scope.found = $scope.lab.indexOf('Others');
                    }
                    if ($scope.otherlabs != '') {
                        $scope.lab = $scope.lab.concat($scope.otherlabs);
                    }
                }
                $scope.meds = $("#medications").val();
                $scope.found1 = $scope.meds.indexOf('Others');

                while ($scope.found1 !== -1) {
                    $scope.meds.splice($scope.found1, 1);
                    $scope.found1 = $scope.meds.indexOf('Others');
                }
                if ($scope.othermeds != '') {
                    $scope.meds = $scope.meds.concat($scope.othermeds);
                }
            

                if ($scope.lab != 'No') {
                    window.location.href = 'insertData/insert-diagnosis-details-nurse.php?at=' + $scope.attendingphysician + '&id=' + $scope.admissionid + '&diagnosis=' + $scope.diagnosis + '&order=' + $scope.order + '&lab=' + $scope.lab + '&meds=' + $scope.meds + '&attendingid=' + $scope.attendingid + '&appointment=' + $scope.appointment + '&rate=' + $scope.rate + '&medicalid=' + $scope.medicalid + '&nurseat=' + $scope.at;
                } else {
                    window.location.href = 'insertData/insert-diagnosis-details-nurse.php?at=' + $scope.attendingphysician + '&id=' + $scope.admissionid + '&diagnosis=' + $scope.diagnosis + '&order=' + $scope.order + '&meds=' + $scope.meds + '&attendingid=' + $scope.attendingid + '&appointment=' + $scope.appointment + '&rate=' + $scope.rate + '&medicalid=' + $scope.medicalid + '&nurseat=' + $scope.at;
                }

            }

            $scope.submitDetails = function(type) {
                swal({
                    icon: "success",
                    title: "Successfully Posted!",
                    text: "Redirecting in 2..",
                    timer: 2000
                }).then(function() {
                    window.location.href = 'initiate-medication.php?qntyintake=' + $scope.Quantity + '&id=' + $scope.medicationid + '&at=' + $scope.at + '&dosage=' + $scope.Dosage + '&medid=' + $scope.MedID + '&notes=' + $scope.NoteID + '&admissionid=' + $scope.admissionid + '&intake=' + $scope.Intake + '&intakeinterval=' + $scope.IntakeInterval + '&parma=' + 'Outpatient' + '&medicalid=' + $scope.medicalid;
                }, function(dismiss) {
                    if (dismiss === 'cancel') {
                        window.location.href = 'initiate-medication.php?qntyintake=' + $scope.Quantity + '&id=' + $scope.medicationid + '&at=' + $scope.at + '&dosage=' + $scope.Dosage + '&medid=' + $scope.MedID + '&notes=' + $scope.NoteID + '&admissionid=' + $scope.admissionid + '&intakeinterval=' + $scope.IntakeInterval  + '&parma=' + 'Outpatient' + '&medicalid=' + $scope.medicalid;
                    }
                });
            }

            
            $scope.setClickedRow = function(lab) {
               $scope.selectedRow = ($scope.selectedRow == null) ? lab : ($scope.selectedRow == lab) ? null : lab;
               $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
           }

           $scope.viewHistoryReport = function(){    
           
                $window.open('view-history-report.php?at='+$scope.at+'&id='+$scope.id, '_blank');
                
            }

            
           
            $scope.viewPatientDataHistory = function(){
                    if ($scope.selectedRow != null) {
                        $scope.archiveno = $scope.selectedRow;
                        window.location.href = 'view-archived-data.php?at=' + $scope.at + '&id=' + $scope.archiveno;
                    } else {
                        $('#errorModal').modal('show');
                    }
                
            }

            $scope.confirmLaboratory = function() {
                $scope.lab = $("#separatelaboratories").val();
                swal({
                    icon: "success",
                    title: "Successfully Requested!",
                    text: "Redirecting in 2..",
                    timer: 2000
                }).then(function() {
                    window.location.href = 'insertData/insert-laboratory-request-nurse.php?at=' + $scope.attendingphysician + '&id=' + $scope.admissionid + '&lab=' + $scope.lab + '&request=' + $scope.requests + '&nurseat=' + $scope.at;
                }, function(dismiss) {
                    if (dismiss === 'cancel') {
                    window.location.href = 'insertData/insert-laboratory-request-nurse.php?at=' + $scope.attendingphysician + '&id=' + $scope.admissionid + '&lab=' + $scope.lab + '&request=' + $scope.requests + '&nurseat=' + $scope.at;
                    }
                });
            }

            $scope.confirmMedication = function() {
                $scope.meds = $("#separatemedications").val();

                $scope.found1 = $scope.meds.indexOf('Others');

                while ($scope.found1 !== -1) {
                    $scope.meds.splice($scope.found1, 1);
                    $scope.found1 = $scope.meds.indexOf('Others');
                }
                if ($scope.separateothermeds != '') {
                    $scope.meds = $scope.meds.concat($scope.separateothermeds);
                }
                window.location.href = 'insertData/insert-separate-medications-nurse.php?at=' + $scope.attendingphysician + '&id=' + $scope.admissionid + '&medicalid=' + $scope.medicalid + '&meds=' + $scope.meds + '&medorder=' + $scope.medicationorder  + '&nurseat=' + $scope.at;
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

            $scope.goBack = function() {
                window.history.back();
            }

        }]);
    </script>
    </div>
    <?php include 'footer.php'?>