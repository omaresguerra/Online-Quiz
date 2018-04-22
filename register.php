<?php 
	include('server.php');
	include('header.php'); 
	include('config.php');
	include('nav-log.php'); 
?>
<div class="container">
	<div class="row">
		<div class="col-sm-3 header">

		</div>
		<div class="col-sm-6" style="margin-top: 70px;"">
			<form action="register.php" method="POST">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="list-group-item-heading">Register</h3>
					</div>	
					<div class="panel-body">
						<!--display validation errors-->
						<?php include('errors.php'); ?>
						<div class="form-group">
							<label>Lastname:</label>
							<input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required>
						</div>
						<div class="form-group">
							<label>Firstname:</label>
							<input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required>
						</div>
						<div class="form-group">
							<label>Section:</label>
							<select class="form-control" name="cboxSection">
							<?php
								$sql = "SELECT * FROM section";  
							    $result = mysqli_query($dbcon, $sql);  
							    while($row = mysqli_fetch_array($result))  
							    {  
							        echo "<option value=".$row["SectionID"].">".$row["Section"]."</option>";  
							    }  
							?>
							</select>
						</div>
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
						<h5>Already have an account? <a href="login.php">Login<b class="caret"></b></a></h5>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="register">&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;</button>
						</div>	
					</div>  			
				</div>
			</form>
		</div>
		<div class="col-sm-3 header">

		</div>
	</div>
</div>