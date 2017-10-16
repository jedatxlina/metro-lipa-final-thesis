<?php include 'admin-header.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Outpatient</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
             
                    <div class="col-lg-12">

                      <div class="panel-body">
                                <input type="button" class="btn btn-primary" value="Add Patient"  onclick="window.location.href='add-outpatient.php';"><br>&emsp;
                   

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Type</th>
                                        <th>Arrival Date/Time</th>
                                        <th>Fnamee</th>
                                        <th>Mname</th>
                                        <th>Lname</th>
                                        <th>Gender</th>
                                        <th>Birthdate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                        require_once '../assets/connection.php';
                        mysql_select_db("metro_lipa_db", $con);
                        $result = mysql_query("SELECT * FROM patients");
                                                                            
                        while($row = mysql_fetch_array($result))
                        {
                        echo "<tr>";
                        echo "<td>" . $row['PatientID'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>". $row['AdmissionDateTime'] . "</td>";
                        echo "<td>" . $row['Fname'] . "</td>"; 
                        echo "<td>" . $row['Mname'] . "</td>"; 
                        echo "<td>" . $row['Lname'] . "</td>"; 
                        echo "<td>" . $row['Gender'] . "</td>";
                        echo "<td>" . $row['Birthdate'] . "</td>";
                        echo "</tr>";
                        }
                        mysql_close($con)
                        ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                     
                        <!-- /.panel-body -->
                  </div>
                </div>
            </div>
        <!-- /#page-wrapper -->
        </div>
        
<?php include 'admin-footer.php' ?>
