<?php
	include('config.php');

	if(isset($_POST['sectionid'])){
		$query = "SELECT * FROM section WHERE SectionID = '".$_POST["sectionid"]."'";
	    $result = mysqli_query($dbcon, $query);  
	    $row = mysqli_fetch_array($result);  
	    echo json_encode($row);  
	}

	if(isset($_POST['userid'])){
		$query = "SELECT * FROM user WHERE UserID = '".$_POST["userid"]."'";
	    $result = mysqli_query($dbcon, $query);  
	    $row = mysqli_fetch_array($result);  
	    echo json_encode($row);  
	}	

	if(isset($_POST['questionid'])){
		$query = "SELECT * FROM question WHERE QuestionID = '".$_POST["questionid"]."'";
	    $result = mysqli_query($dbcon, $query);  
	    $row = mysqli_fetch_array($result);  
	    echo json_encode($row);  
	}	
?>