<?php include 'admin-header.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Users</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-12">
                    <!-- <button type="button" class="btn btn-primary">Add User</button><br>&emsp; -->

                      <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                               Add User
                            </button><br>&emsp;
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">User Account</h4>
                                        </div>
                                        <div class="modal-body">
					                      		<p>Data below will be used as credential and restrictions of the user</p>
					                       		<form name="modalForm" action="add-user.php" method="post">
					                            	<div class="form-group" >
							                              <label>Account ID</label>
							                              <input type="text" name="accnum" class="form-control" readonly="readonly" value="<?php 
							                              function gen_random_string($length=10)
							                              {
							                                  $chars ="1234567890";
							                                  $final_rand ='';
							                                  for($i=0;$i<$length; $i++)
							                                  {
							                                      $final_rand .= $chars[ rand(0,strlen($chars)-1)];
							                                  }
							                                  return $final_rand;
							                              }
							                              gen_random_string();
							                              echo gen_random_string()."\n";
							                              ?>">
					                            	</div>
					                            	<div class="form-group">       
					                              		  <label>Access Type  </label>
														    <div class="col-sm-13 select">
									                                <select name="access" class="form-control">
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
										                              <input type="text" name="username" placeholder="Username" class="form-control">
					                            	</div>
					                            	<div class="form-group">       
										                              <label>Password </label>
										                              <input type="password" name="password" placeholder="Password" class="form-control">
					                            	</div>
					        						<div class="modal-footer">

		                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                                            <button type="submit" class="btn btn-primary">Add</button>
		                                        	</div>
                                     		</form>
                                </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Active Users
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Access Type</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                        </thead>
                        <tbody>
                                        <?php
                        require_once '../assets/connection.php';
                        mysql_select_db("metro_lipa_db", $con);
                        $result = mysql_query("SELECT * FROM user_account");
                                                                            
                        while($row = mysql_fetch_array($result))
                        {
                        echo "<tr>";
                        echo "<td>" . $row['AccountID'] . "</td>";
                        echo "<td>" . $row['AccessType'] . "</td>";
                        echo "<td>". $row['Username'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>"; 
                        echo '<td><center><a href="edit-user.php?id=' . $row['AccountID'] . '">Edit</a> &emsp; <a href="delete-user.php?id=' . $row['AccountID'] . '">Delete</a></center></td>';
                        echo "</tr>";
                        }
                        mysql_close($con)
                        ?>
                        </tbody>
                        </table>
                            <!-- /.table-responsive -->
                     
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
       
      
        </div>
        <!-- /#page-wrapper -->
       
<?php include 'admin-footer.php' ?>
