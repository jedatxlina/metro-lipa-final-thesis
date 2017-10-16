<?php include 'admin-header.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Add Outpatient Details</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <form name="myForm" action="outpatient-details.php" method="post">
                    <div class="col-lg-4">
                         <div class="panel-body">

                                    <div class="form-group">
                                    <label>Patient ID</label>
                                    <input type="text" name="patientid" class="form-control" readonly="readonly" value="<?php echo "2017" .  rand(111111,999999); ?>">
                                    </div>


                                    <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" ng-model="firstname" name="firstname" class="form-control" required>
                                    <span ng-show="myForm.firstname.$touched && myForm.firstname.$invalid" style="color:red">*Field is required.</span>
                                    
                                    </div>

                                    <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" ng-model="middlename" name="middlename" class="form-control" required>
                                    <span ng-show="myForm.middlename.$touched && myForm.middlename.$invalid" style="color:red">*Field is required.</span>
                                    </div>
            
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" required>
                                        <span ng-show="myForm.address.$touched && myForm.address.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Birth Place</label>
                                        <input type="text" name="birthplace" class="form-control" required>
                                        <span ng-show="myForm.birthplace.$touched && myForm.birthplace.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                     <div class="form-group">
                                        <label>Civil Status</label>
                                        <select class="form-control" name="civilstatus" required>
                                            <option>Select</option>
                                            <option value="Male">Single</option>
                                            <option value="Female">Married</option>
                                            <option value="Male">Divorced</option>
                                            <option value="Female">Widowed</option>

                                        </select>
                                        <span ng-show="myForm.civilstatus.$touched && myForm.civilstatus.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                     <div class="form-group">
                                        <label>Citizenship</label>
                                        <input type="text" name="citizenship" class="form-control" required>
                                        <span ng-show="myForm.citizenship.$touched && myForm.citizenship.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Religion</label>
                                        <input type="text" name="religion" class="form-control" required>
                                        <span ng-show="myForm.religion.$touched && myForm.religion.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input type="text" name="occupation" class="form-control">
                                        <span ng-show="myForm.occupation.$touched && myForm.occupation.$invalid" style="color:red">*Field is required.</span>
                                    </div>
                                    <br>
                                    <input type="button" class="btn btn-default" value="Cancel"  onclick="window.location.href='outpatient.php';">
                                    <input type="submit" class="btn btn-primary" value="Confirm"><br>&emsp;
                         </div>   
                    </div>
                     <div class="col-lg-3">
                         <div class="panel-body">
                                    
                                    <div class="form-group">
                                    <label>Arrival Date/Time</label>
                                        <div class="input-group date form_datetime col-md-12" data-date="2000-01-01T00:00:07Z" data-date-format="yyyy/mm/dd - hh:ii" data-link-field="arrivaldatetime">
                                            <input class="form-control" type="text" name="arrivaldatetime" required>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            <span ng-show="myForm.arrivaldatetime.$touched && myForm.arrivaldatetime.$invalid" style="color:red">*Field is required.</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label>Patient Category</label>
                                    <input type="text" name="patienttype" class="form-control" value="Outpatient" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control" required>
                                    <span ng-show="myForm.lastname.$touched && myForm.lastname.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                    <div class="form-group">
                                    <label>Birth Date</label>
                                     <div class="input-group date form_datetime col-md-12" data-date="2000-01-01T00:00:07Z" data-date-format="yyyy/mm/dd - hh:ii p" data-link-field="birthdate">
                                            <input class="form-control" type="text" name="birthdate" required> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            <span ng-show="myForm.birthdate.$touched && myForm.birthdate.$invalid" style="color:red">*Field is required.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span ng-show="myForm.gender.$touched && myForm.gender.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                    <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" class="form-control" required>
                                    <span ng-show="myForm.nationality.$touched && myForm.nationality.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                    <div class="form-group">
                                    <label>Blood Type</label>
                                    <input type="text" name="bloodtype" class="form-control" required>
                                    <span ng-show="myForm.bloodtype.$touched && myForm.bloodtype.$invalid" style="color:red">*Field is required.</span>
                                    </div>

                                 
                         </div>   
                    </div>
                </form>
            </div>
        </div>
        <!-- /#page-wrapper -->
        </div>
        
<?php include 'admin-footer.php' ?>
