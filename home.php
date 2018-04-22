<?php
	include('header.php');
	include('server.php');
	include('navigation.php');
	include('config.php');
	if (empty($_SESSION['username'])){
		header('location: login.php');
	}
  	$user = $_SESSION['user'];
?>
<div class="container" style="margin-top: 70px;">
	<div class="jumbotron">
	  	<h1>Module 6: Process Synchronization</h1>
	  	<p>
	  	<span class="glyphicon glyphicon-minus"></span> Deadlock Prevention<br>
	  	<span class="glyphicon glyphicon-minus"></span> Deadlock Avoidance, Detection, and Recovery</p>
	  	<p>To start, click on 'Start Quiz'.</p>
	  	<p><a class="btn btn-primary btn-lg" href="index.php" role="button">Start Quiz</a></p>
	</div>
</div>