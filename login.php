<?php 
	include('server.php'); 
	include('header.php'); 
	include('nav-log.php'); 
?>
<div class="container">
	<div class="row">
		<div class="col-lg-3 header">
			
		</div>
		<div class="col-lg-6" style="margin-top: 70px;">	
			<form action="login.php" method="POST">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="list-group-item-heading">Login</h3>
				</div>
				<div class="panel-body">
					<!--display validation errors-->
					<?php include('errors.php'); ?>
					
						<div class="form-group">
							<label>UserName:</label>
							<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
						</div>
				</div>
				<div class="panel-footer">
					<h5>Don't have an account? <a href="register.php">Register<b class="caret"></b></a></h5>	
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="login">Login</button>
					</div>
				</div>
			</div>	
			</form>	  		
		</div>
		<div class="col-lg-3 header">
			
		</div>
	</div>
</div>