<?php include 'admin-header.php' ?>
<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Registration Form</h2>
				</div>
				<div class="panel-body">
					<form action="" class="form-horizontal">
						<div class="form-group mb-md">
							<label for="FullName" class="col-xs-4 control-label">Full Name</label>
	                        <div class="col-xs-8">
	                        	<input type="text" class="form-control" name="FullName" id="FulltName" placeholder="Full Name" required>
	                        </div>
	                       
						</div>
						<div class="form-group mb-md">
							<label for="Username" class="col-xs-4 control-label">Username</label>
	                        <div class="col-xs-8">
	                        	<input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required>
	                        </div>
						</div>
						<div class="form-group mb-md">
							<label for="Email" class="col-xs-4 control-label">Email</label>
	                        <div class="col-xs-8">
	                        	<input type="text" class="form-control" name="Email" id="Email" placeholder="Email" required>
	                        </div>
						</div>
						<div class="form-group mb-md">
							<label for="Password" class="col-xs-4 control-label">Password</label>
	                        <div class="col-xs-8">
	                        	<input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
	                        </div>
						</div>
						<div class="form-group mb-md">
							<label for="ConfirmPassword" class="col-xs-4 control-label">Confirm</label>
	                        <div class="col-xs-8">
	                        	<input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" required>
	                        </div>
						</div>
						<div class="form-group mb-n">
							<div class="col-xs-12">
								<div class="checkbox icheck">
									<label for=""><input type="checkbox" /> I accept the <a href="#">user agreement</a></label>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				<div class="panel-footer">
					<div class="clearfix">
						<a href="extras-login.html" class="btn btn-default pull-left">Already Registered? Login</a>
						<a href="extras-registration.html" class="btn btn-primary pull-right">Register</a>
					</div>
				</div>
			</div>
		</div>
    </div>
    <?php include 'footer.php'?>