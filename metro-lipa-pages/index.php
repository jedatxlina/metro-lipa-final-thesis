<?php include 'admin-header.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Dashboard</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
             
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php    
                                        require_once '../assets/connection.php';

                                        $sel = mysqli_query($con,"select * from user_account");
                                        $num_rows = mysqli_num_rows($sel);
                                        echo "<div class='huge'>" . $num_rows . "</div>";
                                        ?>
                                        <div>Active Users</div>
                                    </div>
                                </div>
                            </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View more</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
            </div>
        <!-- /#page-wrapper -->
        </div>
        
<?php include 'admin-footer.php' ?>
