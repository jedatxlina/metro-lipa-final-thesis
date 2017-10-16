<?php include 'admin-header.php' ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Edit User Account</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php 
                        $accid = $_GET['id']; 

                        require_once '../assets/connection.php';
                        mysql_select_db("metro_lipa_db", $con);

                        $result = mysql_query("SELECT AccessType,Username,Password FROM user_account WHERE AccountID = '$accid' LIMIT 1") or die("SELECT Error: ".mysql_error());

                        while($row = mysql_fetch_array($result))
                        {   
                        $acctype = $row['AccessType'];
                        $user = $row['Username'];
                        $pass = $row['Password'];
                        }
                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <form action="edit-confirm.php" method="post" name="editForm">
                             <div class="form-group">
                                  <label>Account ID</label>
                                  <input class="form-control" name="accountid" readonly="readonly" placeholder="<?php echo $accid; ?>">
                            </div>

                            <div class="form-group">       
                                <label>Access Type  </label>

                              <div class="col-sm-13 select">
                                <select name="accesstype" class="form-control">
                                  <option value="0">Select</option>
                                  <option value="1">Type 1 - All Priviliges</option>
                                  <option value="2">Type 2 - Admission Module</option>
                                  <option value="3">Type 3 - Nurse Module</option>
                                  <option value="4">Type 4 - Doctor Module</option>
                                  <option value="5">Type 5 - Pharmacy Module</option>
                                  <option value="6">Type 6 - Billing Module</option>
                                </select>
                              </div>
                            </div> 

                            <div class="form-group">       
                              <label>Username </label>
                              <input type="text" name="username" class="form-control" placeholder='<?php echo $user; ?>'>
                            </div>

                            <div class="form-group">       
                              <label>Password </label>
                              <input type="text" name="password" class="form-control" placeholder='<?php echo $pass; ?>'>
                            </div>
                            <input type="hidden" name="accid" value="<?php echo $accid; ?>">
                            <input type="button" class="btn btn-default" value="Cancel"  onclick="window.location.href='users.php';">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                           
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include 'admin-footer.php' ?>
