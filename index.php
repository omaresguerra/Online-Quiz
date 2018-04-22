<?php
	include('header.php');
	include('server.php');
	include('timer.php');
	include('config.php');
	if (empty($_SESSION['username'])){
		header('location: login.php');
	}
  	$user = $_SESSION['user'];

?>
<div class="container">
	<div class="row">
		<div class="col-lg-3"></div>
		
	</div>
	<div class="row" style="margin-top: 60px;">
		<div class="col-lg-3"></div>
		<?php 
			$query = "SELECT * FROM result WHERE UserID = '".$user."'";
			$result = mysqli_query($dbcon, $query);
			$account = mysqli_num_rows($result);
			if ($account > 0) {
				array_push($errors, "Data already exists!");
		?>
			<div class='col-lg-6'>
			<?php include('errors.php'); ?>
			<form action="result.php" method="post">
				<div class="form-group">
					<input type="submit" class="btn btn-danger" name="submit" value="View Result">
				</div>
			</form>
			</div>
		<?php 
			}
			else{
		?>
			<div class="col-lg-6">
				<ul class="list-group">
					<li class='list-group-item active'>
						<h4 class="list-group-item-heading">Multiple Choice.</h4>
						<p class="list-group-item-text">Select the best possible answer of the following questions.</p>
					</li>
				<?php 
					$count = 1;
					$query = "SELECT * FROM question JOIN questionanswer ON question.QuestionAnswerID = questionanswer.QuestionAnswerID ORDER BY QuestionID ASC";
					$result = mysqli_query($dbcon, $query);  
        			while($row = mysqli_fetch_array($result)){
				?>
					<form action="result.php" method="post">
					<li class='list-group-item'>
						<h5>Question #<?php echo $count?></h5>
						<h4><?php echo $row['Questionaire']; ?></h4>
						<div class='form-group'>
							<div class="radio">
	                            <label>
	                                <input type="radio" name="option<?php echo $count; ?>" id="" value="A" checked>A. &nbsp; <b><?php echo $row['OptionA'];?></b>
	                            </label>
	                        </div>
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="option<?php echo $count; ?>" id="" value="B">B. &nbsp; <b><?php echo $row['OptionB'];?></b>
	                            </label>
	                        </div>
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="option<?php echo $count; ?>" id="" value="C">C. &nbsp; <b><?php echo $row['OptionC'];?></b>
	                            </label>
	                        </div>
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="option<?php echo $count; ?>" id="" value="D">D. &nbsp; <b><?php echo $row['OptionD'];?></b>
	                            </label>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                    	<input type="hidden" name="txtanswer<?php echo $count; ?>" value="<?php echo $row['QuestionAnswer']; ?>">
	                    	<input type="hidden" name="txtquestion<?php echo $count; ?>" value="<?php echo $row['QuestionID']; ?>">
	                    </div>
					</li>
				<?php
					$count ++;
					}
				?>	
				<li class="list-group-item">
					<p>Please click the button to continue.</p>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					</div>
				</li>
				<!-- Time-out Modal -->
				<div class="modal fade" id="time-out" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header ">
								<h3 class="modal-title"><span class="glyphicon glyphicon-time"></span> Time's up!</h3>
							</div>
							<div class="modal-body">
								<h4>Please click the button to continue...</h4>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="submit" value="View Result">
								</div>
							</div>
						</div>
					</div>
				</div>

				</form>
				</ul>
			</div>


			<script>
			    document.getElementById('timer').innerHTML =
				  15 + ":" + 00;
				startTimer();

				function startTimer() {
				  var presentTime = document.getElementById('timer').innerHTML;
				  var timeArray = presentTime.split(/[:]+/);
				  var m = timeArray[0];
				  var s = checkSecond((timeArray[1] - 1));
				  if(s==59){m=m-1}
				  //if(m<0){alert('timer completed')}
				  
				  document.getElementById('timer').innerHTML =
				    m + ":" + s;
				  setTimeout(startTimer, 1000);
				}

				function checkSecond(sec) {
				  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
				  if (sec < 0) {sec = "59"};
				  return sec;
				}

				setTimeout(function(){
			       // window.location.href = 'result.php';
			       $('#time-out').modal('show');
			    }, 900000);
			</script>
		<?php
			}
		?>


		<div class="col-lg-3"></div>
	</div>
</div>

