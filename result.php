<?php 
	include('config.php');
	include('header.php');
	include('server.php');
	include('navigation.php');
	if (empty($_SESSION['username'])){
		header('location: login.php');
	}
  	$user = $_SESSION['user'];

	if (isset($_POST['submit'])){
		$count = 1;
		$points = 0;
		$query = "SELECT * FROM question JOIN questionanswer ON question.QuestionAnswerID = questionanswer.QuestionAnswerID";
		$result = mysqli_query($dbcon, $query);  
		while($row = mysqli_fetch_array($result)){
			$count ++;
		}
		
		$query = "SELECT * FROM useranswer WHERE UserID = '".$user."'";
		$result = mysqli_query($dbcon, $query);
		$account = mysqli_num_rows($result);
		if ($account > 0) {
			array_push($errors, "Answer already exists!");
		}
		else{
			for ($i = 1; $i < $count; $i++) {
				if (empty($_POST['option'.$i])){
					$_POST['option'.$i] = '0';
				}
				if ($_POST['option'.$i] == $_POST['txtanswer'.$i]){
					$points ++;
				}
				$qry = "INSERT INTO useranswer(QuestionID,Answer,UserID) VALUES('".$_POST['txtquestion'.$i]."','".$_POST['option'.$i]."', '".$user."')";
				mysqli_query($dbcon, $qry);
			}
		}

		$query = "SELECT * FROM result WHERE UserID = '".$user."'";
		$result = mysqli_query($dbcon, $query);
		$account = mysqli_num_rows($result);
		if ($account > 0) {
			array_push($errors, "User account already exists!");
		}
		else{
			$qry1 = "INSERT INTO result(UserID,Points) VALUES('".$user."','".$points."')";
			mysqli_query($dbcon, $qry1);
		}	
	}

?>
<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-xs-8">
						<h2>Results</h2>
					</div>
					<div class="col-xs-4">
						<?php
							$points = 0;
							$allover = 0;
							$query = "SELECT * FROM result WHERE UserID = '".$user."'";
							$result = mysqli_query($dbcon, $query);
							while($row = mysqli_fetch_array($result)){
								$points = $row['Points'];
							}
							$qry = "SELECT * FROM question";
							$res = mysqli_query($dbcon, $qry);
							$allover = mysqli_num_rows($res);
						?>
						<h3>Score: <?php echo $points.' / '.$allover; ?></h3>
					</div>
				</div>
				
				<ul class="list-group">
					<li class="list-group-item active">
						<?php  
							$qry1 = "SELECT * FROM user JOIN section ON section.SectionID = user.SectionID WHERE UserID ='".$user."'";
							$res = mysqli_query($dbcon, $qry1);
							while ($row = mysqli_fetch_array($res)) {
								echo "<h4 class='list-group-item-heading'>".$row['LastName'].", ".$row['FirstName']."</h4>";
								echo "<p class='list-group-item-text'>".$row['Section']."</p>";
							}
						?>
					</li>
					<?php  
						$count = 1;
						// $qry = "SELECT * FROM question JOIN questionanswer ON question.QuestionAnswerID = questionanswer.QuestionAnswerID";
						// $res = mysqli_query($dbcon, $qry);
						// while($rows = mysqli_fetch_array($res)){
						// }
						$query = "SELECT * FROM useranswer JOIN question ON question.QuestionID = useranswer.QuestionID JOIN questionanswer ON questionanswer.QuestionAnswerID = question.QuestionAnswerID WHERE UserID = '".$user."'";
						$result = mysqli_query($dbcon, $query);
						while ($row = mysqli_fetch_array($result)) {
							
					?>
						<li class="list-group-item">
							<h5>Question #<?php echo $count?></h5>
							<h4><?php echo $row['Questionaire']; ?></h4>
							<div class="row">
								<div class="col-sm-6">
									<label>Correct Answer:</label>
									<div class="form-group">
										<span class="glyphicon glyphicon-circle"></span> <?php echo $row['QuestionAnswer'] ?>. &nbsp; <?php echo $row['Option'.$row['QuestionAnswer']] ?>
									</div>
								</div>
								<div class="col-sm-6">
									<label>Your Answer:</label>
										<div class="form-group">
											<span class="
												<?php
													if ($row['QuestionAnswer'] == $row['Answer']){
														echo 'glyphicon glyphicon-ok btn-success';
													}
													else{
														echo 'glyphicon glyphicon-remove btn-danger';
													}
												?>

											"></span> <b class="
												<?php 
													if ($row['QuestionAnswer'] == $row['Answer']){
														echo 'text-success';
													}
													else{
														echo 'text-danger';
													}
												?>"><?php echo "&nbsp;".$row['Answer'] ?>. &nbsp; <?php echo $row['Option'.$row['Answer']] ?></b>
										</div>

								</div>
							</div>
							<div class="form-group">
								
							</div>
							<div class="form-group">

							</div>
						</li>
					<?php
						$count ++; 
						}
					?>
				</ul>
			</div>
		<div class="col-lg-3"></div>
	</div>
</div>