<?php
	include('config.php');


	if (isset($_POST["deletesection"])) {
		$section = $_POST['sectionid_del'];
		$query = "DELETE FROM section WHERE SectionID = ".$section."";
		mysqli_query($dbcon, $query);
	}

	if (isset($_POST["deleteuser"])) {
		$user = $_POST['userid_del'];
		$query = "DELETE FROM user WHERE UserID = ".$user."";
		mysqli_query($dbcon, $query);

		$qry =  "DELETE FROM result WHERE UserID = ".$user."";
		mysqli_query($dbcon, $qry);

		$qry1 =  "DELETE FROM useranswer WHERE UserID = ".$user."";
		mysqli_query($dbcon, $qry1);
	}

	if (isset($_POST["deletequestion"])) {
		$question = $_POST['questionid_del'];
		$query = "DELETE FROM question WHERE QuestionID = ".$question."";
		mysqli_query($dbcon, $query);

		$qry = "DELETE FROM UserAnswer WHERE QuestionID = ".$question."";
		mysqli_query($dbcon, $qry);

		$points = 0;
		$qry1 = "SELECT * FROM user";
		$res1 = mysqli_query($dbcon, $qry1);
		while ($row1 = mysqli_fetch_array($res1)) {
			$user = $row1['UserID'];
			$qry2 = "SELECT * FROM useranswer JOIN question ON question.QuestionID = useranswer.QuestionID JOIN questionanswer ON questionanswer.QuestionAnswerID = question.QuestionAnswerID WHERE UserID ='".$user."' ORDER BY UserAnswerID ASC";
			$res2 = mysqli_query($dbcon, $qry2);
			while ($row2 = mysqli_fetch_array($res2)) {
				if ($row2['Answer'] == $row2['QuestionAnswer']){
					$points ++;
				}
			}
			$qry3 = "UPDATE result SET Points ='".$points."' WHERE UserID ='".$user."'";
			mysqli_query($dbcon, $qry3);
			echo $points;
		}		
	}	
?>